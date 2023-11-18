<?php
include"koneksi.php";

if(($act=='ubh')||($act=='del'))
{
$cari= "SELECT * FROM `t_m_anggota` WHERE `kd_anggota` LIKE CONVERT ( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$prosess=mysql_query($cari);
$hasil=mysql_fetch_array($prosess);
}

else if($act=='Edit')
{
$edit="UPDATE `t_m_anggota` SET `kd_anggota` = '$kd', `nm_anggota`='$nm',password='$pas',  jns_kelamin='$jk',email='$email', telepon='$tlp', alamat='$alm' WHERE CONVERT( `kd_anggota` USING utf8 ) = '$kd' ";
$prosess2=mysql_query($edit);
//echo $edit;
echo "<script> alert('Data Telah Di Ubah') </script>";
echo "<script> document.location='tampilanggota.php'</script>";
}

else if($act=='Delete')
{
$hapus="DELETE FROM `t_m_anggota` WHERE CONVERT(`kd_anggota` USING utf8) = '$kd' LIMIT 1";
$prohps=mysql_query($hapus);
echo "<script> alert('Data Telah Di Hapus') </script>";
echo "<script> document.location='tampilanggota.php' </script>";

}

else if($act=='Cancel')
{
//echo"<script> alert('Data Batal Di Ubah') </script>";
echo "<script> document.location='tampilanggota.php' </script>";
}
?>
<SCRIPT LANGUAGE="JavaScript">


function validation()
{
var kd=document.frmeditangggota.txtkdjns.value;
if (kd=="")
{
	alert("Anda belum mengisi kode barang");
	document.frmedit.txtkdjns.focus();
	return false;
}
else 
var mr=document.frmPemesan.txtnmjns.value;	
if(mr=="")
{
	alert("Anda belum mengisi merk barang");
	document.frmedit.txtnmjns.focus();
	return false;
}
else 
{
	alert("data tersimpan");
}
}
function konfirmasi()
{
alert("Data Dibatalkan untuk disimpan");
}
</SCRIPT>
<CENTER><FORM METHOD="GET" ACTION="editanggota.php" name="frmEdit">
<INPUT TYPE="hidden" NAME="kd" value="<?php echo $kd;?>">

<TABLE border ="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD>Kode Anggota</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="kd" size="10" maxlength="10" value="<?php echo $kd;?>" readonly="yes"></TD>
</TR>
<TR>
	<TD>Nama Anggota</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="nm" size="30" maxlength="30" value="<?php echo $hasil[1];?>"></TD>
</TR>
<TR>
	<TD>Password</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="password" NAME="pas" size="30" maxlength="30" value="<?php echo $hasil[2];?>"></TD>
</TR>
<TR>
	<TD>Jenis Kelamin</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='jk'><?php
		$eddy="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'jk' USING latin1 )COLLATE latin1_swedish_ci";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			if ($beddy[0]==$hasil[3])
			{echo("<option value=$beddy[0] selected>".$beddy[1]."</option>");}
			else if ($beddy[0]!=$hasil[3])
			{echo("<option value=".$beddy[0].">".$beddy[1]."</option>");}
		}
	?></select></TD>
</TR>
<TR>
	<TD>E-Mail</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="email" size="30" maxlength="30" value="<?php echo $hasil[4];?>"></TD>
<TR>
<TR>
	<TD>Telepon</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="tlp" size="10" maxlength="20" value="<?php echo $hasil[5];?>"></TD>
</TR>
<TR>
	<TD>Alamat</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><TEXTAREA NAME="alm" ROWS="5" COLS="30"><?php echo $hasil[6];?></TEXTAREA></TD>
</TR>
</TABLE>
<BR>
	<INPUT TYPE="submit" value="Edit" name="act" >&nbsp;&nbsp;
	<INPUT TYPE="submit" value="Delete" name="act" >&nbsp;&nbsp;
	<INPUT TYPE="reset" value="Cancel" >&nbsp;&nbsp;
	<A HREF="tampilanggota.php">View Data</A>
</FORM></CENTER>