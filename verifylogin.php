<?php

$conn=mysqli_connect('sophia.cs.hku.hk', '*****', '*****', '*****') or die ('Error! '.mysqli_connect_error($conn));
$username =$_POST['Username'];
$password=$_POST['Password'];
$query="SELECT * FROM FS_Users WHERE Username='$username'";
$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
$valid=false;
while($row = mysqli_fetch_array($result)) {
	if ($row['PW']==$password){
			$userid = $row['UserID'];
			$valid=true;
			break;
	}
}	

if (!$valid){
	echo "<script>
		alert('Wrong Password or username');
    </script>";
    header("refresh:0.1; url=index.html");
}
else {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['UserID'] = $userid;
	header("refresh:0.1; url=main.php");
}
mysqli_free_result($result);
mysqli_close($conn);

?>
