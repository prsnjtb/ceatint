jQuery(document).ready(function(){

		jQuery("#s1").click(function(){
		var frm = jQuery('#f1');	
		jQuery.ajax({
		type: "POST",
		url: frm.attr('action'),
		data: frm.serialize(),
		cache: false,
		success: function(result){
			alert(result);
			var x = jQuery.parseJSON(result);
			alert(x.b);
			alert(x.a);
			}
		});

	});

});  // end of document.ready
