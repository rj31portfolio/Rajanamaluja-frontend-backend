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
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Add your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .paintings-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .painting-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .painting-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }
        .painting-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .painting-card h3 {
            font-size: 18px;
            color: #333;
            text-align: center;
            margin: 10px 0;
            padding: 0 10px;
        }
        .painting-card a {
            text-decoration: none;
            color: inherit;
        }
        .no-paintings {
            text-align: center;
            font-size: 18px;
            color: #666;
        }
        .btn-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($category['name']); ?></h1>
        <div class="paintings-list">
            <?php if (!empty($paintings)): ?>
                <?php foreach ($paintings as $painting): ?>
                    <div class="painting-card">
                        <a href="details.php?slug=<?php echo htmlspecialchars($painting['slug']); ?>">
                            <img src="assets/uploads/<?php echo htmlspecialchars($painting['main_image']); ?>" alt="<?php echo htmlspecialchars($painting['title']); ?>">
                            <h3><?php echo htmlspecialchars($painting['title']); ?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-paintings">No paintings found in this category.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>