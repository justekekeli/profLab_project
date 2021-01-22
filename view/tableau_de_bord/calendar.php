<?php
session_start();
$_SESSION['nom']=$userInfos['nom'];
$_SESSION['prenom']=$userInfos['prenom'];
$_SESSION['email']=$userInfos['email'];
$_SESSION['role']=$userInfos['role'];
$_SESSION['pwd']=$userInfos['pwd'];
$_SESSION['field']=$fields;
if(isset($datas[1])){
  $_SESSION['mes_cours']=$datas[1];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('layout2/head.php');?>
<link href="lib/fullcalendar/main.css" rel="stylesheet" />
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
   <?php if($_SESSION['role']!='admin'){
          echo '
          <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Mon calendrier de cours</h3>
          <!-- page start-->
          <div class="row mt">
            <aside class="col-lg-10 " style="margin-left: 10%;">
              <section class="panel">
                <div class="panel-body">
                  <div id="calendar" class="has-toolbar" style="color: #1e2b37;height: 40rem;"></div>
                </div>
              </section>
            </aside>
          </div>
          <!-- page end-->
        </section>
          ';
        }else{
          echo ' <section class="wrapper site-min-height">
          <h3><i class="fa fa-angle-right"></i>Tableau de bord</h3>
          <div class="row mt">
            <div class="col-lg-12">
                <div class="col-md-6 col-sm-6 mb">
                  <div class="darkblue-panel pn">
                    <div class="darkblue-header">
                      <h5>Professeurs</h5>
                    </div>
                    <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
                    <p style="font-weight:bold;color:white">'.$totalProfs[0]['countP'].'</p>
                  </div>
                  <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-6 col-sm-6 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Étudiants</h5>
                    </div>
                    <h1 class="mt"><i class="fa fa-users fa-3x"></i></h1>
                    <p style="font-weight:bold;">'.$totalStudents[0]['countS'].'</p>
                  </div>
                  <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-6 col-sm-6 mb">
                  <div class="grey-panel pn">
                    <div class="grey-header">
                      <h5>Cours</h5>
                    </div>
                    <h1 class="mt"><i class="fa fa-cogs fa-3x"></i></h1>
                    <p style="font-weight:bold;">'.$totalCourses[0]['countC'].'</p>
                  </div>
                  <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
                <div class="col-md-6 col-sm-6 mb">
                  <div class="darkblue-panel pn">
                    <div class="darkblue-header">
                      <h5>Domaines</h5>
                    </div>
                    <h1 class="mt"><i class="fa fa-desktop fa-3x"></i></h1>
                    <p style="font-weight:bold;color:white">'.count($fields).'</p>
                  </div>
                  <!--  /darkblue panel -->
                </div>
                <!-- /col-md-4 -->
              </div>
            </div>
          </div>
        </section>';
        }
     ?>
      <!-- /wrapper -->
    </section>
    <!--footer start-->
  <?php include('layout2/foot.php');?>
  <script src="lib/fullcalendar/main.js"></script>
  <script src="lib/fullcalendar/fr.js"></script>
<script>
$(document).ready(function() {
    var initialLocaleCode = "fr";
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "timeGridDay,timeGridWeek"
      },
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
    weekNumbers: true,
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    dayMaxEvents: true, // allow "more" link when too many events
    events: <?php echo json_encode($datas[0])?>
    });

calendar.render();
  });
 
</script>
</body>

</html>
