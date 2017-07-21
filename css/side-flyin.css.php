<?php
/*
 *
 * CSS Output for SIDE Fly-In
 *
 */
 
$position = get_option('cpcta-hori-slider-position');
$angle = get_option('cpcta-hori-slider-topbar-angle');
if(get_option('cpcta-zindex')) {
	$zindex = get_option('cpcta-zindex');
} else {
	$zindex = 999999;
}
?>
<style>
	.cpcta-flyin *  { transition: 1s; }
	.cpcta-flyin {
		min-width: 300px;
		max-height: 100%;
		z-index: <?php echo $zindex; ?>;
	}
	.cpcta-flyin .cpcta-top-bar {
		position: fixed;
		z-index: <?php echo $zindex; ?>;
		top: 150px;
		<?php if($position == 'right' && $angle == 'vertical') : ?>
			right: 0;
			border-top-left-radius: 5px;
			border-bottom-left-radius: 5px;
		<?php elseif( $position == 'left' && $angle == 'vertical') : ?>
			left: 0;
			border-top-right-radius: 5px;
			border-bottom-right-radius: 5px;
		<?php elseif( $position == 'right' && $angle == 'horizontal' ) : ?>
			right: 0px;
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
		<?php elseif( $position == 'left' && $angle == 'horizontal' ) : ?>
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
		<?php endif; ?>
    width: <?php echo get_option('cpcta-width-pixel'); ?>px;
		background: <?php echo get_option('cpcta-top-bar-bkg-color'); ?>;
		color: <?php echo get_option('cpcta-top-bar-font-color'); ?>;
		text-align: center;
	/*	border-top-right-radius: 5px; */
		padding: 8px 10px;
		font-size: 16px;
		font-weight: bold;
		cursor: pointer;
		<?php if( $angle == 'horizontal' ) : ?>
            transform: rotate(-90deg);
            <?php if( $position == 'right' ) : ?>
                transform-origin: bottom right;
            <?php elseif( $position == 'left' ) : ?>
                transform-origin: top left;
                top: <?php echo 150 + get_option('cpcta-width-pixel'); ?>px /* this offsets the top position when the top-bar is rotated around the top left corner */
            <?php endif; ?>
		<?php endif; ?>
	}
	.cpcta-flyin .cpcta-top-bar .up {
		/*color: #E88C38;*/
		padding: 0 10px;
		font-weight: bold;
		font-size: 18px;
	}
	.cpcta-flyin .cpcta-content-panel .cpcta-close{
		color: <?php echo get_option('cpcta-top-bar-font-color'); ?>;
		background: <?php echo get_option('cpcta-close-btn-color'); ?>;
		padding: 0 7px;
		position: absolute;
		top: 5px;
		<?php if( $position == 'right' ) : ?>
			right: 10px;
		<?php elseif( $position == 'left' ) : ?>
			left: 10px;
		<?php endif; ?>
		font-size: 11px;
		border-radius: 50%;
		cursor: pointer;
	}
	.cpcta-flyin .cpcta-content-panel {
		position: fixed;
		z-index: <?php echo $zindex; ?>;
		<?php if( $position == 'right' ) : ?>
			right: -400px;
		<?php elseif ( $position == 'left' ) : ?>
			left: -400px;
		<?php endif; ?>
		top: 0;
		background: <?php echo get_option('cpcta-body-content-bkg-color'); ?>;
		color: <?php echo get_option('cpcta-body-content-font-color'); ?>;
		padding: 10px 20px 30px 20px;
		box-sizing: border-box;
		/* text-align: center; */
		height: 100%;
		max-width: 100%;
		width: 400px;
	}
    .cpcta-flyin > div.cpcta-content-panel {
        overflow: auto;
    }
	.cpcta-flyin .cpcta-content-panel a{
		color: #000;
	}
	.cpcta-flyin .cpcta-content-panel .cta{
		margin-top: 15px;
	}
	.cpcta-flyin .cpcta-content-panel a.button{
		color: #000;
		background: #6C942F;
		text-transform: uppercase;
		padding: 10px;
		margin: 15px 0 0 0;
	}
	
	div.cpcta-content-panel.slidOut {
	<?php 
		if($position == 'right'){
			echo "right: 0px;";
		} else if($position == 'left'){
			echo "left: 0px;";	
		}
	?>
	}
	div.cpcta-top-bar.slidOut { 
	<?php 
		if( $position == 'right' && get_option('cpcta-hori-slider-topbar-angle') == 'vertical' ){
			echo "right: 400px;";
		} else if( $position == 'left' && get_option('cpcta-hori-slider-topbar-angle') == 'vertical' ){
			echo "left: 400px;";	
		} else if( $position == 'right' && get_option('cpcta-hori-slider-topbar-angle')=='horizontal' ) {
			echo "right: 400px;";
		} else if( $position == 'left' && get_option('cpcta-hori-slider-topbar-angle')=='horizontal' ) {
			echo "left: 400px;";
		}
	?>	
	}
	
	<?php if(get_option('cpcta-mobile-hidden')) { $mobileWidth = get_option('cpcta-mobile-width'); ?>
	@media screen and (max-width: <?php echo $mobileWidth . "px"; ?>){
		.cpcta-flyin {
			display: none;
		}
	}
	<?php } ?>
	
</style>