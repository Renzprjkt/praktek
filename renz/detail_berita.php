<table width="100%" border="0" align="center" cellpadding="0" cellspacing="4"> 
  <tr> 
    <td colspan="3" bgcolor="#00FFFF"><div align="center"> 
      <? include "tampil_kategori.php"; ?> 
    </div></td> 
  </tr> 
  <tr> 
    <td width="20%">&nbsp;</td> 
    <td width="60%">&nbsp;</td> 
    <td width="20%">&nbsp;</td> 
  </tr> 
  <tr> 
    <td height="145" rowspan="2" valign="top"><? include "berita_sebelumnya.php"; ?></td> 
    <td valign="top"><? include "detailberita.php"; ?></td> 
    <td rowspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"> 
      <tr> 
        <td><strong>Menu Utama</strong></td> 
      </tr> 
      <tr> 
        <td><a href="indexberita.php">Home</a></td> 
      </tr> 
      <tr> 
        <td><a href="form_isi_berita.php">Isi Berita</a></td> 
      </tr> 
      <tr> 
        <td>&nbsp;</td> 
      </tr> 
      <tr> 
        <td><? include "jumberita_perkategori.php"; ?></td> 
      </tr> 
      <tr> 
        <td>&nbsp;</td> 
      </tr> 
    </table></td> 
  </tr> 
  <tr> 
    <td valign="top" bgcolor="#66FFFF"><table width="100%" border="0" cellspacing="6" cellpadding="0"> 
  <tr> 
    <td> 
<? echo "<b>Berita Sebelumnya</b><br><br>"; 
include "koneksi.php"; 

//menampilkan berita sebelumnya pada halaman detail berita 
//tampil setelah 1 pada headline 
//tampilakan hanya 7 berita, jgn banyak2 ntar riweh :) 
$tampil= mysql_query("SELECT * FROM berita ORDER BY no_berita DESC LIMIT 1,7"); 
while ($data = mysql_fetch_array($tampil)) 
{ 
echo "<a href=detail_berita.php?id=$data[no_berita]>$data[judul_berita]</a><br />"; 
} 
?></td> 
  </tr> 
</table></td> 
  </tr> 
  <tr> 
    <td>&nbsp;</td> 
    <td></td> 
    <td>&nbsp;</td> 
  </tr> 
</table> 