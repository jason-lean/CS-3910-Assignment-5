<?php
// Back to PHP to perform the search if one has been submitted. Note
// that $_POST['submit'] will be set only if you invoke this PHP code as
// the result of a POST action, presumably from having pressed Submit
// on the form we just displayed above.
if (isset($_POST['submit'])) {
//	echo '<p>we are processing form data</p>';
//	print_r($_POST);

	// get data from the input fields
	$songTitle = $_POST['songTitle'];
	$artistID = $_POST['artistID'];
	$yearReleased = $_POST['yearReleased'];
	$songURL = $_POST['songURL'];
	
		// return error message if no song title is entered
	if (!$songTitle) {
		punt("Please enter a song title.");
	}
	
	// connect to database
	$db = connectDB($DBHost,$DBUser,$DBPasswd,$DBName);
	
	// set up my query
	$query = "INSERT INTO Song_T(artistID, songTitle, yearReleased, songURL) VALUES ('$artistID', '$songTitle', '$yearReleased', '$songURL');";
	
	// run the query
	$result = queryDB($query, $db);
	
	// check if it worked (not really necessary given the utilities we have)
	if ($result) {
		echo "<p>The song was added to the database.</p>";
	} else {
		punt("<p>Unable to insert song into database. This was the query: " . $query . "</p>");
	}
}
?>