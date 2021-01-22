<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href=""><img src="view/tableau_de_bord/assets/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php if(!empty($_SESSION['prenom'] && !empty($_SESSION['nom']))){ echo $_SESSION['nom'].' '.$_SESSION['prenom'];}else{ echo $_SESSION['email'];}?></h5>
          <li class="mt">
            <a id="a-home" onclick="active(this)" class="active" href="index.php?action=cal&amp;m=<?php echo $_SESSION['email']?>&amp;p=<?php echo $_SESSION['pwd']?>">
              <i class="fa fa-dashboard"></i>
              <span>Tableau de bord</span>
              </a>
          </li>
          <li class="sub-menu">
            <a id="a-profil" onclick="active(this)" href="index.php?action=profil&amp;email=<?php echo $_SESSION['email']?>&amp;role=<?php echo $_SESSION['role']?>">
              <i class="fa fa-user"></i>
              <span>Profil</span>
              </a>
          </li>
          <?php
          if($_SESSION['role']=='admin')
          {
            echo '
            <li class="sub-menu">
            <a id="a-users" onclick="active(this)" href="index.php?action=listUsers">
              <i class="fa fa-users"></i>
              <span>Utilisateurs</span>
              </a>
          </li>
            ';
          }
          ?>
          <li class="sub-menu">
            <a id="a-dom" onclick="active(this)" href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>Domaines</span>
              </a>
            <ul class="sub">
              <!--j'ai nommé les interfaces connecter blank-Name qui correspondrons chacuns a Name domaines-->
              <!--utilise blank.html pour faire les interfaces la , il suffira de remplir la "section juste avant le footer pour te faciliter la tâche"-->
             <?php 
                 if($_SESSION['role']=='admin'){
                  echo '<li><a href="index.php?action=fieldAdd"> Ajouter un domaine</a></li>';
                }
             if(isset($_SESSION['field'])){
                      foreach($_SESSION['field'] as $field){
                        echo '<li><a href="index.php?action=dom&amp;id='.$field['id'].'">'.$field['title'].'</a></li>';
                      }
                  }
              ?>
            </ul>
          </li>
          <?php
          if($_SESSION['role']!='admin'){
         echo ' <li class="sub-menu">
            <a id="a-crs" onclick="active(this)" href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Mes cours</span>
              <!--Ici c\'est là que sera les cours dispenser pour les profs et les cours suivis par les étudiants-->
              </a>
            <ul class="sub">';
                if($_SESSION['role']=='prof'){
                  echo '<li><a href="index.php?action=courseAdd&amp;id='.$_SESSION['email'].'"> Ajouter un cours</a></li>';
                }
                foreach($_SESSION['mes_cours'] as $course){
                  if($course['blocked']!=1){
                  echo '<li><a href="index.php?action=mes_cours&amp;id='.$course['id'].'">'.$course['title'].'</a></li>';
                }
              }
           echo '
            </ul>
          </li>';
          }
          ?>
          <li>
            <a id="a-mail" onclick="active(this)" href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li>
         
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
