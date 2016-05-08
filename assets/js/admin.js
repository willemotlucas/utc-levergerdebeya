$(document).ready(function() {
    $('.dataTable').DataTable();

    var base_url = "http://localhost:8080/auvergerdepapa/";

    $(document).on("click",".edit-category-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET("categorie/admin_edit", event.target.id);
	});

    $(document).on("click",".add-category-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET('categorie/admin_add', event.target.id);
	});

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

	$('.message .close').on('click', function() {
	    $(this).closest('.message').transition('fade');
	  });

	$(".form").submit(function(event) {
    	event.preventDefault();
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
		$.ajax({
            type: "POST",
            url: base_url + "index.php/" + url,
            data: data
        });
    };

    var validateForm = function(url){
        $('.ui.form.category').form({
		    on: 'blur',
		    onSuccess: function(event, fields){
		    	//Retrieve data
		    	var data;
		    	if(url == 'categorie/admin_edit'){
		    		var data = {
			        	"category_name": $('#category_name').val(),
			        	"category_id": $('#category_id').val(),
			        	"family_id": $('#family_id').val()
			        };
		    	}else if(url == 'categorie/admin_add'){
		    		var data = {
			        	"category_name": $('#category_name').val(),
			        	"family_id": $('#family_id').val()
			        };
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