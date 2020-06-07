<?php include './partials/head.php';
require_once './back/db_controller.php';
?>

<body>
	<div class="site-wrapper pg-recipes">
		<!-- header -->
		<?php include './partials/header.php';?>
		<main>
			<section class="all-recipes">
				<div class="container-recipes">
					<?php foreach (receptiList($dbh) as $row) : ?>
						<div class="recipe-box">
							<div class="img-wrapper">
								<?php if(empty($row['slika'])) : ?>
									<img src="img/recipes/close-up-1854245_640.jpg" alt="">
								<?php else: ?>
									<img src="back/uploads/<?= $row['slika']; ?>" alt="">
								<?php endif; ?>
							</div>
							<h3 class="recipe-box__title"><?= $row['naziv'] ?></h3>
							<ul class="share-list">
								<li>	<!-- Load Facebook SDK for JavaScript -->
								  <div id="fb-root"></div>
								  <script>(function(d, s, id) {
								    var js, fjs = d.getElementsByTagName(s)[0];
								    if (d.getElementById(id)) return;
								    js = d.createElement(s); js.id = id;
								    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
								    fjs.parentNode.insertBefore(js, fjs);
								  }(document, 'script', 'facebook-jssdk'));</script>

								  <!-- Your share button code -->
								  <div class="fb-share-button" 
								    data-href="http://localhost/savrsendan-dev/unesi-recept.php" 
								    data-layout="button_count">
								  </div>
								</li>
								<li>ig</li>
							</ul>
						</div>						
					<?php endforeach; ?>
				</div>
			</section>
		</main>
		
	</div>
	<footer><h2>izrada sajta <a href="http://www.premiumfactory.rs/">premium factory</a></h2></footer>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="js/main.js?v=1.1"></script>
	<script>
	
		$('.header__nav ul li:nth-child(2)').addClass('active');
	
	</script>
</body>
</html>