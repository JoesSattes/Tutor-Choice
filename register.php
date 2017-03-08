
<?php
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("user");
$strSQL = "INSERT INTO membergis ";
$strSQL .="(name,email,pass) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["name"]."','".$_POST["email"]."','".$_POST["pass"]."') ";
$objQuery = mysql_query($strSQL);
if($objQuery){
	echo "<script type='text/javascript'>";
	echo "alert('Register Successful');";
	echo "window.location = 'index.html'; ";
	echo "</script>";
	}
	else{
	echo "<script type='text/javascript'>";
	echo "alert('Someting Wrong Plese Try Agian');";
	echo "</script>";
}
mysql_close($objConnect);
?>
