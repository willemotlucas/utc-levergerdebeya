$(document).ready(function() {
    $(document).on("click",".delete-category-button",function(event){
    	console.log('get request');
    	//Send get request to retrieve editio form
    	sendGET('categorie/admin_delete', event.target.id);
	});

	$(document).on("click","#button-delete",function(){
		var data = {
			"category_id": $('#category_id').val()
		}
    	//Send post request to retrieve editio form
    	sendPOST('/categorie/admin_delete', data);
	});

    var showDeleteFormInModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
    };

    var sendGET = function(url, param){
    	if(param == undefined)
    		param = "";
    	$.ajax({
            type: "GET",
            url: base_url + "index.php/" + url + "?id=" + param,
            success: function(data){
            	console.log('success');
            	console.log(data);
            	if(url == "categorie/admin_delete")
            		showDeleteFormInModal(data);
            },
            error: function(data){
            	console.log(data);
            }
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
});