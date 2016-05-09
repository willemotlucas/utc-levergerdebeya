$(document).ready(function() {
    $(document).on("click",".delete-family-button",function(event){
    	//Send get request to retrieve editio form
        console.log('click delete');
    	sendGET('famille/admin_delete', event.target.id);
	});

	$(document).on("click","#button-delete",function(){
		var data = {
			"family_id": $('#family_id').val()
		}
    	//Send post request to retrieve editio form
    	sendPOST('/famille/admin_delete', data);
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
            	if(url == "famille/admin_delete")
            		showDeleteFormInModal(data);
            },
            error: function(data){
            	console.log(data.responseText);
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