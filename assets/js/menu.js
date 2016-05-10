var base_url = "http://localhost:8080/auvergerdepapa/";

$('.ui.dropdown').dropdown();

$('#login').click(function(){
	$('.ui.modal').modal('show');
})

$('#disconnect').click(function(){
	var userIcon = document.getElementById('userIcon');
	userIcon.setAttribute("class", "ui active small inline loader");
})

$('#button-signup').click(function(){
	validateForm("Utilisateur/signup/");
})

$('#button-connect').click(function(){
	validateForm("Utilisateur/login/");
})

var validateForm = function(url){
	if(url == 'Utilisateur/signup/'){
        $('.ui.form.signup').form({
		    on: 'blur',
		    fields: {
		      email_signup: {
		        identifier : 'email_signup',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer une adresse email.'
		          },
		          {
		          	type : 'email',
		          	prompt: 'Vous devez entrer une adresse email valide.'
		          }
		        ]
		      },
		      password_signup: {
		      	identifier: 'password_signup',
		      	rules: [
		      		{
		      			type: 'minLength[8]',
		      			prompt: 'Le mot de passe doit être alphanumérique d\'une taille supérieure à 8 caractères.'
		      		},
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez entrer un mot de passe.'
		      		}
		      	]
		      },
		      password_confirm: {
		      	identifier: 'password_confirm',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez confirmer le mot de passe.'
		      		},
		      		{
		      			type: 'match[password_signup]',
		      			prompt: "Les mots de passe ne sont pas identiques."
		      		}
		      	]
		      }
		    }		
		});
	}
	else if(url == 'Utilisateur/login/'){
		$('.ui.form.login').form({
		    on: 'blur',
		    fields: {
		      email_login: {
		        identifier : 'email_login',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer une adresse email.'
		          },
		          {
		          	type : 'email',
		          	prompt: 'Vous devez entrer une adresse email valide.'
		          }
		        ]
		      },
		      password_login: {
		      	identifier: 'password_login',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez entrer un mot de passe.'
		      		}
		      	]
		      }
		    }		
		});
	}
}

