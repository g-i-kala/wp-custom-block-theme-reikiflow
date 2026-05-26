<?php
/**
 * Title: Testimonials Grid
 * Slug: reikiflow/testimonials-grid
 * Categories: reikiflow
 * Description: Three-testimonial grid featuring Joanna D., Justyna W., and Mirosława A.
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:wp--preset--color--muted"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:var(--wp--preset--color--muted);padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)">
	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center">Testimonials</h2>
	<!-- /wp:heading -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
		<!-- wp:pattern {"slug":"reikiflow/testimonial"} /-->
	</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
		<!-- wp:pattern {"slug":"reikiflow/testimonial"} /-->
	</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
		<!-- wp:pattern {"slug":"reikiflow/testimonial"} /-->
	</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
