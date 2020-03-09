function add_slide(obj) {
     var parent=jQuery(obj).parent('.tada-widget-image-upload');
     var inputField = jQuery(parent).find("input.custom_media_url");

     tb_show('', 'media-upload.php?TB_iframe=true');
	 
	 jQuery( function( $ ) {
		 window.send_to_editor = function(html) {
					var url = jQuery(html).attr('src');
					console.log(url);
					inputField.val(url);
					tb_remove();
		 };
	 });
	
     return false;  
}
