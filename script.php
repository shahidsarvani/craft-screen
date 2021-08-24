<?php 
if(isset($_POST['visitor_id'])){  

	$json_data = array();   
	$added_on = date('Y-m-d H:i:s');
	$ip_address = $_SERVER['REMOTE_ADDR'];
	
	// $_POST['item_status']
	
	$json_data[] = array("visitor_id" => $_POST['visitor_id'],
		"category_id" => $_POST['category_id'],
		"item_id" => $_POST['item_id'],
		"added_on" => $added_on,
		"ip_address" => $ip_address,
		);
		
		$fp = fopen('records.json', 'w');
		fwrite($fp, json_encode($json_data));
		fclose($fp);
		
		echo '1';
	
}else{
	echo '0';
}  ?> 