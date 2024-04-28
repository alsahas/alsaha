    <?php include("connection.php");?>
	<form name="result"action=""method="post">
	<input type="hidden"name="team1">
	<input type="hidden"name="team2">
	<input type="hidden"name="m_id">
	<SCRIPT language=JavaScript>
	TargetDate = "12/31/2050 5:00 AM";
	CountActive = true;
	CountStepper = -1;
	LeadingZero = true;
	DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
	FinishMessage = "It is finally here!";
	</SCRIPT>
	<TABLE cellSpacing=0 cellPadding=5 width=700 border=0>
        <TR align="center">
			<TD>
            <SCRIPT language=JavaScript 
            src="count down file/countdown.js">
			</SCRIPT>
			</TD>
		</TR>
	</TABLE>
	
	<input type="text"name="result1">
	<input type="text"name="result2">
	<input type="submit"value="score"name="score">
	</form>	
	<?php if(isset($_POST['result1']))
	{
	$q="update `match` set score1=".$_POST['result1'].",score2=".$_POST['result2']." where match_id=".$_POST['m_id'];
	mysql_query($q);
	
	} ?>