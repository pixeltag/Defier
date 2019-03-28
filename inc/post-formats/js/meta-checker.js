jQuery(document).ready(function($){
		
	$('#post-formats-select input').change(checkFormat);
	
	function checkFormat(){
		var format = $('#post-formats-select input:checked').attr('value');
		
		if(typeof format != 'undefined'){
						
			$('#post-body div[id^=defier_metabox_]').hide();
			$('#post-body #defier_metabox_'+format+'').stop(true,true).show();
					
		}

		if( format == '0'){
			$("#post-body #defier_metabox_twitter").stop(true,true).show()
			$("#post-body #defier_metabox_facebook").stop(true,true).show()
		}	

		$("#post-body #defier_metabox_featured").show();
	}
	
	$(window).load(function(){
		checkFormat();
	})
    
});


