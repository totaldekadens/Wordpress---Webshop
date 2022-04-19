<!-- 
    Den här sidan representerar just nu kategorisidan för produkterna.
-->

<?php echo "page"; ?>

<?php get_header(); ?>

<main>
   
    <?php
    while (have_posts()) {
        the_post(); ?>
         <div class="heroCategory">  

        <!-- Byt ut till kategorins thumbnail sedan. länken funkar ej helelr för den delen -->
        <!-- <img src= "<?php /* get_template_directory_uri(); */?>/assets/product_group_hoodies.png" alt="">  -->
        <!-- <img src="" alt=""> -->
        <?php
                
        ?>
            <div class="categoryTitle"><?php single_term_title('');?></div>
    </div>
        
        <?php  
        
        the_title();
        the_content();  ?>
        
    <?php } ?>
              
</main>

<?php get_footer(); ?>

