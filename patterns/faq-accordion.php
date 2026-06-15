<?php
/**
 * Title: FAQ Accordion
 * Slug: reikiflow/faq-accordion
 * Categories: reikiflow
 * Description: Collapsible FAQ items using core/details block.
 * Viewport Width: 1200
 */
?>

<!-- wp:group {"align":"full","className":"rf-faq-accordion","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull rf-faq-accordion" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--40);">
	<!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2,"className":"has-text-align-center"} -->
		<h2 class="wp-block-heading has-text-align-center">Frequently Asked Questions</h2>
		<!-- /wp:heading -->

		<!-- wp:details -->
		<details class="wp-block-details">
			<summary>What is Reiki?</summary>
			<!-- wp:paragraph -->
			<p>Reiki is a Japanese energy healing technique that promotes relaxation, reduces stress, and supports the body's natural healing abilities.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details">
			<summary>How long is a session?</summary>
			<!-- wp:paragraph -->
			<p>A typical Reiki session lasts between 60 and 90 minutes, depending on the treatment plan.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->

		<!-- wp:details -->
		<details class="wp-block-details">
			<summary>Do I need to prepare anything?</summary>
			<!-- wp:paragraph -->
			<p>No special preparation is needed. Wear comfortable clothing and come with an open mind.</p>
			<!-- /wp:paragraph -->
		</details>
		<!-- /wp:details -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
