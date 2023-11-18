<? 
include "koneksi.php"; 
$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori"); 
while($data=mysql_fetch_array($tampil)) 
{ 
echo "<a href=beritaperkategori.php?id=$data[no_kategori]>$data[nama_kategori]</a> | "; 
} 
?> 