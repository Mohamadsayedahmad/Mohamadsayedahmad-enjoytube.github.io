<?php
/**
 * Block Styles
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 */
	function enjoytube_register_block_styles() {
		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'enjoytube-border',
				'label' => esc_html__( 'Borders', 'enjoytube' ),
			)
		);
	}
	add_action( 'init', 'enjoytube_register_block_styles' );
}
