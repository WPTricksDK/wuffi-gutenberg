const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

registerBlockType( 'wuffi/testblock', {
	title: __( 'Wuffi Test Block' ),
	icon: 'lock',
	category: 'common',
	edit() {
		return (
			<p class="wuffi_testblock_paragraph">Wuffi Test Block - BACKEND.</p>
		);
	},
	save() {
		return (
			<p class="wuffi_testblock_paragraph">Wuffi Test Block - FRONTEND.</p>
		);
	},
} );