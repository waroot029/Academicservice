<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../others/style.css">
</head>
<body>
    <?php
        $connect = mysqli_connect("localhost","root","","academicservicedb");
        $sql = 'DELETE FROM course WHERE Course_ID='.$_POST['idfordelete'];
        $result = mysqli_query($connect,$sql);
        if (!$result) {
            echo mysqli_error();
            die('Can not access database!');
        } else {
            echo '<script language="javascript" type="text/javascript"> 
		    alert("สำเร็จ ! ทำการลบคอร์สเรียนเรียบร้อยแล้ว");
		    window.location = "admin_managecourse.php";
            </script>';
            // include "admin_managecourse.php";

        }
    ?>
</body>
</html>