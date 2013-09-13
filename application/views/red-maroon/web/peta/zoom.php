
  <script src="<?php echo base_url(); ?>asset/js/ga.js" async="" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>asset/js/site.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/app_zoom.js"></script>
	
<body style="cursor: pointer;">
	  <script type="text/javascript">
    $(document).ready(function(){
      $('input:button').button();
      $('#image').zoomable();
    });
  </script>
  
  <p>
    <input role="button" class="ui-button ui-widget ui-state-default ui-corner-all" value="+" onclick="$('#image').zoomable('zoomIn')" title="Zoom in" type="button">
    <input role="button" class="ui-button ui-widget ui-state-default ui-corner-all" value="-" onclick="$('#image').zoomable('zoomOut')" title="Zoom out" type="button">
    <input role="button" class="ui-button ui-widget ui-state-default ui-corner-all" value="Reset" onclick="$('#image').zoomable('reset')" type="button">
  </p>
  <div style="overflow:hidden;width:100%;height:100%;position:relative;">
    <img class="ui-draggable" style="position: relative; margin: 0px; display: inline-block; width: 100%;" src="<?php echo base_url(); ?>asset/images/peta_kecil.jpg" usemap="#map" id="image">
  </div>

 