$(document).ready(function() {
    $('.ui.form.contact-form').form({
	    on: 'blur',
	    onSuccess: function(event, fields){
	    	//Retrieve data
	    	console.log(fields);
	    },
	    fields: {
	      full_name: {
	        identifier : 'full_name',
	        rules: [
	          {
	            type : 'empty',
	            prompt : 'Veuillez entrer votre nom'
	          },
	          {
	          	type : 'maxLength[50]',
	          	prompt: 'Votre nom ne doit pas excéder {ruleValue} caractères'
	          }
	        ]
	      },
	      email: {
	      	identifier: 'email',
	      	rules: [
	      		{
	      			type: 'email',
	      			prompt: 'Veuillez entrer une adresse e-mail valide'
	      		},
	      		{
		          	type : 'maxLength[70]',
		          	prompt: 'Votre e-mail ne doit pas excéder {ruleValue} caractères'
	          }
	      	]
	      },
	      objet: {
	      	identifier: 'objet',
	      	rules: [
	      		{
	      			type: 'empty',
	      			prompt: "Veuillez renseigner l'objet du message"
	      		},
	      		{
		          	type : 'maxLength[50]',
		          	prompt: "L'objet du message ne doit pas excéder {ruleValue} caractères"
	          	}
	      	]
	      },
	      message: {
	      	identifier: 'message',
	      	rules: [
	      		{
	      			type: 'empty',
	      			prompt: 'Veuillez renseigner votre message'
	      		}
	      	]
	      }
	    }		
	});
});