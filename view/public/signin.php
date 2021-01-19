<!DOCTYPE html>
<html lang="en">
<head>
	<?php $TITLE="connexion";include('layout1/head.php');?>
</head>

<body>
	<!-- Fixed navbar -->
	<?php include('layout1/menu.php');?>
		<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Acceuil</a></li>
			<li class="active">Connection</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Se connecter</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Connecter vous a votre compte</h3>
							<p class="text-center text-muted">si vous n'avez pas de compte, <a href="index.php?action=signupForm">Inscrivez vous</a> clickez sur le liens pour vous inscrire</p>
							<hr>
							
							<form>
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" class="form-control">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Mot de passe oublier?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<!--button class="btn btn-action" type="submit">Sign in</button-->
										<a class="btn btn-action" href="index.php?action=bord"> SIGN IN </a>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	<?php include('layout1/foot.php');?>
</body>
</html>