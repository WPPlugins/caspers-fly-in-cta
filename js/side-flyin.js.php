<script>
jQuery( document ).ready(function( $ ) {

//change cpcta-top-bar content on click
	//gets base cpcta-top-bar content
	var CTA = '<?php echo get_option('cpcta-top-bar-text'); ?>';
			
	function slideOut(){
		//toggle's content in/out by adding or removing slidOut
		jQuery('.cpcta-flyin .cpcta-content-panel').toggleClass('slidOut');

		//cta tab behaves differently on mobile / desktop
		if( jQuery(window).width() > 480) {
			jQuery('.cpcta-flyin .cpcta-top-bar').toggleClass('slidOut'); //top-bar follows content-panel on tablet and desktop
			//change cpcta-top-bar content based on position
			if(jQuery('.cpcta-flyin .cpcta-top-bar').hasClass('slidOut')){
				jQuery('.cpcta-flyin .cpcta-top-bar').text('Close');
			} else {
				jQuery('.cpcta-flyin .cpcta-top-bar').text(CTA);
			}
		}	
	}
	
	//auto-pop out cta
    <?php if( get_option('cpcta-enable-autopop') && is_front_page() ) { ?>
	   setTimeout(slideOut, <?php echo get_option('cpcta-autopop-timer'); ?>);
    <?php } ?>
	
	//toggle content when cpcta-top-bar is clicked
	jQuery('.cpcta-flyin .cpcta-top-bar').click(function(){
		slideOut();
	});
	//toggle content when 'x' is clicked
	jQuery('.cpcta-flyin .cpcta-content-panel .cpcta-close').click(function(){
		slideOut();
	});
	
	
	/* compensate for logged in admin bar */
	<?php if( is_user_logged_in() ) : ?>
		//push content panel down when logged in, so nothing is hidden
		var offset = $('#wpadminbar').height();
		$('.cpcta-content-panel').css('margin-top',offset);
		
		//give new height to content panel when pushed down, so nothing is falling off screen
		var newHeight = $(window).height() - offset;
		$('.cpcta-content-panel').css('height', newHeight);
	<?php endif; ?>
});
</script>