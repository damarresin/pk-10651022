<!DOCTYPE html>
<?php
session_start();
$logged_in = false;
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}

error_reporting(0);
include "config/config.php";
session_start();
//misal anda login sebagai user dengan id=budi
$_SESSION['userid'] = $_SESSION['username'];
$userid = $_SESSION['userid'];
$hal = $_GET['hal'];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="damar" content="Bluth Company Jiplak">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/select2.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/alertify.css" rel="stylesheet">
    <link rel="Favicon Icon" href="favicon.ico">
    <link href="fonts.googleapis/css.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<link rel="stylesheet" href="assets.notif/gaya.css" type="text/css">
<script type="text/javascript" src="assets.notif/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="assets.notif/notifikasi.js"></script>	
<link href="table.css" rel="stylesheet" type="text/css">

  </head>
  <body>
  
<!--=============Jika admin users login=====================================================================-->  
	<?php if ($logged_in) { ?>
<!--php chek login-->
 
    <div id="wrap">
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <div class="logo">
            <img src="assets/img/logo.png" alt="Realm Admin Template">
          </div>
           <a class="btn btn-navbar visible-phone" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
           <a class="btn btn-navbar slide_menu_left visible-tablet">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>

          <div class="top-menu visible-desktop">
            <ul class="pull-left">
              <li><a id="pesan" href="#"><i class="icon-envelope"></i> Messages<span id="notifikasi"></span></a>
<div id="info">
    <div id="loading"><br>Loading...<img src="assets.notif/loading.gif"></div>
    <div id="konten-info">
    </div>
</div>			  
			  </li>
<!--              <li><a id="notifications" data-notification="3" href="#"><i class="icon-globe"></i> Notifications</a></li> -->
            </ul>
            <ul class="pull-right">
				<li><a href="session/logout.php"><i class="icon-off"></i> Logout</a></li>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid">

        <!-- Side menu -->  
        <div class="sidebar-nav nav-collapse collapse">
          <div class="user_side clearfix">
            <img src="assets/img/damar.jpg" alt="Odinn god of Thunder">
		<h5><?php echo $_SESSION['username']; ?></h5>			
            <a href="?hal=settings"><i class="icon-cog"></i> Settings</a><?php include "modul/time.php"; ?>                  
		  </div>
          <div class="accordion" id="accordion2">
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_F79999 <?php if ($hal == 'dashboard_page') {?>active<?} else {}?>" href="?hal=dashboard_page"><i class="icon-dashboard"></i> <span>Dashboard</span></a>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_C3F7A7 <?php if ($hal=='ui_features' || $hal=='forms' || $hal=='tables' || $hal=='buttons') {}else{?>collapsed<?}?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse1"><i class="icon-magic"></i> <span>Features</span></a>
              </div>
              <div id="collapse1" class="accordion-body <?php if ($hal=='ui_features' || $hal=='forms' || $hal=='tables' || $hal=='buttons') {?>in <?}else{}?>collapse">
                <div class="accordion-inner">
                  <a class="accordion-toggle <?php if ($hal == 'ui_features') {?>active<?} else {}?>" href="?hal=ui_features"><i class="icon-star"></i> UI Features</a>
                  <a class="accordion-toggle <?php if ($hal == 'forms') {?>active<?} else {}?>" href="?hal=forms"><i class="icon-list-alt"></i> Forms</a>
                  <a class="accordion-toggle <?php if ($hal == 'tables') {?>active<?} else {}?>" href="?hal=tables"><i class="icon-table"></i> Tables</a>
                  <a class="accordion-toggle <?php if ($hal == 'buttons') {?>active<?} else {}?>" href="?hal=buttons"><i class="icon-circle"></i> Buttons</a>
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_9FDDF6 <?php if ($hal=='notifications' || $hal=='calendar' || $hal=='gallery') {}else{?>collapsed<?}?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse2"><i class="icon-reorder"></i> <span>Components</span></a>
              </div>
              <div id="collapse2" class="accordion-body <?php if ($hal=='notifications' || $hal=='calendar' || $hal=='gallery') {?>in <?}else{}?>collapse">
                <div class="accordion-inner">
                  <a class="accordion-toggle <?php if ($hal == 'notifications') {?>active<?} else {}?>" href="?hal=notifications"><i class="icon-rss"></i> Notifications</a>
                  <a class="accordion-toggle <?php if ($hal == 'calendar') {?>active<?} else {}?>" href="?hal=calendar"><i class="icon-calendar"></i> Calendar</a>
                  <a class="accordion-toggle <?php if ($hal == 'gallery') {?>active<?} else {}?>" href="?hal=gallery"><i class="icon-picture"></i> Gallery</a>
                </div>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_F6F1A2 <?php if ($hal == 'tasks_page') {?>active<?} else {}?>" href="?hal=tasks_page"><i class="icon-tasks"></i> <span>Tasks</span></a>
              </div>
            </div>
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_C1F8A9 <?php if ($hal == 'analytics_page') {?>active<?} else {}?>" href="?hal=analytics_page"><i class="icon-bar-chart"></i> <span>Analytics</span></a>
              </div>
            </div> 
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_9FDDF6 <?php if ($hal == 'tickets_page') {?>active<?} else {}?>" href="?hal=tickets_page"><i class="icon-bullhorn"></i> <span>Support Tickets</span></a>
              </div>
            </div> 
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle b_F5C294 <?php if ($hal == 'users_page') {?>active<?} else {}?>" href="?hal=users_page"><i class="icon-user"></i> <span>Users</span></a>
              </div>
            </div>      
          </div>
        </div>
        <!-- /Side menu -->

        <!--========== Main window =========-->
<?php
error_reporting(0);
$hal = $_GET['hal'];
if ($hal=="dashboard_page"){
include "modul/dashboard_page.php";
}

else if($hal=="tasks_page"){
include "modul/tasks_page.php";
}

else if($hal=="analytics_page"){
include "modul/analytics_page.php";
}

else if($hal=="tickets_page"){
include "modul/tickets_page.php";
}

else if($hal=="users_page"){
include "modul/users_page.php";
}

//sub menu Features
else if($hal=="ui_features"){
include "modul/ui_features.php";
}
else if($hal=="forms"){
include "modul/forms.php";
}
else if($hal=="tables"){
include "modul/tables.php";
}
else if($hal=="buttons"){
include "modul/buttons.php";
}

//sub menu Components
else if($hal=="notifications"){
include "modul/notifications.php";
}
else if($hal=="calendar"){
include "modul/calendar.php";
}
else if($hal=="gallery"){
include "modul/gallery.php";
}

else if($hal=="settings"){
include "modul/settings.php";
}

else if($hal=="readmessages"){
include "modul/readmessages.php";
}

else if($hal=="seeallmessages"){
include "modul/seeallmessages.php";
}

else {
include "modul/dashboard_page.php";
}	
?>		
        <!--========= /Main window ========-->

    </div><!--/.fluid-container-->
    </div><!-- wrap ends--> 


    <!-- Modal -->
    <div id="example_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Settings</h3>
      </div>
      <div class="modal-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-primary">Save changes</button>
      </div>
    </div>   


    <script src="ajax.googleapis/jquery.min.js"></script>
    <script type="text/javascript" src="ajax.googleapis/jquery-ui.min.js"></script>
    <script type="text/javascript" src="cdnjs.cloudflare/raphael-min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src='assets/js/sparkline.js'></script>
    <script type="text/javascript" src='assets/js/morris.min.js'></script>
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>   
    <script type="text/javascript" src="assets/js/jquery.masonry.min.js"></script>   
    <script type="text/javascript" src="assets/js/jquery.imagesloaded.min.js"></script>   
    <script type="text/javascript" src="assets/js/jquery.facybox.js"></script>   
    <script type="text/javascript" src="assets/js/jquery.alertify.min.js"></script> 
    <script type="text/javascript" src="assets/js/jquery.knob.js"></script>
    <script type='text/javascript' src='assets/js/fullcalendar.min.js'></script>
    <script type="text/javascript" src="assets/js/realm.js"></script>
	
	<?php } else {?>	
 <!--==============||Login Admin Users||====================================================================================-->					
<link rel="stylesheet" type="text/css" href="session/css-login/structure.css">
 <?php 
error_reporting(0);
$hal = $_GET['hal'];
if ($hal=="forgot"){
include "session/forgot.php";
}
else if($hal=="submit-forgot"){
include "session/submit-forgot.php";
}
else if($hal=="question"){
include "session/question.php";
}
else if($hal=="question1"){
include "session/question1.php";
}
else if($hal=="reset"){
include "session/reset.php";
}
else if($hal=="reset-proses"){
include "session/reset-proses.php";
}
else if($hal=="login"){
include "session/login.php";
}
else {
include "session/login.php";
} 
 ?>			
	<?php } ?>	
	
	
  </body>
</html>