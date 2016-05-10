$('#help_nom').mouseover(function(){
	var element = document.getElementById("nom_message");
	element.innerHTML = "Entrez ici votre nom usuel";
})
$('#help_nom').mouseout(function(){
	var element = document.getElementById("nom_message");
	element.innerHTML = "";
})

$('#help_prenom').mouseover(function(){
	var element = document.getElementById("prenom_message");
	element.innerHTML = "Entrez ici votre prenom usuel";
})
$('#help_prenom').mouseout(function(){
	var element = document.getElementById("prenom_message");
	element.innerHTML = "";
})

$('#help_mail').mouseover(function(){
	var element = document.getElementById("mail_message");
	element.innerHTML = "Entrez une adresse email valide qui vous permettra de vous authentifier au site. Aucune publicité ne sera envoyée.";
})
$('#help_mail').mouseout(function(){
	var element = document.getElementById("mail_message");
	element.innerHTML = "";
})

$('#help_password').mouseover(function(){
	var element = document.getElementById("password_message");
	element.innerHTML = "Le mot de passe doit avoir au moins huit caractères alphanumériques. Nous vous conseillons de mettre des majuscules, des minuscules, des signes et des chiffres.";
})
$('#help_password').mouseout(function(){
	var element = document.getElementById("password_message");
	element.innerHTML = "";
})

$('#help_conf').mouseover(function(){
	var element = document.getElementById("conf_message");
	element.innerHTML = "Confirmez le mot de passe entré précédemment. Les deux mots de passes doivent être identiques.";
})
$('#help_conf').mouseout(function(){
	var element = document.getElementById("conf_message");
	element.innerHTML = "";
})

$('#help_birth').mouseover(function(){
	var element = document.getElementById("birth_message");
	element.innerHTML = "Votre date de naissance.";
})
$('#help_birth').mouseout(function(){
	var element = document.getElementById("birth_message");
	element.innerHTML = "";
})

$('#help_cell').mouseover(function(){
	var element = document.getElementById("cell_message");
	element.innerHTML = "Votre numéro de téléphone portable. Ce numéro nous servira à vous contacter en cas de commande de votre part.";
})
$('#help_cell').mouseout(function(){
	var element = document.getElementById("cell_message");
	element.innerHTML = "";
})

$('#help_phone').mouseover(function(){
	var element = document.getElementById("phone_message");
	element.innerHTML = "Votre numéro de téléphone domicile. Ce numéro nous servira à vous contacter en cas de commande de votre part.";
})
$('#help_phone').mouseout(function(){
	var element = document.getElementById("phone_message");
	element.innerHTML = "";
})

$('#help_adresse').mouseover(function(){
	var element = document.getElementById("adresse_message");
	element.innerHTML = "Votre adresse actuelle. Si vous souhaitez passer des commandes et des livraisons, veillez à mettre une adresse valide.";
})
$('#help_adresse').mouseout(function(){
	var element = document.getElementById("adresse_message");
	element.innerHTML = "";
})

$('#help_compl').mouseover(function(){
	var element = document.getElementById("compl_message");
	element.innerHTML = "Un complément d'adresse, tel qu'un bâtiment, un étage, un appartement, etc.";
})
$('#help_compl').mouseout(function(){
	var element = document.getElementById("compl_message");
	element.innerHTML = "";
})

$('#help_postal').mouseover(function(){
	var element = document.getElementById("postal_message");
	element.innerHTML = "Votre code postal.";
})
$('#help_postal').mouseout(function(){
	var element = document.getElementById("postal_message");
	element.innerHTML = "";
})

$('#help_ville').mouseover(function(){
	var element = document.getElementById("ville_message");
	element.innerHTML = "Votre ville. Notez que le service de livraison à domicile prend en compte que certaines villes. Veuillez vous référer aux conditions de ventes pour avoir tous les détails.";
})
$('#help_ville').mouseout(function(){
	var element = document.getElementById("ville_message");
	element.innerHTML = "";
})

$('#button-create').click(function(){
	validateForm();
})

var validateForm = function(){
        $('.ui.form.create.user').form({
		    on: 'blur',
		    fields: {
		      nom_create: {
		        identifier : 'nom_create',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer un nom.'
		          }
		        ]
		      },
		      prenom_create: {
		      	identifier: 'prenom_create',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez entrer un prénom.'
		      		}
		      	]
		      },
		      mail_create: {
		      	identifier: 'mail_create',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez entrer une adresse email.'
		      		},
		      		{
		      			type: 'email',
		      			prompt: "Veuillez entrer une adresse email valide."
		      		}
		      	]
		      },
		      password_create: {
		      	identifier: 'password_create',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez entrer un mot de passe.'
		      		},
		      		{
		      			type: 'minLength[8]',
		      			prompt: "Le mot de passe doit être composé d'au minimum 8 caractères alphanumériques"
		      		}
		      	]
		      },
		      password_confirm: {
		      	identifier: 'password_confirm',
		      	rules: [
		      		{
		      			type: 'match[password_create]',
		      			prompt: 'Les mots de passe ne sont pas identiques.'
		      		}
		      	]
		      }
		    }		
		});
	}