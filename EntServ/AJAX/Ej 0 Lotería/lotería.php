<!DOCTYPE html>
<html>
	<head>
		<title>Hora en el servidor</title>		
		<meta charset = "UTF-8">
		<script>
			function loadDoc() {
				var xhttp = new XMLHttpRequest();
					xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("num").innerHTML =
							"Número de lotería de navidad: " + this.response;
					}
				};
				xhttp.open("GET", "generar_numero.php", true);
				xhttp.send();
				return false;
			}
			setInterval(loadDoc, 2000);
		</script>
	</head>	
	<body>
		<h1>Lotería de Navidad</h1>
		<p id="num"></p>
		<img style="width: 40%" src="https://i.etsystatic.com/54870853/r/il/ddff85/6420677325/il_fullxfull.6420677325_3uso.jpg">
	</body>	
</html>