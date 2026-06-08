(function (wp) {
  var el = wp.element.createElement;
  var __ = wp.i18n.__;
  var RichText = wp.blockEditor.RichText;
  var useBlockProps = wp.blockEditor.useBlockProps;

  wp.blocks.registerBlockType('reikiflow/inspirational-quote', {
    edit: function (props) {
      var attributes = props.attributes;
      var setAttributes = props.setAttributes;
      var blockProps = useBlockProps({ className: 'alignfull' });
      var quoteText = attributes.quoteText || '';
      var citation = attributes.citation || '';

      return el(
        'div',
        blockProps,
        el(
          'div',
          { className: 'wp-block-quote alignwide is-style-large' },
          el(RichText, {
            tagName: 'p',
            value: quoteText,
            onChange: function (value) {
              setAttributes({ quoteText: value });
            },
            placeholder: __('Write the quote\u2026', 'reikiflow'),
            allowedFormats: ['core/bold', 'core/italic'],
          }),
          el(RichText, {
            tagName: 'cite',
            value: citation,
            onChange: function (value) {
              setAttributes({ citation: value });
            },
            placeholder: __('\u2014 Author', 'reikiflow'),
            allowedFormats: [],
          }),
        ),
      );
    },
    save: function () {
      return null;
    },
  });
})(window.wp);
