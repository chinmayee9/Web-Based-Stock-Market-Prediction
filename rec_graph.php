<?php
//written and debugged by: Madhura
session_start();
?>

<!DOCTYPE html>
<html>
<body id="bod">
<head><link rel="stylesheet" href="interface.css">
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>

<div id="div">
	<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
	<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
	<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
	<a href="RSS.php"> <input type="button" id="logout" value="News Feed"/> </a>
	<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome <?php echo $_SESSION['name']; ?>! </button>
</div>

<div id = "div1">
	<h1 id = "h1"><b><span id = "s1">Visualization</span>
	<span id = "s2">Zone</span>
	<span id = "s3">!</span>
</b> <br></h1>
</div>

<form id="f1" action="rec_graph.php" method="post">
<br><br>
<div id="co">
	<label id="comp" for="company">COMPANY</label>
	<br>
	<select name="company" class="b2">
	<option value="AAPL">Apple</option>
	<option value="AMZN">Amazon</option>
	<option value="FB">FaceBook</option>
	<option value="GOOG">Google</option>
	<option value="INTC">Intel Corporation</option>
	<option value="MSFT">Microsoft</option>
	<option value="T">ATT</option>
	<option value="TWTR">Twitter</option>
	<option value="TXN">Texas Instruments</option>
	<option value="YHOO">Yahoo</option>
	</select>
	<br> <br>

	<h3 id = "h5"><font> Enter the number of days</font> </h3>
	<input type="text" name="nodays" class ="i1"> 
	<br><br>
	<input type="submit" id="button1" value="Show me the Graph!" name="button">
</div>
</form>

<?php
if(isset($_POST['button']))
{
$ticker=$_POST['company'];
$days=$_POST['nodays'];	
//exec('python graphs.py '.$ticker.''.$indicator.''.$days.'',$var_name1);
//echo '<br><div align="center"><img height="35%" width="35%" align="center" src="plot.png"></img></div>';
exec('python graphs.py '.$ticker.' '.$days.'',$var_name1);
echo '<br><div align="center"><img height="30%" width="30%" align="left" src="plot1.png"></img><img height="30%" width="30%" align="center" src="plot2.png"></img><img height="30%" width="30%" align="right" src="plot3.png"></img></div>';
}
?>

</body>
</html>
