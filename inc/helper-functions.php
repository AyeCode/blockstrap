<?php
/*
 * Some helper functions for the theme.
 */

/**
 * Retrieves the value of a specific option.
 *
 * @param string $key The key of the option to retrieve.
 *
 * @return mixed The value of the option.
 */
function blockstrap_get_option( $key ) {

	$option_key = 'blockstrap_options';

	$options = get_option( $option_key, array() );

	$value = isset( $options[ $key ] ) ? $options[ $key ] : false;

	return blockstrap_esc_options( $value );
}

/**
 * Retrieves the options from the database.
 *
 * @return array An associative array containing all options.
 */
function blockstrap_get_options() {
	return get_option( 'blockstrap_options', array() );
}

/**
 * Updates the value of the specified option.
 *
 * @param $option
 * @param mixed $value The new value to set for the option.
 *
 * @return bool True on success, false on failure.
 */
function blockstrap_update_option( $option, $value ) {
	$option_key = 'blockstrap_options';

	$values = get_option( $option_key, array() );

	$values[ $option ] = $value;

	return update_option( $option_key, blockstrap_sanitize_options( $values ) );
}


/**
 * Sanitizes an array by recursively sanitizing each value using the sanitize_text_field() function for insertion to DB.
 *
 * @param array $options The array to be sanitized.
 *
 * @return string|array The sanitized result.
 */
function blockstrap_sanitize_options( $options ) {
	$sanitized_options = array();
	if ( is_array( $options ) ) {
		foreach ( $options as $key => $val ) {
			$sanitized_options[ $key ] = blockstrap_sanitize_options( $val );
		}
	} else {
		return sanitize_text_field( $options );
	}

	return $sanitized_options;
}

/**
 * Escapes options by sanitizing them for safe usage in output.
 *
 * @param mixed $options The options to be sanitized. Can be an array or a single value.
 *
 * @return mixed The sanitized options. If the input is an array, it returns an array with sanitized values. If the input is a single value, it returns the sanitized value.
 */
function blockstrap_esc_options( $options ) {
	$sanitized_options = array();
	if ( is_array( $options ) ) {
		foreach ( $options as $key => $val ) {
			$sanitized_options[ $key ] = blockstrap_esc_options( $val );
		}
	} else {
		return esc_attr( wp_unslash( $options ) );
	}

	return $sanitized_options;
}
