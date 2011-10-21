<?php

include('RestUtils.inc.php');
include('path_data.sql.php');

$data = RestUtils::processRequest();
if (strcmp($data->getMethod(), 'post') == 0) {
	$current_data = $data->getRequestVars();
	add_pathdata_sql ( $current_data['session_id'], $current_data['from_url'], $current_data['from_title'], $current_data['to_url'], 0, 0, $current_data['custom_variable'] );
}

?>
