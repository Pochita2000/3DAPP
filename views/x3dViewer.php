<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>HomePage</title>
	<!-- 引入Bootstrap和jQuery库 -->
	<link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
	<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
	<!-- 引入x3dom.js库 -->
	<script src="https://www.x3dom.org/download/x3dom.js"></script>
	<link rel="stylesheet" href="https://www.x3dom.org/download/x3dom.css">
	<!-- 引入自定义css和js -->
	<link rel="stylesheet" href="views/css/header.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="views/js/slider.js"></script>
	<style>
		.container {
			max-width: 960px;
		}

		/*
 * Custom translucent site header
 */

		.site-header {
			background-color: rgba(0, 0, 0, .85);
			-webkit-backdrop-filter: saturate(180%) blur(20px);
			backdrop-filter: saturate(180%) blur(20px);
		}

		.site-header a {
			color: #8e8e8e;
			transition: color .15s ease-in-out;
		}

		.site-header a:hover {
			color: #fff;
			text-decoration: none;
		}

		/*
 * Dummy devices (replace them with your own or something else entirely!)
 */

		.product-device {
			position: absolute;
			right: 10%;
			bottom: -30%;
			width: 300px;
			height: 540px;
			background-color: #333;
			border-radius: 21px;
			transform: rotate(30deg);
		}

		.product-device::before {
			position: absolute;
			top: 10%;
			right: 10px;
			bottom: 10%;
			left: 10px;
			content: "";
			background-color: rgba(255, 255, 255, .1);
			border-radius: 5px;
		}

		.product-device-2 {
			top: -25%;
			right: auto;
			bottom: 0;
			left: 5%;
			background-color: #e5e5e5;
		}


		/*
 * Extra utilities
 */

		.flex-equal>* {
			flex: 1;
		}

		@media (min-width: 768px) {
			.flex-md-equal>* {
				flex: 1;
			}
		}
	</style>
	
</head>


<body>
	<?php
	include 'views\components\Header.php'
	?>
	<main>
		<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary">
			<div class="col-md-5 p-lg-5 mx-auto my-5">
				<x3d id="myX3d">
					<scene>
						<shape>
							<appearance>
								<material diffuseColor="1 0 0"></material>
							</appearance>
							<box></box>
						</shape>
					</scene>
				</x3d>
			</div>
			<div class="product-device shadow-sm d-none d-md-block"></div>
			<div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
		</div>

		<div class="d-md-flex flex-md-equal w-100 my-md-3 ps-md-3">
			<div class="text-bg-dark me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
				<div class="my-3 py-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-body-tertiary shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
			<div class="bg-body-tertiary me-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
				<div class="my-3 p-3">
					<h2 class="display-5">Another headline</h2>
					<p class="lead">And an even wittier subheading.</p>
				</div>
				<div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
			</div>
		</div>


	</main>
	<script>
    var x3d = document.getElementById('myX3d');
    var rotation = x3d.runtime.createX3DRotation();
    rotation.angle = 0;
    rotation.axis = [0, 1, 0];
    x3d.runtime.addAnimation('rotate', rotation);
  </script>
</body>

</html>