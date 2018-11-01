<?php
	include("../resources/php/base.php");
	include("../resources/php/functions.php");
	
	$outcomes = get_outcome_data_by_program($_GET["provider_id"], $_GET["program_id"]);
	$outcomes_ordered_by_year = array_reverse($outcomes);
	
	$provider_name = $outcomes[0]["provider_name"];
	$provider_id = $outcomes[0]["provider_id"];
	$program_id = $outcomes[0]["program_cip"];
	$program_type = $outcomes[0]["program_type"];
?>
<!DOCTYPE HTML>
<html>

	<head>		
		<title><?php echo provider_emoji($provider_name)." ".$provider_name; ?> / <?php echo program_emoji($program_type)." ".$_GET["program_id"]; ?></title>
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
			echo "<a href='../views/provider.php?id=".$provider_id."'>";
			echo "<div class='emoji'>".provider_emoji($provider_name)."</div>";
			echo $provider_name;
			echo "</a>";
			echo "</h1>";
			
			echo "<br>";

			echo "<a href='../views/provider.php?id=".$provider_id."'>";
			echo "<div class='button'><i class='glyphicon glyphicon-arrow-left'></i> back to all programs</div>";
			echo "</a>";

			echo "<br>";
			echo "<br>";
			echo "<br>";
			
			echo "<div class='emoji'>".program_emoji($program_type)."</div>";
			echo "<a href='../views/program.php?provider_id=".$provider_id."&program_id=".$program_id."'>";
			echo $program_id;
			echo " (".$program_type.")";
			echo "</a>";
			
			echo "<br>";
			echo "<br>";
						
			foreach($outcomes_ordered_by_year as $outcome => $outcome_info) {
		?>
			<div class="stats">
				<h3>🗓 <?php echo $outcome_info["reporting_period"]; ?></h3>
				<br>
				<p><label>People Served: </label><span><?php echo $outcome_info["all_served"]; ?></span></p>
				<p><label>People Exited: </label><span><?php echo $outcome_info["all_exited"]; ?></span></p>
				<p><label>People Completed: </label><span><?php echo $outcome_info["all_completed"]; ?></span></p>
				––––––––––––––––––––––––––––
				<p><label>% Completed: </label><span><?php echo round(($outcome_info["all_completed"]/$outcome_info["all_served"])*100, 1); ?>%</span></p>
				<br>
				<p><label>WIOA Served: </label><span><?php echo $outcome_info["wioa_served"]; ?></span></p>
				<p><label>WIOA Exited: </label><span><?php echo $outcome_info["wioa_exited"]; ?></span></p>
				<p><label>WIOA Completed: </label><span><?php echo $outcome_info["wioa_completed"]; ?></span></p>
				––––––––––––––––––––––––––––
				<p><label>% WIOA Completed: </label><span><?php echo round(($outcome_info["wioa_completed"]/$outcome_info["wioa_served"])*100, 1); ?>%</span></p>
			</div>
		<?php	
				echo "<pre>";
				print_r($outcome_info);
				echo "</pre>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}
		?>

	</body>
</html>