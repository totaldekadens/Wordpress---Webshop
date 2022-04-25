<!-- 
    Den här sidan representerar sidan för alla butiker.
-->


<?php echo "archive-butiker"; ?>


<?php get_header(); ?>

<main class="flex column">

<div class="titlePage"><h1><?php wp_title('') ?></h1></div>
<div class="contentPost flex column center">
<?php 

while (have_posts()) {
    the_post();?>

    <div class="post flex">
        <div class="postPic">
            <?php 
            the_post_thumbnail();
            ?>
        </div>
        <div class="bread">
            <div class="title">
                <a href="<?php the_permalink(); ?>">
                    <h3>
                        <?php the_title(); ?>
                    </h3>
                </a>
            </div>
            <div class="text">
                        <p><?php echo wp_trim_excerpt();  ?></p>
            </div>
        </div>
    </div>
<?php } ?>
    </div>

    <?php 
the_posts_pagination( array(
    'mid_size'  => 2,
    'prev_text' => __( 'Föregående'),
    'next_text' => __( 'Nästa' ),
    'class' => 'pagination',
) ); 
?>
</main>

<?php get_footer(); ?>