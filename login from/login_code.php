<!--
Here, we write code for login.
-->
<?php

require_once('connection.php');
$email = $password = $num = '';

$email = $_POST['email'];
$num = $_POST['password'];
$password = MD5($num);
$sql = "SELECT * FROM tbluser WHERE Email='$email' AND Password='$password'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
		$id = $row["ID"];
		$email = $row["Email"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
	}
	header("Location: welcome.php");
}
else
{
	echo "Invalid email or password";
}
?>