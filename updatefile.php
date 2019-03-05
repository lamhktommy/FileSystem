<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];
$file = $_SESSION['file'];
//print_r($_SESSION);
$content = addslashes($_SESSION['content']);
//print $content;

$fname = $file['name'];
/*
$size = $file['size'];
$tmpname = $file['tmp_name'];
*/

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else { 
	$conn=mysqli_connect('sophia.cs.hku.hk', '*****', '*****', '*****') or die ('Error! '.mysqli_connect_error($conn));
	if ($content != '') {
		$query = "UPDATE FS_Files 
		SET FileContent='$content' 
		WHERE UserID='$userid' AND FileName='$fname';";
		$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
		header("Location: upload.php");
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	
}


?>
