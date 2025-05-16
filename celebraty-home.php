<?php
//require_once 'includes/functions.php';
require_once 'includes/db.php';


$photos = $pdo->query("SELECT * FROM celebrity_photos")->fetchAll();
?>

<section class="projects-section alternate sssssssssssssss">
    <div class="auto-container">
        <div class="upper-box">
            <div class="auto-container">
                <div class="sec-title text-center light">
                    <p>OUR WORK PROCESS</p>
                    <h2 class="add-more-txt-sub-head-new">Celebrity Portrait Painting</h2>
                </div>
            </div>
        </div>

        <div class="mixitup-gallery">
            <div class="filter-list row">
                <?php foreach ($photos as $photo): ?>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image">
                                <img src="assets/uploads/<?php echo $photo['image_path']; ?>" alt="Celebrity Photo" style="height: 300px; width: 100%;">
                            </figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="assets/uploads/<?php echo $photo['image_path']; ?>" class="lightbox-image" data-fancybox="gallery">
                                        <i class="fa fa-search"></i>
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