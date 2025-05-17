<?php
require_once 'includes/db.php';

// Get the category slug from the URL
$category_slug = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : '';

// Validate slug
if (empty($category_slug)) {
    echo "<div class='error-container'>
            <h2>Invalid Category</h2>
            <p>The category you are looking for does not exist.</p>
            <a href='index.php' class='btn-home'>Go back to Home</a>
          </div>";
    exit();
}

// Fetch category details
$stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ?");
$stmt->execute([$category_slug]);
$category = $stmt->fetch();

if (!$category) {
    echo "<div class='error-container'>
            <h2>Category Not Found</h2>
            <p>The category you are looking for does not exist.</p>
            <a href='index.php' class='btn-home'>Go back to Home</a>
          </div>";
    exit();
}

// Fetch paintings in the category
$stmt = $pdo->prepare("SELECT * FROM arts WHERE category_id = ?");
$stmt->execute([$category['id']]);
$paintings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category['name']); ?> - Paintings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Add your CSS file -->
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
        }
        .card {
            border-radius: 18px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            border: none;
            background: #fff;
            opacity: 0;
            animation: fadeInCard 0.7s forwards;
        }
        .card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
        }
        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
        }
        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2d3436;
            margin-bottom: 0;
        }
        .card-body {
            padding: 1rem 0.5rem 0.8rem 0.5rem;
            background: #f8fafc;
        }
        .no-paintings {
            text-align: center;
            font-size: 20px;
            color: #888;
            margin-top: 40px;
        }
        .btn-home, .btn-primary {
            border-radius: 25px;
            padding: 10px 28px;
            font-weight: 500;
            font-size: 1.1rem;
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            border: none;
            transition: background 0.2s;
        }
        .btn-home:hover, .btn-primary:hover {
            background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%);
        }
        @keyframes fadeInCard {
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4"><?php echo htmlspecialchars($category['name']); ?></h1>
        <div class="row g-4">
            <?php if (!empty($paintings)): ?>
                <?php foreach ($paintings as $painting): ?>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="card h-100 shadow-sm border-0">
                            <a href="details.php?slug=<?php echo htmlspecialchars($painting['slug']); ?>" class="text-decoration-none">
                                <img src="assets/uploads/<?php echo htmlspecialchars($painting['main_image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($painting['title']); ?>" style="height:220px;object-fit:cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center text-dark"><?php echo htmlspecialchars($painting['title']); ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="no-paintings text-center fs-5 text-muted">No paintings found in this category.</p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-primary">Go back to Home</a>
        </div>
    </div>
</body>
</html>