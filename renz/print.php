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
<FORM METHOD="GET" ACTION="tampil.php">
<CENTER><H1><font size="5">Cetak Data Barang</font></H1>

<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD>Kode Barang</TD>
	<TD>Jenis Barang</TD>
	<TD>Merk Barang</TD>
	<TD>Satuan</TD>
	<TD>Keterangan</TD>
</TR>

<?php
if($txtnama!="")
{
	$sql="SELECT * FROM `t_m_sparepart` WHERE `merk` LIKE CONVERT( _utf8 '%$txtnama%' USING latin1 ) COLLATE latin1_swedish_ci";
}
if($txtnama=="")
{
	$sql="SELECT * FROM `t_m_sparepart`";
}
$hsl=mysql_query($sql);
//echo $sql;
while ($brs=mysql_fetch_array($hsl))
{
	echo "<tr>";
echo "<td>".$brs[0]."</td>";
echo "<td>".$brs[1]."</td>";
echo "<td>".$brs[2]."</td>";
echo "<td>".$brs[3]."</td>";
echo "<td>".$brs[4]."</td>";
echo "</tr>";
}
?>
</TABLE>
<?php if ($act!='exp'){?>
<br>
<br>
<br>
<center><a href="tampil.php"><B>Back</B></a></center>
<?php }?>
</FORM>