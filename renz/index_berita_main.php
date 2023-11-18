<?php 
// memanggil conneksi ke database 
include("koneksi.php"); 
   $tampil_data = mysql_query("SELECT * FROM t_berita ORDER BY berita_id DESC"); 
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
               echo "<b>Judul: "; 

               echo $tampil['judul']; 

               echo "</b><br>tgl: <i>"; 

               echo $tampil['waktu']; 

               echo "</i><hr align=left width=160>"; 

               echo $tampil['paragraf']; 

               // tampilkan pilihan read more(baca semua) dan pilihan delete 

               echo "<br><a href=\"read_more.php?berita_id=$tampil[berita_id]\">Read More...</a> 
              || <a href=\"edit_berita.php?berita_id=$tampil[berita_id]\">Edit</a> 
				|| <a href=\"tambah_berita.php?berita_id=$tampil[berita_id]\">Input</a>
               || <a href=\"hapus_berita.php?berita_id=$tampil[berita_id]\">Delete</a><br><hr>";

             }//end of loop 
         
    } 
?> 
