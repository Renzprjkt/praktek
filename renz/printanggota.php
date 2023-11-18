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

<FORM METHOD="GET" Action="tampilanggota.php">
<br>
<br>
<center>LAPORAN DATA ANGGOTA</center>
<br>
<br>
<TABLE border="2" align="center" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD><B>Kode Anggota</B></TD>
	<TD><B>Nama Anggota</B></TD>
	<TD><B>Jenis Kelamin</B></TD>
	<TD><B>E-Mail</B></TD>
	<TD><B>Telepon</B></TD>
	<TD><B>Alamat</B></TD>
</TR>

<?php
if($txtnama!="")
{$sql="SELECT `kd_anggota`,`nm_anggota`,`jns_kelamin`,`email`,`telepon`,`alamat` FROM `t_m_anggota` WHERE `nm_anggota` LIKE CONVERT( _utf8 '%$txtnama%' USING latin1 ) COLLATE latin1_swedish_ci";
}
elseif($txtnama=="")
{$sql="select `kd_anggota`,`nm_anggota`,`jns_kelamin`,`email`,`telepon`,`alamat` from t_m_anggota";}
$hsl=mysql_query($sql);
while($brs=mysql_fetch_array($hsl))
{
echo"<tr>";
echo"<td>".$brs[0]."</td>";
echo"<td>".$brs[1]."</td>";
echo"<td>".$brs[2]."</td>";
echo"<td>".$brs[3]."</td>";
echo"<td>".$brs[4]."</td>";
echo"<td>".$brs[5]."</td>";
//echo"<td>".$brs[6]."</td>";
echo"</tr>";
}
?>

</TABLE>
<?php if ($act!='exp'){?>
<br>
<br>
<br>
<center><a href="tampilanggota.php"><B>Back</B></a></center>
<?php }?>
</FORM>