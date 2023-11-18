<?php
include "koneksi.php";
$hrs = date("h");
$min = date("i");
$sec = date("s");
$mon = date("m");
$day = date("d");
$yr  = date("Y");

$ip=$_SERVER['REMOTE_ADDR'];
$hn=gethostbyaddr($ip);
$today=date("Y-m-d h:i:s");

$sql="SELECT * FROM `t_statistik` ORDER BY `id` DESC ";
$hs=mysql_query($sql);
$row=mysql_fetch_array($hs);
$kd=$row[0]+1;

$sql1="INSERT INTO t_statistik ( id , ip , hostname ,time ) VALUES ('$kd', '$ip', '$hn', '$today')";
mysql_query($sql1);

$sql2="SELECT COUNT(*) AS jum FROM `t_statistik`";
$hs2=mysql_query($sql2);
$total_klik=mysql_fetch_array($hs2);

$sql3="SELECT COUNT(DISTINCT(ip)) AS ipj FROM `t_statistik` ";
$hs3=mysql_query($sql3);
$unique=mysql_fetch_array($hs3);

$hari_ini=$yr."-".$mon.'-'.$day;

$sql4="SELECT COUNT( * ) AS jum FROM `t_statistik` WHERE substring(time,1,10) = '$hari_ini'";
$hs4=mysql_query($sql4);
$totalklik_24jam=mysql_fetch_array($hs4);

$sql5="SELECT COUNT(DISTINCT(ip)) as ipj FROM `t_statistik` WHERE substring(time,1,10) = '$hari_ini' ";
$hs5=mysql_query($sql5);
$total_24jam=mysql_fetch_array($hs5);

$online = $yr."-".$mon.'-'.$day.' '.$hrs.':'.substr($min,0,1);

$sql6="SELECT COUNT(DISTINCT(ip)) as ipj FROM `t_statistik` WHERE substring(time,1,15) = '$online' ";
$hs6=mysql_query($sql6);
$total_online=mysql_fetch_array($hs6);

//Dibawah ini contoh untuk melakukan output pada browser
echo "<H3><FONT COLOR= #A2CC00>Statistik Pengunjung</font></H3>";
echo "<IMG SRC='images/04.gif' width='30' height='25'>&nbsp;<FONT COLOR= #A2CC00>Total klik :</font> ".$total_klik[jum]."<br>";
echo "<IMG SRC='images/56.gif' width='30' height='25'>&nbsp;<FONT COLOR= #A2CC00>Pengunjung : </FONT>".$unique[ipj]."<br>";
echo "<IMG SRC='images/115.gif' width='30' height='25'>&nbsp;<FONT COLOR= #A2CC00>Klik dalam 24 jam : </FONT>".$totalklik_24jam[jum]."<br>";
echo "<IMG SRC='images/10.gif' width='30' height='25'>&nbsp;<FONT COLOR= #A2CC00>Pengunjung dalam 24 jam : </FONT>".$online[ipj]."<br>";
echo "<IMG SRC='images/05.gif' width='30' height='25'>&nbsp;<FONT COLOR= #A2CC00>Yang sedang online : </FONT>".$total_online[ipj]."<br>";
?>