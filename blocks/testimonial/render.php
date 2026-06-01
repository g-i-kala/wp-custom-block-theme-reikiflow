<?php
$quote_text   = $attributes['quoteText'] ?? '';
$author_name  = $attributes['authorName'] ?? '';
$author_title = $attributes['authorTitle'] ?? '';
$avatar_url   = $attributes['avatarUrl'] ?? '';
$avatar_alt   = $attributes['avatarAlt'] ?? '';

if ( empty( $quote_text ) && empty( $author_name ) ) {
	return '';
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'testimonial-card' ) ); ?>>
	<?php if ( ! empty( $avatar_url ) ) : ?>
		<div class="testimonial-avatar">
			<img class="testimonial-avatar-img" src="<?php echo esc_url( $avatar_url ); ?>" alt="<?php echo esc_attr( $avatar_alt ); ?>" loading="lazy" />
		</div>
	<?php endif; ?>

	<div class="testimonial-content">
		<?php if ( ! empty( $quote_text ) ) : ?>
			<p class="testimonial-quote"><?php echo wp_kses_post( $quote_text ); ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $author_name ) || ! empty( $author_title ) ) : ?>
			<div class="testimonial-author">
				<?php if ( ! empty( $author_name ) ) : ?>
					<span class="testimonial-name"><?php echo wp_kses_post( $author_name ); ?></span>
				<?php endif; ?>
				<?php if ( ! empty( $author_title ) ) : ?>
					<span class="testimonial-title"><?php echo wp_kses_post( $author_title ); ?></span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
