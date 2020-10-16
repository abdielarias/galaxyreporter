<?php

include 'header.php';

 ?>

	<div id="wrapper">

		<div><div id="sun" class="hoverBorder fade"><a href="sun.php"><img src="images/sunhorizontal2.png"/></a><p style="margin:0;">Sun</p></div><br></div>

		<!-- <p id="warning">The sun is about 109 Earths across (diameter). Select a planet to find out more.</p> -->

		<div id="planetset" class="fade">
			<div id="smallplanets">
				<a href="mercury.php"><div id="mercury" class="hoverBorder"><img src="images/mercury.png" /><p>Mercury</p></div></a>
				<a href="venus.php"><div id="venus" class="hoverBorder"><img src="images/venus.png" /><p>Venus</p></div></a>
				<a href="earth.php"><div id="earth" class="hoverBorder"><img src="images/earth.png" /><p>Earth</p></div></a>
				<a href="mars.php"><div id="mars" class="hoverBorder"><img src="images/mars.png" /><p>Mars</p></div></a>
			</div>
					<!-- <p id="warning">Jupiter is about 11 Earths across.</p> -->
			<div id="bigplanets">
				<a href="jupiter.php"><div id="jupiter" class="hoverBorder"><img src="images/jupiter.png" /><p>Jupiter</p></div></a>
				<a href="saturn.php"><div id="saturn" class="hoverBorder"><img src="images/saturn.png" /><p>Saturn</p></div></a>
				<a href="uranus.php"><div id="uranus" class="hoverBorder"><img src="images/uranus.png" /><p>Uranus</p></div></a>
				<a href="neptune.php"><div id="neptune" class="hoverBorder"><img src="images/neptune.png" /><p>Neptune</p></div></a>
			</div>
		</div>
    <p id="warning">Images are not to scale. Jupiter is about 11 Earths across (diameter). The sun is about 109 Earths across. Select a planet to find out more.</p>


	</div>

  <script>

    // $(".hoverBorder img").animate({width: '100px'}, 1000).animate({width: '300px'}, 1000);



  </script>

</body>
</html>
