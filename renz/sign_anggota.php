<?php
include "koneksi.php"
?>

<FORM METHOD="get" ACTION="sign_anggota.php" name="signanggota">
<INPUT TYPE="hidden" NAME="dom" value="AGT"> <!-- ni di hidden/sembunyikan -->
<TABLE border=3 bgcolor="black" color="#A2CC00">
<TR>
	<TD colspan="2" bgcolor="Black" bordercolor="#A2CC00"><H1><CENTER><FONT SIZE="5" face="algerian" COLOR= #A2CC00>Form Login Anggota</FONT></CENTER></H1></TD>
</TR>
<TR>
	<TD><FONT COLOR=#A2CC00>User Name</FONT></TD>
	<TD><INPUT TYPE="text" NAME="usr" maxlength="20" size="20" value=""></TD>
</TR>
<TR>
	<TD><FONT COLOR= #A2CC00>Password</FONT></TD>
	<TD><INPUT TYPE="password" NAME="pas" maxlength="40" size="20" value=""></TD>
</TR>
</TABLE>
</FORM>