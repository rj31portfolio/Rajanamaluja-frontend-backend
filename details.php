<?php
//session_start(); // Start the session at the very beginning

require_once('head.php');
require_once 'includes/db.php';

// Get the art slug from URL parameter
$slug = isset($_GET['slug']) ? htmlspecialchars($_GET['slug']) : '';

// Validate slug
if (empty($slug)) {
    echo "<div class='error-container'>
            <h2>Invalid Art Slug</h2>
            <p>The art slug provided is invalid.</p>
            <a href='index.php' class='btn-home'>Go back to Home</a>";
    exit();
}

// Define base path for images
$baseImagePath = 'assets/uploads/';

// Fetch art details by slug
$art = [];
$images = [];
$categories = [];

try {
    // Get art details
    $stmt = $pdo->prepare("SELECT a.*, c.name as category_name, c.slug as category_slug 
                          FROM arts a 
                          LEFT JOIN categories c ON a.category_id = c.id 
                          WHERE a.slug = ?");
    $stmt->execute([$slug]);
    $art = $stmt->fetch();

    // If no art found, show error
    if (empty($art)) {
        echo "<div class='error-container'>
                <h2>Art not found</h2>
                <p>The art you are looking for does not exist or has been removed.</p>
                <a href='index.php' class='btn-home'>Go back to Home</a>";
        exit();
    }

    // Get additional images
    $img_stmt = $pdo->prepare("SELECT image_path FROM art_images WHERE art_id = ?");
    $img_stmt->execute([$art['id']]);
    $images = $img_stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    // Get all categories for sidebar
    $categories = $pdo->query("SELECT * FROM categories")->fetchAll();

    // Get related artworks
    $related_stmt = $pdo->prepare("SELECT id, title, slug, main_image FROM arts 
                                 WHERE category_id = ? AND id != ? 
                                 ORDER BY RAND() LIMIT 3");
    $related_stmt->execute([$art['category_id'], $art['id']]);
    $related_arts = $related_stmt->fetchAll();

} catch (PDOException $e) {
    echo "<div class='error-container'>
            <h2>Database Error</h2>
            <p>Sorry, we're experiencing technical difficulties.</p>
            <a href='index.php' class='btn-home'>Go back to Home</a>";
    exit();
}

// Set main image with fallback
$mainImage = !empty($art['main_image']) ? $baseImagePath . htmlspecialchars($art['main_image']) : 'images/default.png';
$mainImage2 = !empty($art['main_image_2']) ? $baseImagePath . htmlspecialchars($art['main_image_2']) : null;
?>
<style>
    .alert-success {
        padding: 10px 15px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 4px;
    }
</style>
<div class="page-wrapper">    
    <?php require_once('header.php'); ?>
    
    <div class="form-back-drop"></div>   
    <section class="hidden-bar">
        <!-- Your hidden bar content remains the same -->
    </section>

    <section class="page-title" style="background-image:url(https://png.pngtree.com/thumb_back/fh260/background/20220215/pngtree-grey-minimalist-oil-paint-splashes-on-the-banner-background-image_926107.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1><?php echo htmlspecialchars($art['title']); ?></h1>                   
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <?php if (!empty($art['category_name'])): ?>
                    <li><a href="details.php?slug=<?php echo htmlspecialchars($art['slug']); ?>">
                        <?php echo htmlspecialchars($art['category_name']); ?>
                    </a></li>
                    <?php endif; ?>
                    <li><?php //echo htmlspecialchars($art['title']); ?></li>
                </ul>
            </div>
        </div>
    </section>
   
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">              
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="inner-box">  
                            <div class="image-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    <!-- Main image -->
                                    <figure class="image">
                                        <img src="<?php echo $mainImage; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>"/>
                                    </figure>
                                    
                                    <!-- Second main image if exists -->
                                    <?php if ($mainImage2): ?>
                                    <figure class="image">
                                        <img src="<?php echo $mainImage2; ?>" alt="<?php echo htmlspecialchars($art['title']); ?>"/>
                                    </figure>
                                    <?php endif; ?>
                                </div>
                            </div>							
                            <h1 class="add-new-head-inenr-all"><?php echo htmlspecialchars($art['title']); ?></h1>
                            
                            <!-- Category and artist info -->
                            <div class="art-meta-info">
                                <?php if (!empty($art['category_name'])): ?>
                                <div class="category">
                                    <span>Category:</span>
                                    <a href="category.php?slug=<?php echo htmlspecialchars($art['category_slug']); ?>">
                                        <?php echo htmlspecialchars($art['category_name']); ?>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="artist text-dark">
                                    <span>Artist:</span>
                                    <span>Rajan Maluja Arts</span>
                                </div>
                            </div>
                            
                            <div class="text dynamictext">                               
                                <?php echo $art['description']; ?>
                            </div>
                            
                            <!-- Art Details Specifications -->
                            <div class="art-specification text-dark">
                                <h3 class='text-light'>Artwork Details</h3>
                                <ul>
                                    <?php if (!empty($art['size'])): ?>
                                    <li><strong>Size:</strong> <?php echo htmlspecialchars($art['size']); ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($art['medium'])): ?>
                                    <li><strong>Medium:</strong> <?php echo htmlspecialchars($art['medium']); ?></li>
                                    <?php endif; ?>
                                    <?php if (!empty($art['year'])): ?>
                                    <li><strong>Year Created:</strong> <?php echo htmlspecialchars($art['year']); ?></li>
                                    <?php endif; ?>
                                    <li><strong>Price:</strong> ₹<?php echo number_format($art['price'], 2); ?></li>
                                    <li><strong>Status:</strong> 
                                        <span class="status-badge <?php echo $art['status']; ?>">
                                            <?php 
                                            switch($art['status']) {
                                                case 'in_stock': echo 'In Stock'; break;
                                                case 'sold_out': echo 'Sold Out'; break;
                                                case 'featured': echo 'Featured'; break;
                                                default: echo 'Available';
                                            }
                                            ?>
                                        </span>
                                    </li>
                                    <?php if ($art['stock'] > 0 && $art['status'] != 'sold_out'): ?>
                                    <li><strong>Available:</strong> <?php echo $art['stock']; ?> in stock</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            
                            <!-- Social Sharing -->
                            <div class="social-sharing">
                                <span>Share this artwork:</span>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?text=<?php echo urlencode("Check out this artwork: " . $art['title']); ?>&url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>&media=<?php echo urlencode("https://$_SERVER[HTTP_HOST]" . $mainImage); ?>&description=<?php echo urlencode($art['title']); ?>" target="_blank" class="pinterest"><i class="fa fa-pinterest"></i></a>
                                <a href="whatsapp://send?text=<?php echo urlencode("Check out this artwork: " . $art['title'] . " - https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"); ?>" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            
                            <!-- Add to cart button -->
                            <?php if ($art['stock'] > 0 && $art['status'] != 'sold_out'): ?>
                            <div class="add-to-cart-section">
                                <form method="post" action="add_to_cart.php" class="cart-form">
                                    <input type="hidden" name="art_id" value="<?php echo $art['id']; ?>">
                                    <div class="quantity-box">
                                        <label>Quantity:</label>
                                        <input type="number" name="quantity" value="1" min="1" max="<?php echo $art['stock']; ?>">
                                    </div>
                                    <button type="submit" class="theme-btn btn-style-three">
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Related Artworks Section -->
                   <?php if (!empty($related_arts)): ?>
<section class="related-art-section">
    <div class="auto-container">
        <h2>Related Artworks</h2>
        <div class="row clearfix">
            <?php foreach ($related_arts as $related): 
                $relatedImage = !empty($related['main_image']) ? 
                    $baseImagePath . htmlspecialchars($related['main_image']) : 
                    'images/default.png';
            ?>
            <div class="art-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-box">
                        <a href="details.php?slug=<?php echo htmlspecialchars($related['slug']); ?>">
                            <img src="<?php echo $relatedImage; ?>" alt="<?php echo htmlspecialchars($related['title']); ?>">
                        </a>
                    </div>
                    <h3><a href="details.php?slug=<?php echo htmlspecialchars($related['slug']); ?>">
                        <?php echo htmlspecialchars($related['title']); ?>
                    </a></h3>
                    <?php if (!empty($related['price'])): ?>
                    <div class="price">₹<?php echo number_format($related['price'], 2); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
                    
                    <!-- Gallery Section -->
                    <?php if (!empty($images)): ?>
                    <div class="art-gallery-section">
                        <h3>Gallery Images</h3>
                        <div class="row">
                            <?php foreach ($images as $image): ?>
                            <div class="col-6 col-md-4 mb-3">
                                <div class="gallery-thumb border rounded p-2 h-100">
                                    <img src="<?php echo $baseImagePath . htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($art['title']); ?>" class="img-fluid w-100" style="object-fit:Contain;max-height:220px;">
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Sidebar Section -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar services-sidebar">
                        <!-- Categories Widget -->
                        <div class="sidebar-widget sidebar-blog-category">
                            <h3 class="sidebar-title text-light">Our Services</h3>
                            <ul class="blog-cat">
                                <?php foreach ($categories as $category): ?>
                                <li>
                                    <a href="category.php?slug=<?php echo htmlspecialchars($category['slug']); ?>">
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Enquiry Form Widget -->
                        <div class="sidebar-widget brochure-widget add-side-bg-new">
                            <h3 class="sidebar-title">Enquire Now</h3>
                            <form method="post" action="sms.php" class="enquiry-form">
                                <?php
                               // session_start(); // Start the session to access the success message
                                if (isset($_SESSION['success'])) {
                                    echo "<div class='alert alert-success' style='margin-bottom: 20px;'>" . htmlspecialchars($_SESSION['success']) . "</div>";
                                    unset($_SESSION['success']); // Clear the message after displaying it
                                }
                                ?>
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Enter Your Name" class="form-control input" title="Accept Only Name and Space" pattern="[A-Za-z0-9_ ]{1,150}" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter Your Email" class="form-control input" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name="phone" placeholder="Enter Your Mobile" class="form-control input" onkeydown="return ( event.ctrlKey || event.altKey || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) || (95<event.keyCode && event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 && event.keyCode<40) || (event.keyCode==46))" pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required>
                                </div>
                                <div class="form-group in_message">
                                    <textarea rows="3" name="message" class="form-control" placeholder="Enter Your Message" required></textarea>
                                </div>
                                <input class="btn btn-default add-bg-footer-form" name="btn_enq" type="submit" value="Submit">
                            </form>
                        </div>
                        
                        <!-- Quick Contact Widget -->
                        <div class="sidebar-widget contact-widget">
                            <h3 class="sidebar-title text-light">Quick Contact</h3>
                            <ul class="contact-info">
                                <li>
                                    <span class="icon flaticon-phone-call"></span>
                                    <a href="tel:+911234567890">+91-9136165775</a>
                                </li>
                                <li>
                                    <span class="icon flaticon-email"></span>
                                    <a href="mailto:info@rajanmaluujaarts.com">info@rajanmaluujaarts.com</a>
                                </li>
                                <li>
                                    <span class="icon flaticon-pin"></span>
                                    Delhi NCR, India
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
	
    <?php include 'footer.php'; ?>
</div>

<style>
    /* Additional CSS for the details page */
    .error-container {
        text-align: center;
        margin: 50px auto;
        max-width: 600px;
        padding: 30px;
        background: #f8f9fa;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    
    .btn-home {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }
    
    .art-meta-info {
        margin: 20px 0;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    
    .art-meta-info div {
        margin-bottom: 8px;
    }
    
    .art-meta-info span:first-child {
        font-weight: bold;
        margin-right: 10px;
    }
    
    .art-specifications {
        margin: 25px 0;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 5px;
    }
    
    .art-specifications ul {
        list-style: none;
        padding: 0;
    }
    
    .art-specifications li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
    }
    
    .art-specifications li:last-child {
        border-bottom: none;
    }
    
    .status-badge {
        padding: 3px 8px;
        border-radius: 3px;
        font-size: 0.9em;
        color: white;
    }
    
    .status-badge.in_stock {
        background: #28a745;
    }
    
    .status-badge.sold_out {
        background: #dc3545;
    }
    
    .status-badge.featured {
        background: #ffc107;
        color: #212529;
    }
    
    .social-sharing {
        margin: 25px 0;
    }
    
    .social-sharing a {
        display: inline-block;
        width: 36px;
        height: 36px;
        line-height: 36px;
        text-align: center;
        border-radius: 50%;
        color: white;
        margin-right: 5px;
        transition: all 0.3s;
    }
    
    .social-sharing a:hover {
        transform: translateY(-3px);
    }
    
    .social-sharing .facebook { background: #3b5998; }
    .social-sharing .twitter { background: #1da1f2; }
    .social-sharing .pinterest { background: #bd081c; }
    .social-sharing .whatsapp { background: #25d366; }
    
    .add-to-cart-section {
        margin: 30px 0;
    }
    
    .cart-form {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }
    
    .quantity-box {
        display: flex;
        align-items: center;
    }
    
    .quantity-box label {
        margin-right: 10px;
        font-weight: bold;
    }
    
    .quantity-box input {
        width: 70px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    .related-art-section {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 1px solid #eee;
    }
    
    .art-block {
        margin-bottom: 30px;
    }
    
    .art-block .inner-box {
        border: 1px solid #eee;
        padding: 15px;
        transition: all 0.3s;
    }
    
    .art-block .inner-box:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .art-block .image-box {
        margin-bottom: 15px;
    }
    
    .art-block .image-box img {
        width: 100%;
        height: auto;
    }
    
    .art-block h3 {
        font-size: 1.1em;
        margin-bottom: 5px;
    }
    
    .art-block .price {
        color: #e83e8c;
        font-weight: bold;
    }
    
    /* Additional styles for the gallery section */
    .art-gallery-section {
        margin-top: 40px;
    }
    
    .gallery-thumb {
        overflow: hidden;
        border-radius: 4px;
        position: relative;
    }
    
    .gallery-thumb img {
        transition: transform 0.3s;
    }
    
    .gallery-thumb:hover img {
        transform: scale(1.05);
    }
</style>