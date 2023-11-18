<?php
include "koneksi.php";
if (($act=="Login") && ($usr!=""))
{	$pas=md5($pas);
	$masuk="SELECT * FROM `t_login` WHERE `user_name` LIKE CONVERT( _utf8 '$usr' USING latin1 )COLLATE latin1_swedish_ci AND `password` ='$pas'  AND `kd_domain` LIKE CONVERT( _utf8 '$dmd' USING latin1 )COLLATE latin1_swedish_ci ";
	$qmasuk=mysql_query($masuk);
	$bmasuk=mysql_num_rows($qmasuk);
if ($bmasuk>=1)
{echo "<script>document.location='main.php?usr=$usr&dmd=$dmd'</script>";
echo "<script>alert('access success')</script>";}
else if ($bmasuk<=0)
{echo "<script>document.location='index.php'</script>";
 echo "<script>alert('access denied')</script>";}
}
?>
<link rel="stylesheet" href="images/BluePigment.css" type="text/css" />
<FORM METHOD="get" ACTION="index.php" name="frmlogin">
<TABLE border=1 >
<TR>
	<TD colspan="2" bgcolor="Black" bordercolor="black"><H1><CENTER><FONT SIZE="5" face="algerian">Form Login</FONT></CENTER></H1></TD>
</TR>
<TR>
	<TD>User Name</TD>
	<TD><INPUT TYPE="text" NAME="usr" maxlength="20" size="20" value=""></TD>
</TR>
<TR>
	<TD>Password</TD>
	<TD><INPUT TYPE="password" NAME="pas" maxlength="40" size="20" value=""></TD>
</TR>
<TR>
	<TD>Domain</TD>
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
	?></select></TD>
</TR>
<TR>
	<TD colspan=2 align="center"><INPUT TYPE="submit" value="Login" name="act" >&nbsp;&nbsp;<INPUT TYPE="submit" value="Cancel" name="act" ></TD>
</TR>
</TABLE>

</FORM>