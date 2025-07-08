<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'head.php';
require_once 'header.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$status_filter = $_GET['status'] ?? '';

$query = "SELECT * FROM orders WHERE user_id = ?";
$params = [$user_id];

if ($status_filter && $status_filter !== 'all') {
    $query .= " AND status = ?";
    $params[] = $status_filter;
}

$query .= " ORDER BY created_at DESC";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$orders = $stmt->fetchAll();
?>

<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white p-4 rounded shadow-sm border">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0 text-dark">Order History</h4>
                    <form method="get" class="d-flex">
                        <select name="status" class="form-select" onchange="this.form.submit()">
                            <option value="all" <?= $status_filter == 'all' ? 'selected' : '' ?>>All</option>
                            <option value="pending" <?= $status_filter == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="processing" <?= $status_filter == 'processing' ? 'selected' : '' ?>>Processing</option>
                            <option value="completed" <?= $status_filter == 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="cancelled" <?= $status_filter == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle text-center bg-white">
                        <thead class="table-light text-dark">
                            <tr>
                                <th>Order ID</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Payment</th>
                            </tr>
                        </thead>
                        <tbody class="table-light text-dark">
                            <?php if (count($orders) > 0): ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td>#<?php echo $order['id']; ?></td>
                                        <td><?php echo date('d M Y, h:i A', strtotime($order['created_at'])); ?></td>
                                        <td>₹<?php echo number_format($order['total_amount'], 2); ?></td>
                                        <td>
                                            <span class="badge bg-<?php 
                                                switch ($order['status']) {
                                                    case 'pending': echo 'warning'; break;
                                                    case 'processing': echo 'primary'; break;
                                                    case 'completed': echo 'success'; break;
                                                    case 'cancelled': echo 'danger'; break;
                                                    default: echo 'secondary'; 
                                                }
                                            ?>">
                                                <?php echo ucfirst($order['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php 
                                                echo ($order['payment_status'] === 'paid') ? 'success' : 'danger'; 
                                            ?>">
                                                <?php echo ucfirst($order['payment_status']); ?>
                                            </span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td colspan="5" class="text-muted">No orders found.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php'; ?>
