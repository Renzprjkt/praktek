<html>
<!-- buat nampilin abis login -->
<head>
 <?php 
 
 include "koneksi.php";
 session_register("rek");
 ?>
<link rel="stylesheet" href="images/BluePigment.css" type="text/css" />

<title>Main</title>
	
</head>

<body>

	<!-- header starts here -->
	<div id="header"><div id="header-content">	
		
		<h1 id="logo-text"><a href="#" title="">E-Commerce<span> Sparepart Computer</span></a></h1>
		<div class="sidebox">
					<ul class="sidemenu">
				<div id="header-links">
			<p>
				<!-- <strong><b><font size="4"><a href="tampiljenis.php" target="commerce">Jenis Barang</a>&nbsp;  
				<a href="tampil.php" target="commerce">Barang</a>&nbsp;
				<a href="tampilanggota.php" target="commerce">Anggota</strong></font></a>		 -->	
			</p>		
		</div>	

				
					</ul>	
					<BR>
				</div>
		<h2 id="slogan"><blink>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<FONT SIZE="4" face="pandastyle" color="#66FF00">Selamat</font><FONT SIZE="4" face="pandastyle" color="#FFFFFF"> Datang </font><FONT SIZE="4" face="pandastyle" color="#33FF00">Di Astro Komputer</FONT></h2>		
		
		
	
	</div></div>
	
	<!-- navigation starts here -->
	<div id="nav-wrap"><div id="nav">
		
		<ul>
		 <?php 
		$mn="select m.* from t_menu as m,t_hakakses as ha where m.kd_menu=ha.kd_menu and ha.kd_domain='$dmd' ";
		$hs=mysql_query($mn);
		while($br=mysql_fetch_array($hs))
		{
		?>
		<a href="<?php echo $br[3]?> " class="a2" target="commerce"><strong><?php echo strtoupper($br[1]);?></strong></a>&nbsp;&nbsp;&nbsp;<?php }?>
		</ul>
		<p align="right"><a href="logout.php">Sign Out</a>
	</div></div>
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">	 
	
		<div id="sidebar" >	
		
				<div class="sep"></div>
				
				<div class="sidemenu">
					
				</div>
		
				
				<div class="sidebox">
					<h1>Wise Words</h1>
			
					<blink><p>&quot; Jagalah hati, jangan kau nodai &quot;</p></blink>		
			
					<p class="align-right">- "Dokter Boyke"</p>		
				</div>
			
				<div class="sidebox">
					<p>

					<?php include "statistik_pengunjung.php" ?><!-- donate link</a> on my website - it will 
					be a great help and will surely be appreciated. -->
	
					</p>	
				</div>
				
				<div class="sidebox">
					<h1>RSS Feed</h1>
					<p><a href="#" ><img src="images/icon_email.gif"></a><br />
					<strong><a href="#" >Kelompok 4</a></strong>
					<BR>
					<a href="mailto:eddyyuliansyah@yahoo.com">Eddy Yuliansyah (09)</a>
					<BR>
					<a href="mailto:liadwikurnia@yahoo.com/">Lia Dwi Kurnia (12)</a>
					<BR>
					<a href="mailto:stevenmamet@rocketmail.com/">Muhamad (14)</a>
					</p>
				</div>	
				
		</div>	
	
		<div id="main">		
		
			<div class="box">
			
				<a name="TemplateInfo"></a>				
				<h1>E-commerce Spare<span class="white">parts Komputer</span></h1>
				
				<!-- <code> -->
				<CENTER><iframe name="commerce" width="600" height="500" background="#1E89DC"></iframe></CENTER>
				<!-- </code>	 -->
			</div>			
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="image" SRC="images/bnr-71c6766dec.gif">
				
				<!-- <h3>Image and text</h3> -->
				
				<p>
				<!-- <a href="http://getfirefox.com/"><img src="images/firefox-gray.jpg" width="100" height="121" alt="firefox-gray"  class="float-left" /></a> -->
				<!-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. 
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu 
				posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum 
				odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra 
				condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. 
				In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar 
				ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est.  -->			<?php //include "frmlogin.php";?>					
				</p>
			
				<!-- <h3>Table Data Pengunjung Astro Komputer Web</h3>							
				
				<table>
					<tr>
						<th class="first"><strong>post</strong> date</th>
						<th>title</th>
						<th>description</th>
					</tr>
					<tr class="row-a">
						<td class="first">07.18.2007</td>
						<td><a href="#">Augue non nibh</a></td>
						<td><a href="#">Lobortis commodo metus vestibulum</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">07.18.2007</td>
						<td><a href="#">Fusce ut diam bibendum</a></td>
						<td><a href="#">Purus in eget odio in sapien</a></td>
					</tr>
					<tr class="row-a">
						<td class="first">07.18.2007</td>
						<td><a href="#">Maecenas et ipsum</a></td>
						<td><a href="#">Adipiscing blandit quisque eros</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">07.18.2007</td>
						<td><a href="#">Sed vestibulum blandit</a></td>
						<td><a href="#">Cras lobortis commodo metus lorem</a></td>
					</tr>
				</table> -->
			
				<!-- <h3>Kotak Saran Pengunjung Web Astro Komp.</h3>
				
				<form action="#">		
					<p>
						<label>Nama</label>
						<input name="dname" value="Your Name" type="text" size="30" />
						<label>Email</label>
						<input name="demail" value="Your Email" type="text" size="30" />
						<label>Saran Anda</label>
						<textarea rows="5" cols="5"></textarea>
						<br />	
						<input class="button" type="submit" />		
					</p>		
				</form>	 -->
			
			</div>			
			
			<br />				
										
		</div>			
		
	
	<!-- content-wrap ends here -->		
	</div></div>

	<!-- footer starts here-->		
	<div id="footer-wrap">
	
		<div id="footer-bottom">

            <p>
			&copy; Astro Computer 2010 

            &nbsp;&nbsp;&nbsp;&nbsp;

			<a href="#" title="Website Templates">website templates</a> by <a href="#">styleshout</a>

   		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<!-- <a href="#">Home Sweet Home</a> |
   		    <a href="#">Sitemap ASTRO</a> |
	   	    <a href="#">RSS Feed </a> |
            <a href="http://validator.w3.org/check?uri=referer">XHTML</a> |
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> -->
			</p>

		</div>	

<!-- footer ends-->
</div>

</body>
</html>
