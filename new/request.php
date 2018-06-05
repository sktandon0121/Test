<?php 


include('db.php');

$action = $_GET['action'];
// print_r($action);die;
switch ($action) {
	case 'submitData':
		submitForm($_POST,$conn);
		break;
	case 'getData':
		getData($conn);
		break;
	
	default:
		echo "Nothing Found";
		break;
}

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

function getData($conn){
	$sql = "SELECT * FROM register";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while ($row = $result->fetch_assoc()) {
			echo '<tr>
				<td>'.$row['name'].'</td>
				<td>'.$row['phone'].'</td>
				<td>'.$row['email'].'</td>
				</tr>';
		}
	}else{
		echo "No Data found";
	}

}


 ?>