(function($) {
   "use strict";
    $(document).ready(function(){
    	$('.webt-woo-select').on('change',function(){
			var v = $(this).val(),
				id = $(this).attr('id');
			if($.isArray(v) && v.length){
				$(this).parent().find('input#'+id).val(v.join(',')).attr('value',v.join(','));
				
			}else{
				$(this).parent().find('input#'+id).val('').attr('value','');
			}
			
		});
    	
    	jQuery("select.chosen_select_nostd").chosen({
			"disable_search_threshold":10,
			"allow_single_deselect":true,
			"placeholder_text_single":"Select an option"
		});
	});
    
})(window.jQuery);