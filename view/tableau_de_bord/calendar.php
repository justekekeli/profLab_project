<?php 
$ID= 'calendar';
$TITLE='Mon agenda';
$CSS='
<link href="lib/fullcalendar/main.css" rel="stylesheet" />';
$CONTENT = ' <!--main content start-->
<section id="main-content">
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
  <!-- /wrapper -->
</section>';

$SCRIPT =' <script src="lib/fullcalendar/fr.js"></script>
<script>
 
  $(document).ready(function() {
    var initialLocaleCode = "fr";
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: \'timeGridWeek\',
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
      events: <?php include("load.php")?>
    });

calendar.render();
  });
     </script>';
include('layout.php');
?>