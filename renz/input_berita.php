<? 
//hari dalam bahasa indonesia 
$hr=array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"); 
$hari_ini=date("w"); 
$hari=$hr[$hari_ini]; 

//tanggal dan jam 
$tgl_berita=date("Ymd"); 
$jam_berita=date("H:i:s"); 

include "koneksi.php"; 
$input=mysql_query("INSERT INTO berita(no_kategori,judul_berita,headline_berita,isi_berita,hari,tgl_berita,jam_berita) VALUES ('$_POST[no_kategori]','$_POST[judul_berita]','$_POST[headline_berita]','$_POST[isi_berita]','$hari','$tgl_berita','$jam_berita')"); 

if ($input) 
{ 
echo "<b>Proses input berita berhasil bro..! Trus mo ngapain lagi sekarang?</b><br><br>"; 
echo "<A HREF=form_isi_berita.php>Gue mo isi tutor lagi aja ahh, biar situsnya cepet rame...</A><br>"; 
echo "<A HREF=indexberita.php>Ogah ah, capek, besok lagi aja deh, sekarang mo liat dulu yang gue isi tadi!</A><br>"; 
} 
else { echo "Proses pengisian berita / tutorial gagal total, scrip panik tolong kontak Admin bro"; 
} 
?> 