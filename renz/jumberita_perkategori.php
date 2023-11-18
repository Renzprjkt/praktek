<? 
echo "<b>Statistik</b><br>"; 
include "koneksi.php"; 

//tampilkan kategori dan hitung jumlahnya, berhitung mulai 
$tampil=mysql_query("SELECT nama_kategori,kategori.no_kategori, COUNT(berita.no_kategori) AS jml_berita FROM kategori,berita WHERE kategori.no_kategori=berita.no_kategori GROUP BY berita.no_kategori,kategori.no_kategori,nama_kategori"); 

echo "<ul>"; 
while ($data=mysql_fetch_array($tampil)) 
{ 
echo "<li><a href=beritaperkategori.php?id=$data[no_kategori]>$data[nama_kategori]</a>($data[jml_berita])</li>"; 
} 
$total=mysql_query("SELECT COUNT(*)AS total_berita FROM berita"); 
$baris=mysql_fetch_array($total); 
echo "</ul>Total: <b>$baris[total_berita] </b>Berita</font>"; 
?> 