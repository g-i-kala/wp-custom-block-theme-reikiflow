<?php
/**
 * Title: Two-Column Content
 * Slug: reikiflow/two-column-content
 * Categories: reikiflow
 * Description: 50/50 split columns for text and media.
 * Viewport Width: 1200
 */
?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:heading {"level":2} -->
		<h2 class="wp-block-heading">Column Heading</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Content for the left column. Describe your services, philosophy, or approach here.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#">Learn More</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:image {"sizeSlug":"large"} -->
		<figure class="wp-block-image size-large"><img src="" alt="Placeholder image" /></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
