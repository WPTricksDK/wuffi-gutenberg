const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { InnerBlocks, useBlockProps } = wp.blockEditor;

const Wuffi_Hero_Template = [
  ['core/columns', {}, [
    ['core/column', {className: 'col-left'}, [
      ['core/heading', {placeholder: 'Indtast en titel', className: 'hero-heading'}],
      ['core/paragraph', {placeholder: 'Indtast en beskrivelse', className: 'hero-description'}],
      ['core/buttons', {}, [
        ['core/button', {placeholder: 'Knap 1', className: 'btn-primary'}],
        ['core/button', {placeholder: 'Knap 2', className: 'btn-secondary'}]
      ]],
    ]],
    ['core/column', {className: 'col-right'}, [
      ['core/image', {}]
    ]],
  ]]
];
 
registerBlockType('wuffi/heroblock', {
  apiVersion: 2,
	title: __( 'Wuffi Hero' ),
	icon: 'lock',
	category: 'common',
	edit: () => {
    const blockProps = useBlockProps();
    return (
      <div { ...blockProps }>
        <InnerBlocks
          template={ Wuffi_Hero_Template }
          templateLock="all"
        />
      </div>
    );
  },
  save: () => {
    const blockProps = useBlockProps.save({
      className: 'wuffi-hero'
    });
    return (
      <div { ...blockProps }>
          <InnerBlocks.Content />
      </div>
    );
  },
});