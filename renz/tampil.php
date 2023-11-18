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
echo "<script> document.location ='tampil.php' </script>";}

if($sts=='AKTIF')
	{
	$up="UPDATE `t_m_sparepart` SET `kode` = 'ST1' WHERE CONVERT( `kd_barang` USING utf8 ) = '$kd'";
	//echo $up;
	mysql_query($up);
	}
else if($sts=='NONAKTIF')
	{$up="UPDATE `t_m_sparepart` SET `kode` = 'ST2' WHERE CONVERT( `kd_barang` USING utf8 ) = '$kd'";
	//echo $up;
	mysql_query($up);
	}

?>
<FORM METHOD=get ACTION="tampil.php">
<CENTER><H1><font size="5">Tampil Data Barang</font></H1>
Cari Berdasarkan Merk Barang : <INPUT TYPE="text" NAME="txtnama" value="<?php echo $txtnama;?>"> &nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_find" value="Find">
<BR>
<BR>
<INPUT TYPE="submit" name="cmd_add" value="Add_New">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_refresh" value="Refresh">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_cetak" value="Print">&nbsp;&nbsp;
<INPUT TYPE="submit" name="cmd_export" value="Export">&nbsp;&nbsp;
<BR><HR>

<?php
// jumlah data yang akan ditampilkan per halaman
 
$dataPerPage = 3;
 
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

<TABLE border="1" bgcolor="#33FF00" bordercolor="#3300FF">
<TR>
	<TD><B><CENTER>Kode Barang</CENTER></B></TD>
	<TD><B><CENTER>Jenis Barang</CENTER></B></TD>
	<TD><B><CENTER>Merk Barang</CENTER></B></TD>
	<TD><B><CENTER>Satuan</CENTER></B></TD>
	<TD><B><CENTER>Keterangan</CENTER></B></TD>
	<TD><B><CENTER>Gambar</CENTER></B></TD>
	<TD><B><CENTER>Status</CENTER></B></TD>
	<TD><B><CENTER>Harga</CENTER></B></TD>
	<TD colspan="2"><B><CENTER>Operation</CENTER></B></TD>
</TR>
<?php

if($cmd_find=="Find")
{
	$sql="SELECT * FROM `t_m_sparepart` WHERE `merk` LIKE CONVERT( _utf8 '%$txtnama%'USING latin1 )COLLATE latin1_swedish_ci";
}
else
{
	$sql="SELECT * FROM `t_m_sparepart` LIMIT $offset, $dataPerPage";
}
$hsl=mysql_query($sql);
//echo $sql;
while ($brs=mysql_fetch_array($hsl))
{
	echo "<tr>";
echo "<td>".$brs[0]."</td>";
$sql1="SELECT * FROM `t_m_jenis` WHERE `kd_jns` = CONVERT( _utf8 '$brs[1]' USING latin1 ) COLLATE latin1_swedish_ci";
$hsl1=mysql_query($sql1);
$brs1=mysql_fetch_array($hsl1);
echo "<td>".$brs1[1]."</td>";
echo "<td>".$brs[2]."</td>";
echo "<td>".$brs[3]."</td>";
echo "<td>".$brs[4]."</td>";
echo "<td><img src='gambar.php?tbl=t_m_sparepart&key=kd_barang&id=$brs[0]' width='100' height='80' ></td>";
echo "<td>".$brs[9]."</td>";
echo "<td>".$brs[10]."</td>";
$kd=$brs[0];
echo "<td><a href='edit.php?kd=$kd&act=ubh'>Edit</a></td>";
$kd=$brs[0];
//echo "<td><a href='edit.php?kd=$kd&act=del'>Delete</a></td>";
}
	echo "</tr>";
?>
</TABLE></CENTER>
</FORM>


<?php
// mencari jumlah semua data dalam tabel guestbook
 
$query   = "SELECT COUNT(*) AS jumData FROM `t_m_sparepart`";
$hasil  = mysql_query($query);
$data     = mysql_fetch_array($hasil);
 
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