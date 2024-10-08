<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		html,body{
			position: relative;
			height: 100%;
			width: 100%;
			margin: 0;
			padding: 0;
		}
		.frame{
			position: absolute;
			transform: translate(-50% , -50%);
			top: 50%;
			left: 50%;
			height: 2.7em;
			width: 8.7em;
			border-radius: 10px;
			background:rgba(0, 0, 0, .5);
			border: 3px black solid;

		}
		#clock {
			position: relative;
			left: .5em;
			color: #000000;
			line-height: 35px;
			font-family: 'Trebuchet MS', sans-serif;
			font-size: 1.2rem;
		}
		.bg{
			position: relative;
			background:rgba(0, 0, 0, .2);
			width: 100%;
			height: 100%;
			border-radius:7px;



		}
	</style>
</head>
	<script src="clock.js"></script>
<body>
	<div class="frame">
		<div class="bg">
			<label id="clock"></label>
		</div>
	</div>
</body>
</html>
