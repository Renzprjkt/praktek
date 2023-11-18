<?php
include"koneksi.php";

/*if ($cmdCancel='Cancel')
{
echo"<script>document.location='penampilanform.php'</script>";
}*/

if(($act=='ubh')||($act=='del'))
{
$sql="SELECT * FROM `t_m_sparepart` WHERE `kd_barang` LIKE CONVERT( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$hsl=mysql_query($sql);
$hasil=mysql_fetch_array($hsl);
}

if($act=='Delete')
{
$hapus="DELETE FROM `t_m_sparepart` WHERE CONVERT(`kd_barang` USING utf8) = '$kd' LIMIT 1";
$prohps=mysql_query($hapus);
echo "<script> alert('Data Telah Di Hapus') </script>";
echo "<script> document.location='tampil.php' </script>";

}
else if($act=='Edit')
{
if (!empty($_FILES['gambar']['name']))
{
$namafile = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$tipefile = $_FILES['gambar']['type'];
$gambar = $_FILES['gambar']['tmp_name'];
$data = addslashes(fread(fopen($gambar,"r"),filesize($gambar)));
}
$sql1="SELECT * FROM `t_m_sparepart` WHERE `kd_barang` LIKE CONVERT( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$rs = mysql_query($sql1);
$hs = mysql_fetch_array($rs);
$nf = $hs[6];
$uk = $hs[7];
$tf = $hs[8];
if(($kd=="")||($jns=="")||($merk=="")||($ket=="")||($harga==""))
{
echo"<script>alert('Anda Belum mengisi data lengkap !')</script>";
echo "<script>window.location='edit.php?nm=$nm&kd=$kd&ket=$ket&tf=$tf&id=$id&act=ubah'</script>";
}
else  if ($data!="") 
{
$sql="UPDATE `t_m_sparepart` SET nm_jns = '$jns',`merk` = '$merk',`satuan` = '$cmbsat', `keterangan`='$ket',`status` ='$sts',`harga`='$harga',`namafile`='$namafile',`ukuran`='$ukuran',`tipefile`='$tipefile',`gambar`='$data' WHERE CONVERT( `kd_barang` USING utf8 )= '$kd'";
}
else if($data=="")
{
$sql="UPDATE `t_m_sparepart` SET `nm_jns` = '$jns',`merk` = '$merk',`satuan` = '$cmbsat',`keterangan` = '$ket',`status` = '$sts',`harga`='$harga' WHERE CONVERT( `kd_barang` USING utf8 )= '$kd' ";
}
mysql_query($sql);

echo "<script> alert('Data Telah Di Ubah') </script>";
echo "<script> document.location='tampil.php'</script>";
}

?>

<SCRIPT LANGUAGE="JavaScript">
function valid()
{

	var nm=document.frmedit.ket.value;	
	if(nm=="")
	{
		alert("Data keterangan tidak boleh kosong");
		document.frmedit.ket.focus();
		return false;
	}

	else 

	var alm=document.frmedit.merk.value;
	if(alm=="")
	{
		alert("Data merk tidak boleh kosong");
		document.frmedit.merk.focus();
		return false;
	}

	else 

	var har=document.frmedit.harga.value;
	if(har=="")
	{
		alert("Data harga tidak boleh kosong");
		document.frmedit.harga.focus();
		return false;
	}

	else 

	{
		alert("data sudah valid");
	}

}

function konfirmasi()
{
alert('Data Dibatalkan untuk disimpan');
}
</SCRIPT>
<CENTER>
<CENTER><FORM METHOD="post" ACTION="edit.php" name="frmedit" enctype='multipart/form-data'></CENTER>
<INPUT TYPE="hidden" NAME="kd" value="<?php echo $kd;?>">


<TABLE border ="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="3"><CENTER><FONT SIZE="5" face="algerian">Tabel Data Master Barang</FONT></CENTER></TD>
</TR>
<TR>
	<TD>Kode Barang</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="kd" maxlength="20" value="<?php echo $kd;?>" readonly="yes"></TD>
</TR>
<TR>
	<TD>Jenis Barang</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='jns'><?php
		$eddy1="select * from t_m_jenis";
		$qeddy1=mysql_query($eddy1);
		while($beddy1=mysql_fetch_array($qeddy1))
		{
			if ($beddy1[0]==$hasil[1])
			{echo("<option value=$beddy1[0] selected>".$beddy1[1]."</option>");}
			else if ($beddy1[0]!=$hasil[1])
			{echo("<option value=".$beddy1[0].">".$beddy1[1]."</option>");}
		}
	?></select></TD>
</TR>
<TR>
	<TD>Merk Barang</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="merk" maxlength="40" value="<?php echo $hasil[2];?>"></TD>
</TR>
<TR>
	<TD>Satuan</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='cmbsat'><?php
		$eddy="select * from t_satuan";
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
	<TD>Keterangan</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><textarea NAME="ket" rows="5" cols="30"><?php echo $hasil[4];?></textarea></TD>
</TR>
<TR>
	<TD><B> <CENTER>Cari Gambar</CENTER></B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><input name="gambar" type="file" /></TD>
</TR>
<TR>
	<TD>Status</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='sts'><?php
		$eddy="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'status' USING latin1 )COLLATE latin1_swedish_ci";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			if ($beddy[1]==$hasil[9])
			{echo("<option value=$beddy[0] selected>".$beddy[1]."</option>");}
			else if ($beddy[1]!=$hasil[9])
			{echo("<option value=".$beddy[1].">".$beddy[1]."</option>");}
		}
	?></select></TD>
</TR>
<TR>
	<TD><B>Harga</B></TD>
	<TD><CENTER>:</CENTER></TD>
	<TD>Rp.<INPUT TYPE="text" NAME="harga" size="20" maxlength="20" value="<?php echo $hasil[10];?>"></TD>
</TR>
<TR>
	<td colspan="3">
	<CENTER><INPUT TYPE="submit" value="Edit" name="act" onclick="return valid();">&nbsp;&nbsp;
	<INPUT TYPE="reset" value="Cancel" >&nbsp;&nbsp;
	<!-- <INPUT TYPE="submit" value="Delete" name="act" > -->
	<a href="tampil.php">Kembali</a></CENTER></TD>
</TR>
</TABLE>

</FORM>
