/**
 * Tada Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 */
 
 jQuery(document).ready(function($){
		"use strict";	
 		
		$('#tada-layout-type').on("click", function(){
 			var layout_type = $( "#tada-layout-type" ).val();
			if(layout_type != 'tada-page') {
				$('#blog-query').css('display','block');	
			} else {
				$('#blog-query').css('display','none');						
			}
			
			if(layout_type == 'tada-blog-3-columns') {
				$('#tada-sidebar').css('display','none');
			} else {
				$('#tada-sidebar').css('display','block');
			}
			
		});
		
		$('#tada-slider').on("click", function(){
			var tada_slider = $( "#tada-slider" ).val();
			if(tada_slider == 'on') {
				$('#tada-slider-shortcode').css('display','block');
			} else {
				$('#tada-slider-shortcode').css('display','none');
			}		
		});			

		$('#tada-seo').on("click", function(){
			var tada_slider = $( "#tada-seo" ).val();
			if(tada_slider == 'on') {
				$('#tada-seo-description').css('display','block');
				$('#tada-seo-keywords').css('display','block');
			} else {
				$('#tada-seo-description').css('display','none');
				$('#tada-seo-keywords').css('display','none');
			}		
		});	
 
 });		