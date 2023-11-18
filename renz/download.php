<?php
	include "koneksi.php";

	// membaca id file dari link
	$id=$_GET['id'];

	//membaca informasi file dari tabel berdasarkan id nya
	$query="SELECT * FROM upload WHERE id_file='$id'";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);

	//header yang menunjukkan nama file yang akan didownload
	header("Content-Disposition: attachment; filename=".$data['name_file']);

	//header yang menunjukkan ukuran file yang akan didownload
	header("Content-length: ".$data['size_file']);

	//header yang menunjukkan jenis file yang akan didownload
	header("Content-type: ".$data['type_file']);

	//proses membaca isi file yang akan didownload dari folder 'data'
	$fp=fopen("data/".$data['name_file'],'r');
	$content=fread($fp, filesize('data/'.$data['name_file']));
	fclose($fp);

	//menampilkan isi file yang akan didownload
	echo $content;
	exit;
?>