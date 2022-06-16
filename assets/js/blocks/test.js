( function( blocks, element, blockEditor ) {
  var el = element.createElement;
  var RichText = blockEditor.RichText;

  blocks.registerBlockType( 'my/simple-text', {
    title: 'Simple Text (Custom)',
    icon: 'universal-access-alt',
    category: 'layout',
    example: {},

    // All the children inside 'p' will be extracted as 'text' variable.
    attributes: {
      text: { type: 'array', source: 'children', selector: 'p' }
    },
    edit: myEdit,
    save: mySave,
  } );

  // Render RichText (field with basic toolbar) wrapped with 'p'
  function myEdit( props ) {
    return el( RichText, {
      tagName: 'p',
      onChange: _onChange,
      value: props.attributes.text,
      className: props.className,
    } );
    
    // when changed, update the attribute
    function _onChange( newContent ) {
      props.setAttributes( { text: newContent } );
    }
  }
  
  // Save the content of RichText wrapped with 'p'
  function mySave( props ) {
    return el( RichText.Content, {
      tagName: 'p',
      className: props.className,
      value: props.attributes.text,
    } );
  }
  
}( window.wp.blocks, window.wp.element, window.wp.blockEditor ) );