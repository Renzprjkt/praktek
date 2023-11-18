<?php
include "koneksi.php";
	$id=$_GET["id"];
	$key=$_GET["key"];
	$tbl=$_GET["tbl"];
	$sql="SELECT * FROM $tbl WHERE $key='$id' ";
	$result=mysql_query($sql);
	while ($row = mysql_fetch_array($result))
	{
		if ($row[gambar])
		{
			header("content-type: $row[tipefile]");
			print "$row[gambar]";
		}
	}
?>
