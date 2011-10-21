<?php

require('db_config.php');

function add_pathdata_sql ( $session_id, $from_url, $from_title, $to_url, $link_type = 0, $guid = 0, $custom_variable = '' ) {
	global $db_server, $db, $db_user, $db_password;
	$connection = mysql_connect ( $db_server, $db_user, $db_password );
	if ( !$connection ) {
		die ( 'Could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $db, $connection );
	$query = 'INSERT INTO weblabux_pathdata ( session_id, from_url, from_title, to_url, time_stamp, link_type, guid, custom_variable ) VALUES (' . $session_id . ', \'' . mysql_real_escape_string($from_url) . '\', \'' . mysql_real_escape_string($from_title) . '\', \'' . mysql_real_escape_string($to_url) . '\', ' . time() . ', ' . $link_type . ', ' . $guid . ', \'' . mysql_real_escape_string($custom_variable) . '\')';
	$result = mysql_query ( $query, $connection );
	if ( !$result ) {
	 	die ( 'Invalid query: ' . mysql_error () );
	}
	mysql_close( $connection );
	return ( $result );
}

?>
