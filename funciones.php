<?php 
function get_row($table,$row, $id, $equal){
	global $cnx;
	$query = mysqli_query($cnx,"SELECT $row FROM $table WHERE $id = '$equal'");
	$rw    = mysqli_fetch_array($query);
	$value = $rw[$row];
	return $value;
}
?>