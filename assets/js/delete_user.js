$(document).ready(function() {
    $(document).on("click",".delete-user-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET('Utilisateur/admin_delete', event.target.id);
	});

	$(document).on("click",".button-delete",function(){
		var data = {
			"user_id": event.target.id
		}
    	//Send post request to retrieve editio form
    	sendPOST('Utilisateur/admin_delete', data);
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
            	if(url == "Utilisateur/admin_delete")
            		showDeleteFormInModal(data);
            },
            error: function(data){
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