
<!DOCTYPE html>

<html class="no-js" lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8"/>
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width"/>
<title>Inventory Management</title>
<!-- CSS Files-->
<link rel="stylesheet" href="search.css">
<link rel="stylesheet" href="stylesheets/style.css">

<link rel="stylesheet" href="stylesheets/skins/blue.css">
<!-- skin color -->
<link rel="stylesheet" href="stylesheets/responsive.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


<!--Disable back button-->
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

</head>
<body>

<!-- HEADER
================================================== -->


<div class="row">
	<div class="headerlogo four columns">
		<div class="logo">
			<a href="index.php">
			<img src="images/logo.jpg" alt="" style="height: 50%;width: 50%;">
			</a>
		</div>
	</div>
	<div class="headermenu eight columns noleftmarg">
		<nav id="nav-wrap">
		<ul id="main-menu" class="nav-bar sf-menu">
			<li class="current">
			<a href="index.php">Home</a>
			</li>
			
			<li class="current">
			<a href="logout.php" value="logout" name="logout">Logout</a>
			</li>
			
			
			
		</ul>
		</nav>
	</div>
</div>
<div class="clear">
</div>

<div>
	<div >
		<ul >
			<li>
				<img class="slide_img" src="images/inventory2.png"  style="width:100%" /> 
			</li>
		</ul>
	</div>
</div>

<div class="minipause">
</div>
<!-- SUBHEADER
================================================== -->
<div id="subheader">
	<div class="row">
		<div class="twelve columns">
			<p class="text-center">
				 "Inventory is  money sitting around in another form" 
			</p>
		</div>
	</div>
</div>
<br>
<br>

<!-- ANIMATED COLUMNS 
================================================== -->
<div class="row">
	<div class="twelve columns">
		<ul class="ca-menu">
			<li>
			<a href="purchase.php" >
			<span class="ca-icon"><img src="./images/cart.svg" width="80" alt="Bootstrap"></span>
			<div class="ca-content">
				<h2 class="ca-main">Sell<br/> Product</h2>
				<h3 class="ca-sub">Give the best service</h3>
			</div>
			</a>
			</li>
			<li>
			<a href="producttable.php">	
			<span class="ca-icon"><img src="./images/boxes.svg" width="80" alt="Bootstrap"></span>
			<div class="ca-content">
				<h2 class="ca-main">Product<br/> Details</h2>
				<h3 class="ca-sub">What is in the invetory</h3>
			</div>
			</a>
			</li>
			<li>
			<a href="report.php"><!--//////////////-->
			<span class="ca-icon"><img src="./images/report.svg" width="80" alt="Bootstrap"></span>
			<div class="ca-content">
				<h2 class="ca-main">Sales<br/> Report</h2>
				<h3 class="ca-sub">Straight to the point</h3>
			</div>
			</a>
			</li>
			
			
		</ul>
	</div>
</div>


<!-- JAVASCRIPTS 
================================================== -->
<!-- Javascript files placed here for faster loading -->
<script src="javascripts/foundation.min.js"></script>   
<script src="javascripts/jquery.easing.1.3.js"></script>
<script src="javascripts/elasticslideshow.js"></script>
<script src="javascripts/jquery.carouFredSel-6.0.5-packed.js"></script>
<script src="javascripts/jquery.cycle.js"></script>
<script src="javascripts/app.js"></script>
<script src="javascripts/modernizr.foundation.js"></script>
<script src="javascripts/slidepanel.js"></script>
<script src="javascripts/scrolltotop.js"></script>
<script src="javascripts/hoverIntent.js"></script>
<script src="javascripts/superfish.js"></script>
<script src="javascripts/responsivemenu.js"></script>
</body>
</html>