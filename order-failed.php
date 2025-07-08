<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'head.php';
require_once 'header.php';

if (!isLoggedIn()) {
    redirect('login.php');
}
?>
    <div class="container my-5 py-5">
        <h2>Order Failed</h2>
        <p>Sorry, your payment could not be processed. Please try again.</p>
        <button type="button" class="btn btn-success"><a href="cart.php" class="text-dark text-decoration-none">Return to Cart</a></button>
</div>
    <?php require_once 'footer.php'; ?>