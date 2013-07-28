<div id="slider">
<div id="featured" > 
	  <?php echo $slider_banner; ?>
	</div> 
</div> 
</div>
</div>

<script type="text/javascript">
function mycarousel_initCallback(carousel)
{ 
carousel.buttonNext.bind('click', function() {
carousel.startAuto(0);
});
carousel.buttonPrev.bind('click', function() {
carousel.startAuto(0);
});
carousel.clip.hover(function() {
carousel.stopAuto();
}, function() {
carousel.startAuto();
});
};

jQuery(document).ready(function() {
jQuery('#hs').jcarousel({
visible: 5,
scroll: 1,
wrap: 'circular',
auto: 2,
animation: 1000,
initCallback: mycarousel_initCallback
 });
});
</script>



<div id="slider-banner">
	<div id="wrap"> 
		<ul id="hs" class="jcarousel-skin-tango-hs"> 
			<?php echo $slider; ?>
		</ul> 
	</div> 
</div>