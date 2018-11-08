<?php  require('Rect.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rectangle</title>
</head>
<body>
<h1>Rectangle Maker</h1>
<?php
$rect1 = new Rect(5,5,"red");
echo"Color of rect is: {$rect1->getColor()} <br>";
?>
<canvas id="myCanvas" width="300" height="150" style="border:0px solid #d3d3d3;">
    Your browser does not support the HTML5 canvas tag.</canvas>
<script>

    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");

    // Red rectangle
    ctx.beginPath();
    ctx.lineWidth = "6";
    ctx.strokeStyle = "red";
    ctx.fillRect(5, 5, 290, 140);
    ctx.stroke();


</script>
</body>
</html>