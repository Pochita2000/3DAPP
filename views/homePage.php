<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>可口可乐模型展示</title>
	<!-- 引入Bootstrap和jQuery库 -->
	<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
	<!-- 引入x3dom.js库 -->
	<script src="https://www.x3dom.org/download/x3dom.js"></script>
	<link rel="stylesheet" href="https://www.x3dom.org/download/x3dom.css">
	<!-- 引入自定义css和js -->
	<link rel="stylesheet" href="views/css/slider.css">
	<link rel="stylesheet" href="views/css/header.css">
	<script src="views/js/slider.js"></script>
	<style>
		section::before {
			content: "";
			display: block;
			position: absolute;
			top: 0;
			left: 0;
			height: 100%;
			width: 100%;
			background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
			/* 创建透明度渐变背景图像 */
		}
	</style>
</head>

<body>
	<header class="site-header sticky-top py-1">
		<nav class="container d-flex flex-column flex-md-row justify-content-between">
			<a class="py-2" href="#" aria-label="Product">
				<img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Coca-Cola_logo.svg" width="48" height="24" fill=" #ff0000"></img>
			</a>
			<a class="py-2 d-none d-md-inline-block" href="#">Models</a>
		</nav>
	</header>
	<div id="wholepage">
		<section id="pageintro" style="background-image:url('assets/bkg_homepage.jpg');background-size:cover;">
			<div class="page">
				<div class="px-4 py-5 my-5 text-center">
					<!-- <img class="d-block mx-auto mb-4"
						src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Coca-Cola_logo.svg" alt="" width="288"
						height="228"> -->
					<h1 class="display-5 fw-bold text-body-emphasis" style="color:red"></h1>
					<div class="col-lg-6 mx-auto " style="color:blue">
						<p class="lead mb-4 fw-bold text-body-emphasis"></p>
					</div>
				</div>
			</div>
		</section>

		<!-- add a loop to show all brands -->

		<section>
			<div class="page">

				<h1>Oh! You scrolled - nice!</h1>
				<p>you can try even lower..</p>
			</div>


		</section>

		<section>
			<div class="page">
				<h1>You can have as many pages as you want!</h1>
				<p>Nice huh? Try navigation buttons on the left and at the bottom</p>
			</div>

		</section>

		</section>

		<section>
			<div class="page">
				<h1>You can have as many pages as you want!</h1>
				<p>Nice huh? Try navigation buttons on the left and at the bottom</p>
			</div>

		</section>

	</div>

	<script>
		// new WholePageSlider({
		//     colors: ['white','deepskyblue', 'orange',  'lightgrey']
		// })
		$(document).ready(function() {
			// console.log( "ready!" );
			$.ajax({
				url: 'http://localhost:3000/due4-30/index.php/homePageJSONapi',
				method: 'GET',
				success: function(response) {
					// console.log(response);
					var data = JSON.parse(response);
					pageIntro = data[0];
					$('#pageintro').eq(0).find('h1').text(pageIntro.name);
					$('#pageintro').eq(0).find('p').text(pageIntro.intro);
					models = data[1]
					console.log(models)
				},
				error: function(xhr, status, error) {
					console.log(error);
				}
			});
		});
		// backgrounds:[
		// 		'assets/bkg_homepage.jpg',
		// 		'assets/bkg1.jpg',
		// 		'assets/bkg2.jpg'
		// 	]
		new WholePageSlider({})
	</script>
</body>

</html>