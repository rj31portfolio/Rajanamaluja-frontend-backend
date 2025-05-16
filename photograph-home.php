<?php
require_once 'includes/db.php';

// Fetch all awards
$awards = $pdo->query("SELECT * FROM awards ORDER BY created_at DESC")->fetchAll();

// Path to your awards images
$awardsDir = 'assets/uploads/awards/';
?>
<section class='projects-section alternate'>
    <div class='auto-container'>
        <div class='upper-box'>
            <div class='auto-container'>
                <div class='text-center light'>
                    <p class='add-more-txt-sub-head-new add-head-pro-new-gg'>Awards & Achievements</p>
                </div>
            </div>
        </div>

        <div class='mixitup-gallery'>
            <div class='filter-list row'>
                <?php foreach ($awards as $award): ?>
                    <?php 
                    // Check if image exists in the database record
                    if (!empty($award['image_path'])) {
                        $imagePath = $awardsDir . basename($award['image_path']);
                    ?>
                    <div class='project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12'>
                        <div class='image-box'>
                            <figure class='image'>
                                <img src='<?php echo $imagePath; ?>' alt='<?php echo htmlspecialchars($award['title']); ?>'>
                            </figure>
                            <div class='overlay-box'>
                                <div class='btn-box'>
                                    <a href='<?php echo $imagePath; ?>' 
                                       title='<?php echo htmlspecialchars($award['title']); ?>' 
                                       class='lightbox-image' 
                                       data-fancybox='gallery'>
                                        <i class='fa fa-search'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>