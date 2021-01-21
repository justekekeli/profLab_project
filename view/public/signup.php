<!DOCTYPE html>
<html lang="en">
<head>
	<?php $TITLE="Inscription";include('layout1/head.php');?>
</head>
<script>  
function validateForm() {  
    //recupération des mots de passes 
    var pw1 = document.getElementById("pwd").value;  
    var pw2 = document.getElementById("repwd").value;  
    if(pw1 != pw2) {  
      document.getElementById("message").innerHTML = "**Les mots de passes sont pas les mêmes";  
      return false;  
    } else {  
      return true;
    }  
 }  
</script>  
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

							<form  onsubmit ="return validateForm()" action="index.php?action=signup"  method="post">
								<div class="top-margin">
									<label>Prenom</label>
									<input type="text" class="form-control" name="prenom">
								</div>
								<div class="top-margin">
									<label>Nom</label>
									<input type="text" class="form-control" name="nom">
								</div>
								<div class="top-margin">
									<label>Email  <span class="text-danger">*</span></label>
									<input type="email" class="form-control" name="email">
								</div>
								<div class="top-margin">
									<label>Role <span class="text-danger">*</span></label>
									<select class="form-control" name="role">
										<option value="student">Élève</option>
										<option value="prof">Professeur</option>
									</select>
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe<span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="pwd" id="pwd">
									</div>
									<div class="col-sm-6">
										<label>Confirmation de mot de passe <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="repwd" id="repwd">
									</div>
								</div>
								<!--Message pour mot de passe non conforme-->
								<p style="color:red;" id="message"></p>
								<hr>
								<!--Message pour problème d'inscription :exemple:le compte existe déja-->
								<?php if(!empty($message)){ echo '<p style="color:red;">'.$message.'</p>';}?>
								<div class="row">
									<div class="col-lg-4 text-right">
										<input class="btn btn-action" type="submit" value="Valider"/>
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