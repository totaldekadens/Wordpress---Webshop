<!-- 
    Om ingen fil matchas så kommer denna att köras.
-->


<?php get_header(); ?>

<main>

    <?php
    while (have_posts()) {
        the_post(); ?>
        <?php the_post_thumbnail(null, ['class' => 'img-responsive responsive--full', 'title' => 'Feature image'] );?>
        
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        
    <?php } ?>

</main>

<?php get_footer(); ?>