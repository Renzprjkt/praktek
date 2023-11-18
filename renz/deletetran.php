<?php
include"koneksi.php";

if(($act=='ubh')||($act=='del'))
{
$cari= "SELECT * FROM `t_transaksi` WHERE `kd_transaksi` LIKE CONVERT ( _utf8 '$kd' USING latin1 ) COLLATE latin1_swedish_ci";
$prosess=mysql_query($cari);
$hasil=mysql_fetch_array($prosess);
}

else if($act=='Edit')
{
$edit="UPDATE `t_transaksi` SET `kd_transaksi` = '$txtkdjns', `nm_jns` = '$txtnmjns', status='$sts' WHERE CONVERT( `kd_jns` USING utf8 ) = '$kd' ";
$prosess2=mysql_query($edit);
//echo $edit;
echo "<script> alert('Data Telah Di Ubah') </script>";
echo "<script> document.location='tampiljenis.php'</script>";
}

else if($act=='Delete')
{
$hapus="DELETE FROM `t_transaksi` WHERE CONVERT(`kd_transaksi` USING utf8) = '$kd' LIMIT 1";
$prohps=mysql_query($hapus);
echo "<script> alert('Data Telah Di Hapus') </script>";
echo "<script> document.location='tampiltransaksi.php' </script>";

}

else if($act=='Cancel')
{
//echo"<script> alert('Data Batal Di Ubah') </script>";
echo "<script> document.location='tampiltransaksi.php' </script>";
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
	<TD colspan="3"><CENTER><FONT  SIZE="5" face="algerian">Tabel Delete Transaksi</FONT></CENTER></TD>
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
	<input type="text" name='txtjns' readonly="yes" value="<?php echo $jns;?>"> <?php }  ?>
</TR>
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
	<TD>Nomor Rekening Anda</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="rekeninganda1" size="4" maxlength="6">&nbsp;
		<INPUT TYPE="text" NAME="rekeninganda2" size="1" maxlength="3">&nbsp;
		<INPUT TYPE="text" NAME="rekeninganda3" size="5" maxlength="7">&nbsp;
		<select name='rek'><?php
		$eddy="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'bank' USING latin1 )COLLATE latin1_swedish_ci";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			echo("<option value=".$beddy[0].">".$beddy[1]."</option>");
		}
	?></select>
	</TD>
</TR>
</TABLE>
<BR>
	<INPUT TYPE="submit" value="Edit" name="act" >&nbsp;&nbsp;
	<INPUT TYPE="submit" value="Delete" name="act" >&nbsp;&nbsp;
	<INPUT TYPE="reset" value="Cancel" >&nbsp;&nbsp;
	<A HREF="tampiljenis.php">View Data</A>
</FORM></CENTER>