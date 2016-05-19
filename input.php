<?php
	include_once('auth.php');
	include_once('config.php');
	include_once('dbutils.php');
?>

<!-- Generation of pulldown menu options for artists -->
<?php
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up query
	$query = "SELECT * FROM Artist_T ORDER BY artistID;";
	
	// run the query
	$result = queryDB($query, $db);
	
	// options for artists
	$artistOptions = "";
	
	// go through all artists and assemble menu
	while ($row = nextTuple($result)) {
		$artistOptions .= "\t\t\t";
		$artistOptions .= "<option value='";
		$artistOptions .= $row['artistID'] . "'>" . $row['artistName'] . "</options>\n";
	}
?>

<html>
<head>
	<title>
		<?php echo $Title; ?>
	</title>

	<!-- Following three lines are necessary for running Bootstrap -->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
</head>

<body>

<div class="container">

<!-- Page header -->
<?php 	$menuActive=1;
		include_once('header.php'); ?>
		
<!-- Form to enter songs -->
<div class="row">
<div class="center-block">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="form-group">
	<label for="songTitle">Title of Song</label>
	<input type="text" class="form-control" name="songTitle"/>
</div>

<div class="form-group">
	<label for="artistID">Artist ID</label>
	<select class="form-control" name="artistID">
	<?php echo $artistOptions; ?>
	</select>
</div>

<div class="form-group">
	<label for="yearReleased">Year of Release</label>
	<input type="text" class="form-control" name="yearReleased"/>
</div>

<div class="form-group">
	<label for="songURL">YouTube URL</label>
	<input type="text" class="form-control" name="songURL"/>
</div>
<button type="submit" class="btn btn-default" name="submit">Add</button>

</form>

</div>
</div>

<!-- Code to insert form values and display table -->
<?php include_once('insertsong.php');?>
 
<!-- Code to list DB instances -->
<br><br>
<div class="row">
<div class="col-xs-12">
<table class="table table-striped">

<!-- Titles for table -->
<thead>
<tr>
	<th>Song</th>
	<th>Artist</th>
	<th>Artist ID</th>
	<th>Year Released</th>
</tr>
</thead>

<!-- DB instances -->
<tbody>
<?php
	// set up query
	$query = "SELECT s.songTitle, a.artistName, a.artistID, s.yearReleased, s.songURL FROM Song_T as s, Artist_T as a WHERE s.artistID = a.artistID ORDER BY a.artistName;";

	// run query
	$result = queryDB($query, $db);
	
	while($row = nextTuple($result)) {
		echo "\n <tr>";
		echo "<td>"."<a href=".$row['songURL']." target='_blank'>".$row['songTitle']."</a>"."</td>";
		echo "<td>".$row['artistName']."</td>";
		echo "<td>".$row['artistID']."</td>";
		echo "<td>".$row['yearReleased']."</td>";
		echo "</tr>";
	}
?>

</tbody>
</table>
</div>
</div>

</div> <!-- closing bootstrap container -->
</body>
</html>