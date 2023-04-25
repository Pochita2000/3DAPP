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
	<link rel="stylesheet" href="css/slider.css">
	<script src="js\slider.js"></script>
</head>

<body>
	<!-- <nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
			<div class="logo">
			<img src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Coca-Cola_logo.svg">
			</div>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">可口可乐</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">首页</a></li>
					<li><a href="#">产品</a></li>
					<li><a href="#">新闻</a></li>
					<li><a href="#">关于我们</a></li>
				</ul>
			</div>
		</div>
	</nav> -->

		<div id="wholepage">
		<section>
				<div class="px-4 py-5 my-5 text-center">
					<img class="d-block mx-auto mb-4"
						src="https://upload.wikimedia.org/wikipedia/commons/c/ce/Coca-Cola_logo.svg" alt="" width="288"
						height="228">
					<h1 class="display-5 fw-bold text-body-emphasis">Coco Cola</h1>
					<div class="col-lg-6 mx-auto">
						<p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap,
							the world’s most popular front-end open source toolkit, featuring Sass variables and mixins,
							responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
					</div>
				</div>
			</section>


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
    new WholePageSlider({
        colors: ['white','deepskyblue', 'orange',  'lightgrey']
    })
</script>
</body>

</html>
