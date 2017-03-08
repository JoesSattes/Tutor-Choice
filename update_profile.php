<?php
session_start();
if (isset($_SESSION['checkSign']) == 'itoffside') {
/*
* include file
*/
include 'config.php';
 
/*
* set var
*/
$_SESSION['frmAction'] = md5('itoffside.com' . rand(1, 9999));
 
/*
* logical programming&Database
*/
$meSQL = "SELECT * FROM member WHERE id='{$_SESSION['id']}' ";
$meQuery = mysql_query($meSQL);
if ($meQuery == TRUE) {
$meResult = mysql_fetch_assoc($meQuery);
} else {
echo 'error';
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>แก้ไขข้อมูล <?php echo $meResult['username']; ?></title>
</head>
<body>
<h3>หน้าแรกระบบจัดการสมาชิก</h3>
<ul>
<li><a href="mainpage.php">หน้าแรก</a></li>
<?php
if ($_SESSION['active'] == 2) {
?>
<li><a href="manager_user.php">จัดการผู้ใช้งาน</a></li>
<?php } ?>
<li><a href="update_profile.php">แก้ไขข้อมูลส่วนตัว</a></li>
<li><a href="signout.php">ออกจากระบบ</a></li>
</ul>
<hr/>
<h4>จัดการข้อมูลส่วนตัว</h4>
<form name="update_profile-action" action="update_profile-action.php" method="POST">
<table border="1" cellpadding="5">
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">ไอดี</td>
<td><input type="text" name="id" value="<?php echo $meResult['id']; ?>" size="40" readonly="readonly" disabled="disabled" /></td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">ชื่อผู้ใช้งาน</td>
<td><input type="text" name="username" value="<?php echo $meResult['username']; ?>" size="40" readonly="readonly" disabled="disabled" /></td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">ชื่อจริง</td>
<td><input type="text" name="firstname" value="<?php echo $meResult['firstname']; ?>" size="40" /></td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">นามสกุลจริง</td>
<td><input type="text" name="lastname" value="<?php echo $meResult['lastname']; ?>" size="40" /></td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">เพศ</td>
<td>
<input type="radio" name="sex" value="1"
<?php
if ($meResult['sex'] == 1) {
echo 'checked';
}
?>
/>ชาย |
<input type="radio" name="sex" value="2"
<?php
if ($meResult['sex'] == 2) {
echo 'checked';
}
?>
/>หญิง
</td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">เบอร์โทรศัพท์</td>
<td><input type="text" name="phone" value="<?php echo $meResult['phone']; ?>" size="40" /></td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">อีเมล์</td>
<td><input type="text" name="email" value="<?php echo $meResult['email']; ?>" size="40" /></td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">สถานะการใช้งาน</td>
<td>
<div id="fb-root"></div>  
<script>(function(d, s, id) {  
  var js, fjs = d.getElementsByTagName(s)[0];  
  if (d.getElementById(id)) {return;}  
  js = d.createElement(s); js.id = id;  
  js.src = "//connect.facebook.net/th_TH/all.js#xfbml=1";  
  fjs.parentNode.insertBefore(js, fjs);  
}(document, 'script', 'facebook-jssdk'));  
</script>  
  
<!-- ด้านล่างใส่ข้อมูลเกี่ยวกับกล่อง COMMENT ดังนี้  
data-href คือ URL ของหน้าเว็บเพจที่ต้องการให้มีกล่อง Comment  
data-num-posts คือ จำนวน Comment ต่อหน้า  
data-width คือ ความกว้างของกล่อง Comment  
-->  
<center><div class="fb-comments" data-href="https://www.facebook.com/tutorchoice.th/" data-num-posts="10" data-width="500"></div></center>  
<?php
if ($meResult['active'] == 1 OR $meResult['active'] == 2) {
echo 'เปิดการใช้งาน';
} else {
echo 'ปิดการใช้งาน';
}
?>
</td>
</tr>
<tr>
<td style="text-align: right;width: 200px; font-weight: bold">วันที่สร้าง</td>
<td><?php echo $meResult['create_date']; ?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="บันทึกข้อมูล" /></td>
</tr>
</table>
<input type="hidden" name="frmAction" value="<?php echo $_SESSION['frmAction']; ?>" />
</form>
</body>
</html>
<?php
mysql_close();
} else {
echo "<meta charset=\"UTF-8\">";
echo "คุณไม่ได้เข้าสู่ระบบ กรุณาเข้าสู่ระบบก่อน!";
echo "<br/>";
echo "<a href='signin.php'>คลิกเพื่อเข้าสู่ระบบ</a>";
}
?>