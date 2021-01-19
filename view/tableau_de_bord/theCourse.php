<?php 
$ID='Lecours';
$TITLE='Le Professeur Charles Poitiers';
$CSS=' <link href="css/newstyle.css" rel="stylesheet">';
$CONTENT = '   <!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <div class="row mt">
      <div class="col-lg-12">
        <div class="row content-panel">
          <div class="col-md-4 profile-text mt mb centered">
            <div class="right-divider hidden-sm hidden-xs">
              <h4>Samedi 16h30</h4>
              <h6>Heure du cours</h6>
              <h4>290</h4>
              <h6>ELEVES</h6>
            </div>
          </div>
          <!-- /col-md-6 -->
          <div class="col-md-6 profile-text">
            <h3>Les bases en PHP</h3>
            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
            
          </div>
          <!-- BASIC FORM ELELEMNTS -->
          <div class="row mt">
            <div class="col-lg-12">
              <div class="form-panel" style="box-shadow:none;">
                <form class="form-horizontal style-form" method="get">
                  <div class="form-group">
                    <div class="col-sm-10">
                      <textarea class="form-control" placeholder="Votre commentaire..."></textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-theme">Laisser un commentaire</button>
                </form>
              </div>
            </div>
            <!-- col-lg-12-->
          </div>
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
                <div class="col-md-4">
                    <div class="media g-mb-30 media-comment">                       
                      <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">                  
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue
                            felis in faucibus ras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                            <div class="g-mb-15">
                            <h5 class="h5 g-color-blue-dark-v4 mb-0">John Doe</h5>
                          </div>
                      </div>
                    </div>
                </div>
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
';
$SCRIPT ='';

include('layout.php');
?>