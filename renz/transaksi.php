<?php
include "koneksi.php"
?>

<script language="javascript">
function validation1()
{
var hr=document.frmtransaksi.harga.value;

	  if(hr=="")
	  {
		pesan="Silahkan Isi Data Pada Textbox Angka\n";
		alert("Maaf Anda Belum Menginput harga.");
		alert(pesan);
		document.frmtransaksi.harga.focus();	
		return false;
	  }

var by=document.frmtransaksi.bayarar.value;
	
	  if(by=="")
	  {
		pesan="Silahkan Isi Data Pada Textbox Angka\n";
		alert("Maaf Anda Belum Menginput Bayaran Anda.");
		alert(pesan);
		document.frmtransaksi.bayar.focus();	
		return false;
	  }else
	{
	var kur=(by*1)-(hr*1);
	//alert(jum);
	document.frmtransaksi.txtkembali.value=kur;
	return false;
	}
}
</script>

</script>
<FORM METHOD="GET" ACTION="transaksi.php" NAME="frmtransaksi">
<TABLE border=15>
<TR>
	<TD colspan="3">FORM TRANSAKSI</TD>
</TR>
<TR>
	<TD>Kode Barang</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="kd" size="15" maxlength="15" readonly="yes" value="<?php echo $kd;?>"></TD>
</TR>
<TR>
	<TD>Jenis Barang</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="nm" size="15" maxlength="15" readonly="yes" value="<?php echo $nm;?>"></TD>
</TR>
<TR>
	<TD>Merk Barang</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="merk" size="15" maxlength="15" readonly="yes" value="<?php echo $hasil[2];?>"></TD>
</TR>
<TR>
	<TD>Satuan</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="sat" size="15" maxlength="15" readonly="yes" value="<?php echo $hasil[3];?>"></TD>
</TR>
<TR>
	<TD>Keterangan</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="ket" size="15" maxlength="15" readonly="yes" value="<?php echo $hasil[4];?>"></TD>
</TR>
<TR>
	<TD>Harga</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="harga" size="15" maxlength="15" readonly="yes" value="<?php echo $hasil[10];?>"></TD>
</TR>
<TR>
	<TD>Bayar</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="bayar" size="15" maxlength="15"></TD>
</TR>
<TR>
	<TD colspan="3"><CENTER><INPUT TYPE="submit" NAME="cdmbayar" VALUE="BAYAR" ONCLICK="return validation();"></CENTER></TD>
</TR>
<TR>
	<TD>Kembali</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="txtkembali" size="15" maxlength="15" readonly="yes"></TD>
</TR>
<TR>
	<TD colspan="3"><CENTER><INPUT TYPE="submit" NAME="cdmsetuju" VALUE="SETUJU" ONCLICK="return validation"><INPUT TYPE="reset" NAME="cdmreset" VALUE="RESET"></CENTER></TD>
</TR>
</TABLE>
</FORM>


<?php
$sql="INSERT INTO `t_m_sparepart` ( `kd_barang` , `nm_jns` , `merk` , `satuan` , `keterangan` , `gambar` , `namafile` , `ukuran` , `tipefile` , `status`, `harga` )VALUES ('$kd', '$nm', '$merk', '$sat', '$ket',  '$data', '$namafile', '$ukuran', '$tipefile', '$sts', '$harga')";
?>