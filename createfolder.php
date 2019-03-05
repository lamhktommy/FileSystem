<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];
$fname = $_POST['fname'];

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else {
	$conn=mysqli_connect('sophia.cs.hku.hk', 'hklam', 'Y6117501', 'hklam') or die ('Error! '.mysqli_connect_error($conn));
	$query="SELECT * FROM FS_Folder";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
	$valid=true;
	while($row = mysqli_fetch_array($result)) {
		if ($row['FolderName']==$fname && $row['UserID']==$userid){
				$valid=false;
		}
	}
	if (!$valid){
		print "<script>alert('Folder Name Crash with existing folder');</script>";	
		header("refresh:0.1;url=newfolder.php");
	}
	else {
		$query="INSERT INTO FS_Folder (UserID,FolderName) VALUES ('$userid','$fname');";
		$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
		print "<script>alert('Folder Created');</script>";	
		header("refresh:0.1;url=main.php");
	}
}
mysqli_free_result($result);
mysqli_close($conn);
?>