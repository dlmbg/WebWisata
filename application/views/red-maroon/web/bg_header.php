<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $GLOBALS['site_title']; ?></title>
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/menu.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/css/jcalendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/menu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/jquery-ui.min.js" ></script>
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/jquery.ticker.js"></script> 
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/site.js"></script>
<script language="javascript" src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/jcalendar.js"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/slideshow.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/utilities.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.fancybox-1.3.4.pack.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>asset/css/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

$(document).ready(function() {

  $("a#boxshow").fancybox({
    'titleShow'     : true,
    'easingIn'      : 'easeOutBack',
    'easingOut'     : 'easeInBack'
  });

    $("#slideshow > div:gt(0)").hide();

setInterval(function() {
$('#slideshow > div:first')
.fadeOut(1000)
.next()
.fadeIn(1000)
.end()
.appendTo('#slideshow');
}, 3000);

    $("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);

    $('fieldset.jcalendar').jcalendar();
  
  // Create two variable with the names of the months and days in an array
  var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
  var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]
  
  // Create a newDate() object
  var newDate = new Date();
  // Extract the current date from Date object
  newDate.setDate(newDate.getDate());
  // Output the day, date, month and year    
  $('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());
  
  setInterval( function() {
    // Create a newDate() object and extract the seconds of the current time on the visitor's
    var seconds = new Date().getSeconds();
    // Add a leading zero to seconds value
    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    },1000);
    
  setInterval( function() {
    // Create a newDate() object and extract the minutes of the current time on the visitor's
    var minutes = new Date().getMinutes();
    // Add a leading zero to the minutes value
    $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
    
  setInterval( function() {
    // Create a newDate() object and extract the hours of the current time on the visitor's
    var hours = new Date().getHours();
    // Add a leading zero to the hours value
    $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
  });
  
  
  
</script>

</head>

<body onLoad="goforit()">
<div id="long-line-top">
<div id="line-top">
<div id="left-line-top">Selamat datang pengunjung | <script src="<?php echo base_url(); ?>asset/theme/<?php echo $GLOBALS['site_theme']; ?>/js/clock.js" type="text/javascript"></script><span id="clock"></span></div>
</div>
</div>


<div id="header">
  <div id="slideshow" height="167">

    <div overflow="hidden"><img src="<?php echo base_url(); ?>asset/header/1.jpg" width="980" height="167"></div>
    <div overflow="hidden"><img src="<?php echo base_url(); ?>asset/header/2.jpg" width="980" height="167"></div>

  </div>
</div>

<div id="menu-ribbon">
<div id="center-menu-ribbon">
<div id="MainMenu"><div id="Menu">
  <div class="suckertreemenu">
<?php echo $menu_top; ?>
</div>
</div>
</div>
</div>

<div style="padding:5px;">
<div id="hot-news">
<div style="float:left; width:150px;">
<strong>Sekilas Info Hari Ini : </strong>
</div>
<div style="float:right;">
  <ul id="js-news" class="js-hidden">
    <?php
    $get = $this->db->order_by("id_pengumuman","DESC")->get("dlmbg_pengumuman",3,0);
    foreach($get->result() as $b)
    {
      echo '<li><a href="'.base_url().'web/pengumuman/detail/'.$b->id_pengumuman.'">'.$b->judul.'</a></li>';
    }
    ?>
  </ul>
</div>
</div>
<div class="cleaner_h0"></div>
</div>


<div id="content">
<div id="top-content">


  </div> 
  </div>
