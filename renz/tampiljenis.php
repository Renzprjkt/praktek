<?php
include "koneksi.php";     //koneksi ke koneksi.php antara dbms dengan program
if($cmd_add=="Add_New")
{echo "<script>document.location='jns.php'</script>";}
	if ($cmd_cetak=="Print")
	{$txtnama=$_GET['txtnama'];
	echo "<script>document.location='printjns?txtnama=$txtnama'</script>";}
if ($cmd_export=="Export")
{echo "<script>document.location='printjns.php?act=exp&cd=dtjns'</script>";}
if ($cmd_refresh=="Refresh")
{
echo "<script> document.location ='tampiljenis.php' </script>";
}
?>
<script language="javascript">
function validation()
{
var kunci=document.frmtampiljenis.txtnama.value;
	if(kunci=="")
 	{
	alert("anda belum mengisi kata kunci");
	document.frmtampiljenis.txtnama.focus();
	return false;
	}
)
</script>
<FORM METHOD=GET ACTION="tampiljenis.php" NAME="frmtampiljenis">
<CENTER><H1><font size="5">Tampil Data Jenis Sparepart</font></H1>
Cari Berdasarkan Nama : <INPUT TYPE="text" NAME="txtnama" value="<?php echo $txtnama;?>"> &nbsp;&nbsp;<INPUT TYPE="submit" name="cmd_find" value="Find" onclick="return validation">
<BR>
<BR>

<?php
// jumlah data yang akan ditampilkan per halaman
 
$dataPerPage = 5;
 
// apabila $_GET['page'] sudah didefinisikan, gunakan nomor halaman tersebut, 
// sedangkan apabila belum, nomor halamannya 1.
 
if(isset($_GET['page']))
{
    $noPage = $_GET['page'];
} 
else $noPage = 1;
 
// perhitungan offset
 
$offset = ($noPage - 1) * $dataPerPage;
 
// query SQL menampilkan data perhalaman sesuai offset
?>

<INPUT TYPE="submit" name="cmd_add" value="Add_New">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_refresh" value="Refresh">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_cetak" value="Print">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_export" value="Export">&nbsp;&nbsp;
<BR><HR>

<TABLE border="2" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD><B><CENTER>Kode Jenis Sparepart</CENTER></B></TD>
	<TD><B><CENTER>Nama Jenis Sparepart</CENTER></B></TD>
	<TD><B><CENTER>Status</CENTER></B></TD>
	<TD colspan="2"><B><CENTER>Operation</CENTER></B></TD>
</TR>
<?php

if($cmd_find=="Find")
{
	$sql="SELECT * FROM `t_m_jenis` WHERE `nm_jns` LIKE CONVERT( _utf8 '%$txtnama%' USING latin1 ) COLLATE latin1_swedish_ci";
}
else
{
	$sql="SELECT * FROM `t_m_jenis` LIMIT $offset, $dataPerPage";
}
$hsl=mysql_query($sql);
//echo $sql;
while ($brs=mysql_fetch_array($hsl))
{
echo "<tr>";
	echo "<td>".$brs[0]."</td>";
	echo "<td>".$brs[1]."</td>";
	echo "<td>".$brs[2]."</td>";
$kd=$brs[0];
	echo "<td><a href='editjns.php?kd=$kd&act=ubh'>Edit</a></td>";
$kd=$brs[0];
//	echo "<td><a href='editjns.php?kd=$kd&act=del'>Delete</a></td>";
//echo "<td><a href='editjns.php?kd=$kd'&act='ubh'>UPDATE</a></td>";
//echo "<td><a href='hapus.php'>DELETE</a></td>";
}
echo "</tr>";
?>
</TABLE></CENTER>
</FORM>

<?php
// mencari jumlah semua data dalam tabel guestbook
 
$query = "SELECT COUNT(*) AS jumData FROM `t_m_jenis`";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
 
$jumData = $data['jumData'];
 
// menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
 
$jumPage = ceil($jumData/$dataPerPage);
 
// menampilkan link previous
 
if ($noPage > 1) echo  "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'>&lt;&lt; Prev</a>";
 
// memunculkan nomor halaman dan linknya
 
for($page = 1; $page <= $jumPage; $page++)
{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2))  echo "...";
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "...";
            if ($page == $noPage) echo " <b>".$page."</b> ";
            else echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a> ";
            $showPage = $page;          
         }
}
 
// menampilkan link next
 
if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next &gt;&gt;</a>";
 
?>