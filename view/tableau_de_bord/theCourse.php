<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('layout2/head.php');?>
<link href="view/tableau_de_bord/assets/css/newstyle.css" rel="stylesheet">
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
      <div class="row mt">
        <div class="col-lg-12">
          <div class="row content-panel">
            <div class="col-md-4 profile-text mt mb centered">
              <div class="right-divider hidden-sm hidden-xs">
              <?php foreach($theCourse as $course){
                echo '<h4>'.$days[intval($course['daySeance'])].' '.$course['seanceStart'].'</h4>
               <h6>Heure du cours</h6>
               <h4>'.$nbrStudents.'</h4>
               <h6>ELEVES</h6>';
              }
              ?>
              </div>
            </div>
            <!-- /col-md-6 -->
            <div class="col-md-6 profile-text">
            <?php foreach($theCourse as $course){
              echo '<h3>'.$course['title'].'</h3>
              <p>'.$course['descriptionCourse'].'</p>';
              if($_SESSION['email']==$course['prof_id'] && !$userCourse){
                echo ' <br>
                <p><a class="btn btn-theme bg-danger" href="index.php?action=suscribe&amp;course='.$course['id'].'&amp;student='.$_SESSION['email'].'&amp;p='.$_SESSION['pwd'].'"><i class="fa fa-book"></i> Participer au cours</a></p>';
              }
              if($userCourse){
                echo ' <br>
                <p><a class=" text-danger" href="'.$course['link'].'" target="_blank">Lien vers le cours</a></p>';

              }
            }
            ?> 
            </div>
            <!-- BASIC FORM ELELEMNTS -->
            <?php 
            if($userCourse && $theCourse[0]['prof_id']!=$_SESSION['email']){
                echo '<div class="row mt">
                <div class="col-lg-12">
                  <div class="form-panel" style="box-shadow:none;">
                    <form class="form-horizontal style-form" method="post"';
                     foreach($theCourse as $course){
                        echo 'action="index.php?action=addComment&amp;cs='.$_SESSION['email'].'&amp;id='.$course['id'].'" >';
                      }
                      echo '                 
                      <div class="form-group">
                        <div class="col-sm-10">
                          <textarea name="content" class="form-control" placeholder="Votre commentaire..."></textarea>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-theme">Laisser un commentaire</button>
                    </form>
                  </div>
                </div>
                <!-- col-lg-12-->
              </div>';
            }
            
            ?>
        </div>
          <!-- /row -->
      </div>

        <div class="col-lg-12 mt">
          <div class="row content-panel" >
            <div class="panel-heading">
              <ul class="nav nav-tabs nav-justified">
                <li class="active">
                  <a data-toggle="tab" href="#overview">Commentaires sur le cours</a>
                </li>
              </ul>
            </div>
            <!-- /panel-heading -->
            <div class="panel-body">
            <div class="row">
            <?php foreach($listComments as $c){
                echo '<div class="col-md-3">
                      <div class="media g-mb-30 media-comment">                       
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">                  
                          <p>'.$c['content'].'</p>
                          <div class="g-mb-15">
                            <h5 class="h5 g-color-blue-dark-v4 mb-0">'.$c['firstN'].' '.$c['lastN'].'</h5>
                          </div>
                        </div>
                      </div>
                  </div>';
            }
            ?>
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
