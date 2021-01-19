<!DOCTYPE html>
<html lang="en">
<head>
<?php $TITLE="Contact";include('layout1/head.php');?>
</head>

<body>
	<!-- Fixed navbar -->
	<?php include('layout1/menu.php');?>
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="public/home.php">Acceuil</a></li>
			<li class="active">A propos</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contactez nous</h1>
				</header>
				
				<p>
					Nous aimerions recevoir de vos nouvelles. Intéressé à travailler ensemble? Remplissez le formulaire ci-dessous avec quelques informations sur votre projet et je vous répondrai dès que possible. Veuillez m'accorder quelques jours pour répondre.
				</p>
				<br>
					<form>
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Nom">
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Email">
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Telephone">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Entrez votre message ici..." class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row " style="margin-bottom: 15px;">
							<!--<div class="col-sm-6">
								<label class="checkbox"><input type="checkbox"> S'inscrire a la Newsletters</label>
							</div>-->
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" type="submit" value="Envoyer">
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Address</h4>
					<address>
						77 RUE DE RENNES, RENNES, TX 35000, FRANCE
					</address>
					<h4>Phone:</h4>
					<address>
						(+33) 0601020304
					</address>
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
	<!--<section class="container-full top-space">
		<div id="map"></div>
	</section>-->
	<?php include('layout1/foot.php');?>
</body>
</html>