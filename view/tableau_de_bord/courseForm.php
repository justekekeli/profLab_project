<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('layout2/head.php');?>
</head>

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
        <h2><i class="fa fa-angle-right"></i> <?php if($type=='add'){echo 'Ajout d\'un cours';}else{echo 'Modification d\'un cours';}?></h2>
        <div class="row mt">
          <div class="col-lg-8 col-lg-offset-2 detailed mt">
            
            <form role="form" class="form-horizontal text-center" method="post" action=<?php if($type=='add'){echo 'index.php?action=insertCourse';}else{echo 'index.php?action=updateCourse';}?>>
            <input name="prof" type="hidden" value=<?php echo $_GET['id']?>>
              <div class="form-group">
                <label class="col-lg-4 control-label">Titre</label>
                <div class="col-lg-6">
                  <input type="text" placeholder=" " id="addr1" class="form-control" name="title" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Domaine </label>
                <div class="col-lg-6">
                    <select class="form-control" name="field" required>
                        <option selected disabled>Choisissez un domaine</option>
                    <?php
                        foreach($listFields as $f){
                            echo '<option value="'.$f['id'].'">'.$f['title'].'</option>';
                        }
                    
                    ?>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Jour de la séance </label>
                <div class="col-lg-6">
                    <select class="form-control" name="day" required>
                        <option selected disabled>Choisissez un jour</option>
                        <option value="1">Lundi</option>
                        <option value="2">Mardi</option>
                        <option value="3">Mercredi</option>
                        <option value="4">Jeudi</option>
                        <option value="5">Vendredi</option>
                        <option value="6">Samedi</option>
                        <option value="0">Dimanche</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Début du cours </label>
                <div class="col-lg-6">
                  <input type="time" placeholder=" " name="start" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Fin du cours </label>
                <div class="col-lg-6">
                  <input type="time" placeholder=" " name="end" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Niveau ou classe</label>
                <div class="col-lg-6">
                  <input type="text" placeholder=" " name="classe" class="form-control" required>
                </div>
              </div>  
              <div class="form-group">           
                <label class="col-lg-4 control-label">Lien pour le cours</label>
                <div class="col-lg-6">
                  <input type="text" placeholder=" " name="link" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-4 control-label">Description du cours</label>
                <div class="col-lg-10">
                  <textarea rows="4" cols="30" class="form-control" id="" name="desc"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10" style="margin-top:4rem;">
                  <button class="btn btn-theme" type="submit">Save</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-theme04" type="button">Cancel</button>
                </div>
              </div>
              
            </form>
          </div>
          
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
  <?php include('layout2/foot.php');?>
</body>

</html>
