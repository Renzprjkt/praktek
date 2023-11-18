<?
include "koneksi.php";
echo "<b>Berita Sebelumnya</b><br><br>";

//tampil setelah 2 pada headline
//tampilakan hanya 10 berita, jgn banyak2 ntar riweh :)
$tampil= mysql_query("SELECT * FROM berita ORDER BY no_berita DESC LIMIT 2,10");
while ($data = mysql_fetch_array($tampil))
{
echo "$data[hari], $data[tgl_berita], $data[jam_berita] WIB<br>";
echo "<a href=detail_berita.php?id=$data[no_berita]>$data[judul_berita]</a><br><br></font>";
}
?> 