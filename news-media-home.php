<?php
//require_once 'includes/functions.php';
require_once 'includes/db.php';

$events = $pdo->query("SELECT * FROM event_images")->fetchAll();
?>

<section class='projects-section alternate'> 
    <div class='auto-container'>
        <div class='upper-box'>
            <div class='auto-container'>
                <div class='text-center light'>
                    <p>OUR WORK PROCESS</p>
                    <p class='add-more-txt-sub-head-new add-head-pro-new-gg'>News & Media Updates</p>
                </div>
            </div>
        </div>
        <div class='mixitup-gallery'>
            <div class='filter-list row maggineimages'>
                <?php foreach ($events as $event): ?>
                    <?php
                        $image = htmlspecialchars($event['image_path']);
                        $imageURL = "assets/uploads/$image";
                        $title = htmlspecialchars($event['title'] ?? 'Event Image');
                    ?>
                    <div class='project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12'>
                        <div class='image-box'>
                            <figure class='image'>
                                <img src='<?php echo $imageURL; ?>' alt='<?php echo $title; ?>' loading='lazy' style='width: 100%; height: 300px;'>
                            </figure>
                            <div class='overlay-box'>
                                <div class='btn-box'>
                                    <a href='<?php echo $imageURL; ?>' title='<?php echo $title; ?>' class='lightbox-image' data-fancybox='gallery'>
                                        <i class='fa fa-search'></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
