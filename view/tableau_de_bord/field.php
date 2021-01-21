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
        <h3><i class="fa fa-angle-right"></i><?php 
        foreach($theField as $f){
          $title= $f['title'];
        }
        echo $title;
        ?></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="row">
              <!-- /col-md-4 -->
              <!--  COURS  PANEL -->
              <?php 
                  foreach($listCourses as $course){
                    echo '<div class="col-lg-4 col-md-4 col-sm-4 mb">
                            <div class="content-panel pn">
                                <div id="profile-01">
                                  <h3>'.$course['title'].'</h3>
                                  <h6>'.$course['classe'].'</h6>
                                </div>
                            <div class="profile-01 centered"><a href="index.php?action=presentation&amp;id='.$course['prof_id'].'">
                           ';
                           if(!empty($course['profF']) && !empty($course['profL'])){
                             echo ' <p>Professeur:'.$course['profF'].' '.$course['profL'].'</p></a>';
                           }else{
                             echo ' <p>Professeur:'.$course['prof_id'].'</p></a>';
                           }
                           echo '</div>
                                    <div class="centered" style="margin-top:2rem;">
                                    <a  href="index.php?action=course&amp;id='.$course['id'].'">Plus d\'infos</a>
                                </div>
                               </div></div>';

                  }
              ?>
            </div>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
      </section>
    <!--footer start-->
  <?php include('layout2/foot.php');?>

</body>

</html>
