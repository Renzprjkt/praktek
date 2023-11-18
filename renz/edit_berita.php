<?php 
include("koneksi.php"); 
  if(isset($_POST['submit'])) 
  { 
      $judul = mysql_escape_string($_POST['judul']); 
      $paragraf = mysql_escape_string($_POST['paragraf']); 
      $full_paragraf = mysql_escape_string($_POST['full_paragraf']); 
       
      $edit_berita = mysql_query("UPDATE t_berita SET judul='$judul', paragraf='$paragraf', full_paragraf='$full_paragraf' WHERE berita_id='$berita_id' "); 
          echo "<b>Berita sedang di update!<br>silahkan tunggu.!"; 
          echo "<meta http-equiv=Refresh content=4;url=index_berita.php>"; 

} 

elseif(isset($_GET['berita_id'])) 
{ 
        $result = mysql_query("SELECT * FROM t_berita WHERE berita_id='$_GET[berita_id]' "); 

        while($tampil = mysql_fetch_assoc($result)) 

             { 

                $judul = $tampil["judul"]; 

                $paragraf = $tampil["paragraf"]; 

                $full_paragraf= $tampil["full_paragraf"]; 

?> 
<br> 

<h3>:: Edit Berita</h3> 

  

<form method="post" action="<?php echo $PHP_SELF ?>"> 

<input type="hidden" name="berita_id" value="<? echo $tampil['berita_id']?>"> 

  

Judul :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
<input name="judul" size="40" maxlength="255" value="<? echo $judul; ?>"> 

<br> 

Paragraf :<BR>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea name="paragraf"  rows="7" cols="30"><? echo $paragraf; ?></textarea> 

<br> 

full_paragraf :<BR>  
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<textarea name="full_paragraf" rows="7" cols="30"><? echo $full_paragraf; ?></textarea> 

<br> 
<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="Update Berita"> 

</form> 

<? 

     }//end of while loop 
  }//end else 

?> 
