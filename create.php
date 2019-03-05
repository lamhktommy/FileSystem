<?php
$conn=mysqli_connect('sophia.cs.hku.hk', 'hklam', 'Y6117501', 'hklam') or die ('Error! '.mysqli_connect_error($conn));
$newusername =$_POST['newusername'];
$newpassword=$_POST['newpassword'];
$query="SELECT * FROM FS_Users";
$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
$valid=true;
while($row = mysqli_fetch_array($result)) {
	if ($row['Username']==$newusername){
			$valid=false;
	}
}	
if (!$valid){
	echo "<script>alert('Account already existed');</script>";
	header("refresh:0.1; url=createaccount.html");
}
else {
	$query="INSERT INTO FS_Users (Username, PW) VALUES ('$newusername','$newpassword');";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
	print "<script>alert('Account Created');</script>";
	header("refresh:0.1; url=index.html");
}
mysqli_free_result($result);
mysqli_close($conn);
?>