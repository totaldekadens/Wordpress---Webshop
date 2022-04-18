<!-- 
    Den här sidan representerar just nu butiksidan.
-->

<?php echo "page-butiker"; ?>

<?php get_header(); ?>

<main>
   
    <?php
    while (have_posts()) {
        the_post();  
        
        the_title();
        the_content();  ?>
        
    <?php } ?>
              
</main>

<?php get_footer(); ?>

