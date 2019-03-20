<?php


	$wp_customize->add_section('faq_sec', array(
		'title' => __('FAQ', 'elizama'),
		'description' => __('Frequently Asked Questions about the site', 'elizama'),
		'priority' => null
	));

	$wp_customize->add_setting('faq_title', array(
		'default'=> __('Add your question here', 'elizama'),
		'sanitize_callback' => 'sanitize_text_field'
	));


	$wp_customize->add_control('faq_title', array(
		'label' => __('Questions', 'elizama'),
		'setting' => 'faq_title',
		'section' => 'faq_sec'
	));
	$wp_customize->add_setting('faq_desc', array(
		'default' => __( 'Add the answer here', 'elizama'),
		'sanitize_callback' => 'format_for_editor'
	));


	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'faq_desc',
			array(
				'input' => __('ADD YOU FAQ QUESTION HERE', 'elizama'),
				'setting' =>'faq_desc',
				'section' => 'faq_sec'
			)
		)
	);

	$wp_customize->add_setting('faq_title1', array(
		'default'=> __('Add your question here', 'elizama'),
		'sanitize_callback' => 'sanitize_text_field'
	));


	$wp_customize->add_control('faq_title1', array(
		'label' => __('Questions', 'elizama'),
		'setting' => 'faq_title1',
		'section' => 'faq_sec1'
	));
	$wp_customize->add_setting('faq_desc1', array(
		'default' => __( 'Add the answer here', 'elizama'),
		'sanitize_callback' => 'format_for_editor'
	));


	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'faq_desc1',
			array(
				'input' => __('ADD YOU FAQ QUESTION HERE', 'elizama'),
				'setting' =>'faq_desc1',
				'section' => 'faq_sec1'
			)
		)
	);
	

	$wp_customize->add_setting('faq_title2', array(
		'default'=> __('Add your question here', 'elizama'),
		'sanitize_callback' => 'sanitize_text_field'
	));


	$wp_customize->add_control('faq_title2', array(
		'label' => __('Questions', 'elizama'),
		'setting' => 'faq_title2',
		'section' => 'faq_sec2'
	));
	$wp_customize->add_setting('faq_desc2', array(
		'default' => __( 'Add the answer here', 'elizama'),
		'sanitize_callback' => 'format_for_editor'
	));


	$wp_customize->add_control(
		new WP_Customize_Textarea_Control(
			$wp_customize,
			'faq_desc2',
			array(
				'input' => __('ADD YOU FAQ QUESTION HERE', 'elizama'),
				'setting' =>'faq_desc2',
				'section' => 'faq_sec2'
			)
		)
	);


