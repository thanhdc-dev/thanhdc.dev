<?php
/**
 * Template used to display post content.
 *
 * @package storefront
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	the_content();
	?>

</article><!-- #post-## -->
