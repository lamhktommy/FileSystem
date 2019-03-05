<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else {
	echo "<h1>Hello ".$username."</h1>";
}

if(!empty($_GET['fid'])){
	$fid = $_GET['fid'];
	$conn=mysqli_connect('sophia.cs.hku.hk', 'hklam', 'Y6117501', 'hklam') or die ('Error! '.mysqli_connect_error($conn));
	$query = "DELETE FROM FS_Files WHERE FileID='$fid';";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
	header('Location: myfiles.php');
	mysqli_free_result($result);
	mysqli_close($conn);
}

?>