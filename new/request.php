<?php 


include('db.php');

function submitForm($post,$conn){
	// print_r($post);
	$sql = "INSERT INTO register (name, phone, email)
	VALUES ('".$post['name']."', '".$post['phone']."', '".$post['email']."')";
	$result = array();
	if ($conn->query($sql)==true) {
		$result['status'] = 1; 
	    $result['data']['message'] = 'New Record inseted successfully .';
	    $result['data']['record'] = $post; 
	} else {
		$result['status'] = 0; 
	    $result['data']['message'] = $conn->error;
	   // echo "Error: " . $sql . "<br>" . $conn->error;
	}
	echo json_encode($result);
}

function getData(){
	echo "get all data";
}
submitForm($_POST,$conn);



 ?>