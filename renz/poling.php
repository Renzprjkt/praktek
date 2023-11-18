<?php
include "koneksi.php";
$sql="select * from t_poling WHERE `status` =1 order by kode desc limit 0,1";
$hsl=mysql_query($sql);
$row=mysql_fetch_array($hsl);
//echo substr($row[5],0,stropos($row[5],"_"));
$plh=$_GET['plh'];
$act=$_GET['act'];
if($act=="View")
{
	$code=$_GET["code"];
	echo "<script>document.location='view_poling.php?kode=$code'</script>";
}
if (($act=="Send")&&($plh!=""))
{
	$code=$_GET['code'];
	$brs=$_GET['brs'];
	$pil=$_GET['pil'];
	$hit=$_GET['hit'];

	$brs=substr($plh,0,1);
	$pil=substr($plh,1,strpos($plh,"-")-1);
	$hit=substr($plh,strpos($plh,"-")+1,2);

	$sqll="UPDATE t_poling SET pilih_$brs=$hit where kode='$code'";
	mysql_query($sqll);
	echo "<script>alert('Thanks For Join, Your Choose Is $pil')</script>";
	echo "<script>document.location='index.php'</script>";
}
else if(($act=="Send")&&($plh==""))
{
	echo "<script>alert('Your Forget To Choose This Polling !')</script>";
}

?>

<html>
<SCRIPT LANGUAGE="JavaScript">
function openView()
{
	newWindow=window.open("", 'lov', 'scrollbars=yes, toolbars=no , width=700, height=500');
	newWindow.self.location='view_poling.php?kode='+document.poling.code.value;
}
</script>
<body>

<form method="GET" action="<?php echo $php_self?>" name="poling">
<INPUT TYPE="hidden" NAME="code" value="<?php echo $row[0];?>">
<FONT SIZE="4" COLOR="#A2CC00" FACE="arial"><marquee>Polling Interaktif Berhadiah Jutaan Rupiah !!!</marquee></FONT>
<CENTER><TABLE border=3 bgcolor="black" color="#A2CC00" align="center" valign="middle" width="90%">

<TR>
	<TD><H3><?php echo $row[2];?></H3></TD>
</TR>
<TR>
	<TD><INPUT TYPE="radio" NAME="plh" value=<?$jaw=$row[8]+1; $pil=$row[3]; echo "1".$pil."-".$jaw;?>>&nbsp;
	<FONT SIZE="2" COLOR="#A2CC00"><B><?php echo $row[3];?></B></FONT><BR></TD>
</TR>
<TR>
	<TD><INPUT TYPE="radio" NAME="plh" value=<?$jaw=$row[9]+1; $pil=$row[4]; echo "2".$pil."-".$jaw;?>>&nbsp;
	<FONT SIZE="2" COLOR="#A2CC00"><B><?php echo $row[4];?></B></FONT><BR></TD>
</TR>
<TR>
	<TD><INPUT TYPE="radio" NAME="plh" value=<?$jaw=$row[10]+1; $pil=$row[5]; echo "3".$pil."-".$jaw;?>>&nbsp;
	<FONT SIZE="2" COLOR="#A2CC00"><B><?php echo $row[5];?></B></FONT><BR></TD>
</TR>
<TR>
	<TD><INPUT TYPE="radio" NAME="plh" value=<?$jaw=$row[11]+1; $pil=$row[6]; echo "4".$pil."-".$jaw;?>>&nbsp;
	<FONT SIZE="2" COLOR="#A2CC00"><B><?php echo $row[6];?></B></FONT><BR></TD>
</TR>
<TR>
	<TD><INPUT TYPE="radio" NAME="plh" value=<?$jaw=$row[12]+1; $pil=$row[7]; echo "5".$pil."-".$jaw;?>>&nbsp;
	<FONT SIZE="2" COLOR="#A2CC00"><B><?php echo $row[7];?></B></FONT><BR></TD>
</TR>
<TR>
	<TD><BR><CENTER><INPUT TYPE="submit" name=act value="Send" class="button">&nbsp; <!-- <INPUT TYPE="reset" value="Cancel" class=button onclick="location='javascript:history.go(-1)'">&nbsp;  --><INPUT TYPE="submit" name=act value="View" class="button"></CENTER></TD>
</TR>
</TABLE>
<marquee><img src="images/mataduitan.gif"></marquee>
</CENTER>