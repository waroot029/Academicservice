<html>
<head>
<title>ส่วนสำหรับการ Inset ผู้สอนลง SQL</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "academicservicedb";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");
	

	$sql = "INSERT INTO teacher (teacher_name,teacher_detail) 
		VALUES ('".$_POST["Nameteacher "]."','".$_POST["Detailteacher"]."')";



	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
	}
    header("Location: admin_manageteacher.php");
    
	mysqli_close($conn);
?>
</body>
</html>