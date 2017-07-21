<?php
/*
 * CSS Output for BOTTOM Fly-In
 */

	$flyinWidth = get_option('cpcta-width-percent');
    $position = get_option('cpcta-vert-slider-position');
?>

<style>
	.cpcta-flyin{
		position: fixed;
		bottom: 0;
		width: <?php echo $flyinWidth; ?>%;
		<?php 
		if($position == 'center'){
			echo "left: 50%;";
			echo "transform: translate(-50%);";
			echo "-webkit-transform: translate(-50%);"; // for safari
		} else if($position == 'left'){
			echo "left: 0;";	
		} else if($position == 'right'){
			echo "right: 0;";
		} ?>			
		min-width: 300px;
		z-index: <?php echo get_option('cpcta-zindex'); ?>
	}
	.cpcta-flyin .cpcta-top-bar{
		color: <?php echo get_option('cpcta-top-bar-font-color'); ?>;
		background: <?php echo get_option('cpcta-top-bar-bkg-color'); ?>;
		text-align: center;
		<?php if($position != 'left') {echo "border-top-left-radius: 5px;"; } ?>
		<?php if($position != 'right') {echo "border-top-right-radius: 5px;"; } ?>
		padding: 8px 0 8px 0;
		font-size: 16px;
		font-weight: bold;
		cursor: pointer;
	}
	.cpcta-flyin .cpcta-top-bar .up{
		color: #E88C38;
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
		right: 10px;
		font-size: 11px;
		border-radius: 50%;
/*		border: 1px solid #B05402;*/
		cursor: pointer;
	}
	.cpcta-flyin .cpcta-content-panel{
		display: none;
		color: <?php echo get_option('cpcta-body-content-font-color'); ?>;
		background: <?php echo get_option('cpcta-body-content-bkg-color'); ?>;
		padding: 10px 20px 30px 20px;
		box-sizing: border-box;
		/* text-align: center; */
/*		border-top: 1px solid #C26507;*/
	}
    .cpcta-flyin > .cpcta-content-panel {
        overflow: auto;
    }   
	.cpcta-flyin .cpcta-content-panel a{
		color: #000;
	}
	
	/* TABLET RESPONSIVENESS */
    @media screen and (max-width: 980px){
        <?php $flyinWidth = $flyinWidth + ($flyinWidth * .4); ?>
        .cpcta-flyin { width: <?php echo $flyinWidth; ?>%	}
    }
	
	/* MOBILE RESPONSIVENESS */
	@media screen and (max-width: 480px){
		.cpcta-flyin { width: 100%;	}
        .cpcta-close { display: none; }
	}
	
	/* USER-SET RESPONSIVE HIDDEN */
	<?php if(get_option('cpcta-mobile-hidden')) { $mobileWidth = get_option('cpcta-mobile-width'); ?>
	@media screen and (max-width: <?php echo $mobileWidth . "px"; ?>){
		.cpcta-flyin {
			display: none;
		}
	}
	<?php } ?>
</style>