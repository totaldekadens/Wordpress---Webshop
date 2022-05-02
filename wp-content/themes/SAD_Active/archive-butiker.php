<!-- 
    Den här sidan representerar sidan för alla butiker.
-->


<?php get_header(); ?>

<main class="flex column">

<div class="titlePage"><h1><?php wp_title('') ?></h1></div>
<div class="contentPost flex column center">
<?php 

while (have_posts()) {
    the_post();?>
    <?php $post_meta = get_post_meta(get_the_ID()); ?>
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
                    <p>
                    <?php echo $post_meta["adress"][0] ?>
                    </p>
                    <p>
                    <?php echo $post_meta["oppettider"][0] ?>
                    </p>
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