<?php
session_start();
require_once 'includes/db.php';
require_once 'includes/functions.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $_SESSION['redirect_url'] = $_SERVER['HTTP_REFERER'] ?? 'index.php';
    header('Location: login.php');
    exit();
}

// Validate input
if (!isset($_POST['art_id']) || !isset($_POST['quantity'])) {
    $_SESSION['error'] = "Invalid request";
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
    exit();
}

$art_id = (int)$_POST['art_id'];
$quantity = (int)$_POST['quantity'];
$user_id = $_SESSION['user_id'];

try {
    // Check if art exists and is available
    $stmt = $pdo->prepare("SELECT stock, status FROM arts WHERE id = ?");
    $stmt->execute([$art_id]);
    $art = $stmt->fetch();

    if (!$art || $art['status'] === 'sold_out' || $art['stock'] < 1) {
        $_SESSION['error'] = "This artwork is no longer available";
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
        exit();
    }

    // Validate quantity
    if ($quantity < 1 || $quantity > $art['stock']) {
        $_SESSION['error'] = "Invalid quantity selected";
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
        exit();
    }

    // Check if item already in cart
    $stmt = $pdo->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND art_id = ?");
    $stmt->execute([$user_id, $art_id]);
    $existing_item = $stmt->fetch();

    if ($existing_item) {
        // Update existing cart item
        $new_quantity = $existing_item['quantity'] + $quantity;
        
        // Ensure we don't exceed available stock
        if ($new_quantity > $art['stock']) {
            $new_quantity = $art['stock'];
            $_SESSION['notice'] = "Adjusted quantity to available stock";
        }
        
        $stmt = $pdo->prepare("UPDATE cart SET quantity = ? WHERE id = ?");
        $stmt->execute([$new_quantity, $existing_item['id']]);
    } else {
        // Add new item to cart
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, art_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $art_id, $quantity]);
    }

    $_SESSION['success'] = "Artwork added to cart successfully";
    header('Location: cart.php');
    exit();

} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    $_SESSION['error'] = "An error occurred while processing your request";
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
    exit();
}