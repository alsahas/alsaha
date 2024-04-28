<?php 
	session_start();
	
	$_SESSION['site']="home";
include("connection.php");
include("main_back.php");?>
	<form name="result"action="update_matches.php"method="post">
	<input type="hidden"name="m_id">
	<input type="hidden"name="pos">
	<SCRIPT language=JavaScript>
	TargetDate = "12/31/2050 5:00 AM";
	CountActive = true;
	CountStepper = -1;
	LeadingZero = true;
	DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
	//FinishMessage = "It is finally here!";
	</SCRIPT>
	<TABLE cellSpacing=0 cellPadding=5  width=100% border=0>
        <TR align="center">
			<td width=25%></td>
			<TD align=center bgcolor=black><h2>
            <SCRIPT language=JavaScript 
            src="count down file/countdown.js">
			</SCRIPT>
			</h2></TD>
			<td width=25%></td>
		</TR>
	</TABLE>
	<?php 
	//mysql_query("update `match` set `round_number`=1 where 1");
	$q2="select * from `Match`
	where now()-match_time<20000 
	order by match_time";
	$qu2=mysql_query($q2);
	$donne=mysql_fetch_array($qu2);
	$donne2=mysql_fetch_array($qu2);
	if($donne['match_time']==$donne2['match_time'])
	{
		$t33="select * from team where team_id=".$donne2['team_id1'];
		$t44="select * from team where team_id=".$donne2['team_id2'];
		$t3=mysql_query($t33);
		$t4=mysql_query($t44);
		$team3=mysql_fetch_array($t3);
		$team4=mysql_fetch_array($t4);
	}
	if($donne!=null)
	{
	$t11="select * from team where team_id=".$donne['team_id1'];
	$t22="select * from team where team_id=".$donne['team_id2'];
	$t1=mysql_query($t11);
	$t2=mysql_query($t22);
	$team1=mysql_fetch_array($t1);
	$team2=mysql_fetch_array($t2);
	}
	if($donne['match_time']!=$donne2['match_time'])
	{ ?>
		<table border=0 align=center>
		<tr align=center>
			<td colspan=2><img src="all teams flags/<?php echo($team1['pic']);?>" width=200 height=150></td>
			<td><h1 style="color:white">VS</h1></td>
			<td colspan=2><img src="all teams flags/<?php echo($team2['pic']);?>" width=200 height=150></td>
		</tr>
<?php		
		$match="SELECT *,(
		end_time - now( ) 
		), match_id, now( ) , end_time
		FROM `match` 
		where (end_time - now( )>2 and 
		end_time - now( ) <=5500 and match_id 
		in(1,3,8,10,13,16,19,22,24,28,31,33,34,37,38,41,42,45,46,49,51,53,55,57,59)) or (end_time - now( )>=0 and 
		end_time - now( ) <=1500 and match_id not 
		in(1,3,8,10,13,16,19,22,24,28,31,33,34,37,38,41,42,45,46,49,51,53,55,57,59))";
		$match_query=mysql_query($match); 
		?>
		<tr align=center bgcolor="#3344cc">
			<td style="font-size:17;color:white;font-weight:bold;"align=right width="120px"><?php echo($team1['team_name']);?></td>
			<td><?php if($donne['match_played']==1)
			{ ?><h2 style="color:white"><?php echo($donne['score1']);?></h2><?php }
			else{ if(mysql_fetch_array($match_query))
					{?>
						<input type="text"name="result1"size=1>
			<?php	} 
				} ?></td>
			<td><h3 style="color:white">X</h3></td>
			<td><?php if($donne['match_played']==1)
			{ ?><h2 style="color:white"><?php echo($donne['score2']);?></h2><?php }
			else{ $match_query=mysql_query($match);
					if(mysql_fetch_array($match_query))
					{?>
						<input type="text"name="result2"size=1>
			<?php	} 
				} ?></td>
			<td style="font-size:17;color:white;font-weight:bold;"align=right width="120px"><?php echo($team2['team_name']);?></td>
		</tr>
<?php 	$match_query=mysql_query($match);
		$count=0;
		while(mysql_fetch_array($match_query))
		{
			$count++;
		}
		$match_query=mysql_query($match);
		$check=mysql_fetch_array($match_query);
		if($count>0)
		if($check['match_played']==0)
		{?>
			<tr>
				<td colspan=5 align=center>
				<input type="button"value="score"name="submit1"onclick="submit_match2(<?php echo($donne['match_id']);?>,'m1')">
				</td>
			</tr>
<?php	} ?>
		</table>
<?php }
	else
	{ ?>
		<table border=0 align=center>
		<tr align="center">
			<td colspan=2><img src="all teams flags/<?php echo($team1['pic']);?>" width=150 height=100></td>
			<td><h2 style="color:white">VS</h2></td>
			<td colspan=2><img src="all teams flags/<?php echo($team2['pic']);?>" width=150 height=100></td>
			<td width="10%"></td>
			<td colspan=2><img src="all teams flags/<?php echo($team3['pic']);?>" width=150 height=100></td>
			<td><h2 style="color:white">VS</h2></td>
			<td colspan=2><img src="all teams flags/<?php echo($team4['pic']);?>" width=150 height=100></td>
		</tr>
<?php		
		$match="SELECT *,(
		end_time - now( ) 
		), match_id, now( ) , end_time
		FROM `match` 
		where (end_time - now( )>2 and 
		end_time - now( ) <=5500 and match_id 
		in(1,3,8,10,13,16,19,22,24,28,31,33,34,37,38,41,42,45,46,49,51,53,55,57,59)) or (end_time - now( )>=0 and 
		end_time - now( ) <=1500 and match_id not 
		in(1,3,8,10,13,16,19,22,24,28,31,33,34,37,38,41,42,45,46,49,51,53,55,57,59))";
		$match_query=mysql_query($match);
	?>
		<tr align="center" bgcolor="#3344cc">
			<td style="font-size:16;color:white;font-weight:bold;" width="100px"><?php echo($team1['team_name']);?></td>
			<td><?php if($donne['match_played']==1)
			{ ?><h2 style="color:white"><?php echo($donne['score1']);?></h2><?php }
			else{ if(mysql_fetch_array($match_query))
					{?>
						<input type="text"name="result1"size=1>
			<?php	} 
				} ?></td>
			<td><h3 style="color:white">X</h3></td>
			<td><?php if($donne['match_played']==1)
			{ ?><h2 style="color:white"><?php echo($donne['score2']);?></h2><?php }
			else{ $match_query=mysql_query($match);
					if(mysql_fetch_array($match_query))
					{?>
						<input type="text"name="result2"size=1>
			<?php	} 
				} ?></td>
			<td style="font-size:16;color:white;font-weight:bold;"width="120px"><?php echo($team2['team_name']);?></td>
			
			<td bgcolor="null"></td>
			
			<td style="font-size:16;color:white;font-weight:bold;"width="100px"><?php echo($team3['team_name']);?></td>
			<td><?php if($donne2['match_played']==1)
			{ ?><h2 style="color:white"><?php echo($donne2['score1']);?></h2><?php }
			else{ 	$match_query=mysql_query($match);
					mysql_fetch_array($match_query);
					if(mysql_fetch_array($match_query))
					{?>
						<input type="text"name="result3"size=1>
			<?php	}
				} ?></td>
			<td><h3 style="color:white">X</h3></td>
			<td><?php if($donne2['match_played']==1)
			{ ?><h2 style="color:white"><?php echo($donne2['score2']);?></h2><?php }
			else{ 	$match_query=mysql_query($match);
					mysql_fetch_array($match_query);
					if(mysql_fetch_array($match_query))
					{?>
						<input type="text"name="result4"size=1>
			<?php	} 
				} ?></td>
			<td style="font-size:16;color:white;font-weight:bold;"width="120px"><?php echo($team4['team_name']);?></td>
		</tr>
		<tr align=center>
		<td colspan=5>
<?php	$match_query=mysql_query($match);
		$count=0;
		while(mysql_fetch_array($match_query))
		{
			$count++;
		}
		$match_query=mysql_query($match);
		$check=mysql_fetch_array($match_query);
		if($count>0&&$check['match_played']==0)
		{ ?>
			<input type="button"value="score"name="submit2"onclick="submit_match2(<?php echo($donne['match_id']);?>,'m1')">
<?php 	} 
		else echo("</td>"); ?>
		<td></td>
		<td colspan=5>
<?php
		$match_query=mysql_query($match);
		$count=0;
		while(mysql_fetch_array($match_query))
		{
			$count++;
		}
		$match_query=mysql_query($match);
		mysql_fetch_array($match_query);
		$check=mysql_fetch_array($match_query);
		if($count>0&&$check['match_played']==0)
		{ ?>
			<input type="button"value="score"name="submit3"onclick="submit_match2(<?php echo($donne2['match_id']);?>,'m2')">
<?php 	}
		else echo("</td>");?>	
		</tr>		
		</table>	
	
	
<?php
	}
	//mysql_query("update `match` set score1=0,score2=0,match_played=0 where 1");
	//mysql_query("update `team` set played=0,with_team=0,against=0,points=0 where 1");
	$q="select * from `match` where now()-end_time>-40 order by match_time DESC";
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
	<?php		if($donne['match_played']==0)
				{?>
					<input type="text"name="a<?php echo($donne['match_id']);?>"size=1>
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
					<input type="text"name="b<?php echo($donne['match_id']);?>" size=1>
	<?php		} 
				else
				{?>
					<h3 style="color:white"><?php echo($donne['score2']);?></h3>
	<?php		} ?>			
				</td>
				<td><h3 style="color:white"><?php echo($team2['team_name']);?></h3></td>
			</tr>
<?php 		if($donne['match_played']==0)
			{?>
				<tr><td colspan="5"align="center"><input type="button"value="score"onclick="submit_match(<?php echo($donne['match_id']);?>)"></td></tr>
<?php 		} ?>
			</table>
			<br><br>
<?php	}	?>
	</form>