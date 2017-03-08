<?php
 
session_start();
echo "<meta charset=\"UTF-8\">";
if (isset($_SESSION['membergis']) == isset($_POST['membergis'])) {
 
/*
* include file
*/
include 'config.php';
 
/*
* set var
*/
$email = mysql_real_escape_string(trim($_POST['email']));
$pass = mysql_real_escape_string(trim(md5($_POST['pass'])));
 
/*
* unset var
*/
unset($_SESSION['membergis']);
 
/*
* logical programming&Database
*/
$meSQL = "SELECT id,email,active FROM membergis WHERE email='{$email}' AND pass='{$pass}' AND active != 0";
$meQuery = mysql_query($meSQL);
$meCount = mysql_num_rows($meQuery);
if ($meCount == 1) {
$meResult = mysql_fetch_assoc($meQuery);
$_SESSION['id'] = $meResult['id'];
$_SESSION['email'] = $meResult['email'];
$_SESSION['active'] = $meResult['active'];
$_SESSION['checkSign'] = 'itoffside';
echo "เข้าสู่ระบบสำเร็จ";
echo "<br/>";
echo "<a href='mainpage.php'>ไปหน้าจัดการข้อมูล</a>";
} else {
echo "ไม่สามารถเข้าสู่ระบบได้เนื่องจากรหัสผิดพลาด";
echo "<br/>";
echo "<a href='signin.php'>กลับไปหน้าเดิม</a>";
}
} else {
echo "มีข้อผิดพลาดระหว่าง Session!";
echo "<br/>";
echo "<a href='signin.php'>กลับไปหน้าเดิม</a>";
}
?>