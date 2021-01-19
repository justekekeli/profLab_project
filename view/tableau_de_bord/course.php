<?php 
$ID='cours';
$TITLE='Mes cours';
$CSS='  <link href="lib/datables.bootstrap.min.css" rel="stylesheet">';
$CONTENT = ' <section id="main-content">
<section class="wrapper">
  <div class="row mb" style="width:100%;margin:5rem;">
    <!-- page start-->
    <div class="col-lg-10">
    <button type="button" class="btn btn-success" style="margin-bottom:4rem;">Accéder aux cours en Programmation</button>
    <div class="content-panel ">
    <table id="example" class="table table-striped table-bordered" style="width:100%;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th></th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            </td>
        </tr>
        <tr>
            <td>Garrett Winters</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
            </td>
        </tr>
    </tbody>
</table>
    </div>
    
    <!-- page end-->
  </div>
  <!-- /row -->
</section>
<!-- /wrapper -->
</section>
';
$SCRIPT =' <script src="lib/datables.min.js"></script>
<script src="lib/datables.bootstrap.min.js"></script>
<script>$(document).ready(function() {
    $(\'#example\').DataTable({
        responsive: true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });
} );</script>';

include('layout.php');
?>