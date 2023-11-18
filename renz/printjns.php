<?php
include "koneksi.php";
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

<FORM METHOD="GET" Action="tampil.php">
<br>
<br>
<center><B>LAPORAN DATA JENIS BARANG</B></center>
<br>
<br>
<TABLE border="2" align="center" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD><B>Kode Jenis</B></TD>
	<TD><B>Nama Jenis</B></TD>
</TR>

<?php
if($txtnama!="")
{$sql="SELECT * FROM `t_m_jenis` WHERE `nm_jns` LIKE CONVERT( _utf8 '%$txtnama%' USING latin1 ) COLLATE latin1_swedish_ci";
}
elseif($txtnama=="")
{$sql="select * from t_m_jenis";}
$hsl=mysql_query($sql);
while($brs=mysql_fetch_array($hsl))
{
echo"<tr>";
echo"<td>".$brs[0]."</td>";
echo"<td>".$brs[1]."</td>";
echo"</tr>";
}
?>

</TABLE>

<?php if ($act!='exp'){?>
<br>
<br>
<br>
<center><a href="tampiljenis.php"><B>Back</B></a></center>
<?php }?>
</FORM>