
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");


$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET order_no = "'.$_POST['cuid'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Course_ID = "'.$_POST['cid'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Status = "กำลังตรวจสอบ" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Channel_pay = "'.$_POST['channelpay'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Date_pay = "'.$_POST['datepay'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Time_pay = "'.$_POST['datetime'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course_user INNER JOIN course ON course.Course_ID=course_user.Course_ID SET Picture_pay = "'.$_POST['imgbillpayment'].'" WHERE course_user_ID = "'.$_POST["orderno"].'"';
$result = mysqli_query($connect,$sql);

// อันเก่าของมาดี
// $sql = 'UPDATE `course` SET `Course_ID`='.$_POST['cid'].',`Name_Course`="'.$_POST['nc'].'",`Detail_Course`='.$_POST['dc'].',`Price`="'.$_POST['p'].',`Start_Course`="'.$_POST['sc'].',`End_Course`="'.$_POST['ec'].',`Course_Benfit`="'.$_POST['cb'].',`Content_Course`="'.$_POST['cc'].'" WHERE `Course_ID`= '.$_POST['idforupdate'];


$result = mysqli_query($connect,$sql);
if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
		    alert("แจ้งชำระโอนเรียบร้อยแล้วค่ะ !");
		    window.location = "stats_pay.php";
            </script>';
} else {
    echo 'No Complete';
}

// header("Location: admin_managecourse.php");

mysqli_close($connect);
?>
