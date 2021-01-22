<?php
session_start();?>
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
        <h3><i class="fa fa-angle-right"></i> Ajout d'un domaine</h3>
        <form  role="form" class="form-horizontal" method="post" action="index.php?action=insertField" >
        <input name="m" type="hidden" value=<?php echo $_SESSION['email']?>>
          <input name="p" type="hidden" value=<?php echo $_SESSION['pwd']?>>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Titre du domaine</label>
                    <div class="col-lg-6">
                        <input type="text" placeholder=" " name="title" class="form-control">
                    </div>
                </div>
                <?php if(!empty($message)){ echo '<p style="color:red;">'.$message.'</p>';}?>
                <div class="col-lg-offset-2 col-lg-10">
                <button class="btn btn-theme" type="submit">Ajouter</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btn btn-theme04" type="button" type="reset">Annuler</button>
                </div>
                
            </form>

      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
  <?php include('layout2/foot.php');?>
</body>

</html>
