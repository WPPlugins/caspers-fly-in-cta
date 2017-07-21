<?php
/*
 * JS Output for BOTTOM Fly-In
 */
?>

<script>
   	jQuery(document).ready(function($){
        
        function slideOut(){
            $('.cpcta-flyin .cpcta-content-panel').slideToggle(400);
        }
        
        <?php if( get_option('cpcta-enable-autopop') && is_front_page() ) { ?>
	       setTimeout(slideOut, <?php echo get_option('cpcta-autopop-timer'); ?>);
        <?php } ?>
        
		$('.cpcta-flyin .cpcta-top-bar').click(function(){
			slideOut();
		});
		$('.cpcta-flyin .cpcta-content-panel .cpcta-close').click(function(){
			slideOut();
		});
        
        //set max-height based on size of window
        var maxHeight = window.innerHeight;
        maxHeight = maxHeight - (maxHeight * .2); //take some off the top
        $('.cpcta-content-panel').css('max-height', maxHeight);
	});
</script>