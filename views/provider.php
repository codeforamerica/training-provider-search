<?php
	include("../resources/php/base.php");
	include("../resources/php/functions.php");

	$provider_info = get_provider($_GET["id"]);
?>
<!DOCTYPE HTML>
<html>

	<head>
		<title><?php echo provider_emoji($provider_info["provider_name"])." ".$provider_info["provider_name"]; ?></title>
		<link rel="stylesheet/less" href="../resources/css/style.less">
		<script src="../resources/js/lib/less.js"></script>
		<script src="../resources/js/lib/jquery.js"></script>
		<script src="../resources/js/main.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>

		<?php
			echo "<a href='../index.php'>";
			echo "<div class='button'><i class='glyphicon glyphicon-arrow-left'></i> back to all providers</div>";
			echo "</a>";
			echo "<br>";
			echo "<br>";
			
			echo "<h1>";
			echo "<a href='../views/provider.php?id=".$_GET["id"]."'>";
			echo "<div class='emoji'>".provider_emoji($provider_info["provider_name"])."</div>";
			echo $provider_info["provider_name"];
			echo "</a>";
			echo "</h1>";
			echo "<br>";
	
			$programs = get_programs_by_provider($_GET["id"]);
									
			foreach($programs as $program => $program_info) {
				echo "<div class='emoji'>".program_emoji($program_info["program_type"])."</div>";
				echo "<a href='../views/program.php?provider_id=".$_GET["id"]."&program_id=".$program_info["program_cip"]."'>";
				echo $program_info["program_cip"];
				echo " (".$program_info["program_type"].")";
				echo "</a>";
				echo "<br>";
				echo "<br>";
			}

		?>

	</body>
</html>