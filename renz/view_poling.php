<?php
include "koneksi.php";
$code=$_GET['kode'];
$sql="select * from t_poling where kode='$code'";
$hasil=mysql_query($sql);
$row=mysql_fetch_array($hasil);
$jmlpilih=$row[pilih_1]+$row[pilih_2]+$row[pilih_3]+$row[pilih_4]+$row[pilih_5];
$pct_pilihan1=sprintf("%01.1f",(($row[pilih_1]/$jmlpilih)*100));
$graf_pilih1=$pct_pilihan1*5;

$pct_pilihan2=sprintf("%01.1f",(($row[pilih_2]/$jmlpilih)*100));
$graf_pilih2=$pct_pilihan2*5;

$pct_pilihan3=sprintf("%01.1f",(($row[pilih_3]/$jmlpilih)*100));
$graf_pilih3=$pct_pilihan3*5;

$pct_pilihan4=sprintf("%01.1f",(($row[pilih_4]/$jmlpilih)*100));
$graf_pilih4=$pct_pilihan4*5;

$pct_pilihan5=sprintf("%01.1f",(($row[pilih_5]/$jmlpilih)*100));
$graf_pilih5=$pct_pilihan5*5;
?>
<HTML>
<HEAD>
<TITLE>View Polling</TITLE>
</HEAD>
<BODY text=blue>
<!-- link rel="stylesheet" href="BluePigment.css" type="text/css"/> -->
<TABLE width="670" cellpadding="0" cellspacing="0">
<TR>
	<TD>
	<FONT SIZE="5" COLOR="blue">Hasil Grafik Poling</FONT>
	<BR><BR>
		
<TABLE  cellpadding="0" cellspacing="0">
<TR>
	<TD><p align="justify">Topik&nbsp;:&nbsp;<?php echo $row[1];?></p>&nbsp;</TD>
</TR>
<TR>
	<TD><p align="justify">Question&nbsp;:&nbsp;<?php echo $row[2];?></p>&nbsp;</TD>
</TR>
</TABLE>
<TABLE width="90%" colspan=2 cellpadding=2 class="inputbox">
<TR>
	<TD width="35%" height="20%" class=title>Answer</TD>
	<TD class=title>Grafik</TD>
	<TD width="10%" class=title>Hits</TD>
	<TD width="15%" class=title>Persentase</TD>
</TR>
<TR>
	<TD height="20%" colspan=4><HR color=yellow></TD>
</TR>
<TR>
	<TD width="35%" height="20%"><?echo $row[jawab_1]?></TD>
	<TD><img src="images/draft.png"<?echo "width=$graf_pilih1"?> height="12"></TD>
	<TD align="right" width="10%"><?echo$row[pilih_1]?></TD>
	<TD align="right" width="15%"><?echo $pct_pilihan1; echo "%";?></TD>
</TR>
<TR>
	<TD><?echo $row[jawab_2]?></TD>
	<TD><img src="images/draft.png"<?echo "width=$graf_pilih2"?> height="12"></TD>
	<TD align="right"><?echo$row[pilih_2]?></TD>
	<TD align="right"><?echo $pct_pilihan2; echo "%";?></TD>
</TR>
<TR>
	<TD><?echo $row[jawab_3]?></TD>
	<TD><img src="images/draft.png"<?echo "width=$graf_pilih3"?> height="12"></TD>
	<TD align="right"><?echo$row[pilih_3]?></TD>
	<TD align="right"><?echo $pct_pilihan3; echo "%";?></TD>
</TR>
<TR>
	<TD><?echo $row[jawab_4]?></TD>
	<TD><img src="images/draft.png"<?echo "width=$graf_pilih4"?> height="12"></TD>
	<TD align="right"><?echo$row[pilih_4]?></TD>
	<TD align="right"><?echo $pct_pilihan4; echo "%";?></TD>
</TR>
<TR>
	<TD><?echo $row[jawab_5]?></TD>
	<TD><img src="images/draft.png"<?echo "width=$graf_pilih5"?> height="12"></TD>
	<TD align="right"><?echo$row[pilih_5]?></TD>
	<TD align="right"><?echo $pct_pilihan5; echo "%";?></TD>
</TR>
</TABLE>
<A HREF="index.php"><CENTER><H3>Kembali</H3></CENTER></A>
</div>
</td>
</tr>
</table>
</body>
</html>