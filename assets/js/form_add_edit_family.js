$(document).ready(function() {
    $(document).on("click",".edit-family-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET("famille/admin_edit", event.target.id);
	});

    $(document).on("click",".add-family-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET('famille/admin_add');
	});

	//Show a modal by adding html form and presenting as a modal
    var showEditionFormInModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
        validateForm("famille/admin_edit");
    };

    var showAddFormInModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
        validateForm("famille/admin_add");
    };

    var sendGET = function(url, param){
    	var dest = base_url + "index.php/" + url;

    	if(param != undefined)
    		 dest += "?id=" + param;
    	$.ajax({
            type: "GET",
            url: dest,
            success: function(data){
            	if(url == "famille/admin_add")
            		showAddFormInModal(data);
            	else if(url == "famille/admin_edit")
            		showEditionFormInModal(data);
            }
        });
    };

    var sendPOST = function(url, data){
		$.ajax({
            type: "POST",
            url: base_url + "index.php/" + url,
            data: data
        });
    };

    var validateForm = function(url){
        $('.ui.form.family').form({
		    on: 'blur',
		    onSuccess: function(event, fields){
		    	//Retrieve data
		    	var data;
		    	if(url == 'famille/admin_edit'){
		    		var data = {
			        	"category_name": $('#category_name').val(),
			        	"category_id": $('#category_id').val(),
			        	"family_id": $('#family_id').val()
			        };
		    	}else if(url == 'famille/admin_add'){
		    		var data = {
			        	"family_name": $('#family_name').val()
			        };
		    	}

		        //Send POST request to save modifications
		    	sendPOST(url, data);
		    },
		    fields: {
		      category_name: {
		        identifier : 'family_name',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer le nom de la famille.'
		          },
		          {
		          	type : 'maxLength[50]',
		          	prompt: 'Le nom de la famille ne doit pas excéder {ruleValue} caractères.'
		          }
		        ]
		      }
		    }		
		});
    }
});