<?php
if(isset($_POST['visitor_id'])){  

	$json_data = array();   
	$added_on = date('Y-m-d H:i:s');
	$ip_address = $_SERVER['REMOTE_ADDR'];  
	
	$ret_status = 0;
	$saved_rows = file_get_contents('./records.json'); 
	$json_rows = json_decode($saved_rows, true);
	if(isset($json_rows)){
		foreach($json_rows as $json_row) {  
		
			if( $_POST['item_status'] == 0 && $json_row["item_id"] == $_POST['item_id']){
				/* removed old one */
				 
			}else if( $_POST['item_status'] == 1 && $json_row["item_id"] == $_POST['item_id']){
					/* to add this one at the end */ 
			}else{  /* maintain old ones */ 
		
				$json_data[] = array("visitor_id" => $json_row["visitor_id"],
				"category_id" => $json_row["category_id"],
				"item_id" => $json_row["item_id"],
				"added_on" => $json_row["added_on"],
				"ip_address" => $json_row["ip_address"],
				);
		
			}
		}
	} 
	
	
		if( $_POST['item_status'] == 1){  	
			$json_data[] = array("visitor_id" => $_POST['visitor_id'],
				"category_id" => $_POST['category_id'],
				"item_id" => $_POST['item_id'],
				"added_on" => $added_on,
				"ip_address" => $ip_address,
				);
		}
		
		
		$fp = fopen('records.json', 'w');
		fwrite($fp, json_encode($json_data));
		fclose($fp);
		
		echo '1';
	
}else{
	echo '0';
}  ?> 