<!-- 
    Denna fil represnterar stratsidan.
-->

<?php get_header(); ?>

<main>
    <?php
    while (have_posts()) {
        the_post(); ?>
        <?php the_post_thumbnail(null, ['class' => 'img-responsive responsive--full', 'title' => 'Feature image'] );?>
        
        <?php the_content(); ?>
        
    <?php } ?>

</main>

<?php get_footer(); ?>