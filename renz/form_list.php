<?php
include "koneksi.php";

$query="SELECT * FROM upload";
$hasil=mysql_query($query);

while($data=mysql_fetch_array($hasil))
{
	echo "<a href=download.php?id=$data[1]>".$data[1]."</a><br>";
}

?>
<BR><A HREF="form_upload.php">Form Upload</A>