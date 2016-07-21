<!doctype html>

<html lang="no">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="google" content="notranslate"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>Mapper</title>
	
	<style>
		* {
			margin: 0;
			padding: 0;
			border: 0;
			outline: none;
			-webkit-appearance: none;
			text-decoration: none;
			font-family: arial, sans-serif;
			cursor: default;
			-webkit-font-smoothing: antialiased;
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			user-select: none;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}
		
		html, body {
			width: 100%;
			height: 100%;
		}
		
		.clearfix {
			clear: both;
		}
	</style>

</head>

<body>

	<canvas id="canvas"></canvas>
	
	<script src="../../lib/mapper.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	
		var mapper = new Mapper({
			pos: [0,0],
			moves: 500,
			overlap: false
		});
		
		var map = mapper.run();
		
		function RGB2Color(r,g,b){
			return 'rgb(' + Math.round(r) + ',' + Math.round(g) + ',' + Math.round(b) + ')';
		}
		
		var canvas = document.getElementById('canvas');
		canvas.width = window.innerWidth*2;
		canvas.height = window.innerHeight*2;
		canvas.style.width = canvas.width/2+'px';
		canvas.style.height = canvas.height/2+'px';
		var context = canvas.getContext('2d');
		var grabbing = false;
		var offset = [0,0];
		var delta = [0,0];
		
		function draw() {
			context.fillStyle 	= '#222';
			context.fillRect(0, 0, canvas.width, canvas.height);
			context.fillStyle 	= '#00ffff';
			context.strokeStyle = "#222";
			context.lineWidth  	= 2;
			
			var frequency = .02;
			
			for (var i = 0; i < map.length; i++) {
			
				red = Math.sin(frequency*i + 0) * 127 + 128;
				green = Math.sin(frequency*i + 2) * 127 + 128;
				blue  = Math.sin(frequency*i + 4) * 127 + 128;
				
				context.fillStyle = RGB2Color(red,green,blue);
				context.fillRect(
					Math.floor(map[i][0]*20 + canvas.width/2  - 10 + offset[0]), 
					Math.floor(map[i][1]*20 + canvas.height/2 - 10 + offset[1]), 20, 20);
				context.strokeRect(
					Math.floor(map[i][0]*20 + canvas.width/2  - 10 + offset[0]), 
					Math.floor(map[i][1]*20 + canvas.height/2 - 10 +offset[1]), 20, 20);
				
			}
		}
		
		canvas.addEventListener('mousedown', function(event) {grabbing = true; delta=[event.clientX,event.clientY]});
		canvas.addEventListener('mousemove', function(event) {
			if(grabbing){
			
				offset[0] -= delta[0]-event.clientX;
				offset[1] -= delta[1]-event.clientY;
				
				delta = [event.clientX, event.clientY];
				
				draw();
			}
		});
		canvas.addEventListener('mouseup', function(event) {grabbing = false;});
		
		draw();
	
	</script>

</body>

</html>