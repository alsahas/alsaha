<?php 
	session_start();
	
	$_SESSION['site']="tables";
include("connection.php");
include("tables_main_back.php");

 	if(isset($_GET['group_id']))
	{
		$q="select * from `team` ";
		if($_GET['group_id']!=0)$q.="where group_number=".$_GET['group_id'];
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table=mysql_query($q);
		$count=0;
		while($donne=mysql_fetch_array($select_table))
		{
			$count++;
		}
		if($count==4)
		{
			$select_table=mysql_query($q);
			$rank=1;
			?>
			<table bgcolor="#3344cc"width="60%"align="center"border=1>
			<tr><td colspan=7 align=center><h1 style="color:white">GROUP <?php echo($_GET['group_id']);?></h1></td></tr>
			<tr align=center class="white17"border=0>
				<td></td><td>Team</td><td></td>
				<td>Played</td>
				<td>With</td>
				<td>Against</td>
				<td>Points</td>
			</tr>
<?php		while($donne=mysql_fetch_array($select_table))
			{ ?>
			<tr <?php if($rank<=2){?>bgcolor="#00cc00"<?php }?>align=center class="black17">		
				<td><?php echo($rank);$rank++;?></td>
				<td width="40%"><?php echo($donne['team_name']);?></td>
				<td><img width=30 height=20 src="all teams flags/<?php echo($donne['pic']);?>"></td>
				<td><?php echo($donne['played']);?></td>
				<td><?php echo($donne['with_team']);?></td>
				<td><?php echo($donne['against']);?></td>
				<td><?php echo($donne['points']);?></td>
			</tr>
<?php		}?>
			</table>
	<?php	$q="select * from `match` where team_id1 in(".($_GET['group_id']*4-3)
			.",".($_GET['group_id']*4-2).",".($_GET['group_id']*4-1)
			.",".($_GET['group_id']*4).") and round_number=1 order by match_time";
			$qu=mysql_query($q);
	?>
			<br><br><br>
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
	<?php			if($donne['match_played']==0)
					{?>
						-
	<?php			} 
					else
					{?>
						<h3 style="color:white"><?php echo($donne['score1']);?></h3>
	<?php			} ?>
					</td>
					<td align="center"><h3 style="color:white">X</h3></td>
					<td>
	<?php			if($donne['match_played']==0)
					{?>
						-
	<?php			} 
					else
					{?>
						<h3 style="color:white"><?php echo($donne['score2']);?></h3>
	<?php			} ?>			
					</td>
					<td><h3 style="color:white"><?php echo($team2['team_name']);?></h3></td>
				</tr>
				<tr align=center><td colspan=5><?php echo($donne['match_time']);?></span></td></tr>
				<td><span>
				</table>
				<br><br>
<?php		}	?>
<?php	}
		else
		{
		$q="select * from `team` ";
		$q.="where group_number=1";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table1=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=2";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table2=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=3";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table3=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=4";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table4=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=5";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table5=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=6";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table6=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=7";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table7=mysql_query($q);
		
		$q="select * from `team` ";
		$q.="where group_number=8";
		$q.=" order by points DESC,(with_team-against) DESC,with_team DESC";
		$select_table8=mysql_query($q);
			for($i=1;$i<9;$i++)
			{
				$rank=1;
				?>
				<table bgcolor="#3344cc"width="40%" align=center border=1>
				<tr><td colspan=7 align=center><h2 style="color:white">GROUP <?php echo($i);?></h2></td></tr>
				<tr align=center class="white15"border=0>
					<td></td><td>Team</td><td></td>
					<td>Played</td>
					<td>With</td>
					<td>Against</td>
					<td>Points</td>
				</tr>
<?php			
				if($i==1)$var=$select_table1;
				else if($i==2)$var=$select_table2;
				else if($i==3)$var=$select_table3;
				else if($i==4)$var=$select_table4;
				else if($i==5)$var=$select_table5;
				else if($i==6)$var=$select_table6;
				else if($i==7)$var=$select_table7;
				else if($i==8)$var=$select_table8;
				while($donne=mysql_fetch_array($var))
				{ ?>
				<tr <?php if($rank<=2){?>bgcolor="#00cc00"<?php }?>align=center class="black15">		
					<td><?php echo($rank);$rank++;?></td>
					<td width="40%"><?php echo($donne['team_name']);?></td>
					<td><img width=23 height=17 src="all teams flags/<?php echo($donne['pic']);?>"></td>
					<td><?php echo($donne['played']);?></td>
					<td><?php echo($donne['with_team']);?></td>
					<td><?php echo($donne['against']);?></td>
					<td><?php echo($donne['points']);?></td>
				</tr>	
<?php			}?>
			</table><br>
<?php		}
		}
	}
	
?>