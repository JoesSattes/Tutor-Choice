<?php
 session_start();
 header ('Content-type: text/html; charset=utf-8');
 
 mysql_connect("localhost","root","");  //ข้อมูลนี้ได้มาจากตอนติดตั้งเว็บเซิร์ฟเวอร์
 mysql_select_db("user");
 
 $username = isset($_POST['name']) ? $_POST['name'] : '';
 $password = isset($_POST['pass']) ? $_POST['pass'] : '';
 
 $strSQL = "SELECT * FROM membergis WHERE name = '".mysql_real_escape_string($username)."' 
 AND pass = '".mysql_real_escape_string($password)."'";
 $qry = mysql_query($strSQL) or die('ไม่สามารถเชื่อมต่อฐานข้อมูลได้ Error : '. mysql_error());
 $row = mysql_fetch_assoc($qry);
 if(!$row)
 {
   echo "<script type='text/javascript'>";
	echo "alert('ชื่หรือรหัสผ่านไม่ถูกต้อง ลองอีกครั้ง');";
	echo "window.location = 'login-page.php'; ";
	echo "</script>";
 }
 else
 {
   //สร้าง SESSION เพื่อใช้ในหน้าอื่น ที่ต้องการตรวจสอบข้อมูลผู้ใช้ในขณะนั้น
  echo "<script type='text/javascript'>";
	echo "alert('Log in Successful');";
	echo "window.location = 'member.html'; ";
	echo "</script>";

   session_write_close();//สิ้นสุดการทำงานของ SESSION ในหน้านี้


 }
 mysql_close();//ปิดการเชื่อมต่อฐานข้อมูล
?>