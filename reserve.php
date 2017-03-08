
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("user");
$strSQL = "INSERT INTO con ";
$strSQL .="(name,email,mes) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["name"]."','".$_POST["email"]."','".$_POST["mes"]."') ";
$objQuery = mysql_query($strSQL);
if($objQuery){
	echo "<script type='text/javascript'>";
	echo "alert('Thank you for Message');";
	echo "window.location = 'index.html'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Error back to send again');";
	echo "</script>";
}
mysql_close($objConnect);
?>
