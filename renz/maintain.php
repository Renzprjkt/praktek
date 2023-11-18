<?php
include "koneksi.php";
$panji = "SELECT max(kd_barang) FROM `t_m_sparepart`";
$jono = mysql_query($panji);
$joko = mysql_fetch_array($jono);
$bambang =(substr($joko[0],2,10)*1)+1;

if ($cmdsimpan=="Save")
{
if (!empty($_FILES['gambar']['name']))
{
//echo $gambar;
$namafile = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$tipefile = $_FILES['gambar']['type'];
$gambar = $_FILES['gambar']['tmp_name'];
$data =addslashes(fread(fopen($gambar,"r"),filesize($gambar)));
}
$sql10="SELECT * FROM `t_m_sparepart` WHERE `kd_barang` LIKE CONVERT( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$rs = mysql_query($sql10);
$hs = mysql_fetch_array($rs);
$nf = $hs[6];
$uk = $hs[7];
$tf = $hs[8];
	if (($kd=="") || ($nm==""))
	{
	echo "<script>alert('Anda belum mengisi data dengan lengkap !')</script>";
	echo "<script>window.location='maintain.php';</script>";
	}
	else
	{
	$kdj=strtoupper($kdj);
	$sql="INSERT INTO `t_m_sparepart` ( `kd_barang` , `nm_jns` , `merk` , `satuan` , `keterangan` , `gambar` , `namafile` , `ukuran` , `tipefile` , `status`, `harga` )VALUES ('$kd', '$nm', '$merk', '$sat', '$ket',  '$data', '$namafile', '$ukuran', '$tipefile', '$sts', '$harga');";
mysql_query($sql);
//echo $sql; buat ngecek gambar nieh :)
//echo "<script>alert('data telah tersimpan')</script>";

	}
}
?>
<script language="javascript">
function validation()
{
var kode=document.frmbarang.kd.value;
	if(kode=="")
 	{
	alert("anda belum mengisi kode barang");
	document.frmbarang.kd.focus();
	return false;
	}
var nama=document.frmbarang.nm.value;
	if(nama=="")
 	{
	alert("anda belum mengisi jenis barang");
	document.frmbarang.nm.focus();
	return false;
	}
var merk=document.frmbarang.merk.value;
	if(merk=="")
 	{
	alert("anda belum mengisi merk barang");
	document.frmbarang.merk.focus();
	return false;
	}
var satuan=document.frmbarang.sat.value;
	if(satuan=="")
 	{
	alert("anda belum mengisi satuan barang");
	document.frmbarang.sat.focus();
	return false;
	}
var ket=document.frmbarang.ket.value;
	if(ket=="")
 	{
	alert("anda belum mengisi keterangan");
	document.frmbarang.ket.focus();
	return false;
	}
var har=document.frmbarang.harga.value;
	if(har=="")
 	{
	alert("anda belum mengisi harga");
	document.frmbarang.harga.focus();
	return false;
	}
	else if(har/har !='1')
	{
		alert("Maaf, Data Harga Harus Angka");
		document.frmbarang.harga.focus();
		document.frmbarang.harga.value="";
		return false;
	}
else
	{alert("Data Tersimpan");
	document.frmbarang.focus();
	return true;
	}
}
</script>

<CENTER><FORM name="frmbarang" METHOD="post" ACTION="maintain.php" enctype='multipart/form-data'>
<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="3"><CENTER><font size="5"><B>Data Barang</B></font></CENTER></TD>
</TR>
<TR>
	<TD><B>Kode Barang</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="kd" size="10" maxlength="10" value="<?php echo'SP'.$bambang ?>" readonly="yes"></TD>
</TR>
<TR>
	<TD><B>Jenis Barang</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='nm'><?php
		$eddy1="select * from t_m_jenis";
		$qeddy1=mysql_query($eddy1);
		while($beddy1=mysql_fetch_array($qeddy1))
		{
			echo("<option value=".$beddy1[0].">".$beddy1[1]."</option>");
		}
	?></select></TD>
</TR>
<TR>
	<TD><B>Merk</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="merk" size="30" maxlength="30"></TD>
</TR>
<TR>
	<TD><B>Satuan</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='sat'><?php
		$eddy="select * from t_satuan";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			echo("<option value=".$beddy[0].">".$beddy[1]."</option>");
		}
	?></select></TD>
</TR>
<TR>
	<TD><B>Keterangan</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="ket" size="20" maxlength="20"></TD>
</TR>
<TR>
	<TD><B> Cari Gambar</B></TD>
	<TD>:</TD>
	<TD><input name="gambar" type="file" /></TD>
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
<TR>
	<TD><B>Harga</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD>Rp.<INPUT TYPE="text" NAME="harga" size="20" maxlength="20"></TD>
</TR>
</TABLE>
<BR>
<INPUT TYPE="submit" name="cmdsimpan" value="Save" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="reset" name="cmdreset" value="Reset">&nbsp;&nbsp;<A HREF="tampil.php">View Data</A>
</FORM></CENTER>