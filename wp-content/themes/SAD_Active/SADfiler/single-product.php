
<?php get_header();?>
<!-- <div class="content-area" id="primary">
    <main id="main" class="site-main">
        <?php

        while(have_posts()){
            the_post();?>
            <nav class="woocommerce-breadcrumb"><?php the_content();?></nav>

            <?php the_post_thumbnail(null, ['class' => 'img-responsive responsive--full', 'title' => 'Feature image'] );?>
        <?php    
        }
        ?>







    </main>
</div> -->
<?php get_footer();?>