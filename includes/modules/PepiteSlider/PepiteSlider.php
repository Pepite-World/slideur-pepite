<?php

class PESL_PepiteSlider extends ET_Builder_Module
{

	public $slug       = 'pesl_pepite_slider';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://github.com/5AMsan/divi-pepite-slider',
		'author'     => '5AMsan',
		'author_uri' => 'https://github.com/5AMsan',
	);

	public function init()
	{
		$this->name 		   = esc_html__('Pepite Slider', 'pesl-pepite-slider');
		$this->plural          = esc_html__('Pepite Sliders', 'pesl-pepite-slider');
		// $this->fullwidth       = true;
		$this->vb_support      = 'on';
		$this->child_slug      = 'pesl_pepite_slider_item';
		$this->child_item_text = 'Slide';

		$this->main_css_element = '%%order_class%% > .pesl_pepite_slider';
		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'elements' => et_builder_i18n('Elements'),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'overlay'    => et_builder_i18n('Overlay'),
					'navigation' => esc_html__('Navigation', 'pesl-pepite-slider'),
					'image'      => et_builder_i18n('Image'),
					'layout'     => et_builder_i18n('Layout'),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation' => array(
						'title'    => esc_html__('Animation', '%%order_class%% > .pesl_pepite_slider pesl_pepite_slider_item'),
						'priority' => 90,
					),
				),
			),
		);

		$this->advanced_fields = array(
			'fonts'           => array(
				'header' => array(
					'label'        => et_builder_i18n('Title'),
					'css'          => array(
						'main'             => "{$this->main_css_element} .et_pb_slide_description .et_pb_slide_title",
						'limited_main'     => "{$this->main_css_element} .et_pb_slide_description .et_pb_slide_title, {$this->main_css_element} .et_pb_slide_description .et_pb_slide_title a",
						'font_size_tablet' => "{$this->main_css_element} .et_pb_slides .et_pb_slide_description .et_pb_slide_title",
						'font_size_phone'  => "{$this->main_css_element} .et_pb_slides .et_pb_slide_description .et_pb_slide_title",
						'important'        => array('size', 'font-size', 'plugin_all'),
					),
					'header_level' => array(
						'default' => 'h2',
					),
				),
				'body'   => array(
					'label'          => et_builder_i18n('Body'),
					'css'            => array(
						'line_height'        => "{$this->main_css_element}",
						'main'               => "{$this->main_css_element} .et_pb_slide_content",
						'line_height_tablet' => "{$this->main_css_element} .et_pb_slides .et_pb_slide_content",
						'line_height_phone'  => "{$this->main_css_element} .et_pb_slides .et_pb_slide_content",
						'font_size_tablet'   => "{$this->main_css_element} .et_pb_slides .et_pb_slide_content",
						'font_size_phone'    => "{$this->main_css_element} .et_pb_slides .et_pb_slide_content",
						'important'          => array('size', 'font-size'),
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
					),
				),
			),
			'borders'         => array(
				'default' => array(),
				'image'   => array(
					'css'             => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .et_pb_slide_image img',
							'border_styles' => '%%order_class%% .et_pb_slide_image img',
						),
					),
					'label_prefix'    => et_builder_i18n('Image'),
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image',
					'depends_show_if' => 'off',
					'defaults'        => array(
						'border_radii'  => 'on||||',
						'border_styles' => array(
							'width' => '0px',
							'color' => '#333333',
							'style' => 'solid',
						),
					),
				),
			),
			'box_shadow'      => array(
				'default' => array(
					'css' => array(
						'overlay' => 'inset',
					),
				),
				'image'   => array(
					'label'             => esc_html__('Image Box Shadow', 'pesl-pepite-slider'),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image',
					'css'               => array(
						'main' => '%%order_class%% .et_pb_slide_image img',
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'button'          => array(
				'button' => array(
					'label'          => et_builder_i18n('Button'),
					'css'            => array(
						'main'         => "{$this->main_css_element} .et_pb_more_button.et_pb_button",
						'limited_main' => "{$this->main_css_element} .et_pb_more_button.et_pb_button",
						'alignment'    => "{$this->main_css_element} .et_pb_button_wrapper",
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .et_pb_button',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'important' => 'all',
						),
					),
				),
			),
			'background'      => array(
				'use_background_color'          => 'fields_only',
				'use_background_color_gradient' => 'fields_only',
				'use_background_image'          => 'fields_only',
				'options'                       => array(
					'parallax_method' => array(
						'default' => 'off',
					),
				),
			),
			'margin_padding'  => array(
				'css' => array(
					'main'      => '%%order_class%%',
					'padding'   => '%%order_class%% .et_pb_slide_description, .et_pb_slider_fullwidth_off%%order_class%% .et_pb_slide_description',
					'important' => array('custom_margin'), // needed to overwrite last module margin-bottom styling
				),
			),
			'text'            => array(
				'css'     => array(
					'text_orientation' => '%%order_class%% .et_pb_slide .et_pb_slide_description',
					'text_shadow'      => '%%order_class%% .et_pb_slide .et_pb_slide_description',
				),
				'options' => array(
					'text_orientation' => array(
						'default' => 'center',
					),
				),
			),
			'height'          => array(
				'css' => array(
					'main' => '%%order_class%%, %%order_class%% .et_pb_slide',
				),
			),
			'image'           => array(
				'css' => array(
					'main' => array(
						'%%order_class%% .et_pb_slide_image',
						'%%order_class%% .et_pb_section_video_bg',
					),
				),
			),
			'max_width'       => array(
				'extra' => array(
					'content' => array(
						'use_module_alignment' => false,
						'css'                  => array(
							// 'main' => '%%order_class%% .et_pb_slide > .et_pb_container',
							'main' => '%%order_class%% .pesl_pepite_slider .pesl_slider_container_inner',
						),
						'options'              => array(
							'width'     => array(
								'label'   => esc_html__('Content Width', 'pesl-pepite-slider'),
								'default' => '100%',
							),
							'max_width' => array(
								'label' => esc_html__('Content Max Width', 'pesl-pepite-slider'),
							),
						),
					),
				),
			),
			'position_fields' => array(
				'default' => 'relative',
			),
			'overflow'        => array(
				'default' => 'hidden',
			),
		);

		$this->custom_css_fields = array(
			'slide_description'       => array(
				'label'    => esc_html__('Slide Description', 'pesl-pepite-slider'),
				'selector' => '.et_pb_slide_description',
			),
			'slide_title'             => array(
				'label'    => esc_html__('Slide Title', 'pesl-pepite-slider'),
				'selector' => '.et_pb_slide_description .et_pb_slide_title',
			),
			'slide_button'            => array(
				'label'                    => esc_html__('Slide Button', 'pesl-pepite-slider'),
				'selector'                 => '.et_pb_slider .et_pb_slide .et_pb_slide_description a.et_pb_more_button.et_pb_button',
				'no_space_before_selector' => true,
			),
			'slide_controllers'       => array(
				'label'    => esc_html__('Slide Controllers', 'pesl-pepite-slider'),
				'selector' => '.et-pb-controllers',
			),
			'slide_active_controller' => array(
				'label'    => esc_html__('Slide Active Controller', 'pesl-pepite-slider'),
				'selector' => '.et-pb-controllers .et-pb-active-control',
			),
			'slide_image'             => array(
				'label'    => esc_html__('Slide Image', 'pesl-pepite-slider'),
				'selector' => '.et_pb_slide_image',
			),
			'slide_arrows'            => array(
				'label'    => esc_html__('Slide Arrows', 'pesl-pepite-slider'),
				'selector' => '.swiper-arrow-button',
			),
		);

		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
		add_action('wp_footer', [$this, 'get_swiper_script'], 99);
	}

	public function enqueue_scripts()
	{
		wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), $this->plugin_version, true);
		wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), $this->plugin_version);
		wp_enqueue_script('vimeoPlayerApi', 'https://player.vimeo.com/api/player.js', array(), $this->plugin_version, true);
	}

	function get_fields()
	{
		$fields = array(
			'show_arrows'             => array(
				'label'            => esc_html__('Show Arrows', 'pesl-pepite-slider'),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n('Yes'),
					'off' => et_builder_i18n('No'),
				),
				'default_on_front' => 'on',
				// 'toggle_slug'      => 'elements',
				'description'      => esc_html__('This setting will turn on and off the navigation arrows. No arrows activates invisible click zones on left & right', 'pesl-pepite-slider'),
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'image_cursor_prev'	=> array(
				'label'              => et_builder_i18n('Previous cursor'),
				'type'               => 'upload',
				'option_category'    => 'configuration',
				'upload_button_text' => et_builder_i18n('Set as cursor'),
				'choose_text'        => esc_attr__('Choose a Cursor Image', 'et_builder'),
				'update_text'        => esc_attr__('Set As Cursor', 'et_builder'),
				'description'        => esc_html__('If defined, this image will be used as previous cursor. Upload an image, or leave blank for default cursor.', 'et_builder'),
				// 'toggle_slug'        => 'elements',
				'dynamic_content'    => 'image',
				'mobile_options'     => false,
				'hover'              => false,
				'show_if' => [
					'show_arrows' => 'off'
				],
			),
			'image_cursor_next'	=> array(
				'label'              => et_builder_i18n('Next cursor'),
				'type'               => 'upload',
				'option_category'    => 'configuration',
				'upload_button_text' => et_builder_i18n('Set as cursor'),
				'choose_text'        => esc_attr__('Choose a Cursor Image', 'et_builder'),
				'update_text'        => esc_attr__('Set As Cursor', 'et_builder'),
				'description'        => esc_html__('If defined, this image will be used as next cursor. Upload an image, or leave blank for default cursor.', 'et_builder'),
				// 'toggle_slug'        => 'elements',
				'dynamic_content'    => 'image',
				'mobile_options'     => false,
				'hover'              => false,
				'show_if' => [
					'show_arrows' => 'off'
				],
			),
			'image_cursor_disabled'	=> array(
				'label'              => et_builder_i18n('Disabled cursor'),
				'type'               => 'upload',
				'option_category'    => 'configuration',
				'upload_button_text' => et_builder_i18n('Set as cursor'),
				'choose_text'        => esc_attr__('Choose a Cursor Image', 'et_builder'),
				'update_text'        => esc_attr__('Set As Cursor', 'et_builder'),
				'description'        => esc_html__('If defined, this image will be used as cursor on disabled click zone. Upload an image, or leave blank for default cursor.', 'et_builder'),
				// 'toggle_slug'        => 'elements',
				'dynamic_content'    => 'image',
				'mobile_options'     => false,
				'hover'              => false,
				'show_if' => [
					'show_arrows' => 'off'
				],
			),
			'show_pagination'         => array(
				'label'            => esc_html__('Show Pagination', 'pesl-pepite-slider'),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n('Yes'),
					'off' => et_builder_i18n('No'),
				),
				'default_on_front' => 'on',
				// 'toggle_slug'      => 'elements',
				'description'      => esc_html__('This setting will turn on and off the circle buttons at the bottom of the slider.', 'pesl-pepite-slider'),
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'show_count'         => array(
				'label'            => esc_html__('Show Items Count', 'pesl-pepite-slider'),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n('Yes'),
					'off' => et_builder_i18n('No'),
				),
				'default_on_front' => 'on',
				// 'toggle_slug'      => 'elements',
				'description'      => esc_html__('This setting will turn on and off current and total number of slides.', 'pesl-pepite-slider'),
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'loop_slides'         => array(
				'label'            => esc_html__('Loop Slides', 'pesl-pepite-slider'),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n('Yes'),
					'off' => et_builder_i18n('No'),
				),
				'default_on_front' => 'on',
				// 'toggle_slug'      => 'elements',
				'description'      => esc_html__('This setting will turn on and off loop on slides.', 'pesl-pepite-slider'),
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'autoplay'         => array(
				'label'            => esc_html__('Autoplay Slides', 'pesl-pepite-slider'),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n('Yes'),
					'off' => et_builder_i18n('No'),
				),
				'default_on_front' => 'on',
				// 'toggle_slug'      => 'elements',
				'description'      => esc_html__('This setting will turn on and off autoplay on slider.', 'pesl-pepite-slider'),
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'autoplay_delay'	=> array(
				'label'              => et_builder_i18n('Autoplay delay (ms)'),
				'type'               => 'text',
				'default_on_front' 	 => '5000',
				'option_category'    => 'configuration',
				'description'        => esc_html__('Delay in milliseconds before next slide.', 'et_builder'),
				// 'toggle_slug'        => 'elements',
				'mobile_options'     => false,
				'hover'              => false,
				'show_if' => [
					'autoplay' => 'on'
				],
			),
			'show_scrollbar'         => array(
				'label'            => esc_html__('Show Scrollbar', 'pesl-pepite-slider'),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => et_builder_i18n('Yes'),
					'off' => et_builder_i18n('No'),
				),
				'default_on_front' => 'on',
				// 'toggle_slug'      => 'elements',
				'description'      => esc_html__('This setting will turn on scrollbar for slides.', 'pesl-pepite-slider'),
				'mobile_options'   => true,
				'hover'            => 'tabs',
			),
			'swiper_transition'	=> array(
				'label'           => esc_html__('SwiperJS transitions', 'pesl-pepite-slider'),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default_on_front' => 'slide',
				'options'         => array(
					'none' => esc_html__('none', 'pesl-pepite-slider'),
					'slide' => esc_html__('slide', 'pesl-pepite-slider'),
					'fade' => esc_html__('fade', 'pesl-pepite-slider'),
					'cube' => esc_html__('cube', 'pesl-pepite-slider'),
					'coverflow' => esc_html__('coverflow', 'pesl-pepite-slider'),
					'flip' => esc_html__('flip', 'pesl-pepite-slider'),
					'creative' => esc_html__('creative', 'pesl-pepite-slider'),
					'cards' => esc_html__('cards', 'pesl-pepite-slider'),
				),
				'description'	=> esc_html__('Showing the full content will not truncate your posts on the index page. Showing the excerpt will only display your excerpt text.', 'et_builder'),
			),
			'arrows_custom_color'     => array(
				'label'          => esc_html__('Arrow Color', 'pesl-pepite-slider'),
				'description'    => esc_html__('Pick a color to use for the slider arrows that are used to navigate through each slide.', 'pesl-pepite-slider'),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				// 'tab_slug'       => 'advanced',
				// 'toggle_slug'    => 'navigation',
				'mobile_options' => true,
				'sticky'         => true,
				'hover'          => 'tabs',
			),
			'dot_nav_custom_color'    => array(
				'label'          => esc_html__('Dot Navigation Color', 'pesl-pepite-slider'),
				'description'    => esc_html__('Pick a color to use for the dot navigation that appears at the bottom of the slider to designate which slide is active.', 'pesl-pepite-slider'),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				// 'tab_slug'       => 'advanced',
				// 'toggle_slug'    => 'navigation',
				'mobile_options' => true,
				'sticky'         => true,
				'hover'          => 'tabs',
			),
			
		);

		return $fields;
	}

	public function ZZ_old_get_transition_fields_css_props()
	{
		$fields = parent::get_transition_fields_css_props();

		$fields['dot_nav_custom_color'] = array('background-color' => '.swiper-pagination-bullet');
		$fields['arrows_custom_color']  = array('all' => '.swiper-arrow-button');

		$fields['image_cursor_next']  = array('cursor' => '.et_pb_module.pesl_pepite_slider');
		$fields['image_cursor_prev']  = array('cursor' => '.et_pb_module.pesl_pepite_slider');

		return $fields;
	}

	function before_render()
	{
		global $et_pb_slider_show_mobile;
		$et_pb_slider_show_mobile = array(
			'show_content_on_mobile' => $this->props['show_content_on_mobile'] ?? false,
		);
	}

	function ZZ_old_before_render()
	{
		global $et_pb_slider_has_video, $et_pb_slider_parallax, $et_pb_slider_parallax_method, $et_pb_slider_show_mobile, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone, $et_pb_slider_item_num, $et_pb_slider_button_rel;
		global $et_pb_slider_parent_type;

		$et_pb_slider_parent_type = $this->slug;
		$et_pb_slider_item_num    = 0;

		$sticky                  = et_pb_sticky_options();
		$parallax                = @$this->props['parallax'];
		$parallax_method         = @$this->props['parallax_method'];
		$button_rel              = @$this->props['button_rel'];
		$button_custom           = @$this->props['custom_button'];
		$show_content_on_mobile  = @$this->props['show_content_on_mobile'];
		$show_cta_on_mobile      = @$this->props['show_cta_on_mobile'];

		$custom_icon_values = et_pb_responsive_options()->get_property_values($this->props, 'button_icon');
		$custom_icon        = isset($custom_icon_values['desktop']) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet = isset($custom_icon_values['tablet']) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone  = isset($custom_icon_values['phone']) ? $custom_icon_values['phone'] : '';

		$et_pb_slider_has_video = false;

		$et_pb_slider_parallax = $parallax;

		$et_pb_slider_parallax_method = $parallax_method;

		$et_pb_slider_show_mobile = array(
			'show_content_on_mobile' => $show_content_on_mobile,
			'show_cta_on_mobile'     => $show_cta_on_mobile,
		);

		$et_pb_slider_custom_icon        = 'on' === $button_custom ? $custom_icon : '';
		$et_pb_slider_custom_icon_tablet = 'on' === $button_custom ? $custom_icon_tablet : '';
		$et_pb_slider_custom_icon_phone  = 'on' === $button_custom ? $custom_icon_phone : '';

		$et_pb_slider_button_rel = $button_rel;

		// Arrows Color.
		$arrows_custom_color        = $this->props['arrows_custom_color'];
		$arrows_custom_color_values = et_pb_responsive_options()->get_property_values($this->props, 'arrows_custom_color');
		$arrows_custom_color_tablet = isset($arrows_custom_color_values['tablet']) ? $arrows_custom_color_values['tablet'] : '';
		$arrows_custom_color_phone  = isset($arrows_custom_color_values['phone']) ? $arrows_custom_color_values['phone'] : '';

		// Dot Nav Custom Color.
		$dot_nav_custom_color        = $this->props['dot_nav_custom_color'];
		$dot_nav_custom_color_values = et_pb_responsive_options()->get_property_values($this->props, 'dot_nav_custom_color');
		$dot_nav_custom_color_tablet = isset($dot_nav_custom_color_values['tablet']) ? $dot_nav_custom_color_values['tablet'] : '';
		$dot_nav_custom_color_phone  = isset($dot_nav_custom_color_values['phone']) ? $dot_nav_custom_color_values['phone'] : '';

		// Pass Slider Module setting to Slide Item.
		global $et_pb_slider;

		$et_pb_slider = array(
			'background_last_edited'                       => $this->props['background_last_edited'],
			'background__hover_enabled'                    => isset($this->props['background__hover_enabled']) ? $this->props['background__hover_enabled'] : '',
			// Background Color.
			'background_enable_color'                      => $this->props['background_enable_color'],
			'background_enable_color_tablet'               => $this->props['background_enable_color_tablet'],
			'background_enable_color_phone'                => $this->props['background_enable_color_phone'],
			'background_enable_color__hover'               => isset($this->props['background_enable_color__hover']) ? $this->props['background_enable_color__hover'] : '',
			'background_color'                             => $this->props['background_color'],
			'background_color_tablet'                      => $this->props['background_color_tablet'],
			'background_color_phone'                       => $this->props['background_color_phone'],
			'background_color__hover'                      => isset($this->props['background_color__hover']) ? $this->props['background_color__hover'] : '',

			// Background Gradient.
			'use_background_color_gradient'                => $this->props['use_background_color_gradient'],
			'use_background_color_gradient_tablet'         => $this->props['use_background_color_gradient_tablet'],
			'use_background_color_gradient_phone'          => $this->props['use_background_color_gradient_phone'],
			'use_background_color_gradient__hover'         => isset($this->props['use_background_color_gradient__hover'])
				? $this->props['use_background_color_gradient__hover']
				: '',

			'background_color_gradient_repeat'             => isset($this->props['background_color_gradient_repeat'])
				? $this->props['background_color_gradient_repeat']
				: '',
			'background_color_gradient_repeat_tablet'      => isset($this->props['background_color_gradient_repeat_tablet'])
				? $this->props['background_color_gradient_repeat_tablet']
				: '',
			'background_color_gradient_repeat_phone'       => isset($this->props['background_color_gradient_repeat_phone'])
				? $this->props['background_color_gradient_repeat_phone']
				: '',
			'background_color_gradient_repeat__hover'      => isset($this->props['background_color_gradient_repeat__hover'])
				? $this->props['background_color_gradient_repeat__hover']
				: '',
			'background_color_gradient_repeat__sticky'     => isset($this->props['background_color_gradient_repeat__sticky'])
				? $this->props['background_color_gradient_repeat__sticky']
				: '',

			'background_color_gradient_type'               => $this->props['background_color_gradient_type'],
			'background_color_gradient_type_tablet'        => $this->props['background_color_gradient_type_tablet'],
			'background_color_gradient_type_phone'         => $this->props['background_color_gradient_type_phone'],
			'background_color_gradient_type__hover'        => isset($this->props['background_color_gradient_type__hover'])
				? $this->props['background_color_gradient_type__hover']
				: '',

			'background_color_gradient_direction'          => $this->props['background_color_gradient_direction'],
			'background_color_gradient_direction_tablet'   => $this->props['background_color_gradient_direction_tablet'],
			'background_color_gradient_direction_phone'    => $this->props['background_color_gradient_direction_phone'],
			'background_color_gradient_direction__hover'   => isset($this->props['background_color_gradient_direction__hover'])
				? $this->props['background_color_gradient_direction__hover']
				: '',

			'background_color_gradient_direction_radial'   => $this->props['background_color_gradient_direction_radial'],
			'background_color_gradient_direction_radial_tablet' => $this->props['background_color_gradient_direction_radial_tablet'],
			'background_color_gradient_direction_radial_phone' => $this->props['background_color_gradient_direction_radial_phone'],
			'background_color_gradient_direction_radial__hover' => isset($this->props['background_color_gradient_direction_radial__hover'])
				? $this->props['background_color_gradient_direction_radial__hover']
				: '',

			'background_color_gradient_stops'              => $this->props['background_color_gradient_stops'],
			'background_color_gradient_stops_tablet'       => $this->props['background_color_gradient_stops_tablet'],
			'background_color_gradient_stops_phone'        => $this->props['background_color_gradient_stops_phone'],
			'background_color_gradient_stops__hover'       => isset($this->props['background_color_gradient_stops__hover'])
				? $this->props['background_color_gradient_stops__hover']
				: '',
			'background_color_gradient_stops__sticky'      => isset($this->props['background_color_gradient_stops__sticky'])
				? $this->props['background_color_gradient_stops__sticky']
				: '',

			'background_color_gradient_overlays_image'     => $this->props['background_color_gradient_overlays_image'],
			'background_color_gradient_overlays_image_tablet' => $this->props['background_color_gradient_overlays_image_tablet'],
			'background_color_gradient_overlays_image_phone' => $this->props['background_color_gradient_overlays_image_phone'],
			'background_color_gradient_overlays_image__hover' => isset($this->props['background_color_gradient_overlays_image__hover'])
				? $this->props['background_color_gradient_overlays_image__hover']
				: '',

			'background_color_gradient_start'              => isset($this->props['background_color_gradient_start'])
				? $this->props['background_color_gradient_start']
				: '',
			'background_color_gradient_start_tablet'       => isset($this->props['background_color_gradient_start_tablet'])
				? $this->props['background_color_gradient_start_tablet']
				: '',
			'background_color_gradient_start_phone'        => isset($this->props['background_color_gradient_start_phone'])
				? $this->props['background_color_gradient_start_phone']
				: '',
			'background_color_gradient_start__hover'       => isset($this->props['background_color_gradient_start__hover'])
				? $this->props['background_color_gradient_start__hover']
				: '',

			'background_color_gradient_end'                => isset($this->props['background_color_gradient_end'])
				? $this->props['background_color_gradient_end']
				: '',
			'background_color_gradient_end_tablet'         => isset($this->props['background_color_gradient_end_tablet'])
				? $this->props['background_color_gradient_end_tablet']
				: '',
			'background_color_gradient_end_phone'          => isset($this->props['background_color_gradient_end_phone'])
				? $this->props['background_color_gradient_end_phone']
				: '',
			'background_color_gradient_end__hover'         => isset($this->props['background_color_gradient_end__hover'])
				? $this->props['background_color_gradient_end__hover']
				: '',

			'background_color_gradient_start_position'     => isset($this->props['background_color_gradient_start_position'])
				? $this->props['background_color_gradient_start_position']
				: '',
			'background_color_gradient_start_position_tablet' => isset($this->props['background_color_gradient_start_position_tablet'])
				? $this->props['background_color_gradient_start_position_tablet']
				: '',
			'background_color_gradient_start_position_phone' => isset($this->props['background_color_gradient_start_position_phone'])
				? $this->props['background_color_gradient_start_position_phone']
				: '',
			'background_color_gradient_start_position__hover' => isset($this->props['background_color_gradient_start_position__hover'])
				? $this->props['background_color_gradient_start_position__hover']
				: '',

			'background_color_gradient_end_position'       => isset($this->props['background_color_gradient_end_position'])
				? $this->props['background_color_gradient_end_position']
				: '',
			'background_color_gradient_end_position_tablet' => isset($this->props['background_color_gradient_end_position_tablet'])
				? $this->props['background_color_gradient_end_position_tablet']
				: '',
			'background_color_gradient_end_position_phone' => isset($this->props['background_color_gradient_end_position_phone'])
				? $this->props['background_color_gradient_end_position_phone']
				: '',
			'background_color_gradient_end_position__hover' => isset($this->props['background_color_gradient_end_position__hover'])
				? $this->props['background_color_gradient_end_position__hover']
				: '',

			// Background Image.
			'background_enable_image'                      => $this->props['background_enable_image'],
			'background_enable_image_tablet'               => $this->props['background_enable_image_tablet'],
			'background_enable_image_phone'                => $this->props['background_enable_image_phone'],
			'background_enable_image__hover'               => isset($this->props['background_enable_image__hover']) ? $this->props['background_enable_image__hover'] : '',
			'background_image'                             => $this->props['background_image'],
			'background_image_tablet'                      => $this->props['background_image_tablet'],
			'background_image_phone'                       => $this->props['background_image_phone'],
			'background_image__hover'                      => isset($this->props['background_image__hover']) ? $this->props['background_image__hover'] : '',
			'background_size'                              => $this->props['background_size'],
			'background_size_tablet'                       => $this->props['background_size_tablet'],
			'background_size_phone'                        => $this->props['background_size_phone'],
			'background_size__hover'                       => isset($this->props['background_size__hover']) ? $this->props['background_size__hover'] : '',
			'background_position'                          => $this->props['background_position'],
			'background_position_tablet'                   => $this->props['background_position_tablet'],
			'background_position_phone'                    => $this->props['background_position_phone'],
			'background_position__hover'                   => isset($this->props['background_position__hover']) ? $this->props['background_position__hover'] : '',
			'background_repeat'                            => $this->props['background_repeat'],
			'background_repeat_tablet'                     => $this->props['background_repeat_tablet'],
			'background_repeat_phone'                      => $this->props['background_repeat_phone'],
			'background_repeat__hover'                     => isset($this->props['background_repeat__hover']) ? $this->props['background_repeat__hover'] : '',
			'background_blend'                             => $this->props['background_blend'],
			'background_blend_tablet'                      => $this->props['background_blend_tablet'],
			'background_blend_phone'                       => $this->props['background_blend_phone'],
			'background_blend__hover'                      => isset($this->props['background_blend__hover']) ? $this->props['background_blend__hover'] : '',
			'parallax'                                     => $this->props['parallax'],
			'parallax_tablet'                              => $this->props['parallax_tablet'],
			'parallax_phone'                               => $this->props['parallax_phone'],
			'parallax__hover'                              => isset($this->props['parallax__hover']) ? $this->props['parallax__hover'] : '',
			'parallax_method'                              => $this->props['parallax_method'],
			'parallax_method_tablet'                       => $this->props['parallax_method_tablet'],
			'parallax_method_phone'                        => $this->props['parallax_method_phone'],
			'parallax_method__hover'                       => isset($this->props['parallax_method__hover']) ? $this->props['parallax_method__hover'] : '',
			// Background Video.
			'background_enable_video_mp4'                  => $this->props['background_enable_video_mp4'],
			'background_enable_video_mp4_tablet'           => $this->props['background_enable_video_mp4_tablet'],
			'background_enable_video_mp4_phone'            => $this->props['background_enable_video_mp4_phone'],
			'background_enable_video_mp4__hover'           => isset($this->props['background_enable_video_mp4__hover']) ? $this->props['background_enable_video_mp4__hover'] : '',
			'background_enable_video_webm'                 => $this->props['background_enable_video_webm'],
			'background_enable_video_webm_tablet'          => $this->props['background_enable_video_webm_tablet'],
			'background_enable_video_webm_phone'           => $this->props['background_enable_video_webm_phone'],
			'background_enable_video_webm__hover'          => isset($this->props['background_enable_video_webm__hover']) ? $this->props['background_enable_video_webm__hover'] : '',
			'background_video_mp4'                         => $this->props['background_video_mp4'],
			'background_video_mp4_tablet'                  => $this->props['background_video_mp4_tablet'],
			'background_video_mp4_phone'                   => $this->props['background_video_mp4_phone'],
			'background_video_mp4__hover'                  => isset($this->props['background_video_mp4__hover']) ? $this->props['background_video_mp4__hover'] : '',
			'background_video_webm'                        => $this->props['background_video_webm'],
			'background_video_webm_tablet'                 => $this->props['background_video_webm_tablet'],
			'background_video_webm_phone'                  => $this->props['background_video_webm_phone'],
			'background_video_webm__hover'                 => isset($this->props['background_video_webm__hover']) ? $this->props['background_video_webm__hover'] : '',
			'background_video_width'                       => $this->props['background_video_width'],
			'background_video_width_tablet'                => $this->props['background_video_width_tablet'],
			'background_video_width_phone'                 => $this->props['background_video_width_phone'],
			'background_video_width__hover'                => isset($this->props['background_video_width__hover']) ? $this->props['background_video_width__hover'] : '',
			'background_video_height'                      => $this->props['background_video_height'],
			'background_video_height_tablet'               => $this->props['background_video_height_tablet'],
			'background_video_height_phone'                => $this->props['background_video_height_phone'],
			'background_video_height__hover'               => isset($this->props['background_video_height__hover']) ? $this->props['background_video_height__hover'] : '',
			// Background Pattern.
			'background_pattern_style'                     => $this->props['background_pattern_style'],
			'background_pattern_style_tablet'              => $this->props['background_pattern_style_tablet'],
			'background_pattern_style_phone'               => $this->props['background_pattern_style_phone'],
			'background_pattern_style__hover'              => isset($this->props['background_pattern_style__hover']) ? $this->props['background_pattern_style__hover'] : '',
			'background_pattern_color'                     => $this->props['background_pattern_color'],
			'background_pattern_color_tablet'              => $this->props['background_pattern_color_tablet'],
			'background_pattern_color_phone'               => $this->props['background_pattern_color_phone'],
			'background_pattern_color__hover'              => isset($this->props['background_pattern_color__hover']) ? $this->props['background_pattern_color__hover'] : '',
			'background_pattern_transform'                 => $this->props['background_pattern_transform'],
			'background_pattern_transform_tablet'          => $this->props['background_pattern_transform_tablet'],
			'background_pattern_transform_phone'           => $this->props['background_pattern_transform_phone'],
			'background_pattern_transform__hover'          => isset($this->props['background_pattern_transform__hover']) ? $this->props['background_pattern_transform__hover'] : '',
			'background_pattern_size'                      => $this->props['background_pattern_size'],
			'background_pattern_size_tablet'               => $this->props['background_pattern_size_tablet'],
			'background_pattern_size_phone'                => $this->props['background_pattern_size_phone'],
			'background_pattern_size__hover'               => isset($this->props['background_pattern_size__hover']) ? $this->props['background_pattern_size__hover'] : '',
			'background_pattern_width'                     => $this->props['background_pattern_width'],
			'background_pattern_width_tablet'              => $this->props['background_pattern_width_tablet'],
			'background_pattern_width_phone'               => $this->props['background_pattern_width_phone'],
			'background_pattern_width__hover'              => isset($this->props['background_pattern_width__hover']) ? $this->props['background_pattern_width__hover'] : '',
			'background_pattern_height'                    => $this->props['background_pattern_height'],
			'background_pattern_height_tablet'             => $this->props['background_pattern_height_tablet'],
			'background_pattern_height_phone'              => $this->props['background_pattern_height_phone'],
			'background_pattern_height__hover'             => isset($this->props['background_pattern_height__hover']) ? $this->props['background_pattern_height__hover'] : '',
			'background_pattern_repeat_origin'             => $this->props['background_pattern_repeat_origin'],
			'background_pattern_repeat_origin_tablet'      => $this->props['background_pattern_repeat_origin_tablet'],
			'background_pattern_repeat_origin_phone'       => $this->props['background_pattern_repeat_origin_phone'],
			'background_pattern_repeat_origin__hover'      => isset($this->props['background_pattern_repeat_origin__hover']) ? $this->props['background_pattern_repeat_origin__hover'] : '',
			'background_pattern_horizontal_offset'         => $this->props['background_pattern_horizontal_offset'],
			'background_pattern_horizontal_offset_tablet'  => $this->props['background_pattern_horizontal_offset_tablet'],
			'background_pattern_horizontal_offset_phone'   => $this->props['background_pattern_horizontal_offset_phone'],
			'background_pattern_horizontal_offset__hover'  => isset($this->props['background_pattern_horizontal_offset__hover']) ? $this->props['background_pattern_horizontal_offset__hover'] : '',
			'background_pattern_vertical_offset'           => $this->props['background_pattern_vertical_offset'],
			'background_pattern_vertical_offset_tablet'    => $this->props['background_pattern_vertical_offset_tablet'],
			'background_pattern_vertical_offset_phone'     => $this->props['background_pattern_vertical_offset_phone'],
			'background_pattern_vertical_offset__hover'    => isset($this->props['background_pattern_vertical_offset__hover']) ? $this->props['background_pattern_vertical_offset__hover'] : '',
			'background_pattern_repeat'                    => $this->props['background_pattern_repeat'],
			'background_pattern_repeat_tablet'             => $this->props['background_pattern_repeat_tablet'],
			'background_pattern_repeat_phone'              => $this->props['background_pattern_repeat_phone'],
			'background_pattern_repeat__hover'             => isset($this->props['background_pattern_repeat__hover']) ? $this->props['background_pattern_repeat__hover'] : '',
			'background_pattern_blend_mode'                => $this->props['background_pattern_blend_mode'],
			'background_pattern_blend_mode_tablet'         => $this->props['background_pattern_blend_mode_tablet'],
			'background_pattern_blend_mode_phone'          => $this->props['background_pattern_blend_mode_phone'],
			'background_pattern_blend_mode__hover'         => isset($this->props['background_pattern_blend_mode__hover']) ? $this->props['background_pattern_blend_mode__hover'] : '',
			'background_enable_pattern_style'              => $this->props['background_enable_pattern_style'],
			'background_enable_pattern_style_tablet'       => $this->props['background_enable_pattern_style_tablet'],
			'background_enable_pattern_style_phone'        => $this->props['background_enable_pattern_style_phone'],
			'background_enable_pattern_style__hover'       => isset($this->props['background_enable_pattern_style__hover']) ? $this->props['background_enable_pattern_style__hover'] : '',
			// Background Mask.
			'background_mask_style'                        => $this->props['background_mask_style'],
			'background_mask_style_tablet'                 => $this->props['background_mask_style_tablet'],
			'background_mask_style_phone'                  => $this->props['background_mask_style_phone'],
			'background_mask_style__hover'                 => isset($this->props['background_mask_style__hover']) ? $this->props['background_mask_style__hover'] : '',
			'background_mask_color'                        => $this->props['background_mask_color'],
			'background_mask_color_tablet'                 => $this->props['background_mask_color_tablet'],
			'background_mask_color_phone'                  => $this->props['background_mask_color_phone'],
			'background_mask_color__hover'                 => isset($this->props['background_mask_color__hover']) ? $this->props['background_mask_color__hover'] : '',
			'background_mask_transform'                    => $this->props['background_mask_transform'],
			'background_mask_transform_tablet'             => $this->props['background_mask_transform_tablet'],
			'background_mask_transform_phone'              => $this->props['background_mask_transform_phone'],
			'background_mask_transform__hover'             => isset($this->props['background_mask_transform__hover']) ? $this->props['background_mask_transform__hover'] : '',
			'background_mask_aspect_ratio'                 => $this->props['background_mask_aspect_ratio'],
			'background_mask_aspect_ratio_tablet'          => $this->props['background_mask_aspect_ratio_tablet'],
			'background_mask_aspect_ratio_phone'           => $this->props['background_mask_aspect_ratio_phone'],
			'background_mask_aspect_ratio__hover'          => isset($this->props['background_mask_aspect_ratio__hover']) ? $this->props['background_mask_aspect_ratio__hover'] : '',
			'background_mask_size'                         => $this->props['background_mask_size'],
			'background_mask_size_tablet'                  => $this->props['background_mask_size_tablet'],
			'background_mask_size_phone'                   => $this->props['background_mask_size_phone'],
			'background_mask_size__hover'                  => isset($this->props['background_mask_size__hover']) ? $this->props['background_mask_size__hover'] : '',
			'background_mask_width'                        => $this->props['background_mask_width'],
			'background_mask_width_tablet'                 => $this->props['background_mask_width_tablet'],
			'background_mask_width_phone'                  => $this->props['background_mask_width_phone'],
			'background_mask_width__hover'                 => isset($this->props['background_mask_width__hover']) ? $this->props['background_mask_width__hover'] : '',
			'background_mask_height'                       => $this->props['background_mask_height'],
			'background_mask_height_tablet'                => $this->props['background_mask_height_tablet'],
			'background_mask_height_phone'                 => $this->props['background_mask_height_phone'],
			'background_mask_height__hover'                => isset($this->props['background_mask_height__hover']) ? $this->props['background_mask_height__hover'] : '',
			'background_mask_position'                     => $this->props['background_mask_position'],
			'background_mask_position_tablet'              => $this->props['background_mask_position_tablet'],
			'background_mask_position_phone'               => $this->props['background_mask_position_phone'],
			'background_mask_position__hover'              => isset($this->props['background_mask_position__hover']) ? $this->props['background_mask_position__hover'] : '',
			'background_mask_horizontal_offset'            => $this->props['background_mask_horizontal_offset'],
			'background_mask_horizontal_offset_tablet'     => $this->props['background_mask_horizontal_offset_tablet'],
			'background_mask_horizontal_offset_phone'      => $this->props['background_mask_horizontal_offset_phone'],
			'background_mask_horizontal_offset__hover'     => isset($this->props['background_mask_horizontal_offset__hover']) ? $this->props['background_mask_horizontal_offset__hover'] : '',
			'background_mask_vertical_offset'              => $this->props['background_mask_vertical_offset'],
			'background_mask_vertical_offset_tablet'       => $this->props['background_mask_vertical_offset_tablet'],
			'background_mask_vertical_offset_phone'        => $this->props['background_mask_vertical_offset_phone'],
			'background_mask_vertical_offset__hover'       => isset($this->props['background_mask_vertical_offset__hover']) ? $this->props['background_mask_vertical_offset__hover'] : '',
			'background_mask_blend_mode'                   => $this->props['background_mask_blend_mode'],
			'background_mask_blend_mode_tablet'            => $this->props['background_mask_blend_mode_tablet'],
			'background_mask_blend_mode_phone'             => $this->props['background_mask_blend_mode_phone'],
			'background_mask_blend_mode__hover'            => isset($this->props['background_mask_blend_mode__hover']) ? $this->props['background_mask_blend_mode__hover'] : '',
			'background_enable_mask_style'                 => $this->props['background_enable_mask_style'],
			'background_enable_mask_style_tablet'          => $this->props['background_enable_mask_style_tablet'],
			'background_enable_mask_style_phone'           => $this->props['background_enable_mask_style_phone'],
			'background_enable_mask_style__hover'          => isset($this->props['background_enable_mask_style__hover']) ? $this->props['background_enable_mask_style__hover'] : '',
			'header_level'                                 => $this->props['header_level'],
			'arrows_custom_color'                          => $arrows_custom_color,
			'arrows_custom_color_slider_last_edited'       => $this->props['arrows_custom_color_last_edited'],
			'arrows_custom_color_tablet'                   => $arrows_custom_color_tablet,
			'arrows_custom_color_phone'                    => $arrows_custom_color_phone,
			'arrows_custom_color__sticky'                  => $sticky->get_value('arrows_custom_color', $this->props),
			'dot_nav_custom_color'                         => $dot_nav_custom_color,
			'dot_nav_custom_color_slider_last_edited'      => $this->props['dot_nav_custom_color_last_edited'],
			'dot_nav_custom_color_tablet'                  => $dot_nav_custom_color_tablet,
			'dot_nav_custom_color_phone'                   => $dot_nav_custom_color_phone,
			'dot_nav_custom_color__sticky'                 => $sticky->get_value('dot_nav_custom_color', $this->props),

			// Sticky classname position relies to slider's sticky status if the style selector
			// begins with slider-level selector.
			'is_sticky_module'                             => $sticky->is_sticky_module($this->props),

			// Module item has no sticky options hence this needs to be inherited to setup transition.
			'sticky_transition'                            => et_()->array_get($this->props, 'sticky_transition', 'on'),
		);

		// Hover Options attribute doesn't have field definition and rendered on the fly, thus the use of array_get()
		$background_hover_enabled_key = et_pb_hover_options()->get_hover_enabled_field('background');
		$background_color_hover_key   = et_pb_hover_options()->get_hover_field('background_color');

		$et_pb_slider[$background_hover_enabled_key] = self::$_->array_get($this->props, $background_hover_enabled_key, '');
		$et_pb_slider[$background_color_hover_key]   = self::$_->array_get($this->props, $background_color_hover_key, '');
	}

	/**
	 * Renders the module output.
	 *
	 * @param  array  $attrs       List of attributes.
	 * @param  string $content     Content being processed.
	 * @param  string $render_slug Slug of module that is used for rendering output.
	 *
	 * @return string
	 */
	public function render($attrs, $content, $render_slug)
	{
		$multi_view              = et_pb_multi_view_options($this);
		$show_arrows             = @$this->props['show_arrows'];
		$show_pagination         = @$this->props['show_pagination'];
		$show_count		         = @$this->props['show_count'];
		$show_scrollbar        	 = @$this->props['show_scrollbar'];
		$parallax                = @$this->props['parallax'];
		$parallax_method         = @$this->props['parallax_method'];
		$auto                    = @$this->props['auto'];
		$auto_speed              = @$this->props['auto_speed'];
		$auto_ignore_hover       = @$this->props['auto_ignore_hover'];
		$body_font_size          = @$this->props['body_font_size'];
		$show_content_on_mobile  = @$this->props['show_content_on_mobile'];
		$show_cta_on_mobile      = @$this->props['show_cta_on_mobile'];
		$show_image_video_mobile = @$this->props['show_image_video_mobile'];
		$background_position     = @$this->props['background_position'];
		$background_size         = @$this->props['background_size'];
		$prev_cursor         	 = @$this->props['image_cursor_prev'];
		$next_cursor         	 = @$this->props['image_cursor_next'];
		$disabled_cursor         = @$this->props['image_cursor_disabled'];

		global $et_pb_slider_has_video, $et_pb_slider_parallax, $et_pb_slider_parallax_method, $et_pb_slider_show_mobile, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone, $et_pb_slider;

		$content = $this->content;

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		if ('' !== $background_position && 'default' !== $background_position && 'off' === $parallax) {
			$processed_position = str_replace('_', ' ', $background_position);

			ET_Builder_Module::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .et_pb_slide',
					'declaration' => sprintf(
						'background-position: %1$s;',
						esc_html($processed_position)
					),
				)
			);
		}

		// Handle slider's previous background size default value ("default") as well
		if ('' !== $background_size && 'default' !== $background_size && 'off' === $parallax) {
			$el_style = array(
				// 'selector'    => '%%order_class%% .et_pb_slide',
				'selector'    => '%%order_class%%',
				'declaration' => sprintf(
					'-moz-background-size: %1$s;
					-webkit-background-size: %1$s;
					background-size: %1$s;',
					esc_html($background_size)
				),
			);
			ET_Builder_Module::set_style($render_slug, $el_style);
		}

		if ($prev_cursor && $next_cursor) {
			ET_Builder_Module::set_style($render_slug, array(
				'selector'    => '.has-cursor-prev *:not(a)',
				'declaration' => sprintf(
					'cursor: url(%s), auto',
					$prev_cursor
				),
			));
			ET_Builder_Module::set_style($render_slug, array(
				'selector'    => '.has-cursor-next *:not(a)',
				'declaration' => sprintf(
					'cursor: url(%s) 50 25, auto',
					$next_cursor
				),
			));
		}
		if ($disabled_cursor) {
			ET_Builder_Module::set_style($render_slug, array(
				'selector'    => '.has-cursor-disabled *:not(a)',
				'declaration' => sprintf(
					'cursor: url(%s), auto',
					$disabled_cursor
				),
			));
		}


		// Module classnames
		$this->add_classname('et_pb_slider_fullwidth_off');

		if (! $multi_view->has_value('show_arrows', 'on')) {
			$this->add_classname('et_pb_slider_no_arrows');
		}

		if (! $multi_view->has_value('show_pagination', 'on')) {
			$this->add_classname('et_pb_slider_no_pagination');
		}
		if (! $multi_view->has_value('show_count', 'off')) {
			$this->add_classname('et_pb_slider_no_count');
		}

		if ('on' === $parallax) {
			$this->add_classname('et_pb_slider_parallax');
		}

		if ('on' === $auto) {
			$this->add_classname(
				array(
					'et_slider_auto',
					"et_slider_speed_{$auto_speed}",
				)
			);
		}

		if ('on' === $auto_ignore_hover) {
			$this->add_classname('et_slider_auto_ignore_hover');
		}

		if ('on' === $show_image_video_mobile) {
			$this->add_classname('et_pb_slider_show_image');
		}

		$this->generate_responsive_hover_style('arrows_custom_color', '.swiper-arrow-button', 'color');
		$this->generate_responsive_hover_style('dot_nav_custom_color', '.swiper-pagination-bullet', 'background-color');

		$multi_view_data_attr = $multi_view->render_attrs(
			array(
				'classes' => array(
					'et_pb_slider_no_arrows'     => array(
						'show_arrows' => 'off',
					),
					'et_pb_slider_no_pagination' => array(
						'show_pagination' => 'off',
					),
					'et_pb_slider_no_count' => array(
						'show_count' => 'off',
					),
				),
			)
		);

		$pagination = $show_pagination === 'on' ? '<div class="swiper-pagination"></div>' : '';
		$count = $show_count === 'on' ? '<div class="swiper-item-count"></div>' : '';
		// No arrows activates invisible click zones on slider
		$navigation = $show_arrows === 'on' ?
			'<div class="swiper-arrow-button swiper-button-prev"></div> <div class="swiper-arrow-button swiper-button-next"></div>' : "";
			// '<div class="swiper-arrow-button swiper-button-prev no-arrows"></div> <div class="swiper-arrow-button swiper-button-next no-arrows"></div>';
		
		$scrollbar  = $show_scrollbar === 'on' ? '<div class="swiper-scrollbar"></div>' : '';
		$output = sprintf(
			'<div%3$s class="%1$s swiper"%5$s >
				<div class="swiper-wrapper et_pb_slides">
					%2$s
				</div>
				%4$s

				<!-- If we need pagination -->
				%6$s

				<!-- If we need navigation buttons -->
				%7$s

				<!-- If we need scrollbar -->
				%8$s

				<!-- If we need count -->
				%9$s

			</div>
			',
			$this->module_classname($render_slug),
			$content,
			$this->module_id(),
			$this->inner_shadow_back_compatibility($render_slug),
			$multi_view_data_attr,
			$pagination,
			$navigation,
			$scrollbar,
			$count
		);

		// Reset passed slider item value
		$et_pb_slider = array();

		return $output;
	}

	private function inner_shadow_back_compatibility($functions_name)
	{
		$utils = ET_Core_Data_Utils::instance();
		$atts  = $this->props;
		$style = '';

		if (
			version_compare($utils->array_get($atts, '_builder_version', '3.0.93'), '3.0.99', 'lt')
		) {
			$class = self::get_module_order_class($functions_name);
			$style = sprintf(
				'<style>%1$s</style>',
				sprintf(
					'.%1$s.et_pb_slider .et_pb_slide {'
						. '-webkit-box-shadow: none; '
						. '-moz-box-shadow: none; '
						. 'box-shadow: none; '
						. '}',
					esc_attr($class)
				)
			);

			if ('off' !== $utils->array_get($atts, 'show_inner_shadow')) {
				$style .= sprintf(
					'<style>%1$s</style>',
					sprintf(
						'.%1$s > .box-shadow-overlay { '
							. '-webkit-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); '
							. '-moz-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); '
							. 'box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1); '
							. '}',
						esc_attr($class)
					)
				);
			}
		}

		return $style;
	}

	public function get_swiper_script()
	{
		$fmt = "<script type=\"text/javascript\" id=\"swiper-config\">
			(function() {
				const peslSwiper = new Swiper(
					'.swiper',
					%1\$s
				);

				// DEBUG here
				peslSwiper.on( 'activeIndexChange', function (data) {
					var fontTransition = setTimeout( ()=>{
						clearTimeout(fontTransition);
						
						// let el = $(data.el).find('.swiper-slide').get(data.realIndex)
						let el = $(data.el).find('.swiper-slide.swiper-slide-active')
						if( el.hasClass('et_pb_bg_layout_dark') ) {
							$('body').removeClass('et_pb_bg_layout_light');
							$('body').addClass('et_pb_bg_layout_dark');
						} 
						else {
							$('body').removeClass('et_pb_bg_layout_dark');
							$('body').addClass('et_pb_bg_layout_light');
						}
					}, 500)
				});

				peslSwiper.on( 'transitionEnd', function (data) {
					window.onSwiperTransitionEnd(this);
					var itemCount = $(data.el).find('.swiper-item-count');
					if (itemCount) itemCount.get(0).innerHTML = (data.realIndex +  1) + '/' + data.slides.length;
				});

				peslSwiper.on( 'init', function(data){
					var itemCount = $(data.el).find('.swiper-item-count');
					if (itemCount) itemCount.get(0).innerHTML = (data.realIndex +  1) + '/' + data.slides.length;
					let el = $(data.el).find('.swiper-slide').get(0)
					if( $(el).hasClass('et_pb_bg_layout_dark') ) {
						$('body').addClass('et_pb_bg_layout_dark');
					} else {
						$('body').addClass('et_pb_bg_layout_light');
					}

					window.onSwiperInit(this);

				});

				if( %2\$s ) peslSwiper.on('click', (swiper, e)=>{
					if ( e.target.tagName.toLowerCase() === 'a' ) return false; // prevent bug on Bastien's compos...
					var rect = e.target.getBoundingClientRect();
					var x = e.clientX - rect.left;
					var centerX = (rect.right - rect.left) / 2;
					var zone = x < centerX ? swiper.slidePrev() : swiper.slideNext();
				})
				
				$('.et_pb_module.pesl_pepite_slider.swiper').on('mousemove', (e)=>{
					var rect = e.target.getBoundingClientRect();
					var x = e.clientX - rect.left;
					var centerX = (rect.right - rect.left) / 2;
					$('.et_pb_module.pesl_pepite_slider.swiper')
						.addClass( x < centerX ? 'has-cursor-prev' : 'has-cursor-next')
						.removeClass( x > centerX ? 'has-cursor-prev' : 'has-cursor-next');
				})
				
				peslSwiper.init();

			})();
		</script>";
		$swiper_props = $this->get_swiper_conf();
		echo sprintf($fmt, $swiper_props, "'off' === '{$this->props['show_arrows']}'");
	}

	private function get_swiper_conf()
	{
		$swiper_props = array();

		$swiper_props['init'] = false;
		// if( @$this->props['show_arrows'] === 'on') {
		$swiper_props['navigation'] = array(
			'nextEl' => '.swiper-button-next',
			'prevEl' => '.swiper-button-prev',
		);
		// }
		if (@$this->props['show_pagination'] === 'on') {
			$swiper_props['pagination'] = array(
				'el' => '.swiper-pagination',
				'clickable' => true,
			);
		}
		if (@$this->props['show_scrollbar'] === 'on') {
			$swiper_props['scrollbar'] = array(
				'el' => '.swiper-scrollbar',
				'hide' => true,
			);
		}
		if (@$this->props['loop_slides'] === 'on') {
			$swiper_props['loop'] = true;
		}
		if (@$this->props['swiper_transition']) {
			if( $this->props['swiper_transition'] === "none" ) {
				$swiper_props['effect'] = 'fade';
				$swiper_props['speed'] = 0;
			}
			else {
				$swiper_props['effect'] = $this->props['swiper_transition'];
			}
		}
		if (@$this->props['autoplay'] === 'on') {
			$swiper_props['autoplay'] = array(
				'delay' => @$this->props['autoplay_delay'],
				'waitForTransition' => false,
			);
		}

		// lazy loading
		// @todo Pass by parameters
		$swiper_props['lazyPreloadPrevNext'] = 1;

		return json_encode($swiper_props);
	}
}

new PESL_PepiteSlider;
