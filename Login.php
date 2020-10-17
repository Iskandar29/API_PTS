<?php
  $email = $_POST['email'];
	$password = $_POST['password'];
	$con = mysqli_connect("localhost","root","","dbrentalsepeda");
	$sql = "SELECT * from tbuser where email = '$email' and password = '$password'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count = mysqli_num_rows($result);
	if($count > 0){
		$json["PAYLOAD"]["respon"]=true;
		if ($row["roleuser"] == 1) {
          $json["PAYLOAD"]["roleuser"] = "admin";
        } elseif ($row["roleuser"] == 2) {
          $json["PAYLOAD"]["roleuser"] = "customer";
        }
	}else{
		$json["PAYLOAD"]["respon"]=false;
	}
	echo json_encode($json);
?>
