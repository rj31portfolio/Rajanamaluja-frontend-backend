<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

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
                        <a href="<?php echo BASE_URL; ?>"><img src="images/rajan-maluuja-logo.png"
                                alt="Portrait Painting Artist in Delhi" title="Portrait Painting Artist in Delhi"></a>
                    </div>
                </div>

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="mobile_cart_button" type="button">
                                <a href="<?php echo BASE_URL; ?>cart.php" class="text-white"><i
                                        class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                <span class="mobile_show_cart_qty_css">0</span>
                            </button>
                            <!-- Toggle Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu-button"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
                                <li><a href="<?php echo BASE_URL; ?>about.php">About Us</a></li>
                                <li class="dropdown">
                                    <a href="#">Our Services</a>
                                    <ul>
                                        <?php foreach ($categories as $category): ?>
                                        <li>
                                            <a
                                                href="<?php echo BASE_URL; ?>category.php?slug=<?php echo htmlspecialchars($category['slug']); ?>">
                                                <?php echo htmlspecialchars($category['name']); ?>
                                            </a>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo BASE_URL; ?>video-Gallary.php">Video Gallery</a></li>
                                <li><a href="<?php echo BASE_URL; ?>contact-us.php">Contact Us</a></li>
                                <li class="add-new-shop-tab"><a href="<?php echo BASE_URL; ?>shop.php">Shop Now</a></li>
                                <li class="dropdown">
                                    <a href="#">Shop Category</a>
                                    <ul>
                                        <li><a href="<?php echo BASE_URL; ?>oil-painting-art.php">Oil Painting Art</a>
                                        </li>
                                        <li><a href="<?php echo BASE_URL; ?>portrait-painting-art.php">Portrait Painting
                                                Art</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>acrylic-painting.php">Acrylic Painting
                                                Art</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>tanjore-painting-art.php">Tanjore Painting
                                                Art</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>divine-painting-art.php">Divine Painting
                                                Art</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>painting-on-objects.php">Painting On
                                                Objects</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>canvas-painting-art.php">Canvas Painting
                                                Art</a></li>
                                        <li><a href="<?php echo BASE_URL; ?>sketch-art-work.php">Sketch Art Work</a>
                                        </li>
                                        <li><a href="<?php echo BASE_URL; ?>sculpture-art.php">Sculpture Art</a></li>
                                    </ul>
                                </li>

                                <!-- Account Dropdown with Toggle -->
                                <?php if (isLoggedIn()): ?>
                                <li class="dropdown">
                                    <div class="account-dropdown-wrapper">
                                        <button class="btn btn-secondary add-bg-new-account-dro-menu account-toggle"
                                            type="button" aria-haspopup="true" aria-expanded="false"
                                            onclick="toggleAccountDropdown(this)">
                                            Account <i class="fa fa-chevron-down"></i>
                                        </button>
                                        <ul class="account-dropdown-menu">
                                            <li><a href="<?php echo BASE_URL; ?>cart.php"><i
                                                        class="fa fa-shopping-cart"></i> Cart</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>wishlist.php"><i
                                                        class="fa fa-heart"></i> Wishlist</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>order-history.php"><i
                                                        class="fa fa-history"></i> Orders</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a href="<?php echo BASE_URL; ?>logout.php" class="text-danger"><i
                                                        class="fa fa-sign-out"></i> Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php else: ?>
                                <li class="d-flex align-items-center gap-2" style="gap:10px;">
                                    <a href="<?php echo BASE_URL; ?>login.php"
                                        class="btn btn-outline-primary btn-sm px-3 me-1" style="font-weight:600;">
                                        <i class="fa fa-sign-in"></i> Login
                                    </a>
                                    <a href="<?php echo BASE_URL; ?>register.php" class="btn btn-primary btn-sm px-3"
                                        style="font-weight:600;">
                                        <i class="fa fa-user-plus"></i> Register
                                    </a>
                                </li>
                                <?php endif; ?>

                                <li>
                                    <button class="btn btn-secondary add-bg-new-account-dro-menu" type="button">
                                        <a href="<?php echo BASE_URL; ?>cart.php" class="text-white"><i
                                                class="fa fa-shopping-cart" aria-hidden="true"></i></a>
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

<style>
    /* Account Dropdown Styles */
    .account-dropdown-wrapper {
        position: relative;
        display: inline-block;
    }

    .account-dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        min-width: 200px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        border-radius: 4px;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .account-dropdown-menu li {
        padding: 0;
    }

    .account-dropdown-menu a {
        color: #333;
        padding: 10px 15px;
        display: block;
        text-decoration: none;
        transition: all 0.3s;
    }

    .account-dropdown-menu a:hover {
        background-color: #f8f9fa;
        color: #000;
    }

    .account-dropdown-menu i {
        margin-right: 8px;
        width: 18px;
        text-align: center;
    }

    .account-dropdown-menu hr {
        margin: 5px 0;
    }

    .account-toggle .fa-chevron-down {
        margin-left: 5px;
        transition: transform 0.3s;
    }

    .account-toggle[aria-expanded="true"] .fa-chevron-down {
        transform: rotate(180deg);
    }
</style>

<script>
    function toggleAccountDropdown(button) {
        const dropdown = button.nextElementSibling;
        const isExpanded = button.getAttribute('aria-expanded') === 'true';
        // Close all other dropdowns first
        document.querySelectorAll('.account-dropdown-menu').forEach(menu => {
            if (menu !== dropdown) {
                menu.style.display = 'none';
                menu.previousElementSibling.setAttribute('aria-expanded', 'false');
            }
        });
        // Toggle current dropdown
        if (isExpanded) {
            dropdown.style.display = 'none';
            button.setAttribute('aria-expanded', 'false');
        } else {
            dropdown.style.display = 'block';
            button.setAttribute('aria-expanded', 'true');
        }
    }
    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.account-dropdown-wrapper')) {
            document.querySelectorAll('.account-dropdown-menu').forEach(menu => {
                menu.style.display = 'none';
                menu.previousElementSibling.setAttribute('aria-expanded', 'false');
            });
        }
    });
</script>