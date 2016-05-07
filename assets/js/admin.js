$(document).ready(function() {
    $('.dataTable').DataTable();

    var base_url = "http://localhost:8080/auvergerdepapa/";

    $(document).on("click",".edit-button",function(event){
    	//Send get request to retrieve editio form
    	sendGET(event.target.id);
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

	//Show a modal by adding html form and presenting as a modal
    var showModal = function(data){
        document.body.innerHTML += data;
        $('.ui.modal').modal('show');
        validateForm();
    };

    var sendGET = function(param){
    	$.ajax({
            type: "GET",
            url: base_url + "index.php/categorie/admin_edit?id=" + param,
            success: function(data){showModal(data);}
        });
    };

    var sendPOST = function(url, data){
		$.ajax({
            type: "POST",
            url: base_url + "index.php/" + url,
            data: data,
            error: function(msg){
            	console.log(msg);
            }
        });
    };

    var validateForm = function(){
        $('.ui.form.category').form({
		    on: 'blur',
		    onSuccess: function(event, fields){
		    	//Retrieve data
		    	var data = {
		        	"category_name": $('#category_name').val(),
		        	"category_id": $('#category_id').val()
		        };

		        //Send POST request to save modifications
		    	sendPOST('categorie/admin_edit', data);
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
		      }
		    }		
		});
    }
});