<html>
<head>
<title>ส่วนสำหรับการ Inset คอร์สเรียนลง SQL</title>
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
	

	$sql = "INSERT INTO course (Name_Course,Detail_Course,Price,Start_Course,End_Course,Course_Benfit,Content_Course) 
		VALUES ('".$_POST["Name"]."','".$_POST["Detail"]."','".$_POST["Price"]."','".$_POST["checkin"]."','".$_POST["checkout"]."','".$_POST["Benfit"]."','".$_POST["Content"]."')";



	$query = mysqli_query($conn,$sql);

	if($query) {
		echo "Record add successfully";
	}
    header("Location: admin_managecourse.php");
    
	mysqli_close($conn);
?>
</body>
</html>