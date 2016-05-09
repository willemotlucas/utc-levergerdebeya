var base_url = "http://localhost:8080/auvergerdepapa/";

$(document).ready(function() {
    $('.dataTable').DataTable();

    $(document).on("click","#button-cancel",function(){
    	//Remove modal from DOM
    	$('body').removeClass('dimmable dimmed');
    	$('.ui.modals.active').remove();
	});

    $(document).on("click",".close.icon",function(){
    	//Remove modal from DOM
    	$('body').removeClass('dimmable dimmed');
    	$('.ui.modals.active').remove();
	});
});

