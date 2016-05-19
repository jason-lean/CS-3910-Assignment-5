<div class="row">
<div class="col-xs-12">
<div class="page-header">
	<h1><?php echo $Title ?></h1>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li <?php if ($menuActive == 0) echo "class='active'"; ?>><a href="index.php">Home</a></li>
				<li <?php if ($menuActive == 1) echo "class='active'"; ?>><a href="input.php">Add Song</a></li>
				<li <?php if ($menuActive == 2) echo "class='active'"; ?>><a href="inputArtist.php">Add Artist</a></li>
				<li><a href="logout.php">Log out</a></li>
		</div>
	</div>
</div>
</div>
</div>