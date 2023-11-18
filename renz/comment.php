<?php
include "koneksi.php";
$eddy = "SELECT max(kode) FROM `t_comment`";
$lia = mysql_query($eddy);
$mamet = mysql_fetch_array($lia);
$bambang =(substr($mamet[0],2,10)*1)+1;
if ($kirim=="KIRIM")
{
$sql="INSERT INTO `t_comment` ( `kode` , `email` , `comment`)VALUES ('$kd', '$email', '$comen')";

$hsl=mysql_query($sql);
//echo $sql;
//	echo "<script>alert('Data sudah tersimpan')</script>";
	echo "<script>window.reload('comment.php')</script>";
	echo "<script>document.location='comment.php'</script>";
}
?>
<script language="javascript">
function validasi()
{
var mr=document.frmcomen.email.value;	
if(mr=="")
{
	alert("Anda belum mengisi e-mail");
	document.frmcomen.email.focus();
	return false;
}
else 
var jenis=document.frmcomen.comen.value;
if(jenis=="")
{
	alert("Anda belum mengisi komentar");
	document.frmcomen.comen.focus();
	return false;
}
else  
{
	pesan="Terima Kasih Atas Saran Anda";
		alert("Data Telah Dikirim");
		alert(pesan);
		return true;
  }
}
</SCRIPT>
<CENTER><FORM METHOD="get" ACTION="comment.php" name="frmcomen">
<CENTER>Mohon Kritik & Saran Anda Demi Pelayanan Yang Lebih Baik Di Masa Datang</CENTER>
<CENTER><table border="1">
<TR>
<TD>Kode :</TD>
<TD><input type="text" name="kd" value="<?php echo'CM'.$bambang?>" readonly="yes"></TD>
</TR>
<TR>
<TD>Email :</TD>
<TD><INPUT TYPE="text" NAME="email" value=""></TD><BR>
</TR>
<TR>
<TD>Comment :</TD>
<TD><TEXTAREA NAME="comen" ROWS="8" COLS="25"></TEXTAREA></CENTER></TD><BR>
</TR>
<TD colspan=2><CENTER><INPUT TYPE="submit" NAME="kirim" VALUE="KIRIM" onclick="return validasi();">&nbsp;&nbsp;<INPUT TYPE="reset" NAME="reset" VALUE="RESET"></CENTER></TD>
</table>
<IMG SRC="images/awasya.gif">