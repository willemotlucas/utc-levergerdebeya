$(document).ready(function() {
    $(document).on("click",".edit-category-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET("categorie/admin_edit", event.target.id);
	});

    $(document).on("click",".add-category-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET('categorie/admin_add', event.target.id);
	});

	var file;
	$(document).on("change","#picture_create",function(event){
    	//Send get request to retrieve editio form
    	file = event.target.files[0];
    	$('#image_preview').attr('src', window.URL.createObjectURL(file))
	});

	//Show a modal by adding html form and presenting as a modal
    var showEditionFormInModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
        validateForm("categorie/admin_edit");
    };

    var showAddFormInModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
        validateForm("categorie/admin_add");
    };

    var sendGET = function(url, param){
    	if(param == undefined)
    		param = "";
    	$.ajax({
            type: "GET",
            url: base_url + "index.php/" + url + "?id=" + param,
            success: function(data){
            	if(url == "categorie/admin_add")
            		showAddFormInModal(data);
            	else if(url == "categorie/admin_edit")
            		showEditionFormInModal(data);
            }
        });
    };

    var sendPOST = function(url, data){
		if(file !== undefined)
		{
	    	$.ajax({
	            type: "POST",
	            url: base_url + "index.php/" + url,
	            data: data,
	            processData: false, // Don't process the files
	        	contentType: false,
	        	cache: false
	        });
		}
		else
		{
			$.ajax({
	            type: "POST",
	            url: base_url + "index.php/" + url,
	            data: data
	        });
		}
    };

    var validateForm = function(url){
        $('.ui.form.category').form({
		    on: 'blur',
		    onSuccess: function(event, fields){
		    	//Retrieve data
		    	var data;
		    	if(url == 'categorie/admin_edit'){
		    		if(file != undefined){
		    			data = new FormData($('#edit_category')[0]);
		    			data.append('family_id', $('#family_id').val());
		    			data.append('category_id', $('#category_id').val());
		    		}
		    		else{
		    			data = {
				        	"category_name": $('#category_name').val(),
				        	"category_id": $('#category_id').val(),
				        	"family_id": $('#family_id').val()
				        };
		    		}
		    	}else if(url == 'categorie/admin_add'){
		    		if(file != undefined){
		    			data = new FormData($('#add_category')[0]);
		    			data.append('family_id', $('#family_id').val());
		    		}
		    		else{
		    			data = {
				        	"category_name": $('#category_name').val(),
				        	"family_id": $('#family_id').val()
				        };
		    		}
		    	}

		        //Send POST request to save modifications
		    	sendPOST(url, data);
		    },
		    fields: {
		      category_name: {
		        identifier : 'category_name',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer le nom de la catégorie.'
		          },
		          {
		          	type : 'maxLength[50]',
		          	prompt: 'Le nom de la catégorie ne doit pas excéder {ruleValue} caractères.'
		          }
		        ]
		      },
		      family_id: {
		      	identifier: 'family_id',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez choisir une famille.'
		      		}
		      	]
		      }
		    }		
		});
    }
});