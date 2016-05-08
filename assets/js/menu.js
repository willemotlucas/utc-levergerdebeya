$('.ui.dropdown').dropdown();

$('#login').click(function(){
	$('.ui.modal').modal('show');
})

$('#disconnect').click(function(){
	var userIcon = document.getElementById('userIcon');
	userIcon.setAttribute("class", "ui active small inline loader");
})

/*$(document).ready(function() {
	/*$(document).on("click","#button-cancel",function(){
    	//Remove modal from DOM
    	$('body').removeClass('dimmable dimmed');
    	$('.ui.modals.active').remove();
	});
}*/