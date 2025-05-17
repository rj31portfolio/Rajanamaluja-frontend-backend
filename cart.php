<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'head.php';
require_once 'header.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.*, a.title, a.price, a.main_image FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['quantity'] as $cart_id => $quantity) {
            if ($quantity <= 0) {
                $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
                $stmt->execute([$cart_id, $user_id]);
            } else {
                $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
                $stmt->execute([$quantity, $cart_id, $user_id]);
            }
        }
        redirect('cart.php');
    } elseif (isset($_POST['remove_item'])) {
        $cart_id = $_POST['cart_id'];
        $stmt = $pdo->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
        $stmt->execute([$cart_id, $user_id]);
        redirect('cart.php');
    }
}
?>

<div class="container my-5 py-5">
    <h2 class="mb-4 text-center">Your Cart</h2>
    <?php if (count($cart_items) > 0): ?>
    <form method="post">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>
                <?php foreach ($cart_items as $item): ?>
                    <?php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                    <tr>
                        <td>
                            <img src="assets/uploads/<?php echo htmlspecialchars($item['main_image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" style="height:60px;width:auto;">
                        </td>
                        <td><?php echo htmlspecialchars($item['title']); ?></td>
                        <td>₹<?php echo number_format($item['price'], 2); ?></td>
                        <td style="max-width:100px;">
                            <input type="number" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="form-control" style="width:80px;">
                        </td>
                        <td>₹<?php echo number_format($subtotal, 2); ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                                <button type="submit" name="remove_item" class="btn btn-danger btn-sm" onclick="return confirm('Remove this item?');">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Total</th>
                        <th colspan="2">₹<?php echo number_format($total, 2); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" name="update_cart" class="btn btn-primary">Update Cart</button>
            <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
        </div>
    </form>
    <?php else: ?>
        <div class="alert alert-info text-center">Your cart is empty.</div>
    <?php endif; ?>
</div>

<?php require_once 'footer.php'; ?>
