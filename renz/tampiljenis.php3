<?php
include "koneksi.php";     //koneksi ke koneksi.php antara dbms dengan program
if($cmd_add=="Add_New")
{echo "<script>document.location='jenis.php'</script>";}
	if ($cmd_cetak=="Print")
	{$txt_nama=$GET['txt_nama'];
	echo "<script>document.location='cetak.php?txtnama=$txtnama'</script>";}
if ($cmd_export=="Export")
{echo "<script>document.location='eksport.php'</script>";}

?>
<FORM METHOD=get ACTION="tampiljenis.php">
<CENTER><H1><font size="5">Tampil Data Jenis Sparepart</font></H1>
Cari Berdasarkan Nama : <INPUT TYPE="text" NAME="txtnama" value="<?php echo '$nama';?>"> &nbsp;&nbsp;<INPUT TYPE="submit" name="cmd_find" value="Find">
<BR>
<BR>
<INPUT TYPE="submit" name="cmd_add" value="Add_New">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_refresh" value="Refresh">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_cetak" value="Print">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_export" value="Export">&nbsp;&nbsp;
<BR><HR>
<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD>Kode Jenis Sparepart</TD>
	<TD>Nama Jenis Sparepart</TD>
	<TD colspan="2">Operation</TD>
</TR>
<?php

if($cmd_find=="Find")
{
	$sql="SELECT * FROM `t_m_jenis_sparepart` WHERE `nm_sparepart` LIKE CONVERT( _utf8 '%$txtnama%' USING latin1 ) COLLATE latin1_swedish_ci";
}
else
{
	$sql="SELECT * FROM `t_m_jenis_sparepart`";
}
$hsl=mysql_query($sql);
//echo $sql;
while ($brs=mysql_fetch_array($hsl))
{
echo "<tr>";
	echo "<td>".$brs[0]."</td>";
	echo "<td>".$brs[1]."</td>";
	echo "<td><a href='edit.php'>UPDATE</a></td>";
	echo "<td><a href='hapus.php'>DELETE</a></td>";
}
echo "</tr>";
?>
</TABLE></CENTER>
</FORM>