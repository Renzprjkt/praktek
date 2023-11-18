<?php
include "koneksi.php";

if (($act=="Login") && ($usr!=""))
{	$pas=md5($pas);
	$masuk="SELECT * FROM `t_login` WHERE `user_name` LIKE CONVERT( _utf8 '$usr' USING latin1 )COLLATE latin1_swedish_ci AND `password` ='$pas'  AND `kd_domain` LIKE CONVERT( _utf8 '$dmd' USING latin1 )COLLATE latin1_swedish_ci ";
	$qmasuk=mysql_query($masuk);
	$bmasuk=mysql_num_rows($qmasuk);
if ($bmasuk>=1)
{echo "<script>document.location='main.php?usr=$usr&dmd=$dmd&rek=$rek'</script>";
echo "<script>alert('access success')</script>";}
else if ($bmasuk<=0)
{echo "<script>document.location='index.php'</script>";
 echo "<script>alert('access denied')</script>";}
}
?>
<script language="javascript">
function validation()
{
var user=document.frmlogin.usr.value;
	if(user=="")
 	{
	alert("Anda belum mengisi user name");
	document.frmlogin.usr.focus();
	return false;
	}
var pass=document.frmlogin.pas.value;
	if(pass=="")
 	{
	alert("anda belum mengisi password");
	document.frmlogin.pas.focus();
	return false;
	}
//else
//	{alert("Login Success");
//	document.frmlogin.focus();
//	return true;
//	}
}


</script>
<link rel="stylesheet" href="images/BluePigment.css" type="text/css" />
<FORM METHOD="get" ACTION="index.php" name="frmlogin">
<TABLE border=3 bgcolor="black" color="#A2CC00">
<TR>
	<TD colspan="2" bgcolor="Black" bordercolor="black"><H1><CENTER><FONT SIZE="5" face="algerian">Form Login</FONT></CENTER></H1></TD>
</TR>
<TR>
	<TD><FONT COLOR= #ffffff>User Name</FONT></TD>
	<TD><INPUT TYPE="text" NAME="usr" maxlength="20" size="20" value=""></TD>
</TR>
<TR>
	<TD><FONT COLOR= #ffffff>Password</FONT></TD>
	<TD><INPUT TYPE="password" NAME="pas" maxlength="40" size="20" value=""></TD>
</TR>
<TR>
	<TD><FONT COLOR= #ffffff>Domain</FONT></TD>
	<TD><select name='dmd'><?php
		$eddy="select * from t_domain";
		$qeddy=mysql_query($eddy);
		while($beddy=mysql_fetch_array($qeddy))
		{
			if ($beddy[1]==$hasil[3])
			{echo("<option value=$beddy[0] selected>".$beddy[1]."</option>");}
			else if ($beddy[0]!=$hasil[3])
			{echo("<option value=".$beddy[0].">".$beddy[1]."</option>");}
		}
	?></select>
	
	<?php
	$sikil = "select * from t_rekening_kami";
	$has =mysql_query($sikil);
	$barr= mysql_fetch_array($has);
	?>
	  <input type="hidden" name="rek"  value="<?php echo $barr[0]; ?>" readonly="yes"/></TD>
</TR>
<TR>
	<TD colspan=2 align="center"><INPUT TYPE="submit" value="Login" name="act" class="button" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="submit" value="Cancel" name="act" class="button"></TD>
</TR>
</TABLE>

</FORM>