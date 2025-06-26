<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'head.php';
require_once 'header.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT c.*, a.title, a.price FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<div class="container my-5 py-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <?php if (count($cart_items) > 0): ?>
        <form action="update-cart.php" method="post">
            <div class="table-responsive">
                <table class="table table-striped table-bordered cart-table text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_items as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['title']); ?></td>
                                <td>₹<?php echo number_format($item['price'], 2); ?></td>
                                <td>
                                    <input type="number" name="quantities[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="form-control mx-auto" style="width: 70px;">
                                </td>
                                <td>₹<?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                                <td>
                                    <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Grand Total</th>
                            <th colspan="2">₹<?php echo number_format($total, 2); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>

        <div class="text-end">
            <button id="rzp-button" class="btn btn-success">Pay Now</button>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">Your cart is empty.</div>
    <?php endif; ?>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('rzp-button')?.addEventListener('click', function(e) {
        e.preventDefault();
        fetch('create-razorpay-order.php')
            .then(response => response.json())
            .then(data => {
                const options = {
                    key: data.key,
                    amount: data.amount,
                    currency: data.currency,
                    name: "Artify Hub",
                    description: "Art Purchase",
                    order_id: data.order_id,
                    handler: function (response) {
                        window.location.href = `payment-process.php?razorpay_payment_id=${response.razorpay_payment_id}&razorpay_order_id=${response.razorpay_order_id}&razorpay_signature=${response.razorpay_signature}`;
                    }
                };
                const rzp = new Razorpay(options);
                rzp.open();
            });
    });
</script>

<?php require_once 'footer.php'; ?>
