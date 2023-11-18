<?php
include "koneksi.php";
if (($act=="Login") && ($usr!=""))
{	$pas=md5($pas);
	$masuk="SELECT * FROM `t_m_anggota` WHERE `user_name` LIKE CONVERT( _utf8 '$usr' USING latin1 )COLLATE latin1_swedish_ci AND `password` LIKE CONVERT( _utf8 '$pas' USING latin1 )COLLATE latin1_swedish_ci ";
	$qmasuk=mysql_query($masuk);
	$bmasuk=mysql_num_rows($qmasuk);
if ($bmasuk>=1)
{echo "<script>document.location='main.php?usr=$usr</script>";
echo "<script>alert('access success')</script>";}
else if ($bmasuk<=0)
{echo "<script>document.location='index.php'</script>";
 echo "<script>alert('access denied')</script>";}
}
?>
<script language="javascript">
function validation()
{
var user=document.frmsign.usr.value;
	if(user=="")
 	{
	alert("Anda belum mengisi user name");
	document.frmsign.usr.focus();
	return false;
	}
var pass=document.frmsign.pas.value;
	if(pass=="")
 	{
	alert("anda belum mengisi password");
	document.frmsign.pas.focus();
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
<FORM METHOD="get" ACTION="index.php" name="frmsign">
<TABLE border=3 bgcolor="black" color="#A2CC00">
<TR>
	<TD colspan="2" bgcolor="Black" bordercolor="black"><H1><CENTER><FONT SIZE="5" face="algerian">Form Login</FONT></CENTER></H1></TD>
</TR>
<TR>
	<TD><FONT COLOR= #A2CC00>User Name</FONT></TD>
	<TD><INPUT TYPE="text" NAME="usr" maxlength="20" size="20" value=""></TD>
</TR>
<TR>
	<TD><FONT COLOR= #A2CC00>Password</FONT></TD>
	<TD><INPUT TYPE="password" NAME="pas" maxlength="40" size="20" value=""></TD>
</TR>
<!-- <TR>
	<TD><FONT COLOR= #A2CC00>Domain</FONT></TD>
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
</TR> -->
<TR>
	<TD colspan=2 align="center"><INPUT TYPE="submit" value="Login" name="act" class="button" onclick="return validation();">&nbsp;&nbsp;<INPUT TYPE="submit" value="Cancel" name="act" class="button"></TD>
</TR>
</TABLE>

</FORM>