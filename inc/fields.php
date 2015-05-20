<?php
/*
 * Field of the ACF plugin
 */
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_agenda-opcoes',
		'title' => 'Agenda - Opções',
		'fields' => array (
			array (
				'key' => 'field_555cb4b5a3fad',
				'label' => 'Data do evento',
				'name' => 'agenda_data',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_555cb4fca3fae',
				'label' => 'Hora',
				'name' => 'agenda_hora',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_555cb529a3faf',
				'label' => 'Local',
				'name' => 'agenda_local',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => 1,
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'agenda',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
