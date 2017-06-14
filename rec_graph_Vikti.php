<?php
//Software Engineering Group-14
session_start();
// if(!($_SESSION['name'])){
// header("location: login.php"); //login 
// }
// ?>
<!DOCTYPE html>
<html>
<body id="bod">
<head><link rel="stylesheet" href="graph.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>
<div id="dive">
<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>
<button class="b1" onclick="window.location.href='about.php'"><i class="glyphicon glyphicon-info-sign"></i>&nbsp About</button>
<button class="b1" onclick="window.location.href='contact.php'"><i class="glyphicon glyphicon-envelope"></i>&nbsp Contact</button>

<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome (name) ! </button>
</div>
<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
<form id="for1" action="rec_graph.php" method="post">
<br><br>
<div id="co">
<label id="comp" for="company">COMPANY</label>
<br>
<select name="company" class="b2">
<option value="AAPL">Apple</option>
<option value="BAC">Bank of America</option>
<option value="CSCO">Cisco</option>
<option value="C">Citi</option>
<option value="ERIC">Ericsson</option>
<option value="FB">Facebook</option>
<option value="GOOG">Google</option>
<option value="INTL">Intel</option>
<option value="MSFT">Microsoft</option>
<option value="YHOO">Yahoo</option>
</select>
</div>
<br>
<h3 id="h5" ><font> Enter the number of days</font> </h3>
<input type="text" name="nodays" class ="in1"> </input>
<br><br>
<input type="submit" id="in2" value="Show me the Graph!" name="button">
</form>
<?php
if(isset($_POST['button']))
{
$ticker=$_POST['company'];
$days=$_POST['nodays'];	
//set_time_limit(300);
//Executing the python plot 
exec('python sma-ema-plot.py '.$ticker.' '.$days.'',$var_name1);
echo '<br><div align="center"><img height="35%" width="35%" align="center" src="plot.png"></img></div>';
}
?>


</body>
</html>