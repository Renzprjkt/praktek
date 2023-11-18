<?php 
include("koneksi.php"); 
        $berita_id = $_GET['berita_id']; 
        $tampil_semua = mysql_query("SELECT * FROM t_berita WHERE berita_id='$berita_id' "); 
        while($tampil = mysql_fetch_assoc($tampil_semua)) 

             { 

                     echo "<b>"; 

                     echo $tampil['judul']; 

                     echo "</b><br>tgl: <i>"; 

                     echo $tampil['waktu']; 

                     //echo "</i><hr>"; 

                     //echo $tampil['paragraf']; 

                     echo " "; 

                     echo $tampil['full_paragraf']; 

                     echo "<br><br><a href=\"javascript:self.history.back();\"><-- Kembali</a>"; 

             } 

?> 
