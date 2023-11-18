<?php
include "koneksi.php";

if ($cmdsimpan=="simpan")
{
$sql="INSERT INTO `t_m_ref` ( `kode` , `nama` , `grup` )VALUES ('$kdb', '$nmb', '$grup')";

$hsl=mysql_query($sql);
//echo $sql;
//	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>window.reload('bank.php')</script>";
	echo "<script>document.location='bank.php'</script>";
}
?>
<script language="javascript">
function validation()
{
var kode=document.frmbank.kdb.value;
	if(kode=="")
 	{
	alert("anda belum mengisi kode barang");
	document.frmbank.kdb.focus();
	return false;
	}
var nama=document.frmbank.nmb.value;
	if(nama=="")
 	{
	alert("anda belum mengisi nama barang");
	document.frmbank.nmb.focus();
	return false;
	}
else
	{alert("Data Tersimpan");
	document.frmbank.focus();
	return true;
	}
}
</script>

<CENTER><form action="bank.php" method="get" name="frmbank">
<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="4"><H1><font size="5"><B><CENTER>Data Bank</CENTER></B></font></H1></TD>
</TR>
<TR>
	<TD><B>Kode</B></TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="kdb" size="10"></TD>
	<TD>Diisi Dengan Nama Singkatan Bank, misal: BRI, MANDIRI</TD>
</TR>
<TR>
	<TD><B>Nama Bank</B></TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="nmb" size="30" maxlength="30"></TD>
	<TD>Diisi Dengan Nama Lengkap Bank, misal: Bank Mandiri, Bank Indonesia</TD>
</TR>
<TR>
	<TD><B>Group</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="grup" value="bank" readonly="yes"></TD>
	<TD></TD>
</TR>
<TR>
	<TD colspan=4>
<CENTER><INPUT TYPE="submit" name="cmdsimpan" value="simpan" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="reset" name="cmdreset" value="reset">&nbsp;&nbsp;<A HREF="editrek.php">Kembali Ke Tabel Edit Rekening</A></CENTER></TD>
</TABLE>
</FORM></CENTER>