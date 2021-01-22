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
							<h3 class="thin text-center">Connectez vous a votre compte</h3>
							<p class="text-center text-muted">si vous n'avez pas de compte, <a href="index.php?action=signupForm">Inscrivez vous</a> clickez sur le liens pour vous inscrire</p>
							<hr>
							
							<form action="index.php?action=auth" method="post">
								<div class="top-margin">
									<label>Email <span class="text-danger">*</span></label>
									<input type="email" class="form-control" name="email" required autocomplete="off">
								</div>
								<div class="top-margin">
									<label>Mot de passe <span class="text-danger">*</span></label>
									<input type="password" class="form-control" name="pwd" required>
								</div>
								<?php if(!empty($message)){ echo '<p style="color:red;">'.$message.'</p>';}?>
								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Mot de passe oublié?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<input class="btn btn-action" type="submit" value="Se connecter"/>
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