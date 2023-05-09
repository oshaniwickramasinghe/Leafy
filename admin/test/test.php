<!DOCTYPE html>
<html>
<head>
	<title>Change Button Text Example</title>
	<script>
		function changeText() {
			document.getElementById("myButton").innerHTML = "Button Text Changed!";
		}
	</script>
</head>
<body>
	<button id="myButton" onclick="changeText()">Click me to change text</button>
</body>
</html>