<?php

	if(function_exists("register_field_group"))
	{
		register_field_group(array (
			'id' => 'acf_sermon-file',
			'title' => 'Sermon File',
			'fields' => array (
				array (
					'key' => 'field_554746e8109b4',
					'label' => 'File',
					'name' => 'file',
					'type' => 'file',
					'required' => 1,
					'save_format' => 'object',
					'library' => 'uploadedTo',
				),
				array (
					'key' => 'field_554748c2109b5',
					'label' => 'Date',
					'name' => 'date',
					'type' => 'date_picker',
					'date_format' => 'yymmdd',
					'display_format' => 'dd/mm/yy',
					'first_day' => 0,
				),
				array (
					'key' => 'field_554748d0109b6',
					'label' => 'Speaker',
					'name' => 'speaker',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
				array (
					'key' => 'field_554748ec109b7',
					'label' => 'Scripture Reference',
					'name' => 'scripture_reference',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'sermon',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'default',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}