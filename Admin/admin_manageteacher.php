
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">

<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8">

        <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="height:170px">
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'manageteacher')">       จัดการผู้สอน</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'addteacher')">          เพิ่มผู้สอน</button>
          </div>
          
          <div style="margin-left:200px">
            <div id="manageteacher" class="w3-container city" style="display:none">
                    <?php
                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                            mysqli_set_charset($connect, "utf8");
                            
                            if (!isset($smtUpdate)) {
                                $sql='SELECT teacher_ID,teacher_name,teacher_detail  FROM teacher';
                                $result = mysqli_query($connect,$sql);
                                $numrows = mysqli_num_rows($result);
                                $numfields = mysqli_num_fields($result);
                                if (!$result) {
                                    echo '<b>Error</b>'.mysqli_error().'<br>';
                                } elseif ($numrows==0) {
                                    echo '<b>Query executed successfully but no row returns!</b>';
                                }else { 
                                    while ($row = mysqli_fetch_array($result)) {
                                        
                                 // มีทั้งหมด 2 ฟอร์ม ฟอร์มแรก ส่งไปยัง update ฟอร์มสองส่งไปยัง Delete       
                                echo '  <div class="col-sm-6 wowload fadeInUp">
                                                <div class="rooms"><img src="images/photos/con1.jpg" class="img-responsive" >
                                                                 <div class="info"><h3>  '.$row['teacher_name'].' </h3>
                                                                                     <p> '.$row['teacher_detail'].'  <h3>  
                                                                             </h3></p>
                                
                                                            </div>
                                                &nbsp; 
                                                <form name="frmUpdate'.$row['teacher_ID'].'" method="post"  action="admin_updateteacher.php">.
                                                  <input type="hidden" name="idforupdate" value="'.$row['teacher_ID'].'"\> 
                                                 <th><input type="submit" name="smtUpdate" class="btn btn-primary btn-large"  value="แก้ไข" onClick="return confirmUpdate();">
                                                 </form>


                                                 <form name="frmUpdate'.$row['teacher_ID'].'" method="post" action="admin_deleteteacher.php">.
                                                  <input type="hidden" name="idfordelete" value="'.$row['teacher_ID'].'"> 
                                                 <th><input type="submit" name="smtDelete" class="btn btn-danger btn-large" value="ลบ" onClick="return confirmUpdate();"></th>
                                                 </form>

                                                </div>
                                        </div>';
                                    }
                                    echo '</table>';
                                }
                            }    
                            mysqli_close($connect);
                ?>
        
            </div>
            <div id="addteacher" class="w3-container city" style="display:none">
                                    <form action="admin_addteacher.php" name="frmAdd" method="post">
                                        <div class="login-form">
                                                <div class="form-group">
                                                    <!-- <label for="Room Remake" class="col-sm-4 col-form-label">ภาพปก</label>
                                                        <input type="text" class="form-control login-field"  placeholder="ระบุชื่อของคอร์ส" id="Name" name="Name"/>
                                                    </div> -->

                                                    <div class="form-group">
                                                    <label for="Price" class="col-sm-4 col-form-label">ชื่อผู้สอน</label>
                                                        <input type="text" class="form-control login-field" placeholder="ชื่อผู้สอน" id="Nameteacher" name="Nameteacher" />  
                                                    </div>

                                                    <div class="form-group">
                                                    <!-- <label for="Detail" class="col-sm-4 col-form-label">รูปโปรไฟล์</label>
                                                        <input type="text" class="form-control login-field"  placeholder="ราคา" id="Price" name="Price" />  
                                                    </div> -->

                                                    <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">รายละเอียด/ประวัติผู้สอน</label>
                                                         <input type="text" class="form-control login-field" placeholder="รายละเอียดและประวัติของผู้สอน" id="Detailteacher" name="Detailteacher" />  
                                                    </div>

                                                        <!-- <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">คอร์สที่เกี่ยวข้อง</label>
                                                        <input type="text" class="form-control login-field" placeholder="รายละเอียดของคอร์สเรียน" id="Detail" name="Detail" />  
                                                    </div> -->

                                                        <input button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="เพิ่มผู้สอน"></button>
                                        </div>
                                    </form>
            </div>
       </div>
</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


<!-- JS สำหรับ เมนู Tab ด้านบน -->          
          <script>
          function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-red";
          }
          </script>
        
    </div>      <!--ปิด   <div class="w3-container w3-content w3-padding-64" style="max-width:1500px" id="band">  -->
        
            </div>
	    </div>
    </div>
</div>



<?php include 'footer.php';?>
