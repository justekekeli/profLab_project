<?php session_start();?>
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
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?php echo $totalCourses;?></h4>
                  <h6>Cours</h6>
                  
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 profile-text">
                <h3><?php  if(!empty($theUser[0]['firstname']) && !empty($theUser[0]['lastname']) )
                {echo $theUser[0]['firstname'].' '.$theUser[0]['lastname'];}else{ echo $theUser[0]['email']; }?></h3>
                <h6><?php echo $theUser[0]['work'];?></h6>
                <p><?php echo $theUser[0]['presentation'];?></p>
                <br>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 centered">
                <div class="profile-pic">
                  <p><img src="view/tableau_de_bord/assets/img/ui-sam.jpg" class="img-circle"></p>
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <!-- /panel-heading -->
              <div class="panel-body">
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-lg-8 col-lg-offset-2 detailed">
                        <h4 class="mb">Personal Information</h4>
                        <form onsubmit=" return validateForm()" role="form" class="form-horizontal" action="index.php?action=updateProfil&amp;id=<?php echo $theUser[0]['email'];?>" method="post">
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Nom</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " name="nom" value="<?php echo $theUser[0]['lastname'];?>" class="form-control" <?php if($ad==1){ echo 'disabled';}?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Prenom</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " name="prenom" value="<?php echo $theUser[0]['firstname'];?>" class="form-control" <?php if($ad==1){ echo 'disabled';}?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " name="email" value="<?php echo $theUser[0]['email'];?>" class="form-control" <?php if($ad==1){ echo 'disabled';}?>>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Role</label>
                            <div class="col-lg-6">
                              <select name="role" class="form-control" size=1 <?php if($ad==1){ echo 'disabled';}?>>
                                <option value="prof" <?php if($theUser[0]['roleUser']=='prof'){echo 'selected';} ?>>Professeur</option>
                                <option value="student" <?php if($theUser[0]['roleUser']=='student'){echo 'selected';} ?>>Elève</option>
                                <?php if($theUser[0]['roleUser']=='admin'){echo ' <option value="admin" selected>Admin</option>';} ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Profession</label>
                            <div class="col-lg-6">
                              <input type="text" placeholder=" " name="work" value="<?php echo $theUser[0]['work'];?>" class="form-control"<?php if($ad==1){ echo 'disabled';}?>>
                            </div>
                          </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label">Petite présentation</label>
                            <div class="col-lg-10">
                            <textarea rows="4" cols="10" class="form-control" id="" name="desc" <?php if($ad==1){ echo 'disabled';}?>><?php echo $theUser[0]['presentation'];?></textarea>
                            </div>
                        </div>
                        <p style="color:blue;">Saisissez votre actuel mot de passe si vous ne voulez pas le modifier</p>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Changer de mot de passe</label>
                            <div class="col-lg-6">
                              <input type="password" placeholder=" " name="pwd" id="pwd" value="" class="form-control" <?php if($ad==1){ echo 'disabled';}?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-4 control-label">Confirmation du mot de passe</label>
                            <div class="col-lg-6">
                              <input type="password" placeholder=" " id="repwd" class="form-control" <?php if($ad==1){ echo 'disabled';}?>>
                            </div>
                          </div>
                          <p style="color:red;" id="message"></p>
                          <div class="col-lg-offset-2 col-lg-10">
                            <button class="btn btn-theme" type="submit">Modifier</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button class="btn btn-theme04" type="button">Annuler</button>
                          </div>
                          
                        </form>
                      </div>
                     
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
  <?php include('layout2/foot.php');?>
</body>

</html>
