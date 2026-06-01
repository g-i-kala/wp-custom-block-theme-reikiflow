<?php
$quote_text = $attributes['quoteText'] ?? '';
$citation  = $attributes['citation'] ?? '';

if ( empty( $quote_text ) ) {
	return '';
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'alignfull' ) ); ?> style="background-color:var(--wp--preset--color--muted);padding-top:var(--wp--preset--spacing--120);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
	<blockquote class="wp-block-quote alignwide is-style-large">
		<p><?php echo wp_kses_post( $quote_text ); ?></p>
		<?php if ( ! empty( $citation ) ) : ?>
			<cite><?php echo wp_kses_post( $citation ); ?></cite>
		<?php endif; ?>
	</blockquote>
</div>
