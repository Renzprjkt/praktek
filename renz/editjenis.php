<?php
include "koneksi.php";
$sql="select * from t_m_jenis_sparepart where kode='$kd'";
$hsl=mysql_query($sql);
$brs=mysql_fetch_array($hsl);
?>

<form method="get" name="frmeditjenis" action="editjenis">
<TABLE bgcolor="#0066FF" border="2" color="#FFFF00">
<TR>
	<TD colspan="3"><H1>Maintain Jenis Sparepart</H1></TD>
</TR>
<TR>
	<TD>Kode Sparepart</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="kd" size="10" maxlength="5"></TD>
</TR>
<TR>
	<TD>Nama Sparepart</TD>
	<TD>:</TD>
	<TD><INPUT TYPE="text" NAME="nm" size="30" maxlength="30"></TD>
</TR>
</TABLE>
<input type="hidden" name="kd" value="<?php echo $kd;
?>">
value="<php echo"