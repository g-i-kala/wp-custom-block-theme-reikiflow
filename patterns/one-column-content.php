<?php
/**
 * Title: One-Column Content
 * Slug: reikiflow/one-column-content
 * Categories: reikiflow
 * Description: Single-column content section with a full-width background.
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"align":"full","className":"rf-one-column-content","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"var:preset|color|muted"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull rf-one-column-content has-background" >
	<!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
	<!-- wp:heading {"level":1} -->
		<h1 class="wp-block-heading has-text-align-center">Column Heading</h1>
		<!-- /wp:heading -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2} -->
		<h2 class="wp-block-heading has-text-align-center">Column Heading</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p>Content for this section. Describe your services, philosophy, or approach here in a clear single-column layout.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Use this space for a focused message, with supporting text below the heading and an optional button.</p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button">
				<a class="wp-block-button__link wp-element-button" href="#">Learn More</a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
