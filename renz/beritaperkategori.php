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
    <td height="145" valign="top"><? include "berita_sebelumnya.php"; ?></td>
    <td valign="top">
<?
include "koneksi.php";
//tampilkan kategori berdasarkan id kategori
$tampil_a=mysql_query("SELECT nama_kategori FROM kategori WHERE no_kategori='$_REQUEST[id]'");
$data_kategori=mysql_fetch_array($tampil_a);
echo "<h3>$data_kategori[nama_kategori]</h3>";

//tampilkan judul2 berita berdasakan id kategoti
$tampil_b=mysql_query("SELECT judul_berita, no_berita FROM berita WHERE no_kategori='$_REQUEST[id]'");
while ($data=mysql_fetch_array($tampil_b))
{
echo "<a href=detail_berita.php?id=$data[no_berita]> $data[judul_berita]</a><br>";
}
?>
</td>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
</table>