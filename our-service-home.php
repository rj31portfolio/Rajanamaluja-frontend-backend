<?php
//require_once 'includes/functions.php';
require_once 'includes/db.php';

$category_slug = isset($_GET['category']) ? $_GET['category'] : '';
$where = $category_slug ? "WHERE c.slug = ?" : "";
$params = $category_slug ? [$category_slug] : [];

$query = "SELECT a.*, c.name as category_name FROM arts a LEFT JOIN categories c ON a.category_id = c.id $where";
$stmt = $pdo->prepare($query);
$stmt->execute($params);
$arts = $stmt->fetchAll();

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<section class="services-section">
    <div class="upper-box">
        <div class="auto-container">
            <div class="sec-title text-center light">
                <p class="add-more-txt-sub-head">SPECIALISTS IN PORTRAIT ARTIST & SKETCH IN DELHI NCR</p>
                <p class="add-mg-new-home-hhgg add-head-pro-new-gg">OUR REMARKABLE WORK</p>
            </div>
        </div>
    </div>

    <div class="services-box">
        <div class="auto-container">
            <div class="services-carousel owl-carousel owl-theme">
                <?php foreach ($arts as $art): ?>
                    <?php
                        // Define the base path for images
                        $baseImagePath = 'assets/uploads/';
                        $imagePath = !empty($art['main_image']) ? $baseImagePath . htmlspecialchars($art['main_image']) : 'images/defaulte.png';
                    ?>
                    <div class='service-block'>
                        <div class='inner-box'>
                            <div class='image-box'>
                                <figure class='image'>
                                    <!-- Corrected link to use slug -->
                                    <a href='details.php?slug=<?= htmlspecialchars($art['slug']) ?>' title='<?= htmlspecialchars($art['title']) ?>'>
                                        <img src='<?= $imagePath ?>' alt='<?= htmlspecialchars($art['title']) ?>'>
                                    </a>
                                </figure>
                            </div>
                            <div class='lower-content'>
                                <p class='add-head-new-services-head-home'>
                                    <a href='details.php?slug=<?= htmlspecialchars($art['slug']) ?>' class='add-service-head-a'>
                                        <?= htmlspecialchars($art['title']) ?>
                                    </a>
                                </p>
                                <p class='add-highlight-name'>Rajan Maluja Arts</p>
                                <div class='text'><?= htmlspecialchars($art['meta_description'] ?? '') ?></div>
                                <div class='link-box'>
                                    <a href='details.php?slug=<?= htmlspecialchars($art['slug']) ?>'>Read More <i class='fa fa-long-arrow-right'></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>