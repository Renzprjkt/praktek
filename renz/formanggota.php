<?php
include "koneksi.php";
$panji = "SELECT max(kd_anggota) FROM `t_m_anggota`";
$jono = mysql_query($panji);
$joko = mysql_fetch_array($jono);
$bambang =(substr($joko[0],2,10)*1)+1;
if ($cmdsimpan=="Save")
{	$pas=md5($pas);
$sql="INSERT INTO `t_m_anggota` ( `kd_anggota` , `nm_anggota` , `password` , `jns_kelamin` , `email` , `telepon` ,`alamat` )VALUES ('$kd', '$nm', '$pas', '$jk', '$email', '$tlp', '$alm')";
$hsl=mysql_query($sql);

$sql3="INSERT INTO `t_login` ( `user_name` , `password` , `kd_domain` , `name` ) VALUES ('$email', '$pas', '$dmd', '$nm')";
$hsl3=mysql_query($sql3);

//echo $sql;
//	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>window.reload('formanggota.php')</script>";
	echo "<script>document.location='formanggota.php'</script>";
	//echo "<script>document.location='inputlogin.php?email=$txtuser'</script>";
}
?>
<script language="javascript">
function validation()
{
var kode=document.frmanggota.kd.value;
	if(kode=="")
 	{
	alert("anda belum mengisi kode anggota");
	document.frmanggota.kd.focus();
	return false;
	}
var nama=document.frmanggota.nm.value;
	if(nama=="")
 	{
	alert("anda belum mengisi nama");
	document.frmanggota.nm.focus();
	return false;
	}
var pasword=document.frmanggota.pas.value;
	if(pasword=="")
 	{
	alert("anda belum mengisi password");
	document.frmanggota.pas.focus();
	return false;
	}
var jkt=document.frmanggota.jk.value;
	if(jkt=="")
 	{
	alert("anda belum mengisi jenis kelamin");
	document.frmanggota.jk.focus();
	return false;
	}
var mail=document.frmanggota.email.value;
	if(mail=="")
 	{
	alert("anda belum mengisi email");
	document.frmanggota.email.focus();
	return false;
	}
var tlpn=document.frmanggota.tlp.value;
	if(tlpn=="")
 	{
	alert("anda belum mengisi telepon");
	document.frmanggota.tlp.focus();
	return false;
	}
	else if(tlpn/tlpn !='1')
	{
		alert("Maaf, Nomor Telepon Harus Angka");
		document.frmanggota.tlp.focus();
		document.frmanggota.tlp.value="";
		return false;
	}
var almt=document.frmanggota.alm.value;
	if(almt=="")
 	{
	alert("anda belum mengisi alamat");
	document.frmanggota.alm.focus();
	return false;
	}
else
	{alert("Data Tersimpan");
	document.frmanggota.focus();
	return true;
	}
}
</script>
<CENTER><FORM name="frmanggota" METHOD="GET" ACTION="formanggota.php">
<FONT COLOR="white"><TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<INPUT TYPE="hidden" NAME="dmd" size="10" maxlength="10"  value="AGT" readonly="yes">
<TR>
	<TD colspan="3"><H1><CENTER><font size="5">Data Anggota</font></CENTER></H1></TD>
</TR>
<TR>
	<TD><B>Kode Anggota</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="kd" size="10" maxlength="10"  value="<?php echo'AG'.$bambang ?>" readonly="yes"></TD>
</TR>
<TR>
	<TD><B>Nama Anggota</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="nm" size="30" maxlength="30"></TD>
</TR>
<TR>
	<TD><B>Password</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="password" name="pas" maxlength="40" size="20" value=""></TD>
</TR>
<TR>
	<TD><B>Jenis Kelamin</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='jk'><?php
		$eddy="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'jk' USING latin1 )COLLATE latin1_swedish_ci";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			echo("<option value=".$beddy[0].">".$beddy[1]."</option>");
		}
	?></select></TD>
</TR>
<TR>
	<TD><B>E-mail</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="email" size="30" maxlength="30"></TD>
<TR>
<TR>
	<TD><B>Telepon</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="tlp" size="30" maxlength="20"></TD>
</TR>
<TR>
	<TD><B>Alamat</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><TEXTAREA NAME="alm" ROWS="5" COLS="30"></TEXTAREA></TD>
</TR>
</TABLE></FONT>
<BR>
<INPUT TYPE="submit" name="cmdsimpan" value="Save" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="reset" name="cmdreset" value="Reset">&nbsp;&nbsp;
<?php if ($key!='usr')?>
<!-- <A HREF="tampilanggota.php">View Data</A> -->

</FORM></CENTER>