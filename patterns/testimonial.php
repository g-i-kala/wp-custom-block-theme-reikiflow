<?php
/**
 * Title: Testimonial
 * Slug: reikiflow/testimonial
 * Categories: reikiflow
 * Description: Single testimonial card with quote, author name, and subtitle.
 * Viewport Width: 800
 */
?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"margin":{"top":"0"}},"border":{"width":"1px"}},"borderColor":"secondary","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-border-color has-secondary-border-color" style="border-width:1px;margin-top:0;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60)">
	<!-- wp:quote {"className":"is-style-plain"} -->
	<blockquote class="wp-block-quote is-style-plain">
		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"italic","fontSize":"1.125rem"}}} -->
		<p style="font-size:1.125rem;font-style:italic">Testimonial text goes here.</p>
		<!-- /wp:paragraph -->
		<cite>
			<!-- wp:paragraph {"style":{"typography":{"fontWeight":"600"}}} -->
			<p style="font-weight:600">Author Name</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"0.875rem"}}} -->
			<p style="font-size:0.875rem">Title / Profession</p>
			<!-- /wp:paragraph -->
		</cite>
	</blockquote>
	<!-- /wp:quote -->
</div>
<!-- /wp:group -->
