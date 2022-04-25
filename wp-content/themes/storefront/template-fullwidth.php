<?php
/**
 * The template for displaying full width pages.
 *
 * Template Name: Full width
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
	<style>
#maps{
	display : flex;
	justify-content : space-between;
}
</style>
		<main id="main" class="site-main" role="main">
			<div id="maps">
				<div>
					Butik 1
					<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16335734.35426834!2d-70.7112853713286!3d-1.6236661126453347!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x926eca1645365b6b%3A0xabfc431d20b2b474!2sAmazonfloden!5e0!3m2!1ssv!2sse!4v1650394740496!5m2!1ssv!2sse" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
				</div>
				<div>
					Butik 2
					
				</div>
				<div>
					Butik 3
					
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1911.588568214171!2d17.997200015981065!3d59.36000448166955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x465f9d9555beb4f1%3A0xcc7e4e94c241ee31!2sCentrumslingan%2C%20Solna!5e1!3m2!1ssv!2sse!4v1650530666420!5m2!1ssv!2sse" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			</div>

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'storefront_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
