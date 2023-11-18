<?php 

include("koneksi.php"); 
        $berita_id = $_GET['berita_id']; 

        $hapus_berita = mysql_query("DELETE FROM t_berita WHERE berita_id='$berita_id' "); 

  

                     echo "<b>Berita sudah di  Hapus!<br>silahkan tunggu.....!"; 

                     //header("location: index.php"); 

                     echo "<meta http-equiv=Refresh content=4;url=index_berita.php>"; 

?> 


