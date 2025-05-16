<?php
//  require_once 'includes/functions.php';
require_once 'includes/db.php';

$media = $pdo->query("SELECT * FROM media_images")->fetchAll();
?>
<?php require_once 'head.php'; ?>

<div class="page-wrapper">  
    <?php include 'header.php'; ?>
	
    <div class="form-back-drop"></div>   

    <section class="hidden-bar">
        <div class="inner-box">
            <div class="cross-icon"><span class="fa fa-times"></span></div>
            <div class="title"><p>BOOK YOUR ARTS</p></div>            
            <div class="appointment-form">
                <form method="post" action="sms.php">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Enter Your Name" pattern="[A-Za-z0-9_ ]{1,150}" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Enter Your Mobile" pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Enter Your Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn_enq" class="theme-btn btn-style-three">Submit now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="page-title" style="background-image:url(images/about.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Youtube Studio</h1>                   
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Youtube Studio</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="projects-section alternate">
        <div class="auto-container">
            <div class="upper-box">
                <div class="auto-container">    
                    <div class="sec-title text-center light">
                        <h2 class="add-more-txt-sub-head-new">Youtube Studio</h2>
                    </div>
                </div>
            </div>            

            <div class="mixitup-gallery">                              
                <div class="filter-list row maggineimages">
                    <?php foreach ($media as $row): 
                        // Extract YouTube Video ID from embed_code
                        preg_match('/embed\/([^\?"]+)/', $row['embed_code'], $matches);
                        $video_id = $matches[1] ?? '';
                        if (!$video_id) continue;

                        $thumbnail = "https://img.youtube.com/vi/$video_id/mqdefault.jpg";
                        $video_url = "https://youtu.be/$video_id";
                        $caption = htmlspecialchars($row['caption']);
                    ?>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image">
                                <img src="<?= $thumbnail ?>" alt="<?= $caption ?>">
                            </figure>
                            <div class="overlay-box">                                
                                <div class="btn-box">
                                    <a href="<?= $video_url ?>" title="<?= $caption ?>" class="lightbox-image" data-fancybox="gallery">
                                        <i class="fa fa-youtube-play"></i>
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

<?php require_once "footer.php"; ?>
