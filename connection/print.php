<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}

		html,body{
			position: relative;
			height: 100%;
			width: 100%;

		}
		.container{
			position: relative;
			height: 100%;
			width: 100%;
			background: yellow;
			flex-direction: column;
			display: flex;
			justify-content: center;
			align-items: center;
		}
		.box{
			position: relative;
			border: 2px solid black;
			height: 80%;
			width: 80%;
			background: green;
		}
		.button{
			position: relative;
			height: 20%;
			width: 100%;
			background: green;
		}

		.button button{
			position: relative;
			height: 2em;
			width: 10em;
			background: rgb(0, 0, 200);
			color: white;
		}
		@media print{
			.container{
				position: relative;
				height: 100%;
				width: 100%;

			}
			.box{
				position: absolute;
				height: 100%;
				width: 100%;
				background: pink;
			}
			.button{
				display: none;
			}
		}

	</style>
	<title></title>
</head>
<body>
	<?php $a = 1; 
			$label = 1;
	do{ ?>
	<div class="container">
			<?php if(isset($label)){ ?>
			<label>DEDUCTION</label>
			<?php } ?>
		<div class="box">
			<label>s</label>

		</div>

		<div class="button">

			<button id="print">print</button>
		</div>
	</div>
		<?php $a++; }WHILE($a<=5); ?>
</body>
	<script type="text/javascript">
		let printBtn = document.querySelector('#print');

		printBtn.addEventListener("click", function(){
			window.print();

		} );

	</script>
</html>