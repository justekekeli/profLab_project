<!DOCTYPE html>
<html lang="en">
<head>
	<?php $TITLE="Acceuil";include('layout1/head.php');?>
</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include('layout1/menu.php');?>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">LE MEILLEUR ENDROIT POUR S'AMELIORER </h1>
				<p class="tagline">Inscrivez vous a l'application et profitez en ! </p>
				
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Le meilleur endroit pour comprendre ses cours</h2>
		<p class="text-muted">
			Ici sur notre site vous pourrez améliorer gratuitement vos compétenses dans plusieurs domaine.
			Des cours de soutiens sont proposés afin d'accompagner les élèves, collègiens, lycéens, etudiants, et autres des cours de soutiens dans 
			de multiples domaines afin qu'ils puisse s'en sortir haut les mains de cette crise actuel. 
		</p>
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">
			
			<h3 class="text-center thin">TOP 4 des cours les plus suivis</h3>
			
			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>Tech Info</h4></div>
					<div class="h-body text-center">
						<p>Ce cours de mathématiques, plus précisement de mathématiques appliqués à l'informatique permet de comprendre comment on utilise les maths en  informatiques et comment les mathématiques interviennent en informatique.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-flash fa-5"></i>Introduction a l'électronique</h4></div>
					<div class="h-body text-center">
						<p> Dans ce cours d'informatique, vous apprendrez a les bases de l'électronique, la définition des principaux éléments de base, qu'est ce que c'est que l'électronique et commencer de petites applications afin de tester ce que vous avez appris.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>Comment écrire un roman</h4></div>
					<div class="h-body text-center">
						<p>Dans ce cours de littérature, vous apprendrez comment écrire un roman de bout en bout, quels questions il faut se poser afin d'avoir un bon contenu et l'inspiration suffisante pour écrire un roman propre et de manière conventionnel.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>Comprendre la bourse</h4></div>
					<div class="h-body text-center">
						<p>Dans ce cours d'électronique, vous apprendrez les base et les définitions des principaux éléments liés a la bourse. Vous apprendrez en même temps ce que c'est qu'un graphe boursier et vous apprendrez a le lire.</p>
					</div>
				</div>
			</div> <!-- /row  -->
		
		</div>
	</div>
	<!-- /Highlights -->

	<!-- container -->
	<div class="container">

		<h2 class="text-center top-space">Questions fréquements posés</h2>
		<br>

		<div class="row">
			<div class="col-sm-6">
				<h3>Ces cours ont un contenus complet?</h3>
				<p>Bien évidement! Ce sont des cours d'accompagnement proposés aux personnes qui en ont besoin afin de les aidés a mieux comprendre les cours avec lesquels ils ont du mal en distanciel.</p>
			</div>
			<div class="col-sm-6">
				<h3>Interessant ce site. Mais est ce vraiment gratuit?</h3>
				<p>
					Bien évidement vous n'aurai que 0 euros a payer.
			</div>
		</div> 
		<!-- /row -->

		<div class="row">
			<div class="col-sm-6">
				<h3>Comment profiter de l'accompagnement?</h3>
				<p>
					En suivant les étapes suivantes: 
					cliquer sur sign in /sign up et sur register en lien bleu au dessus du champs email.
					Ensuite remplir les informations demander et pour finir, revenir se connecter.
					Voilà, rien de plus facile.
				</p>
			</div>
			<div class="col-sm-6">
				<h3>Les cours sont dispensés en Français?</h3>
				<p>Oui majoritairement, juste les cours de langues sont dans les langues en question</p>
			</div>
		</div> <!-- /row -->

		

	</div>	<!-- /container -->
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<?php include('layout1/foot.php');?>
</body>
</html>