// JavaScript Document
function callAjax(url,div)
{
	$(div).html('<p align="center"><img src="images/loading.gif" /></p>');
	$.ajax({
		type: "GET",
		url: url
		}).done(function( msg ) {
			//alert( "Data Saved: " + msg );
			$(div).html(msg);
		});
}