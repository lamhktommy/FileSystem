<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];
$file = $_SESSION['file'];

echo '<pre>';
print_r($_SESSION);
print_r ($file);
echo '</pre>';
$fname = $file['name'];
$size = $file['size'];
$tmpname = $file['tmp_name'];

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else { 
	$conn=mysqli_connect('sophia.cs.hku.hk', 'hklam', 'Y6117501', 'hklam') or die ('Error! '.mysqli_connect_error($conn));
	$query = "SELECT FileContent FROM FS_Files WHERE UserID='$userid' AND FileName = '$fname'";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));






	mysqli_free_result($result);
	mysqli_close($conn);
	
}


?>