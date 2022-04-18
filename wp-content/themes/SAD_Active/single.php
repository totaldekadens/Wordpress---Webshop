<!-- 
    Den här sidan representerar sidan för en enkild produkt.
-->

<?php echo "single"; ?>

<?php get_header(); ?>

<main class="flex column">

<?php 

while (have_posts()) {
    the_post();?>

    <div class="contentPost flex column">
            <div class="post flex column">
                <div class="titleAndDate">
                    <div class="date"><p class="datep"><?php the_time(get_option('date_format')); ?></p></div>
                    <div class="title"><h1><?php the_title(); ?></h1></div>
                </div>
                <div class="postPic"><?php the_post_thumbnail(); ?></div>
                <div class="bread">
                <?php the_content(); ?> 
                <div class="bread">
                      <br>
                    </div>
                </div>
            </div>
<?php } ?>
</main>

<div class="singlePagination">
    <div class="prevPag"><?php previous_post_link('<strong>%link</strong>', '<<'); ?></div>
    <div class="nextPag"><?php next_post_link('<strong>%link</strong>', '>>'); ?></div>
</div>

<?php get_footer(); ?>