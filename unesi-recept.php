<?php include './partials/head.php';?>
<body>
	<div class="site-wrapper pg-upload">
		<!-- header -->
		<?php include './partials/header.php';?>
		<main>
			<section class="upload-form">
				<div class="container-form">
					<?php if(!isset($_GET['success'])) : ?>
					<form action="back/db_controller.php" name="recepti-form" method="POST" enctype="multipart/form-data">
						<div class="form__side">
							<div class="image-upload">
								<img src="img/fotoaparat.png" alt="">
								<input type="file" name="slika" accept="image/*">
								<label for="slika">Dodaj fotografiju</label>
							</div>
							<p>Vreme pripreme (min):</p>
							<div class="input-wrapper">
								<input type="number" name="vreme_pripreme">
							</div>
							<p>vreme kuvanja (min):</p>
							<div class="input-wrapper">
								<input type="number" name="vreme_kuvanja">
							</div>
						</div>
						<div class="form__main">
							<p>Naziv recepta:</p>
							<div class="input-wrapper">
								<input type="text" name="naziv" />
							</div>
							<div class="ingredient">
								<p>Sastojci:</p>
								<div class="ingredient__list">
									<div class="input-wrapper">
										<input type="text" name="sastojci[]" />
									</div>

								</div>
								<span class="add-ingredient"><i>+</i></span>
							</div>
							<div class="choose-product">
								<div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="check-1" value="Perfect day Kinoa" /> <label for="check-1">Perfect day Kinoa</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="check-2" value="Perfect day Suncokret"/> <label for="check-2">Perfect day Suncokret</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="check-3" value="Perfect day Kinoa bela"/> <label for="check-3">Perfect day Kinoa bela</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="chec-4}}" value="Perfect day Chia crna"/> <label for="check-4">Perfect day Chia crna</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="check-5" value="Perfect day Bundeva"/> <label for="check-5">Perfect day Bundeva</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="check-6" value="Perfect day Lan"/> <label for="check-6">Perfect day Lan</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="amenities[]" id="check-7" value="Perfect day Sezam"/> <label for="check-7">Perfect day Sezam</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper"> 
					                <input type="checkbox" name="amenities[]" id="check-8" value="Perfect day Sezam Mix"/> <label for="check-8">Perfect day Sezam Mix</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
							</div>
							<p>Nacin pripreme</p>
							<div class="text-wrapper">
								<textarea name="priprema" id="" cols="30" rows="10"></textarea>
							</div>
						</div>
						<div class="form__info-data">
							<div class="left">
								<p>Ime i prezime:*</p>
								<div class="input-wrapper">
									<input type="text" name="ime">
								</div>
								<p>Drzava:*</p>
								<div class="input-wrapper">
									<input type="text" name="drzava">
								</div>
								<p>Email*</p>
								<div class="input-wrapper">
									<input type="email" name="email">
								</div>
							</div>
							<div class="right">
								<p>Adresa i grad:*</p>
								<div class="input-wrapper">
									<input type="text" name="adresa">
								</div>
								<p>Broj telefona:*</p>
								<div class="input-wrapper">
									<input type="text" name="broj_telefona">
								</div>
								
								<div class="check-wrapper">
					                <input type="checkbox" name="approve1" id="check2-1"/> <label for="check2-1">Prihvatam pravila nagradnog konkursa</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
					            <div class="check-wrapper">
					                <input type="checkbox" name="approve2" id="check2-2"/> <label for="check2-2">Saglasan sam sa ostavljanjem svojih podataka</label>
					                <span class="checkmark">&nbsp;</span>
					            </div>
							</div>
						</div>
						<button type="submit" name="unesi" class="btn-main-submit">unesi recept</button>
					</form>
				<?php else: ?>
					<h3>Success poruka</h3>
				<?php endif ?>
				</div>
			</section>
		</main>
		
	</div>
	<footer><h2>izrada sajta <a href="http://www.premiumfactory.rs/">premium factory</a></h2></footer>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/main.js?v=1.1"></script>
	<script>
	
		$('.header__nav ul li:nth-child(1)').addClass('active');
	
	</script>
</body>
</html>