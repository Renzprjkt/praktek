<?php 
//menambahkan berita ke dalam database  
include("koneksi.php"); 
if(isset($_POST['submit'])) 
  { 
    // mysql_escape_string 
    // untuk mencegah sql injection. 
      $judul = mysql_escape_string($_POST['judul']); 
      $paragraf = mysql_escape_string($_POST['paragraf']); 
      $full_paragraf = mysql_escape_string($_POST['full_paragraf']); 
              //cek apakah judul sudah di isi? kalo belom tampilkan erronya. 
          if(!$judul) 
          {  
                echo "Judul Harus di isi."; 
                exit(); //memastikan bahwa setelah perintah di atas tidak ada perintah yang di eksekusi lagi. 
          }// end of if 

         //menjalankan query, memasukan data ke dalam database 
         $insertdata= mysql_query("INSERT INTO t_berita (judul, waktu, paragraf, full_paragraf) VALUES ('$judul',NOW(),'$paragraf','$full_paragraf')"); 

          //tampilkan pesan sukses. 
          echo "<b>Data sudah dikirim, <br>Silahkan tunggu .....!"; 
          echo "<meta http-equiv=Refresh content=4;url=index_berita.php>"; 
  }//end of if($submit). 


  // tampilkan form, jiga tidak disubmit! 
else 
  { 
   ?> 
      <br> 
     <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berita Terbaru</h3> 
       
      <form method="post" action="<?php echo $PHP_SELF ?>"> 
      Judul&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  
       &nbsp;<input name="judul" size="40" maxlength="255"> 

      <br> 
      Paragraf :  
	  <BR>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <textarea name="paragraf"  rows="7" cols="30"></textarea> 

      <br> 
      Full_paragraf : 
	  <BR>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <textarea name="full_paragraf" rows="7" cols="30"></textarea> 

      <br> 
<BR>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Add News">&nbsp;&nbsp;<a href = "index_berita.php">View News</a>

      </form> 

      <? 

  }//end of else 


?> 

