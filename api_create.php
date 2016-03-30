<?php
define("IN_WALLET", true);
include('common.php');
$con=mysqli_connect("$db_host","$db_user","$db_pass","$db_name");
$key = $_GET['key'];
$username = $_GET['username'];
$password = $_GET['password'];
$date = $_GET['date'];
$ip = $_GET['ip'];


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL. Make sure to edit the common.php file: " . mysqli_connect_error();
  }
$createaccount = mysqli_query($con,"INSERT INTO `users` (`date`, `ip`, `username`, `password`, `admin`, `locked`, `secret`) VALUES
('$date', '$ip', '$username', '$password', '1', NULL, '$key',);");
$client = new Client($rpc_host, $rpc_port, $rpc_user, $rpc_pass);
$addr = $client->getnewaddress($username);;
if(mysqli_error() == true){
	echo json_encode(array("error" => "Aconteceu um erro de Criação de Conta"));
}else{
	echo "Conta criada com Sucesso!";
}
?>
