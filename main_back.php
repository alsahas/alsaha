<html>
<LINK title=standard media=screen 
href="worldcup2010.css" type=text/css rel=stylesheet></LINK>
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