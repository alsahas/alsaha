<?php 
	session_start();
	
	$_SESSION['site']="secondRound";
	include("connection.php");
	include("main_back.php");

	$q="select *,count(*) as count from `match` where round_number=2 group by match_id order by match_time";
	$qu=mysql_query($q);
	?>
	<br>
	<?php
		
		while($donne=mysql_fetch_array($qu))
		{
			$q2="select * from team where team_id=".$donne['team_id1'];
			$qu2=mysql_query($q2);
			$team1=mysql_fetch_array($qu2);
			$q3="select * from team where team_id=".$donne['team_id2'];
			$qu3=mysql_query($q3);
			$team2=mysql_fetch_array($qu3);
			?>
			<table border=0 align=center>
			<tr align=center>
				<td colspan="2"><img src="all teams flags/<?php echo($team1['pic']);?>" width=140 height=100></td>
				<td><h3 style="color:white">VS</h1></td>
				<td colspan="2"><img src="all teams flags/<?php echo($team2['pic']);?>" width=140 height=100></td>
			</tr>
			<tr align=center bgcolor="#3344cc">
				<td><h3 style="color:white"><?php echo($team1['team_name']);?></h3></td>
				<td>
	<?php		if($donne['match_played']==0)
				{?>
					
	<?php		} 
				else
				{?>
					<h3 style="color:white"><?php echo($donne['score1']);?></h3>
	<?php		} ?>
				</td>
				<td align="center"><h3 style="color:white">X</h3></td>
				<td>
	<?php		if($donne['match_played']==0)
				{?>
					
	<?php		} 
				else
				{?>
					<h3 style="color:white"><?php echo($donne['score2']);?></h3>
	<?php		} ?>			
				</td>
				<td><h3 style="color:white"><?php echo($team2['team_name']);?></h3></td>
			</tr>
			</table>
	<?php } 
		$q="select count(*) as count from `match` where round_number=2";
		$qu=mysql_query($q);
		$donne=mysql_fetch_array($qu);
		if($donne['count']==0)
		{
		?>
			<h1 align="center"style="color:white;background-color:black">NO SECOND ROUND YET</h1>
<?php	}
		?>			
			<br><br>