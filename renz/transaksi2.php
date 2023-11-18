<?php
include"koneksi.php";
$panji = "SELECT max(kd_transaksi) FROM `t_transaksi`";
$jono = mysql_query($panji);
$joko = mysql_fetch_array($jono);
$bambang =(substr($joko[0],2,10)*1)+1;

if(($act=='ubh')||($act=='del'))
{
$sql="SELECT * FROM `t_m_sparepart` WHERE kd_barang LIKE CONVERT( _utf8 '%$kd%'USING latin1 )COLLATE latin1_swedish_ci";
$prosess=mysql_query($sql);
$hasil=mysql_fetch_array($prosess);
session_start();
}


if($proses=="PROSES")
{
$sql="INSERT INTO `t_transaksi` ( `kd_transaksi` , `kd_barang` , `nm_jns` , `merk` , `satuan` , `keterangan` , `harga`)VALUES ( '$txttransaksi' , '$txtkd', '$txtjns', '$txtmerk', '$cmbsat', '$txtket', '$harga')";
$hsl=mysql_query($sql);

$sql1="INSERT INTO `t_transaksi_h` ( `tgl_trans` , `kd_transaksi` , `nm_anggota` )VALUES ('$txttanggal', '$txttransaksi' , '$nm')";
$hsl1=mysql_query($sql1);
//echo $sql;
		echo "<script>alert('Data Telah Dikirim, Terima Kasih Atas Pembelian Produk Kami.')</script>";
		//echo "<script> document.location ='tampiltransaksi.php' </script>";
		echo "<script>window.reload('produk_barang.php')</script>";
		echo "<script>document.location='produk_barang.php?kd=$kd&act=isi'</script>";
}
?>

<SCRIPT LANGUAGE="JAVASCRIPT">
function validation()
{
var rek1=document.frmtransaksi.rekeninganda1.value;

	if(rek1=="")
	{
		pesan="Silahkan Isi Data Pada Textbox Rekening";
		alert("Maaf Anda Belum Menginput Nomor Rekening Anda.");
		alert(pesan);
		document.frmtransaksi.rekeninganda1.focus();
		return false;
	}
	else if(rek1/rek1 !='1')
	{
		alert("Maaf, Data Harus Angka");
		document.frmtransaksi.rekeninganda1.focus();
		document.frmtransaksi.rekeninganda1.value="";
		return false;
	}

var rek2=document.frmtransaksi.rekeninganda2.value;

	if(rek2=="")
	{
		pesan="Silahkan Isi Data Pada Textbox Rekening";
		alert("Maaf Anda Belum Menginput Nomor Rekening Anda.");
		alert(pesan);
		document.frmtransaksi.rekeninganda2.focus();
		return false;
	}
		else if(rek2/rek2 !='1')
	{
		alert("Maaf, Data Harus Angka");
		document.frmtransaksi.rekeninganda2.focus();
		document.frmtransaksi.rekeninganda2.value="";
		return false;
	}
	
var rek3=document.frmtransaksi.rekeninganda3.value;

	if(rek3=="")
	{
		pesan="Silahkan Isi Data Pada Textbox Rekening";
		alert("Maaf Anda Belum Menginput Nomor Rekening Anda.");
		alert(pesan);
		document.frmtransaksi.rekeninganda3.focus();
		return false;
	}
	else if(rek3/rek3 !='1')
	{
		alert("Maaf, Data Harus Angka");
		document.frmtransaksi.rekeninganda3.focus();
		/*document.frmtransaksi.rekeninganda3.value="";*/
		return false;
	}
	else
	{
		alert("Data Sudah Lengkap");
		alert("Harap Catat Nomor Rekening Kami");
		alert("801923-919-8517599 , Bank Central Asia");
		/*document.frmtransaksi.rekeninganda3.value="";*/
	}


}

function validation1()
{
var hr=document.frmtransaksi.harga.value;

	  if(hr=="")
	  {
		pesan="Silahkan Isi Data Pada Textbox Angka\n";
		alert("Maaf Anda Belum Menginput Angka.");
		alert(pesan);
		document.frmtransaksi.harga.focus();	
		return false;
	  }

var by=document.frmtransaksi.bayar.value;
	   if(by=='')
	  {
		pesan="Silahkan Isi Data Pada Textbox Bayar\n";
		alert("Maaf Anda Belum Menginput Bayaran Anda.");
		alert(pesan);
		document.frmtransaksi.bayar.focus();	
		return false;
	  }
	  else if (by/by !='1')
	{
	pesan="Silahkan Isi Data Pada Textbox Angka\n";
	alert("Data Harus Angka.!");
	alert(pesan);
	document.frmtransaksi.bayar.value='';
	document.frmtransaksi.bayar.focus();	
	return false;
	}
	/* else if(by*1)<(hr*1)
	{
	pesan="Silahkan Isi Yang Benar Pada Textbox Angka\n";
	alert("Maaf Anda Salah Menginput Bayaran Anda.");
	alert(pesan);
	document.frmtransaksi.bayar.focus();	
	return false;
	}*/
	 else
	{
	var kur=(by*1)-(hr*1);
	//alert(jum);
	document.frmtransaksi.kembali.value=kur;
	return false;
	}
}

</SCRIPT>

<?php

$sikil="select * from t_rekening_kami";
$jeko=mysql_query($sikil);
$koje=mysql_fetch_array($jeko);

?>

<CENTER><FORM METHOD="get" ACTION="transaksi2.php" name="frmtransaksi">
<INPUT TYPE="hidden" NAME="kd" value="<?php echo $kd;?>">
<input type="hidden" name='txtjenis' readonly="yes" value="<?php echo $hasil[1];?>">

<TABLE border ="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD colspan="3"><CENTER><FONT SIZE="5" face="algerian">Form Transaksi</FONT></CENTER></TD>
</TR>
<TR>
	<TD>Tanggal</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txttanggal" maxlength="30" value="<?php echo date("Y-m-d")?>" readonly="yes"></TD>
</TR>
<TR>
	<TD>Kode Transaksi</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txttransaksi" maxlength="20" value="<?php echo'TR'.$bambang ?>" readonly="yes"></TD>
</TR>
<TR>
	<TD>Kode Barang</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="txtkd" maxlength="20" value="<?php echo $kd;?>" readonly="yes"></TD>
</TR>
<TR>
<?php

$query="select * from t_m_jenis where kd_jns='$txtjenis'";
$hq=mysql_query($query);
$bq=mysql_fetch_array($hq);
{
?>
	<TD>Jenis Barang</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD>
	<input type="text" name='txtjns' readonly="yes" value="<?php echo $jns;?>"> <?php }  ?></TR>
<TR>
	<TD>Merk Barang</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><INPUT TYPE="text" NAME="txtmerk" maxlength="40" readonly="yes" value="<?php echo $hasil[2];?>"></TD>
</TR>
<TR>
	<TD>Nama Anggota</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><select name='nm'><?php
		$eddy="select * from t_m_anggota";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			echo("<option value=".$beddy[0].">".$beddy[1]."</option>");
		}
	?></select></TD>
</TR>
<TR>
	<TD>Satuan</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><input type="text" name='cmbsat' readonly="yes" value="<?php echo $hasil[3];?>"></TD>
</TR>
<TR>
	<TD>Keterangan</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD><textarea NAME="txtket" rows="5" cols="30" readonly="yes"><?php echo $hasil[4];?></textarea></TD>
</TR>
<TR>
	<TD>Harga</TD>
	<TD><CENTER>:</CENTER></TD>
	<TD>Rp.<INPUT TYPE="text" NAME="harga" maxlength="40" readonly="yes" value="<?php echo $hasil[10];?>"></TD>
</TR>
<!-- <TR> -->
<!-- 	<TD>Bayar</TD> -->
<!-- 	<TD>:</TD> -->
<!-- 	<TD>Rp.<INPUT TYPE="text" NAME="bayar" maxlength="40">&nbsp;<input type="submit" name="cmdok" Value="Proses" onClick="return validation1();"></TD> -->
<!-- </TR> -->
<!-- <TR> -->
<!-- 	<TD>Kembali</TD> -->
	<!-- <TD><CENTER>:</CENTER></TD> -->
<!-- 	<TD>Rp.<INPUT TYPE="text" NAME="kembali" maxlength="40" readonly="yes"></TD> -->
<!-- </TR> -->
<!-- <TR> -->
<!-- 	<TD colspan="3"><center><INPUT TYPE="submit" name="save" value="Bayar" onClick="return validation();"></center></TD> -->
<!-- </TR> -->

<TR>

	<TD>Nomor Rekening Kami</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="rekeningkami1" readonly="yes" maxlength="16" value="<?php echo $rek ;?>"> 
	<INPUT TYPE="text" NAME="bankkami" value="<?php echo $koje[1]; ?>" readonly="yes"></TD>
</TR>
<TR>
	<TD colspan=3><CENTER><INPUT TYPE="submit" NAME="proses" value="PROSES" onClick="return validation();"></CENTER></TD>
</TABLE>
<BR>
<a href="produk_barang.php">Kembali</a>
	<!-- <INPUT TYPE="submit" value="Edit" name="act" >&nbsp;&nbsp; -->
	<!-- <INPUT TYPE="submit" value="Delete" name="act" >&nbsp;&nbsp; -->
	<!-- <INPUT TYPE="reset" value="Cancel" >&nbsp;&nbsp; -->
	<!-- <A HREF="tampil.php">View Data</A> -->
</FORM></CENTER>