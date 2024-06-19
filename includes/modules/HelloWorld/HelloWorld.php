<?php

class PESL_HelloWorld extends ET_Builder_Module {

	public $slug       = 'pesl_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://github.com/5AMsan/divi-pepite-slider',
		'author'     => '5AMsan',
		'author_uri' => 'https://github.com/5AMsan',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'pesl-pepite-slider' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'pesl-pepite-slider' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'pesl-pepite-slider' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new PESL_HelloWorld;
