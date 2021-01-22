<?php
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
<link href="lib/datatables/datables.bootstrap.min.css" rel="stylesheet" />
<link href="lib/datatables/responsive.min.css" rel="stylesheet" />
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
        <h3><i class="fa fa-angle-right"></i> Utilisateurs </h3>
        <a class="btn btn-theme" href="index.php?action=addUserForm">Ajouter un utilisateur</a>
        <div class="row mt" style="background-color:white;padding:2rem;">
          <div class="col-lg-12">
          <table id="users" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Inscription</th>
                    <th>Bloqué?</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($listUsers as $u){
                    if($u['email']!=$_SESSION['email']){
                    echo '
                    <tr>
                        <td>'.$u['lastname'].'</td>
                        <td>'.$u['firstname'].'</td>
                        <td>'.$u['email'].'</td>
                        <td>'.$u['roleUser'].'</td>
                        <td>'.$u['Inscription_date'].'</td>';
                        if($u['blocked']==1){
                            echo '<td style="color:red;">Oui</td>
                                <td></td>
                            ';
                        }else{
                            echo '
                            <td style="color:green;">Non</td>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-theme" href="index.php?action=showUser&amp;id='.$u['email'].'&amp;role='.$u['roleUser'].'"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a class="btn" style="background-color:red;color:white;" href="index.php?action=deleteUser&amp;id='.$u['email'].'"><i class="fa fa-trash"></i></a>
                             </td>
                            ';
                        }
                        echo '</tr>';
                       

                    }
                    

                }
            
            ?>
               
            </tbody>
        </table>
          </div>
        </div>
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
  <?php include('layout2/foot.php');?>
  <script src="lib/datatables/datables.bootstrap.min.js"></script>
  <script src="lib/datatables/datables.min.js"></script>
  <script src="lib/datatables/responsive.min.js"></script>
  <script src="lib/datatables/bootstrap.responsive.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#users').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    });
} );
  </script>
</body>

</html>
