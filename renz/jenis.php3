<?php
include "koneksi.php";
if ($cmdsimpan=="simpan")
{
$sql="INSERT INTO `t_m_jenis_sparepart` ( `kd_sparepart` , `nm_sparepart` ) VALUES ('$kd', '$nm')";
$hsl=mysql_query($sql);
echo $sql;
	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>window.reload('maintain.php')</script>";
	echo "<script>document.location='maintain.php'</script>";
}
?>
<script language="javascript">
function validation()
{
var kode=document.frmjnssparepart.kd.value;
	if(kode=="")
 	{
	alert("anda belum mengisi kode sparepart");
	document.frmjnssparepart.kd.focus();
	return false;
	}
var nama=document.frmjnssparepart.nm.value;
	if(nama=="")
 	{
	alert("anda belum mengisi nama sparepart");
	document.frmjnssparepart.nm.focus();
	return false;
	}
else
	{alert("Data Tersimpan");
	document.frmjnssparepart.focus();
	return true;
	}
}
</script>

<CENTER><FORM name="frmjnssparepart" METHOD="get" ACTION="jenissparepart.php">
<TABLE bgcolor="#0066FF" border="2" color="#FFFF00">
<TR>
	<TD colspan="3"><H1>Maintain Jenis Sparepart</H1></TD>
</TR>
<TR>
	<TD>Kode Sparepart</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="kd" size="10" maxlength="5"></TD>
</TR>
<TR>
	<TD>Nama Sparepart</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="nm" size="30" maxlength="30"></TD>
</TR>
</TABLE>
<BR>
<INPUT TYPE="submit" name="cmdsimpan" value="SAVE" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="reset" name="cmdreset" value="RESET">&nbsp;&nbsp;<A HREF="tampil.php">Look Files</A>
</FORM></CENTER>