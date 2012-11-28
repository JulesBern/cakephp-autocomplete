$(document).ready(function(){
	$( "#search" ).autocomplete({
		source: Shop.basePath + "users/searchjson",
		minLength:2,
		select: function(event, ui) {
			$("#cid").val(ui.item.id);
			//alert($("#cid").val());
		}
	});
	
	$( "#country" ).autocomplete({
		source: Shop.basePath + "countries/getcountry",
		minLength:2,
		select: function(event, ui) {
			$("#cid").val(ui.item.id);
			//alert($("#cid").val());
		}
	});
	
	$( "#city" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url: Shop.basePath + "countries/getcity",
				dataType: "json",
				data: {
					country_id:$("#cid").val(),
					term:$('#city').val()
				},
				success: function( data ) {
					response( $.map( data, function( item ) {
						return {
							label: item.label,
							value: item.value
						}
					}));
				}
			});
		},
		minLength:2,
		select: function(event, ui) {
			/*$("#cid").val(ui.item.id);
			alert($("#cid").val());*/
		}
	});
});
