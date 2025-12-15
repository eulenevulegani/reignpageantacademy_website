<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <!-- Icons (FontAwesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <nav>
                <div class="logo">
                     <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt="Reign Pageant Academy Logo">
                     </a>
                </div>
                <div class="nav-links" id="navLinks">
                    <!-- Standard WP Menu will go here ideally, but for now using static for prototype fidelity -->
                    <a href="<?php echo home_url('#about'); ?>">About</a>
                    <a href="<?php echo home_url('#vision'); ?>">Vision & Mission</a>
                    <a href="<?php echo home_url('#services'); ?>">Services</a>
                    <a href="<?php echo home_url('/shop'); ?>">Shop</a>
                     <a href="<?php echo home_url('#events'); ?>">Events</a>
                    <a href="<?php echo home_url('#contact'); ?>">Contact</a>
                </div>
                <div class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
            </nav>
        </div>
    </header>
