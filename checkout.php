<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
require_once 'head.php';
require_once 'header.php';

if (!isLoggedIn()) {
    redirect('login.php');
}

$user_id = $_SESSION['user_id'];
$discount = 0;
$coupon_code = '';
$discount_message = '';
$payment_method = 'online';

// Process coupon code if submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_coupon'])) {
    $coupon_code = trim($_POST['coupon_code']);
    
    // Validate coupon
    $stmt = $pdo->prepare("SELECT * FROM coupons WHERE code = ? AND (expiry_date > NOW() OR expiry_date IS NULL)");
    $stmt->execute([$coupon_code]);
    $coupon = $stmt->fetch();
    
    if ($coupon) {
        $discount = $coupon['discount_amount'];
        $discount_message = "Coupon applied successfully! Discount: ₹" . number_format($discount, 2);
    } else {
        $discount_message = "Invalid or expired coupon code";
    }
}

// Get cart items
$stmt = $pdo->prepare("SELECT c.*, a.title, a.price FROM cart c JOIN arts a ON c.art_id = a.id WHERE c.user_id = ?");
$stmt->execute([$user_id]);
$cart_items = $stmt->fetchAll();

$subtotal = 0;
foreach ($cart_items as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}

$shipping_fee = 50; // Example shipping fee
$total = $subtotal + $shipping_fee - $discount;
?>

<div class="container my-5 py-5">
    <h2 class="text-center mb-4">Checkout</h2>

    <?php if (count($cart_items) > 0): ?>
        <div class="row">
            <div class="col-md-8">
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
                        </table>
                    </div>
                </form>

                <!-- Shipping Information Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Shipping Information</h5>
                    </div>
                    <div class="card-body">
                        <form id="shippingForm">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="zip_code" class="form-label">ZIP Code</label>
                                    <input type="text" class="form-control" id="zip_code" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" required>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <form method="post" class="input-group">
                                <input type="text" class="form-control" name="coupon_code" placeholder="Coupon Code" value="<?php echo htmlspecialchars($coupon_code); ?>">
                                <button class="btn btn-outline-secondary" type="submit" name="apply_coupon">Apply</button>
                            </form>
                            <?php if ($discount_message): ?>
                                <div class="mt-2 text-<?php echo $discount > 0 ? 'success' : 'danger'; ?>">
                                    <?php echo $discount_message; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <table class="table">
                            <tr>
                                <th>Subtotal</th>
                                <td>₹<?php echo number_format($subtotal, 2); ?></td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>₹<?php echo number_format($shipping_fee, 2); ?></td>
                            </tr>
                            <?php if ($discount > 0): ?>
                                <tr class="text-success">
                                    <th>Discount</th>
                                    <td>-₹<?php echo number_format($discount, 2); ?></td>
                                </tr>
                            <?php endif; ?>
                            <tr class="fw-bold">
                                <th>Total</th>
                                <td>₹<?php echo number_format($total, 2); ?></td>
                            </tr>
                        </table>

                        <div class="mb-3">
                            <h6>Payment Method</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="onlinePayment" value="online" checked>
                                <label class="form-check-label" for="onlinePayment">
                                    Online Payment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="codPayment" value="cod">
                                <label class="form-check-label" for="codPayment">
                                    Cash on Delivery (COD)
                                </label>
                            </div>
                        </div>

                        <button id="rzp-button" class="btn btn-success w-100 mb-2">Pay Now</button>
                        <button id="cod-button" class="btn btn-primary w-100 d-none">Place Order (COD)</button>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">Your cart is empty.</div>
    <?php endif; ?>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    // Toggle between payment methods
    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.value === 'online') {
                document.getElementById('rzp-button').classList.remove('d-none');
                document.getElementById('cod-button').classList.add('d-none');
            } else {
                document.getElementById('rzp-button').classList.add('d-none');
                document.getElementById('cod-button').classList.remove('d-none');
            }
        });
    });

    // Handle COD order
    document.getElementById('cod-button')?.addEventListener('click', function(e) {
        e.preventDefault();
        if (validateShippingForm()) {
            if (confirm('Are you sure you want to place this order with Cash on Delivery?')) {
                placeOrder('cod');
            }
        }
    });

    // Handle Razorpay payment
    document.getElementById('rzp-button')?.addEventListener('click', function(e) {
        e.preventDefault();
        if (validateShippingForm()) {
            fetch('create-razorpay-order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    amount: <?php echo $total * 100; ?>, // Convert to paise
                    coupon_code: '<?php echo $coupon_code; ?>'
                })
            })
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
                        placeOrder('online', response);
                    },
                    prefill: {
                        name: document.getElementById('full_name').value,
                        contact: document.getElementById('phone').value,
                        email: '<?php echo $_SESSION['email'] ?? ''; ?>'
                    }
                };
                const rzp = new Razorpay(options);
                rzp.open();
            });
        }
    });

    function validateShippingForm() {
        const requiredFields = ['full_name', 'address', 'city', 'state', 'zip_code', 'phone'];
        let isValid = true;
        
        requiredFields.forEach(field => {
            const element = document.getElementById(field);
            if (!element.value.trim()) {
                element.classList.add('is-invalid');
                isValid = false;
            } else {
                element.classList.remove('is-invalid');
            }
        });
        
        if (!isValid) {
            alert('Please fill all required shipping information fields.');
        }
        
        return isValid;
    }

    function placeOrder(paymentMethod, paymentResponse = null) {
        const shippingInfo = {
            full_name: document.getElementById('full_name').value,
            address: document.getElementById('address').value,
            city: document.getElementById('city').value,
            state: document.getElementById('state').value,
            zip_code: document.getElementById('zip_code').value,
            phone: document.getElementById('phone').value
        };

        fetch('process-order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                payment_method: paymentMethod,
                coupon_code: '<?php echo $coupon_code; ?>',
                shipping_info: shippingInfo,
                payment_response: paymentResponse
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = 'order-confirmation.php?order_id=' + data.order_id;
            } else {
                alert('Error: ' + data.message);
            }
        });
    }
</script>

<?php require_once 'footer.php'; ?>