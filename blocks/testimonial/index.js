(function (wp) {
	var el = wp.element.createElement;
	var __ = wp.i18n.__;
	var RichText = wp.blockEditor.RichText;
	var MediaUpload = wp.blockEditor.MediaUpload;
	var useBlockProps = wp.blockEditor.useBlockProps;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var PanelBody = wp.components.PanelBody;
	var Button = wp.components.Button;
	var TextControl = wp.components.TextControl;

	wp.blocks.registerBlockType('reikiflow/testimonial', {
		edit: function (props) {
			var attributes = props.attributes;
			var setAttributes = props.setAttributes;
			var blockProps = useBlockProps({ className: 'testimonial-card' });

			var avatarContent;
			if (attributes.avatarUrl) {
				avatarContent = el('img', {
					src: attributes.avatarUrl,
					alt: attributes.avatarAlt || __('Testimonial avatar', 'reikiflow'),
					className: 'testimonial-avatar-img'
				});
			} else {
				avatarContent = el(Button, {
					variant: 'secondary',
					className: 'editor-post-featured-image__toggle'
				}, __('Set avatar', 'reikiflow'));
			}

			return el(
				'div',
				blockProps,
				el(InspectorControls, null,
					el(PanelBody, { title: __('Avatar', 'reikiflow') },
						el(MediaUpload, {
							onSelect: function (media) {
								setAttributes({
									avatarUrl: media.url,
									avatarId: media.id,
									avatarAlt: media.alt || ''
								});
							},
							allowedTypes: ['image'],
							value: attributes.avatarId,
							render: function (obj) {
								return el(Button, {
									variant: 'primary',
									onClick: obj.open
								}, attributes.avatarUrl ? __('Change avatar', 'reikiflow') : __('Upload avatar', 'reikiflow'));
							}
						}),
						attributes.avatarUrl ? el(Button, {
							variant: 'link',
							isDestructive: true,
							onClick: function () {
								setAttributes({ avatarUrl: '', avatarId: 0, avatarAlt: '' });
							}
						}, __('Remove avatar', 'reikiflow')) : null
					)
				),
				el(
					'div',
					{ className: 'testimonial-avatar' },
					avatarContent
				),
				el(
					'div',
					{ className: 'testimonial-content' },
					el(RichText, {
						tagName: 'p',
						className: 'testimonial-quote',
						value: attributes.quoteText,
						onChange: function (value) {
							setAttributes({ quoteText: value });
						},
						placeholder: __('Write the testimonial\u2026', 'reikiflow'),
						allowedFormats: ['core/bold', 'core/italic']
					}),
					el(
						'div',
						{ className: 'testimonial-author' },
						el(RichText, {
							tagName: 'span',
							className: 'testimonial-name',
							value: attributes.authorName,
							onChange: function (value) {
								setAttributes({ authorName: value });
							},
							placeholder: __('Author name', 'reikiflow'),
							allowedFormats: []
						}),
						el(RichText, {
							tagName: 'span',
							className: 'testimonial-title',
							value: attributes.authorTitle,
							onChange: function (value) {
								setAttributes({ authorTitle: value });
							},
							placeholder: __('Title / Profession', 'reikiflow'),
							allowedFormats: []
						})
					)
				)
			);
		},
		save: function () {
			return null;
		}
	});
})(window.wp);
