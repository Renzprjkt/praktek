<?php
echo "<h3>FORM UNTUK ISI BERITA/TUTORIAL</h3>"
<form name="isi" method="post" action="input_berita.php">
<b>Judul :</b> <input type=text size=70 name=judul_berita><br /><br />
<b>Kategori :</b> <select name=no_kategori>
<option value=0 selected>Silahken Pilih Kategorinya Cuy;

//menampilkan nama2 kategori pada combo box
include "koneksi.php";
$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
while($data=mysql_fetch_array($tampil))
{
echo "<option value=$data[no_kategori]>$data[nama_kategori]";
}
echo "</option></select><br /><br />
<b>Headline Berita / Tutorial :</b><br><textarea name=headline_berita cols=60 rows=5></textarea><br /><br />
<b>Isi Berita / Tutorial :</b><br><textarea name=isi_berita cols=60 rows=15></textarea><br>
<input type=SUBMIT VALUE=kirim></form>";
?>

//<a href="indexberita.php">Lihat berita donk ah</a>
</SELECT>