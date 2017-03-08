<?php
//กำหนดตัวแปรเพื่อนำไปใช้งาน
$hostname = "localhost"; //ชื่อโฮสต์
$user = "root"; //ชื่อผู้ใช้
$password = ""; //รหัสผ่าน
$dbname = "user"; //ชื่อฐานข้อมูล
$tblname = "contact"; //ชื่อตาราง
// เริ่มติดต่อฐานข้อมูล
mysql_connect($hostname, $user, $password) or die("ติดต่อฐานข้อมูลไม่ได้");
// เลือกฐานข้อมูล
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้");
// คำสั่ง SQL และสั่งให้ทำงาน
$sql = "insert into $tblname (name, email, message) values ('$name', '$email', '$message')"; // กำหนดคำสั่ง SQL เพื่อเพิ่มข้อมูลแบบคีย์ในคำสั่ง SQL
$dbquery = mysql_db_query($dbname, $sql);
// ปิดการติดต่อฐานข้อมูล
mysql_close();
echo "<Font Size=4><B>เพิ่มข้อมูลลงฐานข้อมูลเรียบร้อยแล้ว</B>";
?>