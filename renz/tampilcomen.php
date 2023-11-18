<?php 
// memanggil conneksi ke database 
include("koneksi.php");
{
	$sql="SELECT * FROM `t_comment` LIMIT $offset, $dataPerPage";
}
   $tampil_data = mysql_query("SELECT * FROM t_comment ORDER BY kode DESC"); 
   $jum = mysql_num_rows($tampil_data); 
   if (empty($jum))//periksa apakah ada berita di database 
   { 
   echo "Tidak ada data"; // kalo tidak ada berita tampilkan ini 
   } 
   else
   { 
   // jika ada data 
   //membuat looping dan menampilkan semua berita dari database 
     while($tampil = mysql_fetch_assoc($tampil_data)) 

             {//memulai looping 
               //menampilkan data 
			  echo "<b>Email : "; 

			//nama database
               echo $tampil['email']; 

               echo "</b><br><i>"; 


echo "<b>Komentar : ";
               echo $tampil['comment']; 

               echo "</i><hr align=left width=160>"; 
			  
				//echo "<hr align=left width=250>";

             // tampilkan pilihan read more(baca semua) dan pilihan delete 

               //echo "<br><a href=\"read_more.php?berita_id=$tampil[berita_id]\">Read More...</a>

              //|| <a href=\"edit_berita.php?berita_id=$tampil[berita_id]\">Edit</a> 
               //|| <a href=\"hapus_berita.php?berita_id=$tampil[berita_id]\">Delete</a><br><hr>";

             }//end of loop 
    } 
?> 
</table>
<?php
// jumlah data yang akan ditampilkan per halaman
 
$dataPerPage = 2;
 
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

<!-- // pisah -->

<?php
// mencari jumlah semua data dalam tabel guestbook
 
$query   = "SELECT COUNT(*) AS jumData FROM `t_comment`";
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