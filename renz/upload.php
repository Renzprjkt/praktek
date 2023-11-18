<?php
// setting nama folder tempat upload
$uploaddir='data/';

// membaca nama file yang diupload
$fileName=$_FILES['userfile']['name'];

// nama file temporary yang akan disimpan di server
$tmpName=$_FILES['userfile']['tmp_name'];

// membaca ukuran file yang diupload
$fileSize=$_FILES['userfile']['size'];

// membaca jenis file yang diupload
$fileType=$_FILES['userfile']['type'];

// koneksi ke mysql
include "koneksi.php";

// menyimpan properti atatu informasi file ke tabel upload dalam db
// dengan terlebih dahulu mengecek ada tidaknya nama file dalam tabel

$query="SELECT count(*) as jum FROM upload where name_file = '$fileName'";
$hasil=mysql_query($query);
$data=mysql_fetch_array($hasil);

if ($data['jum']>0)
{
	$query="UPDATE upload SET size_file = '$fileSize' WHERE name_file = '$fileName'";
}
else $query ="INSERT INTO upload (name_file, size_file, type_file) VALUES ('$fileName','$fileSize','$fileType')";

mysql_query($query);

// menggabungkan nama folder dan nama file
$uploadfile=$uploaddir.$fileName;

// proses upload file ke folder 'data'
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
{
	echo "<script>alert('File telah diupload')</script>";
	echo "<script>window.location='form_upload.php';</script>";

}
else
{
	echo "<script>alert('File gagal diupload')</script>";
	echo "<script>window.location='form_upload.php';</script>";
}

?>
