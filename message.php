<?php 
date_default_timezone_set('Asia/Kolkata');

$host="localhost";
$name="root";
$password="";
$db="chatbot";
$con=mysqli_connect($host,$name,$password,$db);
if($con)
{
	// echo "connected";
}
else
{
	echo"check again";
}



 ?>
<?php 
$txt=mysqli_real_escape_string($con,$_POST['txt']);
$select="SELECT reply FROM chatbot_hints where question like '%$txt%'";
$data=mysqli_query($con,$select);
if(mysqli_num_rows($data)>0)
{
// echo"done";
	$row=mysqli_fetch_assoc($data);
	$reply=$row['reply'];
}
else
{
	$reply="Sorry not be able to understand you:(";
}
$date=date('Y-m-d h:i:s');
$insert="INSERT INTO `chats`(`message`, `type`,date) VALUES ('$txt','user','$date')";
$data=mysqli_query($con,$insert);
$insertt="INSERT INTO `chats`(`message`, `type`, date) VALUES ('$reply','robot','$date')";
$data=mysqli_query($con,$insertt);
echo $reply;




 ?>

