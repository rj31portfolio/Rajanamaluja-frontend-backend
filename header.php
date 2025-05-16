<?php
require_once 'includes/db.php';

// Fetch categories from the database
$stmt = $pdo->query("SELECT name, slug FROM categories ORDER BY name ASC");
$categories = $stmt->fetchAll();
?>

<header class="main-header header-style-one">
    <div class="auto-container">
        <div class="header-lower">
            <div class="main-box clearfix">
                <div class="logo-box">
                    <div class="logo">
                        <a href=""><img src="images/rajan-maluuja-logo.png" alt="Portrait Painting Artist in Delhi" title="Portrait Painting Artist in Delhi"></a>
                    </div>
                </div>

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="mobile_cart_button" type="button">
                                <a href="cart.php" class="text-white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                <span class="mobile_show_cart_qty_css">0</span>
                            </button>
                            <!-- Toggle Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu-button"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li class="dropdown">
                                    <a href="#">Our Services</a>
                                    <ul>
                                        <?php foreach ($categories as $category): ?>
                                            <li>
                                                <a href="category.php?slug=<?php echo htmlspecialchars($category['slug']); ?>">
                                                    <?php echo htmlspecialchars($category['name']); ?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <!--<li><a href="our-portfolio.php">Our Portfolio</a></li> -->
                               <!-- <li><a href="news-and-magazine-gallery.php">News & Magazine</a></li> -->
                                <li><a href="youtube-studio.php">Video Gallery</a></li>
                               <!-- <li><a href="blogs.php">Our Blogs</a></li> -->
                                <li><a href="contact-us.php">Contact Us</a></li>
                                <li class="add-new-shop-tab"><a href="shop.php">Shop Now</a></li>
                                <li class="dropdown">
                                    <a href="#">Shop Category</a>
                                    <ul>
                                        <li><a href="oil-painting-art.php">Oil Painting Art</a></li>
                                        <li><a href="portrait-painting-art.php">Portrait Painting Art</a></li>
                                        <li><a href="acrylic-painting.php">Acrylic Painting Art</a></li>
                                        <li><a href="tanjore-painting-art.php">Tanjore Painting Art</a></li>
                                        <li><a href="divine-painting-art.php">Divine Painting Art</a></li>
                                        <li><a href="painting-on-objects.php">Painting On Objects</a></li>
                                        <li><a href="canvas-painting-art.php">Canvas Painting Art</a></li>
                                        <li><a href="sketch-art-work.php">Sketch Art Work</a></li>
                                        <li><a href="sculpture-art.php">Sculpture Art</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <div>
                                        <a href="login.php">
                                            <button class="btn btn-secondary add-bg-new-account-dro-menu" type="button" aria-haspopup="true" aria-expanded="false">
                                                Account
                                            </button>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <button class="btn btn-secondary add-bg-new-account-dro-menu" type="button">
                                        <a href="cart.php" class="text-white"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    </button>
                                    <span class="show_cart_qty_css">0</span>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>