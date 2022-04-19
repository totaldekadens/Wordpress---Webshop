<!-- 
    Den här sidan representerar just nu kontaktsidan.
-->

<?php echo "page-kontakt"; ?>

<?php get_header(); ?>

<main>
   
    <?php
    while (have_posts()) {
        the_post();  
        

        the_content();  ?>
        
    <?php } ?>
              
</main>

<?php get_footer(); ?>

