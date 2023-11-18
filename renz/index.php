<html>
<script language="javascript">
function openView()
{
newWindow= window.open(" ",'sign.php','scrollbars=yes,toolbar=no,width=250,height=200');
newWindow.self.location='sign.php?key=usr';}

function openViewLogin()
{
newWindow= window.open(" ",'formanggota.php','scrollbars=yes,toolbar=no,width=500,height=400');
newWindow.self.location='formanggota?key=usr';}
</script>
<head>

<link rel="stylesheet" href="images/BluePigment.css" type="text/css" />

<title>E-Commerce Computer</title>
	
</head>

<body>

	<!-- header starts here -->
	<div id="header"><div id="header-content">	
		
		<!-- <h1 id="logo-text"><a href="index.html" title="">E-Commerce <span>- Sparepart Computer</span></a></h1>	
		<h2 id="slogan"><marquee>PHP Maknyoss Bener......</marquee></h2>		 -->
		<BR>
		<CENTER><INPUT TYPE="image" SRC="header2.jpg"></CENTER>
		<div id="header-links">	
			</p>		
		</div>	
	
	</div></div>
	
	<!-- navigation starts here -->
	<div id="nav-wrap"><div id="nav">
		
	<!-- buat hak akses -->
		<ul>
		<?php
			 include "koneksi.php";
		$mn="select m.* from t_menu as m,t_hakakses as ha where m.kd_menu=ha.kd_menu and ha.kd_domain='USR' ";
		$hs=mysql_query($mn);
		while($br=mysql_fetch_array($hs))
		{
		?>
		<a href="<?php echo $br[3]?>" class="a2" target="commerce"><strong><?php echo $br[1]?></strong></a>&nbsp;&nbsp;&nbsp;<?php }?>
		</ul>


		<!-- <p align="right"><a href="frmlogin.php" onclick="openViewLogin();">Sign In</a> -->
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<!-- <a href="sign.php">Sign In</a>onclick="openView();" -->
		<!-- <input type="button" value="Sign In" onclick="openView();" class=button> -->
		<input type="button" value="Join Us" onclick="openViewLogin();" class=button>
		<!-- <a href="formanggota.php" onclick="return openView();">Not Member, Join Us!</a> -->
	
	</div></div>
				
	<!-- content-wrap starts here -->
	<div id="content-wrap"><div id="content">	 
	
		<div id="sidebar" >	
		
				<div class="sep"></div>
				
				<div class="sidemenu">
					
				</div>
		
				<div class="sidebox">
					<h1>Sidebar Menu</h1>
					<ul class="sidemenu">
		<li>
		<?php
		include "koneksi.php";
		$mn="select m.* from t_menu as m,t_hakakses as ha where m.kd_menu=ha.kd_menu and ha.kd_domain='USR' ";
		$hs=mysql_query($mn);
		while($br=mysql_fetch_array($hs))
		{
		?>
		<a href="<?php echo $br[3]?>" class="a2" target="commerce"><strong><?php echo $br[1]?></strong></a><?php }?>
		</li>
					</ul>	
					<BR>
				</div>
				<div class="sidebox">
					<blink><h1>ATTENTION</h1></blink>
			
					<p>&quot;Bila anda ingin membeli produk kami, anda terlebih dahulu harus mendaftarkan diri anda menjadiu anggota&quot;</p>		
			
					<p class="align-right">"Admin"</p>		
				</div>
			
				<div class="sidebox">		
					<p>
					<?php include "statistik_pengunjung.php" ?><!-- donate link</a> on my website - it will 
					be a great help and will surely be appreciated. -->
					</p>	
				</div>
				
				<div class="sidebox">
					<h1>RSS Feed</h1>
					<p><a href="index.php" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/ini.gif" alt="RSS Feed" class="rssfeed" /></a><br />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/URL Link.png" width='60' height='60'><strong><!-- <a href="index.html" >rss feed</a> --></strong>
					<BR>
					<a href="mailto:eddyyuliansyah@yahoo.com">Eddy Yuliansyah (09)</a>
					<BR>
					<a href="mailto:stevenmamet@rocketmail.com/">Muhammad (14)</a>
					<BR>
					<a href="mailto:liadwikurnia@yahoo.com/">Lia Dwi Kurnia (12)</a>
					</p>
				</div>	
			&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/online.gif">	
			<br>
		</div>	
	
		<div id="main">		
		
			<div class="box">
			
				<a name="TemplateInfo"></a>				
				
				<!-- <code> -->
				<CENTER><iframe name="commerce" width="600" height="500" background="#1E89DC" src="utama.gif"></iframe></CENTER>
				<!-- </code>	 -->
				
			
			</div>			
			
				
				<h3>Image and text</h3>
				
				<p>
				<!-- Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. 
				Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu 
				posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum 
				odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra 
				condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. 
				In tristique orci porttitor ipsum. Aliquam ornare diam iaculis nibh. Proin luctus, velit pulvinar 
				ullamcorper nonummy, mauris enim eleifend urna, congue egestas elit lectus eu est.  -->			<?php include "frmlogin.php";?>					
				</p>
			
				<!-- <h3>Table Styling</h3>							
				
				<table>
					<tr>
						<th class="first"><strong>post</strong> date</th>
						<th>title</th>
						<th>description</th>
					</tr>
					<tr class="row-a">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Augue non nibh</a></td>
						<td><a href="index.html">Lobortis commodo metus vestibulum</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Fusce ut diam bibendum</a></td>
						<td><a href="index.html">Purus in eget odio in sapien</a></td>
					</tr>
					<tr class="row-a">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Maecenas et ipsum</a></td>
						<td><a href="index.html">Adipiscing blandit quisque eros</a></td>
					</tr>
					<tr class="row-b">
						<td class="first">07.18.2007</td>
						<td><a href="index.html">Sed vestibulum blandit</a></td>
						<td><a href="index.html">Cras lobortis commodo metus lorem</a></td>
					</tr>
				</table> -->
			<HR>
			<BR>
					<?php include "poling.php";	?>
						<!-- <label>Name</label>
						<input name="dname" value="Your Name" type="text" size="30" />
						<label>Email</label>
						<input name="demail" value="Your Email" type="text" size="30" />
						<label>Your Comments</label>
						<textarea rows="5" cols="5"></textarea>
						<br />	
						<input class="button" type="submit" />		 -->
					</p>		
				</form>	
			
			</div>			
			
			<br />				
										
		</div>			
	<p align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.whplus.com/"><INPUT TYPE="image" SRC="images/bnr-71c6766dec.gif"></a>
<BR>
<BR>
	<!-- content-wrap ends here -->		
	</div></div>

	<!-- footer starts here-->		
	<div id="footer-wrap">
	
		<div id="footer-bottom">

            <p>
			&copy; 2010 Astro Comp.

            &nbsp;&nbsp;&nbsp;&nbsp;

			<a href="index.html" title="Website Templates">website templates</a> by <a href="http://www.styleshout.com/">styleshout</a>

   		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<a href="#">Home</a> |
   		    <a href="#">Sitemap</a> |
	   	    <a href="#">RSS Feed</a> |
            <a href="#">XHTML</a> |
			<a href="#">CSS</a>
			</p>

		</div>	

<!-- footer ends-->
</div>

</body>
</html>
