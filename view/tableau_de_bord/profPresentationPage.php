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
  <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row content-panel">
              <div class="col-md-4 profile-text mt mb centered">
                <div class="right-divider hidden-sm hidden-xs">
                  <h4><?php echo $totalCourses;?></h4>
                  <h6>COURS</h6>
                  <h4><?php echo $totalStudents;?></h4>
                  <h6>ELEVES</h6>
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
                 <?php
                    if($_SESSION['email']!=$theUser[0]['email']){
                      echo' <p>
                      <button class="btn btn-theme02">Donner un avis</button>
                       </p>';
                    }
                 ?>
                  
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          </div>
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Recommandation & Avis</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                    <?php 
                      foreach($listOpinions as $p){
                            echo '
                            <div class="col-md-4" style="margin-left:2rem;">
                            <div class="card text-center" style="height:auto;">
                            <div class="card-body" style=" border :1px solid #5bc0de;border-radius:1rem;">
                              <p class="card-text" style="padding-top:4rem;">'.$p['content'].'</p>
                              <p style="color:black;">'.$p['firstN'].' '.$p['lastN'].'</p>
                            </div>
                              <!-- /detailed -->
                            </div>
                            <!-- /col-md-4
                           -->
                          </div>';
                      }
                    
                    ?>

                    <!-- /OVERVIEW -->
                  </div>
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
      <!-- /wrapper -->
    </section>
    <!--footer start-->
  <?php include('layout2/foot.php');?>

</body>

</html>
