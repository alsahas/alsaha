<html>
<LINK title=standard media=screen 
href="worldcup2010.css" type=text/css rel=stylesheet></LINK>
	<body background="logos/world cup logo2.bmp">
	<body background="logos/world cup logo2.bmp">
	<table bgcolor="#236623"width="100%"border="0">
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
		<tr>
			<td><img src="logos/logoFIFA.gif"></td>
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="home")
			echo("><h3 style=\"color:red\">Home</h3>");else{?> ><a href="index.php">Home</a><?php }?></td>
			
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="tables")
			echo("><h3 style=\"color:red\">Tables</h3>");else{?> ><a href="tables.php">Tables</a><?php }?></td>
			
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="secondRound")
			echo("><h3 style=\"color:red\">2<sup>nd</sup> Round</h3>");else{?> ><a href="second_round.php">2<sup>nd</sup> Round</a><?php }?></td>
			
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="quarterFinal")
			echo("><h3 style=\"color:red\">Quarter Final</h3>");else{?> ><a href="quarter_final.php">Quarter Final</a><?php }?></td>
			
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="semiFinal")
			echo("><h3 style=\"color:red\">Semi Final</h3>");else{?> ><a href="semi_final.php">Semi Final</a><?php }?></td>
			
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="thirdPlace")
			echo("><h3 style=\"color:red\">Third Place</h3>");else{?> ><a href="third_place.php">Third Place</a><?php }?></td>
			
			<td <?php if(isset($_SESSION['site'])&&$_SESSION['site']=="final")
			echo("><h3 style=\"color:red\">Final</h3>");else{?> ><a href="final.php">Final</a><?php }?></td>
			<td align=right><img src="logos/logoFIFA.gif"></td>
		</tr>
		<tr>
			<td >
			<img src="logos/wc2010logo.png">&nbsp;
			</td>
			<td align=center colspan=7><img src="logos/logo2.png"></td>
			<td align=right><img src="logos/wc2010_big_title.png"></td>
		</tr>		
	</table>
	<table width="100%"align="center"bgcolor="#4488cc"border=0>
	<tr align=center>
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==1)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 1");
		else { ?>><a href="?group_id=1">GROUP 1</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==2)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 2");
		else { ?>><a href="?group_id=2">GROUP 2</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==3)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 3");
		else { ?>><a href="?group_id=3">GROUP 3</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==4)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 4");
		else { ?>><a href="?group_id=4">GROUP 4</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==5)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 5");
		else { ?>><a href="?group_id=5">GROUP 5</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==6)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 6");
		else { ?>><a href="?group_id=6">GROUP 6</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==7)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 7");
		else { ?>><a href="?group_id=7">GROUP 7</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==8)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>GROUP 8");
		else { ?>><a href="?group_id=8">GROUP 8</a><?php }?></td>
		
		<td <?php if(isset($_GET['group_id'])&&$_GET['group_id']==0)echo("bgcolor='#224499'style='color:red;font-weight:bold;font-size:15'>ALL GROUPS");
		else { ?>><a href="?group_id=0">ALL GROUPS</a><?php }?></td>
	</tr>
	</table>
	