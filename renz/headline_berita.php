<? 
include "koneksi.php"; 
//10 berita terakhir yang di inputkan, akan tampil dihalaman utama, kl mo ubah edit aja..sesuai selera 
$tampil=mysql_query("SELECT * FROM berita ORDER BY no_berita DESC LIMIT 10"); 
while ($data=mysql_fetch_array($tampil)) 
{ 
echo "$data[hari], $data[tgl_berita], $data[jam_berita] WIB<br>"; 
echo "<a href=detail_berita.php?id=$data[no_berita]> 
<b>$data[judul_berita]</b></a><br><br>"; 
echo "$data[headline_berita]<hr>"; 
} 
?>