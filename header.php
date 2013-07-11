<!-- header -->
<div data-role="header" data-position="fixed" data-theme="b"  data-tap-toggle="false">
	<a href="index.php?page=dashboard" data-icon="home" rel="external">Home</a>
	<?
	include("skripte/time.php");
	
	$active = ucfirst($_GET['page']);
	?>
	<h1><? echo $active ?></h1>
	<a href="javascript:history.go(0)" data-icon="refresh">refresh</a>
</div>
<!-- /header -->