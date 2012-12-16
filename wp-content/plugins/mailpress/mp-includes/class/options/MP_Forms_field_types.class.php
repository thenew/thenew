<?php
MailPress::require_class('Options');

class MP_Forms_field_types extends MP_Options
{
	var $path = 'form/field_types';
	var $abstract = 'Forms_field_type_abstract';
	var $deep = true;

	public static function get_all()
	{
		$x = apply_filters('MailPress_form_field_type_register', array());
		uasort($x, create_function('$a, $b', 'return ($a["order"] > $b["order"] ? 1 : (($a["order"] > $b["order"]) ? -1 : 0));'));
		return $x;
	}

	public static function settings_form($field_type, $field)
	{
		do_action('MailPress_form_field_type_' . $field_type . '_settings_form', $field); 
	}

	public static function get_id($field)
	{
		return apply_filters('MailPress_form_field_type_' . $field->type . '_get_id', $field );
	}

	public static function get_name($field)
	{
		return apply_filters('MailPress_form_field_type_' . $field->type . '_get_name', $field );
	}

	public static function get_tag($field)
	{
		$no_reset = (isset($_POST[MailPress_form::prefix][$field->form_id]));
		return apply_filters('MailPress_form_field_type_' . $field->type . '_get_tag', $field, $no_reset );
	}

	public static function submitted($field)
	{
		return apply_filters('MailPress_form_field_type_' . $field->type . '_submitted', $field );
	}

// have file loading ?
	public static function have_file($have_file, $field_type)
	{
		return apply_filters('MailPress_form_field_type_' . $field_type . '_have_file', $have_file);
	}
}
new MP_Forms_field_types();