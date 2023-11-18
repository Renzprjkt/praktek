<? 
include "koneksi.php"; 
//tampilkan berita yang sesuai dengan no berita 
$tampil=mysql_query("SELECT * FROM berita WHERE no_berita='$_REQUEST[id]'"); 
$data=mysql_fetch_array($tampil); 

//rapikan tampilan dengan fungsi nl2br 
$isi_berita=nl2br($data[isi_berita]); 
$username=$data[username]; 

echo "<h2>Judul : $data[judul_berita]</h2>"; 
echo "$data[hari], $data[tgl_berita], $data[jam_berita] WIB<br /><br />"; 
echo "$isi_berita"; 
?> 