
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">

<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8">

        <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="height:170px">
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'managecourse')">       จัดการคอร์สเรียน</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'managecertificate')">  จัดการเกียรติบัตร</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'statuscourse')">       สถานะคอร์ส</button>
            <button class="w3-bar-item w3-button tablink" onclick="openCity(event, 'addcourse')">          เพิ่มคอร์สเรียน</button>
          </div>
          
          <div style="margin-left:200px">
            <div id="managecourse" class="w3-container city" style="display:none">
                    <?php
                            $connect = mysqli_connect("localhost","root","","academicservicedb");
                            mysqli_set_charset($connect, "utf8");
                            
                            if (!isset($smtUpdate)) {
                                $sql='SELECT Course_ID,Name_Course,Detail_Course,Price,Picture_Banner FROM course';
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
                                                                 <div class="info"><h3>  '.$row['Name_Course'].' </h3>
                                                                                     <p> '.$row['Detail_Course'].'  <h3>  '.$row['Price'].' 
                                                                             </h3></p>
                                
                                                            </div>
                                                &nbsp; 
                                                <form name="frmUpdate'.$row['Course_ID'].'" method="post"  action="admin_updatecourse.php">.
                                                  <input type="hidden" name="idforupdate" value="'.$row['Course_ID'].'"\> 
                                                 <th><input type="submit" name="smtUpdate" class="btn btn-primary btn-large"  value="แก้ไข" onClick="return confirmUpdate();">
                                                 </form>


                                                 <form name="frmUpdate'.$row['Course_ID'].'" method="post" action="admin_deletecourse.php">.
                                                  <input type="hidden" name="idfordelete" value="'.$row['Course_ID'].'"> 
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

            <div id="managecertificate" class="w3-container city" style="display:none">
                 
                        
            </div>

            <div id="statuscourse" class="w3-container city" style="display:none">
                   
                                   
           </div>

            <div id="addcourse" class="w3-container city" style="display:none">
                                    <form action="admin_addcourse.php" name="frmAdd" method="post">
                                        <div class="login-form">
                                                <div class="form-group">
                                                    <label for="Room Remake" class="col-sm-4 col-form-label">ชื่อคอร์ส</label>
                                                        <input type="text" class="form-control login-field"  placeholder="ระบุชื่อของคอร์ส" id="Name" name="Name"/>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="Price" class="col-sm-4 col-form-label">รายละเอียด</label>
                                                        <input type="text" class="form-control login-field" placeholder="รายละเอียดของคอร์สเรียน" id="Detail" name="Detail" />  
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">ราคา</label>
                                                        <input type="text" class="form-control login-field"  placeholder="ราคา" id="Price" name="Price" />  
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">เริ่ม</label>
                                                        <input type="date" class= "form-control" name="checkin"  value="" >
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">สิ้นสุด</label>
                                                    <input type="date" class= "form-control" name="checkout"  value=""><br>
                                                    </div>

                                                    <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">สิ่งที่คุณจะได้รับ</label>
                                                        <input type="textarea" class="form-control login-field"  placeholder="สิ่งที่ผู้เรียนจะได้รับ" id="Benfit" name="Benfit" />  
                                                    </div>

                                                        <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">เนื้อหาคอร์ส</label>
                                                        <input type="textarea" class="form-control login-field"  placeholder="ระบุเนื้อหาของคอร์สเรียน" id="Content" name="Content" />  
                                                    </div>

                                                        <!-- <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">รายละเอียดผู้สอน</label>
                                                        <input type="textarea" class="form-control login-field"  placeholder="เพิ่มรายละเอียดผู้สอน" id="txtDetail" name="txtDetail" />  
                                                    </div>

                                                        <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">หมวดหมู่</label>
                                                        <input type="text" class="form-control login-field"  placeholder="หมวดหมู่ที่เกี่ยวข้อง" id="txtDetail" name="txtDetail" />  
                                                    </div> -->

                                                        <input button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" value="เพิ่มคอร์สเรียน"></button>
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
