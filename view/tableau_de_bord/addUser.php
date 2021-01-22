<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('layout2/head.php');?>
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
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <?php include('layout2/header.php');?>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <?php include('layout2/sidebar.php');?>
     <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Ajout d'utilisateur </h3>
        <form onsubmit=" return validateForm()" role="form" class="form-horizontal" method="post" action="index.php?action=addUser" >
                <div class="form-group">
                <label class="col-lg-4 control-label">Nom</label>
                <div class="col-lg-6">
                    <input type="text" placeholder=" " name="nom" class="form-control">
                </div>
                </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Prenom</label>
                <div class="col-lg-6">
                    <input type="text" placeholder=" " name="prenom"  class="form-control">
                </div>
                </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Email</label>
                <div class="col-lg-6">
                    <input type="text" placeholder=" " name="email" class="form-control" required>
                </div>
                </div>
                
                <div class="form-group">
                <label class="col-lg-4 control-label">Role</label>
                <div class="col-lg-6">
                    <select name="role" class="form-control" size=1>
                    <option value="prof">Professeur</option>
                    <option value="student">Etudiant</option>
                    <option value="admin">Admin</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Mot de passe</label>
                <div class="col-lg-6">
                    <input type="password" placeholder=" " name="pwd" id="pwd" value="" class="form-control" required>
                </div>
                </div>
                <div class="form-group">
                <label class="col-lg-4 control-label">Confirmation du mot de passe</label>
                <div class="col-lg-6">
                    <input type="password" placeholder=" " id="repwd" class="form-control" required>
                </div>
                </div>
                <p style="color:red;" id="message"></p>
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-theme" type="submit">Ajouter</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-theme04" type="button">Annuler</button>
                </div>
                
            </form>

      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
  <?php include('layout2/foot.php');?>
</body>

</html>
