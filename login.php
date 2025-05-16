<?php
//session_start();
//require_once "includes/db.php";
require_once "includes/functions.php";

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'customer'");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<?php require_once "head.php"; ?>
<div class="page-wrapper">
    <?php include 'header.php'; ?>

    <div class="container" style="min-height:60vh;">
        <div class="row justify-content-center align-items-center" style="min-height:80vh;">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h3 class="mb-4 text-center text-primary">Login</h3>
                        <?php if ($error): ?>
                            <div class="alert alert-danger text-center py-2"><?php echo htmlspecialchars($error); ?></div>
                        <?php endif; ?>
                        <form method="POST" autocomplete="off">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            <small>Don't have an account? <a href="register.php">Register here</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once 'footer.php'; ?>
</div>