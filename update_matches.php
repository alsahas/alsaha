<?php
include("connection.php");
if($_POST['pos']=="")
	{
		$var1="a".$_POST['m_id'];
		$var2="b".$_POST['m_id'];
		if(($_POST["$var1"]<=15)&&($_POST["$var2"]<=15))
		{
			$update="update `match` set score1=".$_POST["$var1"].",score2=".$_POST["$var2"].",match_played=1 where match_id=".$_POST['m_id'];
			mysql_query($update);
		
			$q="select * from `match` where match_id=".$_POST['m_id'];
			$qu=mysql_query($q);
			$donne=mysql_fetch_array($qu);
		
			$update_team1="select * from team where team_id=".$donne['team_id1'];
			$update_team2="select * from team where team_id=".$donne['team_id2'];
			$up_team1=mysql_query($update_team1);
			$up_team2=mysql_query($update_team2);
			$t1=mysql_fetch_array($up_team1);
			$t2=mysql_fetch_array($up_team2);
			if($donne['round_number']==1)
			{
				$play_times="update `team` set played=played+1 where team_id in(".$t1['team_id'].",".$t2['team_id'].")";
				mysql_query($play_times);
				$add_goals1="update `team` set with_team=with_team+".$_POST["$var1"].",against=against+".$_POST["$var2"]." where team_id=".$t1['team_id'];
				$add_goals2="update `team` set with_team=with_team+".$_POST["$var2"].",against=against+".$_POST["$var1"]." where team_id=".$t2['team_id'];
				mysql_query($add_goals1);
				mysql_query($add_goals2);
			}	
			if($_POST["$var1"]>$_POST["$var2"]&&$donne['round_number']==1)
			{
				$add_points1="update `team` set points=points+3 where team_id=".$t1['team_id'];
				mysql_query($add_points1);
			}
			else if($_POST["$var2"]>$_POST["$var1"]&&$donne['round_number']==1)
			{
				$add_points2="update `team` set points=points+3 where team_id=".$t2['team_id'];
				mysql_query($add_points2);
			}
			else if($donne['round_number']==1)
			{
				$add_tie_point="update `team` set points=points+1 where team_id in(".$t1['team_id'].",".$t2['team_id'].")";
				mysql_query($add_tie_point);
			}
		}
	}
	else
	{
	if($_POST['pos']=="m1"&&($_POST['result1']<=15)&&($_POST['result2']<=15))
	{
			$q2="select * from `Match`
			where match_id=".$_POST['m_id'];
			$qu2=mysql_query($q2);
			$donne=mysql_fetch_array($qu2);
			$q="update `match` set score1=".$_POST['result1'].",score2=".$_POST['result2'].",match_played=1 where match_id=".$_POST['m_id'];
		
			$update_team1="select * from team where team_id=".$donne['team_id1'];
			$update_team2="select * from team where team_id=".$donne['team_id2'];
			$up_team1=mysql_query($update_team1);
			$up_team2=mysql_query($update_team2);
			$t1=mysql_fetch_array($up_team1);
			$t2=mysql_fetch_array($up_team2);
			if($donne['round_number']==1)
			{
				$play_times="update `team` set played=played+1 where team_id in(".$t1['team_id'].",".$t2['team_id'].")";
				mysql_query($play_times);
				$add_goals1="update `team` set with_team=with_team+".$_POST['result1'].",against=against+".$_POST['result2']." where team_id=".$t1['team_id'];
				$add_goals2="update `team` set with_team=with_team+".$_POST['result2'].",against=against+".$_POST['result1']." where team_id=".$t2['team_id'];
				mysql_query($add_goals1);
				mysql_query($add_goals2);
			}	
			if($_POST['result1']>$_POST['result2']&&$donne['round_number']==1)
			{
				$add_points1="update `team` set points=points+3 where team_id=".$t1['team_id'];
				mysql_query($add_points1);
			}
			else if($_POST['result2']>$_POST['result1']&&$donne['round_number']==1)
			{
				$add_points2="update `team` set points=points+3 where team_id=".$t2['team_id'];
				mysql_query($add_points2);
			}
			else if($donne['round_number']==1)
			{
				$add_tie_point="update `team` set points=points+1 where team_id in(".$t1['team_id'].",".$t2['team_id'].")";
				mysql_query($add_tie_point);
			}
			mysql_query($q);
	}
	else
	{
			$q2="select * from `Match`
			where match_id=".$_POST['m_id'];
			$qu2=mysql_query($q2);
			$donne=mysql_fetch_array($qu2);
			$q="update `match` set score1=".$_POST['result3'].",score2=".$_POST['result4'].",match_played=1 where match_id=".$_POST['m_id'];
		
			$update_team1="select * from team where team_id=".$donne['team_id1'];
			$update_team2="select * from team where team_id=".$donne['team_id2'];
			$up_team1=mysql_query($update_team1);
			$up_team2=mysql_query($update_team2);
			$t1=mysql_fetch_array($up_team1);
			$t2=mysql_fetch_array($up_team2);
			if($donne['round_number']==1)
			{
				$play_times="update `team` set played=played+1 where team_id in(".$t1['team_id'].",".$t2['team_id'].")";
				mysql_query($play_times);
				$add_goals1="update `team` set with_team=with_team+".$_POST['result3'].",against=against+".$_POST['result4']." where team_id=".$t1['team_id'];
				$add_goals2="update `team` set with_team=with_team+".$_POST['result4'].",against=against+".$_POST['result3']." where team_id=".$t2['team_id'];
				mysql_query($add_goals1);
				mysql_query($add_goals2);
			}	
			if($_POST['result3']>$_POST['result4']&&$donne['round_number']==1)
			{
				$add_points1="update `team` set points=points+3 where team_id=".$t1['team_id'];
				mysql_query($add_points1);
			}
			else if($_POST['result4']>$_POST['result3']&&$donne['round_number']==1)
			{
				$add_points2="update `team` set points=points+3 where team_id=".$t2['team_id'];
				mysql_query($add_points2);
			}
			else if($donne['round_number']==1)
			{
				$add_tie_point="update `team` set points=points+1 where team_id in(".$t1['team_id'].",".$t2['team_id'].")";
				mysql_query($add_tie_point);
			}
			mysql_query($q);
	}
	}
	$round1=mysql_query("select count(*) as count from `team` where group_number in (1,2) and played=3");
	$round2=mysql_query("select count(*) as count from `team` where group_number in (3,4) and played=3");
	$round3=mysql_query("select count(*) as count from `team` where group_number in (5,6) and played=3");
	$round4=mysql_query("select count(*) as count from `team` where group_number in (7,8) and played=3");
	$count1=mysql_fetch_array($round1);
	$count2=mysql_fetch_array($round2);
	$count3=mysql_fetch_array($round3);
	$count4=mysql_fetch_array($round4);
	
	$group_a=mysql_query("select * from `team` where group_number=1 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_b=mysql_query("select * from `team` where group_number=2 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_c=mysql_query("select * from `team` where group_number=3 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_d=mysql_query("select * from `team` where group_number=4 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_e=mysql_query("select * from `team` where group_number=5 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_f=mysql_query("select * from `team` where group_number=6 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_g=mysql_query("select * from `team` where group_number=7 order by points DESC,(with_team-against) DESC,with_team DESC");
	$group_h=mysql_query("select * from `team` where group_number=8 order by points DESC,(with_team-against) DESC,with_team DESC");
	
	$team_a1=mysql_fetch_array($group_a);
	$team_a2=mysql_fetch_array($group_a);
	$team_b1=mysql_fetch_array($group_b);
	$team_b2=mysql_fetch_array($group_b);
	$team_c1=mysql_fetch_array($group_c);
	$team_c2=mysql_fetch_array($group_c);
	$team_d1=mysql_fetch_array($group_d);
	$team_d2=mysql_fetch_array($group_d);
	$team_e1=mysql_fetch_array($group_e);
	$team_e2=mysql_fetch_array($group_e);
	$team_f1=mysql_fetch_array($group_f);
	$team_f2=mysql_fetch_array($group_f);
	$team_g1=mysql_fetch_array($group_g);
	$team_g2=mysql_fetch_array($group_g);
	$team_h1=mysql_fetch_array($group_h);
	$team_h2=mysql_fetch_array($group_h);
	
	if($count1['count']==8)
	{
		$query="insert into `match` values('49','".$team_a1['team_id']."','".$team_b2['team_id']."','','','',2,'2014-06-28 19:00:00','2014-06-28 20:45:00')";
		
		mysql_query($query);
		$query="insert into `match` values('51','".$team_b1['team_id']."','".$team_a2['team_id']."','','','',2,'2014-06-29 19:00:00','2014-06-29 20:45:00')";
		mysql_query($query);
	}
	if($count2['count']==8)
	{
		$query="insert into `match` values('50','".$team_c1['team_id']."','".$team_d2['team_id']."','','','',2,'2014-06-28 23:00:00','2014-06-29 00:45:00')";
		mysql_query($query);
		$query="insert into `match` values('52','".$team_d1['team_id']."','".$team_c2['team_id']."','','','',2,'2014-06-29 23:00:00','2014-06-30 00:45:00')";
		mysql_query($query);
	}
	if($count3['count']==8)
	{
		$query="insert into `match` values('53','".$team_e1['team_id']."','".$team_f2['team_id']."','','','',2,'2014-06-30 19:00:00','2014-06-30 20:45:00')";
		mysql_query($query);
		$query="insert into `match` values('55','".$team_f1['team_id']."','".$team_e2['team_id']."','','','',2,'2014-07-01 19:00:00','2014-07-01 20:45:00')";
		mysql_query($query);
	}
	if($count4['count']==8)
	{
		$query="insert into `match` values('54','".$team_g1['team_id']."','".$team_h2['team_id']."','','','',2,'2014-06-30 23:00:00','2014-07-01 00:45:00')";
		mysql_query($query);
		$query="insert into `match` values('56','".$team_h1['team_id']."','".$team_g2['team_id']."','','','',2,'2014-07-01 23:00:00','2014-07-02 00:45:00')";
		mysql_query($query);
	}
	$round1=mysql_query("select count(*) as count from `match` where match_id in(53,54) and match_played=1");
	$round2=mysql_query("select count(*) as count from `match` where match_id in(49,50) and match_played=1");
	$round3=mysql_query("select count(*) as count from `match` where match_id in(52,51) and match_played=1");
	$round4=mysql_query("select count(*) as count from `match` where match_id in(55,56) and match_played=1");
	$qr1=mysql_fetch_array($round1);
	$qr2=mysql_fetch_array($round2);
	$qr3=mysql_fetch_array($round3);
	$qr4=mysql_fetch_array($round4);
	
	if($qr1!=null&&$qr1['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(53,54)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('58','".$donne['team_id1']."','".$donne2['team_id1']."','','','',3,'2014-07-04 19:00:00','2014-07-04 20:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('58','".$donne['team_id1']."','".$donne2['team_id2']."','','','',3,'2014-07-04 19:00:00','2014-07-04 20:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('58','".$donne['team_id2']."','".$donne2['team_id1']."','','','',3,'2014-07-04 19:00:00','2014-07-04 20:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('58','".$donne['team_id2']."','".$donne2['team_id2']."','','','',3,'2014-07-04 19:00:00','2014-07-04 20:45:00')";
				mysql_query($q);
			}
		}
	}
	if($qr2!=null&&$qr2['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(49,50)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('57','".$donne['team_id1']."','".$donne2['team_id1']."','','','',3,'2014-07-04 23:00:00','2014-07-05 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('57','".$donne['team_id1']."','".$donne2['team_id2']."','','','',3,'2014-07-04 23:00:00','2014-07-05 00:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('57','".$donne['team_id2']."','".$donne2['team_id1']."','','','',3,'2014-07-04 23:00:00','2014-07-05 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('57','".$donne['team_id2']."','".$donne2['team_id2']."','','','',3,'2014-07-04 23:00:00','2014-07-05 00:45:00')";
				mysql_query($q);
			}
		}
	}
	if($qr3!=null&&$qr3['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(52,51)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('59','".$donne['team_id1']."','".$donne2['team_id1']."','','','',3,'2014-07-05 23:00:00','2014-07-06 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('59','".$donne['team_id1']."','".$donne2['team_id2']."','','','',3,'2014-07-05 23:00:00','2014-07-06 00:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('59','".$donne['team_id2']."','".$donne2['team_id1']."','','','',3,'2014-07-05 23:00:00','2014-07-06 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('59','".$donne['team_id2']."','".$donne2['team_id2']."','','','',3,'2014-07-05 23:00:00','2014-07-06 00:45:00')";
				mysql_query($q);
			}
		}
	}
	if($qr4!=null&&$qr4['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(55,56)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('60','".$donne['team_id1']."','".$donne2['team_id1']."','','','',3,'2014-07-05 19:00:00','2014-07-05 20:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('60','".$donne['team_id1']."','".$donne2['team_id2']."','','','',3,'2014-07-05 19:00:00','2014-07-05 20:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('60','".$donne['team_id2']."','".$donne2['team_id1']."','','','',3,'2014-07-05 19:00:00','2014-07-05 20:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('60','".$donne['team_id2']."','".$donne2['team_id2']."','','','',3,'2014-07-05 19:00:00','2014-07-05 20:45:00')";
				mysql_query($q);
			}
		}
	}
	
	$round1=mysql_query("select count(*) as count from `match` where match_id in(58,57) and match_played=1");
	$round2=mysql_query("select count(*) as count from `match` where match_id in(59,60) and match_played=1");
	$qr1=mysql_fetch_array($round1);
	$qr2=mysql_fetch_array($round2);
	
	if($qr1!=null&&$qr1['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(58,57)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('61','".$donne['team_id1']."','".$donne2['team_id1']."','','','',4,'2014-07-08 23:00:00','2014-07-09 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('61','".$donne['team_id1']."','".$donne2['team_id2']."','','','',4,'2014-07-08 23:00:00','2014-07-09 00:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('61','".$donne['team_id2']."','".$donne2['team_id1']."','','','',4,'2014-07-08 23:00:00','2014-07-09 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('61','".$donne['team_id2']."','".$donne2['team_id2']."','','','',4,'2014-07-08 23:00:00','2014-07-09 00:45:00')";
				mysql_query($q);
			}
		}
	}
	if($qr2!=null&&$qr2['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(59,60)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('62','".$donne['team_id1']."','".$donne2['team_id1']."','','','',4,'2014-07-09 23:00:00','2014-07-10 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('62','".$donne['team_id1']."','".$donne2['team_id2']."','','','',4,'2014-07-09 23:00:00','2014-07-10 00:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('62','".$donne['team_id2']."','".$donne2['team_id1']."','','','',4,'2014-07-09 23:00:00','2014-07-10 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('62','".$donne['team_id2']."','".$donne2['team_id2']."','','','',4,'2014-07-09 23:00:00','2014-07-10 00:45:00')";
				mysql_query($q);
			}
		}
	}
	
	$round1=mysql_query("select count(*) as count from `match` where match_id in(61,62) and match_played=1");
	$qr1=mysql_fetch_array($round1);
	
	if($qr1!=null&&$qr1['count']==2)
	{
		$query=mysql_query("select *,(score1-score2) as diff from `match` where match_id in(61,62)");
		$donne=mysql_fetch_array($query);
		if($donne['diff']>0)
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('64','".$donne['team_id1']."','".$donne2['team_id1']."','','','',5,'2014-07-13 22:00:00','2014-07-13 23:45:00')";
				mysql_query($q);
				$q="insert into `match` values('63','".$donne['team_id2']."','".$donne2['team_id2']."','','','',5,'2014-07-12 23:00:00','2014-07-13 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('64','".$donne['team_id1']."','".$donne2['team_id2']."','','','',5,'2014-07-13 22:00:00','2014-07-13 23:45:00')";
				mysql_query($q);
				$q="insert into `match` values('63','".$donne['team_id2']."','".$donne2['team_id1']."','','','',5,'2014-07-12 23:00:00','2014-07-13 00:45:00')";
				mysql_query($q);
			}
		}
		else
		{
			$donne2=mysql_fetch_array($query);
			if($donne2['diff']>0)
			{
				$q="insert into `match` values('64','".$donne['team_id2']."','".$donne2['team_id1']."','','','',5,'2014-07-13 22:00:00','2014-07-13 23:45:00')";
				mysql_query($q);
				$q="insert into `match` values('63','".$donne['team_id1']."','".$donne2['team_id2']."','','','',5,'2014-07-12 23:00:00','2014-07-13 00:45:00')";
				mysql_query($q);
			}
			else
			{
				$q="insert into `match` values('64','".$donne['team_id2']."','".$donne2['team_id2']."','','','',5,'2014-07-13 22:00:00','2014-07-13 23:45:00')";
				mysql_query($q);
				$q="insert into `match` values('63','".$donne['team_id1']."','".$donne2['team_id1']."','','','',5,'2014-07-12 23:00:00','2014-07-13 00:45:00')";
				mysql_query($q);
			}
		}
	}
	
header("location:index.php");
?>