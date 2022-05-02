<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */


get_header(); ?>

<main class="flex column">

<div class="titlePage"><h1><?php wp_title('') ?></h1></div> <!-- Hämta Titel på sidan -->
<div class="contentPost flex column center">
<?php 

while (have_posts()) {
	
    the_post();?>

    <div class="date flex"><p>Datum: <?php the_time(get_option('date_format'));  ?></p></div>
    <div class="post flex">
        <div class="postPic">
            <?php 
            the_post_thumbnail();
            ?>
        </div>
        <div class="bread">
        <!-- <div class="date flex"><p>Datum: <?php the_time(get_option('date_format'));  ?></p></div> -->
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