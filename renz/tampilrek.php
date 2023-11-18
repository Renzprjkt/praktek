<?php
include "koneksi.php";     //koneksi ke koneksi.php antara dbms dengan program
if($cmd_add=="Add_New")
{echo "<script>document.location='maintain.php'</script>";}
	//else

if ($cmd_cetak=="Print")
{$txtnama=$_GET['txtnama'];
echo "<script>document.location='print.php?txtnama=$txtnama' </script>";}

if ($cmd_export=="Export")
{echo "<script>document.location='print.php?act=exp&cd=dtbrng'</script>";}

if ($cmd_refresh=="Refresh")
{
echo "<script> document.location ='tampilrek.php' </script>";}

if($sts=='AKTIF')
	{
	$up="UPDATE `t_rekening_kami` SET `kode` = 'ST1' WHERE CONVERT( `kd_barang` USING utf8 ) = '$kd'";
	//echo $up;
	mysql_query($up);
	}
else if($sts=='NONAKTIF')
	{$up="UPDATE `t_rekening_kami` SET `kode` = 'ST2' WHERE CONVERT( `kd_barang` USING utf8 ) = '$kd'";
	//echo $up;
	mysql_query($up);
	}

?>
<FORM METHOD=get ACTION="tampilrek.php">
<CENTER><H1><font size="5">Tampil Data Rekening Astro</font></H1>
<!-- Cari Berdasarkan Merk Barang : <INPUT TYPE="text" NAME="txtnama" value="<?php echo $txtnama;?>"> &nbsp;&nbsp; -->
<!-- <INPUT TYPE="submit" name="cmd_find" value="Find"> -->
<!-- <INPUT TYPE="submit" name="cmd_add" value="Add_New">&nbsp;&nbsp; -->
<!-- <INPUT TYPE="submit" name="cmd_refresh" value="Refresh">&nbsp;&nbsp; -->
<!-- <INPUT TYPE="submit" name="cmd_cetak" value="Print">&nbsp;&nbsp; -->
<!-- <INPUT TYPE="submit" name="cmd_export" value="Export">&nbsp;&nbsp; -->
<HR>

<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD><B><CENTER>Nomor Rekening</CENTER></B></TD>
	<TD><B><CENTER>Nama Bank</CENTER></B></TD>
	<TD><B><CENTER>Operation</CENTER></B><TD>
</TR>
<?php

/*if($cmd_find=="Find")
{
	$sql="SELECT * FROM `t_rekening_kami` WHERE `merk` LIKE CONVERT( _utf8 '%$txtnama%'USING latin1 )COLLATE latin1_swedish_ci";
}
else
{*/

$sql="SELECT * FROM `t_rekening_kami`" ;
$hsl=mysql_query($sql);
//echo $sql;
while ($brs=mysql_fetch_array($hsl))
{
	echo "<tr>";
echo "<td>".$brs[0]."</td>";
$sql1="SELECT * FROM `t_m_ref` WHERE `grup` = CONVERT( _utf8 'bank' USING latin1 ) COLLATE latin1_swedish_ci";
$hsl1=mysql_query($sql1);
$brs1=mysql_fetch_array($hsl1);
echo "<td>".$brs1[1]."</td>";
$kd=$brs[0];
echo "<td><a href='editrek.php?kd=$kd&act=ubh'>Edit</a></td>";
$kd=$brs[0];
//echo "<td><a href='edit.php?kd=$kd&act=del'>Delete</a></td>";
}
	echo "</tr>";
?>
</TABLE></CENTER>
</FORM>