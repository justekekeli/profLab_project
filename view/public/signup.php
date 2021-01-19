<!DOCTYPE html>
<html lang="en">
<head>
	<?php $TITLE="Inscription";include('layout1/head.php');?>
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
			<li class="active">Registration</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Inscrivez vous</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Enregistrer un nouveau compte</h3>
							<p class="text-center text-muted">Si vous avez deja un compte, <a href="index.php?action=signin">Login</a> clicker sur login pour vous connecter </p>
							<hr>

							<form>
								<div class="top-margin">
									<label>Prenom</label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Email  <span class="text-danger">*</span></label>
									<input type="text" class="form-control">
								</div>
								<div class="top-margin">
									<label>Profession <span class="text-danger">*</span></label>
									<input type="text" class="form-control">
								</div>
								<!--div class="top-margin">
									<label>Date <span class="Date/label">
									<input type="datetime" class="form-control">
								</div-->

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger">*</span></label>
										<input type="text" class="form-control">
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Register</button>
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