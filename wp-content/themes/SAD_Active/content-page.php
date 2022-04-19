<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php

	echo "storefront-content-page";
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked storefront_page_header          - 10 // Borttagen
	 * @hooked storefront_page_content         - 20
	 */
	
	remove_action('storefront_page', 'storefront_page_header', 10 ); 
	
	do_action( 'storefront_page' );
	
	

	?>
</article><!-- #post-## -->
