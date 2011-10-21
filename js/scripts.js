jQuery(document).ready(function($) {
	
	// Items list actions
	$( ".sortable" ).sortable({
		handle: 'a.sh_sb-move' 
	});
	
	// Tabs
	$('#sh_sb-icon-tabs').tabs();
	
	// Icons
	$('li.icon-preview').click(function(){
		
		var icon = $('img', this).attr('src');
		var field = $('input#sh_sb_icon_new');
		
		// Change the input value and animate a glow
		field.attr('value', icon).toggleClass('blue-glow').delay(600).queue(function() {
			$(this).toggleClass('blue-glow').dequeue();
		});
		
	});
		
	$('a.sh_sb-delete').click(function(){
		
		if( confirm( 'Are you sure you want to remove this item?' ) ){
			var tr = $(this).parent().parent('tr');
			var table = tr.parent().parent();
			
			tr.remove();
			
			if( $('tbody', table).children().length < 1 ){
				table.addClass('empty-table');
			}
		}

	});
	
	// Make sure the link field is filled out
	// In the create item form
	$('#sh_sb_new_item').click(function(){
		
		var link = $('#create-form #sh_sb_link').val();
		
		if( link == '' || link == 'http://' ){
			alert('The link field is required');
			$('#create-form #sh_sb_link').addClass('error-field');
			return false;
		}
		
	});
	
	// In the listings form
	$('#sh_sb_update').click(function(){
		
		var success = true;
		
		$('.sh_sb_link').each(function(){
			
			var link = $(this).val();
			
			if( link == '' || link == 'http://' ){
				alert('All link fields are required');
				$(this).addClass('error-field');
				
				success = false;
			}
			
		});
		
		return success;
		
	});
	
	// Media Uploader
	var formfield = null;
	
	$('#upload_image_button').click(function() { 
		$('html').addClass('Image');
		formfield = $('#sh_sb_icon_new').attr('name');
		
		//Change "insert into post" to "Use this Button"
		tbframe_interval = setInterval(function() {jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use This Image');}, 2000);
		
		tb_show('', 'media-upload.php?type=image&TB_iframe=true'); return false;
	});
	
	// user inserts file into post.
	// only run custom if user started process using the above process
	// window.send_to_editor(html) is how wp normally handle the received data
	
	window.original_send_to_editor = window.send_to_editor; window.send_to_editor = function(html){
		
		var fileurl;
		
		if (formfield != null) {
			fileurl = $('img',html).attr('src');
			$('#sh_sb_icon_new').val(fileurl); tb_remove();
			$('html').removeClass('Image');
			formfield = null; } else {
			window.original_send_to_editor(html); 
		}
	};

});
