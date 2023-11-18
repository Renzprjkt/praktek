<?php
include"koneksi.php";

if(($act=='ubh')||($act=='del'))
{
$cari= "SELECT * FROM `t_m_jenis` WHERE `kd_jns` LIKE CONVERT ( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$prosess=mysql_query($cari);
$hasil=mysql_fetch_array($prosess);
}

else if($act=='Edit')
{
$edit="UPDATE `t_m_jenis` SET `kd_jns` = '$txtkdjns', `nm_jns` = '$txtnmjns', status='$sts' WHERE CONVERT( `kd_jns` USING utf8 ) = '$kd' ";
$prosess2=mysql_query($edit);
//echo $edit;
echo "<script> alert('Data Telah Di Ubah') </script>";
echo "<script> document.location='tampiljenis.php'</script>";
}

else if($act=='Delete')
{
$hapus="DELETE FROM `t_m_jenis` WHERE CONVERT(`kd_jns` USING utf8) = '$kd' LIMIT 1";
$prohps=mysql_query($hapus);
echo "<script> alert('Data Telah Di Hapus') </script>";
echo "<script> document.location='tampiljenis.php' </script>";

}

else if($act=='Cancel')
{
//echo"<script> alert('Data Batal Di Ubah') </script>";
echo "<script> document.location='tampiljenis.php' </script>";
}
?>
<SCRIPT LANGUAGE="JavaScript">


function validasi()
{
var kd=document.frmedit.txtkdjns.value;
if (kd=="")
{
	alert("Anda belum mengisi kode barang");
	document.frmedit.txtkdjns.focus();
	return false;
}
else 
var mr=document.frmedit.txtnmjns.value;	
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
<CENTER><FORM METHOD="get" ACTION="editjns.php" name="frmEdit">
<INPUT TYPE="hidden" NAME="kd" value="<?php echo $kd;?>">


<TABLE border ="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="3"><CENTER><FONT  SIZE="5" face="algerian">Tabel Edit Master  Jenis</FONT></CENTER></TD>
</TR>
<TR>
	<TD>Kode Jenis</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="txtkdjns" maxlength="20" value="<?php echo $kd;?>" readonly="yes"></TD>
</TR>
<TR>
	<TD>Nama Jenis</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="txtnmjns" maxlength="40" value="<?php echo $hasil[1];?>"></TD>
</TR>
<TR>
	<TD>Status</TD>
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
	<INPUT TYPE="submit" value="Edit" name="act" >&nbsp;&nbsp;
	<!-- <INPUT TYPE="submit" value="Delete" name="act" >&nbsp;&nbsp; -->
	<INPUT TYPE="reset" value="Cancel" >&nbsp;&nbsp;
	<A HREF="tampiljenis.php">View Data</A>
</FORM></CENTER>