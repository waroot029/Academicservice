<?php include 'header.php';
          session_start();
          include_once 'dbconnect.php';
          $error = false;   //ไว้สำหรับกำหนดค่า error ให้เป็น false หากไม่กำหนด ในช่อง Textbox สมัครสมาชิกจะ error

// [สมัครสมาชิก] Insert  +  ดักค่าที่กรอกข้อมูล
          if (isset($_POST['signup'])) {
            // รับค่า
            $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            $phone = mysqli_real_escape_string($con, $_POST['phone']);
            // ดักค่า
            if (!preg_match("/^[a-zA-Z ก-ฮ]+$/",$firstname)) {
              $error = true;
              $firstname_error = "Name must contain only alphabets and space";
            }
            if (!preg_match("/^[a-zA-Z ก-ฮ]+$/",$lastname)) {
              $error = true;
              $lastname_error = "Name must contain only alphabets and space";
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
              $error = true;
              $email_error = "Please Enter Valid Email ID";
            }
            if(strlen($password) < 6) {
              $error = true;
              $password_error = "Password must be minimum of 6 characters";
            }
            if($password != $cpassword) {
              $error = true;
              $cpassword_error = "Password and Confirm Password doesn't match";
            }
            if (!preg_match("/^[0-9]+$/",$phone)) {
              $error = true;
              $phone_error = "Name must contain only alphabets and space";
            }
            if (!$error) {
            // หากสำเร็จ หรือ ล้มเหลว ให้เด้งเเจ้งเตือนเป็น Popup  
              if(mysqli_query($con, "INSERT INTO users(firstname,lastname,phone,email,password) VALUES('" . $firstname . "','" . $lastname . "','" . $phone . "', '" . $email . "', '" . md5($password) . "')")) {
                echo '<script language="javascript" type="text/javascript"> 
                          alert("สมัครสมาชิกเรียบร้อยแล้ว !");
                          window.location = "index.php";
                      </script>';
              } else {
                echo '<script language="javascript" type="text/javascript"> 
                          alert("ข้อมูลผิดพลาด ! กรุณาตรวจสอบใหม่อีกครั้ง");
                          window.location = "index.php";
                      </script>';
                     }
                         }
                                        }
// [เข้าสู่ระบบ] 
            if (isset($_POST['login'])) {
              $email = mysqli_real_escape_string($con, $_POST['email']);
              $password = mysqli_real_escape_string($con, $_POST['password']);
              $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
              
              //กำหนดให้ ชื่อ Colum ในฐานข้อมูลที่ชื่อ  user_id , firstname เป็น Session ที่ชื่อ user_id และ user_name เอาไว้เด้งชื่อผู้ใช้บนเมนูล็อคอิน
              //โดยหากในฐานข้อมูลที่ชื่อ User_Type เป็น 0 ให้ไปหน้า user แต่หากเป็น 1 ไปหน้า admin

              if ($row = mysqli_fetch_array($result)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['firstname'];
                    if($row['User_Type'] == 0){
                      header("Location: user_home.php");
                                                  }
                      else if($row['User_Type'] == 1){
                      header("Location: admin_index.php");
                                                          }
              } else {
                  echo '<script language="javascript" type="text/javascript"> 
                            alert("รหัสผ่านไม่ถูกต้อง ! กรุณาตรวจสอบใหม่อีกครั้ง");
                            window.location = "index.php";
                        </script>';
                    }
                                        }
?>
<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        text-align: left;
        padding: 8px;
    }

    td {
        text-align: right;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
<!-- [Banner] ภาพปก และข้อความบนภาพ -->
<div class="banner">    	   
    <img src="images/photos/banner.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Academic Service COC</h1>
                <p class="animated fadeInUp">Welcome  to COC-Course.</p>                
            </div>
        </div>
    </div>
</div>


<!-- [Popup แบบฟอร์ม] สมัครสมาชิก , เข้าสู่ระบบ-->
<div id="myModal" class="modal">
  <!-- ฟอร์มหลัก -->
	  <div class="form">
        <ul class="tab-group">
          <li class="tab active"><a href="#signup">สมัครสมาชิก</a></li>
          <li class="tab "><a href="#login">เข้าสู่ระบบ</a></li>
        </ul>
        <div class="tab-content">
            <div id="signup">   
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                    <div class="top-row">
                        <div class="field-wrap">
                            <input type="text" name="firstname" placeholder="ชื่อ " required value="<?php if($error) echo $firstname; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($firstname_error)) echo $firstname_error; ?></span>
                        </div>

                        <div class="field-wrap">
                            <input type="text" name="lastname" placeholder="นามสกุล " required value="<?php if($error) echo $lastname; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($lastname_error)) echo $lastname_error; ?></span>
                        </div>
                    </div>

                        <div class="field-wrap">
                            <input type="text" name="email" placeholder="อีเมลล์ " required value="<?php if($error) echo $email; ?>" class="form-control" />
                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                        </div>
              
                        <div class="field-wrap">
                          <input type="password" name="password" placeholder="รหัสผ่าน " required class="form-control" />
                          <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        </div>
          
                        <div class="field-wrap">
                          <input type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน " required class="form-control" />
                          <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                        </div>
          
                        <div class="field-wrap">
                          <input type="text" name="phone" placeholder="ระบุเบอร์โทรศัพท์ " required class="form-control" />
                          <span class="text-danger"><?php if (isset($phone_error)) echo $phone_error; ?></span>
                        </div>

                      <button type="submit" name="signup" class="button button-block"/>สมัครสมาชิก</button>
                </form>
                      <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div> <!-- ปิด <div id="signup">  -->
          
            <div id="login">   
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                    <div class="field-wrap">
                        <label>
                          Email <span class="req"></span>
                        </label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>
              
                    <div class="field-wrap">
                        <label>
                        Password<span class="req"></span>
                        </label>
                        <input type="password" name="password" placeholder="Your password" required class="form-control" />
                    </div>
                    <p class="forgot"><a href="#">ลืมรหัสผ่าน?</a></p>
              
                    <button class="button button-block" name="login">เข้าสู่ระบบ</button>
                </form>
                      <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
            </div> <!-- ปิด  <div id="login">                -->
        </div>     <!-- ปิด  <div class="tab-content">       -->   
    </div>         <!-- ปิด  </form">                        -->
</div>             <!-- ปิด <div id="myModal" class="modal"> -->


<!-- [เนื้อหา] POPUP คอร์สเรียนแต่ละอัน-->
<div class="container">
    <h2>คอร์สเรียนทั้งหมด</h2>
          <!-- เรียกใช้งาน PHP-->                                
          <?php
              $connect = mysqli_connect("localhost","root","","academicservicedb");
              mysqli_set_charset($connect, "utf8");
                    if (!isset($smtUpdate)) {
                        $sql = 'SELECT * FROM  course INNER JOIN teacher ON course.teacher_ID=teacher.teacher_ID ';
                        // $sql='SELECT Course_ID,Name_Course,Detail_Course,Price,Picture_Banner FROM course';
                        $result = mysqli_query($connect,$sql);
                        $numrows = mysqli_num_rows($result);
                        $numfields = mysqli_num_fields($result);
                        $path = 'images/';   // Path สำหรับเชื่อมไปยังที่เก็บไฟล์รูป
                        
                    if (!$result) {
                        echo '<b>Error</b>'.mysqli_error().'<br>';
                    } elseif ($numrows==0) {
                        echo '<b>Query executed successfully but no row returns!</b>';
                    }else { 
                        while ($row = mysqli_fetch_array($result)) {
                        echo ' 
                            <div class="col-sm-4 wowload fadeInUp"> 
                                <div class="rooms">
                                   <img src="'. $path.$row['Picture_Banner'].'"  width="350px" height="240px">
                                      <div class="info">
                                          <center>  
                                              <h3><b>  
                                                        '.$row['Name_Course'].'
                                              </h3></b>
                                          </center>
                                          <p> 
                                                        '.$row['Detail_Course'].'  
                                          </p>
                                            <br>
                                            ผู้สอน 
                                          
                                            <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_profileteacher.php"> 
                                            <center>
                                            <button style="background-color:#E8E7E0; border:0;">                                
                                                <img src="'. $path.$row['Teacher_Picture'].'"  width="50px" height="50px"  class="img-circle">
                                                &nbsp; &nbsp; <a>'.$row['teacher_name'].'</a>
                                                <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/>   
                                                <input type="hidden" name="idforshow2" value="'.$row['teacher_ID'].'"/>  
                                                </button type="hidden">      
                                            </center>                              
                                            </form>
                                                <br>
                                            <table >
                                            <tr>
                                                    ';
                                                if($row['Level_Course'] == 'ระดับผู้เริ่มต้น'){
                                                echo'
                                                <th> <b> <button class="btn btn-success"> '.$row['Level_Course'].'</button></b> </th>
                                                    ';
                                                }elseif($row['Level_Course'] == 'ระดับปานกลาง'){
                                                    echo'
                                                    <th> <b> <button class="btn btn-warning"> '.$row['Level_Course'].'</button></b> </th>
                                                    ';
                                                }elseif($row['Level_Course'] == 'ระดับสูง'){
                                                    echo'
                                                    <th> <b> <button class="btn btn-danger"> '.$row['Level_Course'].'</button></b> </th>
                                                    ';
                                                }
                                                echo'
                                                <td><font size="6"><a> '.$row['Price'].' </a></font></td>
                                            
                                              
                                            </tr>
                                            </table>
                                        
                                  
                                          <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="user_fullcourse.php">
                                              <input type="hidden" name="idforshow" value="'.$row['Course_ID'].'"/> 
                                              <input type="submit" name="viewfullcourse" class="btn btn-primary btn-large"  value="ดูเพิ่มเติม" onClick="return confirmUpdate();">
                                          </form>      
                                      </div>
                                </div>
                            </div>';
                            }
                    
                        }
                    }    
              mysqli_close($connect);
          ?>
</div>


<!-- [เชื่อม] ส่วนของ footer -->
<?php include 'footer.php';?>


<!-- [เชื่อม] JS เพื่อเวลากดแล้วเด้งของ Popup ของสมัครสมาชิก 
        ** ต้องไว้ตรงนี้หากไปไว้ใน header จะไม่ทำงาน **     -->
        
<script src="js/popupForSignupAndSignin.js"></script>



