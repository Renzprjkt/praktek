<font face="arial narrow"><?php
include "koneksi.php";

$br="SELECT max( `username` ) FROM `t_login_anggota` ";

if($save=="SAVE")
{
$ps=md5($txtpass);
$sql="INSERT INTO `t_login_anggota` ( `username` , `password` , `kd_domain` ) VALUES ('$txtuser', '$ps', '$txtdom');";
$hsl=mysql_query($sql);
echo $sql;
		echo "<script>alert('Data Sudah Tersimpan')</script>";
		echo "<script>document.location='index.php'</script>";
}
?>

<script language="javascript">
function validation()
{
var us=document.frminput.txtuser.value;
	if(us=="")
 	{
	alert("Anda Belum Mengisi Nama User Id Kmu");
	document.frminput.txtuser.focus();
	return false;
	}
var ps=document.frminput.txtpass.value;
	if(ps=="")
 	{
	alert("Anda Belum Mengisi Password");
	document.frminput.txtpass.focus();
	return false;
	}
var nm=document.frminput.txtdom.value;
	if(nm=="")
 	{
	alert("Anda Belum Mengisi Nama Anda");
	document.frminput.txtdom.focus();
	return false;
	}
}
</script>

<form name="frminput" method="GET">
<INPUT TYPE="hidden" NAME="txtdomain" size="10" maxlength="15" value="AGT">
<TABLE width="239" border=2 align="center">
<TR>
	<TD colspan="3" bgcolor="red"><center><h4>FORM LOGIN</h4></center></TD>
</TR>
<TR>

	<TD>UserName</TD>
	<TD><INPUT TYPE="text" NAME="txtuser" size="25" maxlength="30" value="<?php echo $txtuser;?>"></TD>
</TR>
<TR>
	<TD>Password</TD>
	<TD><INPUT TYPE="password" NAME="txtpass" size="25" maxlength="50"></TD>
</TR>
<TR>
	<TD colspan="3"><center><INPUT TYPE="submit" name="save" value="SAVE" onClick="return validation();">
	&nbsp;&nbsp
							<INPUT TYPE="reset" name="batal" value="RESET">
</TR>
</TABLE></form>
</font>