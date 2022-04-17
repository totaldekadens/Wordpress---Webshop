<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

    <title><?php wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header>
    
    <div class="headerTop">
        <div class="logo"><?php the_custom_logo() ?></div>
    </div>

    <div class="navigationHeader">

        <!-- <div class="headerInfo"> -->
        <div class="dropMenu">
            <div class="dropImg" >
                <a class="toggle-nav" href="##"><img src="<?php echo get_template_directory_uri(); ?>/assets/mobilemenu.png" alt="Dropdown-meny"/></a>
            </div>
        </div>
        <!-- </div> -->
        <div class="searchbar">
            <?php dynamic_sidebar('searchbar'); ?>

            <!-- <div class="dropMenu">
                <div class="dropImg" >
                    <a class="toggle-nav" href="##"><img src="<?php /* echo get_template_directory_uri();  */?>/assets/dropdown.png" alt="Dropdown-meny"/></a>
                </div>
            </div> -->
        </div>

        <div class="accountAndCart">
            <?php 
            wp_nav_menu(array(
                'theme_location' => 'header-right',
            )); 
            ?>
        </div>

    </div>

    <div class="dropdownMenu">
        <div class="catMenu">
            <?php
                wp_nav_menu(array(
                'theme_location' => 'dropdown-left-top',
                )); ?>
            
        </div>
        <div class="line"></div>
        
        <div class="catMenuRight">
            <?php
                wp_nav_menu(array(
                'theme_location' => 'dropdown-right-top',
                )); ?>
            
        </div>
       
            

    </div>
    
</header>