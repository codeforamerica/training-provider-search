<?php
	include("resources/php/base.php");
	include("resources/php/functions.php");
?>
<!DOCTYPE HTML>
<html>

	<head>
		<title>🏫🏛🏬 Training Providers</title>
		<link rel="stylesheet/less" href="resources/css/style.less">
		<script src="resources/js/lib/less.js"></script>
		<script src="resources/js/lib/jquery.js"></script>
		<script src="resources/js/main.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	</head>
	<body>

		<?php
			$providers = get_providers_list();
						
			foreach($providers as $provider => $provider_info) {
				echo "<h4>";
				echo "<div class='emoji'>".provider_emoji($provider_info["provider_name"])."</div>";
				echo "<a href='views/provider.php?id=".$provider_info["provider_id"]."'>";
				echo $provider_info["provider_name"];
				echo "</a>";
				echo "</h4>";
				echo "<br>";
			}
		?>

	</body>
</html>