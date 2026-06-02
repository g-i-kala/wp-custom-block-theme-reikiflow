edit: function (props) {
  var attributes = props.attributes;
  var setAttributes = props.setAttributes;
  var blockProps = useBlockProps({ className: 'alignfull testimonial-card' });
  var quoteText = attributes.quoteText || '';
  var citation = attributes.citation || '';

  return el(
    'div',
    blockProps,
    el(
      'blockquote',
      { className: 'wp-block-quote alignwide is-style-large' },
      el(RichText, {
        tagName: 'p',
        value: quoteText,
        onChange: function (value) {
          setAttributes({ quoteText: value });
        },
        placeholder: __('Write the quote…', 'reikiflow'),
        allowedFormats: ['core/bold', 'core/italic'],
      }),
      el(RichText, {
        tagName: 'cite',
        value: citation,
        onChange: function (value) {
          setAttributes({ citation: value });
        },
        placeholder: __('— Author', 'reikiflow'),
        allowedFormats: [],
      })
    )
  );
},
