<?php
include "koneksi.php";
$panji = "SELECT max(kd_jns) FROM `t_m_jenis`";
$jono = mysql_query($panji);
$joko = mysql_fetch_array($jono);
$bambang =(substr($joko[0],2,10)*1)+1;

if ($cmdsimpan=="simpan")
{
$sql="INSERT INTO `t_m_jenis` ( `kd_jns` , `nm_jns` , `status` )VALUES ('$kdj', '$nmj', '$sts')";

$hsl=mysql_query($sql);
//echo $sql;
//	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>window.reload('jns.php')</script>";
	echo "<script>document.location='jns.php'</script>";
}
?>
<script language="javascript">
function validation()
{
var kode=document.frmjns.kdj.value;
	if(kode=="")
 	{
	alert("anda belum mengisi kode barang");
	document.frmjns.kdj.focus();
	return false;
	}
var nama=document.frmjns.nmj.value;
	if(nama=="")
 	{
	alert("anda belum mengisi nama barang");
	document.frmjns.nmj.focus();
	return false;
	}
else
	{alert("Data Tersimpan");
	document.frmjns.focus();
	return true;
	}
}
</script>

<CENTER><form action="jns.php" method="post" name="frmjns" enctype='multipart/form-data'>
<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="3"><H1><font size="5"><B><CENTER>Data Jenis Barang</CENTER></B></font></H1></TD>
</TR>
<TR>
	<TD><B>Kode Jenis</B></TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="kdj" size="10" maxlength="10" value="<?php echo 'JN'.$bambang ?>" readonly="yes"></TD>
</TR>
<TR>
	<TD><B>Nama Jenis</B></TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="nmj" size="30" maxlength="30"></TD>
</TR>
<TR>
	<TD><B>Status</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='sts'><?php
		$eddy="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'status' USING latin1 )COLLATE latin1_swedish_ci";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			if ($beddy[1]==$hasil[3])
			{echo("<option value=$beddy[0] selected>".$beddy[1]."</option>");}
			else if ($beddy[1]!=$hasil[3])
			{echo("<option value=".$beddy[1].">".$beddy[1]."</option>");}
		}
	?></select></TD>
</TR>
</TABLE>
<BR>
<INPUT TYPE="submit" name="cmdsimpan" value="simpan" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="reset" name="cmdreset" value="reset">&nbsp;&nbsp;<A HREF="tampiljenis.php">Tampil Data</A>
</FORM></CENTER>