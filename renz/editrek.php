<?php
include"koneksi.php";

if(($act=='ubh')||($act=='del'))
{
$cari= "SELECT * FROM `t_rekening_kami` WHERE `rekening` LIKE CONVERT ( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$prosess=mysql_query($cari);
$hasil=mysql_fetch_array($prosess);
}

else if($act=='Edit')
{
$edit="UPDATE `t_rekening_kami` SET `rekening` = '$txtrek', bankkami='$bank' WHERE CONVERT( `rekening` USING utf8 ) = '$txtrek' LIMIT 1 ";
$prosess2=mysql_query($edit);
//echo $edit;
echo "<script> alert('Data Telah Di Ubah') </script>";
echo "<script> document.location='tampilrek.php'</script>";
}

else if($act=='Delete')
{
$hapus="DELETE FROM `t_rekening_kami` WHERE CONVERT(txtrek USING utf8) = '$kd' LIMIT 1";
$prohps=mysql_query($hapus);
echo "<script> alert('Data Telah Di Hapus') </script>";
echo "<script> document.location='tampilrek.php' </script>";

}

else if($act=='Cancel')
{
//echo"<script> alert('Data Batal Di Ubah') </script>";
echo "<script> document.location='tampilrek.php' </script>";
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
<CENTER><FORM METHOD="get" ACTION="editrek.php" name="frmEdit">
<INPUT TYPE="hidden" NAME="kd" value="<?php echo $kd;?>">


<TABLE border ="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="3"><CENTER><FONT  SIZE="5" face="algerian">Tabel Edit Rekening Astro</FONT></CENTER></TD>
</TR>
<TR>
	<TD>Nomor Rekening</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="txtrek" maxlength="20" value="<?php echo $kd;?>"></TD>
</TR>
<TR>
	<TD>Nama Bank</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='bank'><?php
		$eddy="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'bank' USING latin1 )COLLATE latin1_swedish_ci";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			if ($beddy[1]==$hasil[1])
			{echo("<option value=$beddy[0] selected>".$beddy[1]."</option>");}
			else if ($beddy[1]!=$hasil[1])
			{echo("<option value=".$beddy[1].">".$beddy[1]."</option>");}
		}
	?></select></TD>
</TR>
<TR>
	<TD colspan=3>Jika Nama Bank Tidak Tersedia, Silahkan Tambahkan <a href="bank.php">Disini</a></TD>
</TABLE>
<BR>
	<INPUT TYPE="submit" value="Edit" name="act" >&nbsp;&nbsp;
	<!-- <INPUT TYPE="submit" value="Delete" name="act" >&nbsp;&nbsp; -->
	<INPUT TYPE="reset" value="Cancel" >&nbsp;&nbsp;
	<A HREF="tampilrek.php">View Data</A>
</FORM></CENTER>