$(document).ready(function() {
    $('.dataTable').DataTable();

    var base_url = "http://localhost:8080/auvergerdepapa/";

    $(document).on("click",".edit-button",function(event){
    	console.log("edit button clicked");
    	sendGET(event.target.id);
	});

    var showModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
    };

    var sendGET = function(param){
    	$.ajax({
            type: "GET",
            url: base_url + "index.php/categorie/admin_edit?id=" + param,
            success: function(data){successCallback(data);}
        });
    };

    var sendPOST = function(url, data){
		$.ajax({
            type: "POST",
            url: base_url + "index.php/" + url,
            data: data,
            success: function(){
            	location.reload();
            }
        });
    };

    var successCallback = function(data){
    	showModal(data);

    	$(document).on("click","#button-cancel",function(){
	    	$('.ui.modals.active').remove();
		});

		$(document).on("click","#button-save",function(){
	    	var data = {
            	"category_name": $('#category_name').val(),
            	"category_id": $('#category_id').val()
            };

	    	sendPOST('categorie/admin_edit', data);

	    	$('.ui.modals.active').remove();
		});
    };
} );