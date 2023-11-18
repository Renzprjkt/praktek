<?php
include "koneksi.php";     //koneksi ke koneksi.php antara dbms dengan program
if ($act=='exp')
{
 $tm=date("dmY");
$nmfile=$cd.'_'.$tm.'.xls';
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0",false);
header("Pragma: no-cache");
header("Expires:0");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=".$nmfile);
}
?>
<body onload="window.print()">
<FORM METHOD="GET" ACTION="printtran.php">
<CENTER><H1><font size="5">Cetak Data Barang</font></H1>

<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD><CENTER>Tanggal Transaksi</CENTER></TD>
	<TD><CENTER>Kode Transaksi</CENTER></TD>
	<TD><CENTER>Kode Barang</CENTER></TD>
	<TD><CENTER>Jenis Barang</CENTER></TD>
	<TD><CENTER>Merk Barang</CENTER></TD>
	<TD><CENTER>Nama Anggota</CENTER></TD>
	<TD><CENTER>Satuan</CENTER></TD>
	<TD><CENTER>Keterangan</CENTER></TD>
	<TD><CENTER>Harga</CENTER></TD>
</TR>

<?php
if($txtnama!="")
{
	$sql="select m.*,h.* from t_transaksi as m, t_transaksi_h as h where m.kd_transaksi = h.kd_transaksi";
}
if($txtnama=="")
{
	$sql="select m.*,h.* from t_transaksi as m, t_transaksi_h as h";
}
$hsl=mysql_query($sql);
//echo $sql;
while ($brs=mysql_fetch_array($hsl))
{

echo "<tr>";
	echo "<td>".$brs[7]."</td>";
	echo "<td>".$brs[0]."</td>";
	echo "<td>".$brs[1]."</td>";
	echo "<td>".$brs[2]."</td>";
	echo "<td>".$brs[3]."</td>";
	$kode=$brs[9];
	$sqlmamet=" SELECT * FROM `t_m_anggota` WHERE `kd_anggota` = CONVERT( _utf8 '$kode' USING latin1 )COLLATE latin1_swedish_ci ";
	$hslmamet=mysql_query($sqlmamet);
	$brsmamet=mysql_fetch_array($hslmamet);
	echo "<td>".$brsmamet[1]."</td>";
	echo "<td>".$brs[4]."</td>";
	echo "<td>".$brs[5]."</td>";
	echo "<td>".$brs[6]."</td>";
	/*echo "<td>".$love[7]."</td>";
	echo "<td>".$love[8]."</td>";*/
$kd=$brs[0];
	/*echo "<td><a href='editjns.php?kd=$kd&act=del'>Delete</a></td>";
echo "<td><a href='editjns.php?kd=$kd'&act='ubh'>UPDATE</a></td>";
echo "<td><a href='hapus.php'>DELETE</a></td>";*/

echo "</tr>";

/*	echo "<tr>";
echo "<td>".$brs[0]."</td>";
echo "<td>".$brs[1]."</td>";
echo "<td>".$brs[2]."</td>";
echo "<td>".$brs[3]."</td>";
echo "<td>".$brs[4]."</td>";
echo "<td>".$brs[5]."</td>";
echo "<td>".$brs[6]."</td>";
echo "<td>".$brs[7]."</td>";
echo "<td>".$brs[8]."</td>";
echo "<td>".$brs[9]."</td>";
echo "<td>".$brs[10]."</td>";
echo "<td>".$brs[11]."</td>";
echo "<td>".$brs[12]."</td>";
echo "</tr>";*/
}
?>
</TABLE>
<?php if ($act!='exp'){?>
<br>
<br>
<br>
<center><a href="tampiltransaksi.php"><B>Back</B></a></center>
<?php }?>
</FORM>