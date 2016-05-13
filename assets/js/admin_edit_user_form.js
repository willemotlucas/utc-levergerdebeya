$('#help_nom').mouseover(function(){
	var element = document.getElementById("nom_message");
	element.innerHTML = "Le nom de l'utilisateur";
})
$('#help_nom').mouseout(function(){
	var element = document.getElementById("nom_message");
	element.innerHTML = "";
})

$('#help_prenom').mouseover(function(){
	var element = document.getElementById("prenom_message");
	element.innerHTML = "Le prénom de l'utilisateur";
})
$('#help_prenom').mouseout(function(){
	var element = document.getElementById("prenom_message");
	element.innerHTML = "";
})

$('#help_mail').mouseover(function(){
	var element = document.getElementById("mail_message");
	element.innerHTML = "L'adresse email de l'utilisateur qui lui permet de s\'authentifier au site.";
})
$('#help_mail').mouseout(function(){
	var element = document.getElementById("mail_message");
	element.innerHTML = "";
})


$('#help_birth').mouseover(function(){
	var element = document.getElementById("birth_message");
	element.innerHTML = "Date de naissance de l'utilisateur.";
})
$('#help_birth').mouseout(function(){
	var element = document.getElementById("birth_message");
	element.innerHTML = "";
})

$('#help_cell').mouseover(function(){
	var element = document.getElementById("cell_message");
	element.innerHTML = "Numéro de téléphone portable de l'utilisateur. Ce numéro servira à contacter l'utilisateur en cas de commande.";
})
$('#help_cell').mouseout(function(){
	var element = document.getElementById("cell_message");
	element.innerHTML = "";
})

$('#help_phone').mouseover(function(){
	var element = document.getElementById("phone_message");
	element.innerHTML = "Numéro de téléphone domicile de l'utilisateur. Ce numéro servira à contacter l'utilisateur en cas de commande..";
})
$('#help_phone').mouseout(function(){
	var element = document.getElementById("phone_message");
	element.innerHTML = "";
})

$('#help_adresse').mouseover(function(){
	var element = document.getElementById("adresse_message");
	element.innerHTML = "Adresse de l'utilisateur qui pourra éventuellement servir pour les livraisons.";
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
	element.innerHTML = "Code postal de l'utilisateur.";
})
$('#help_postal').mouseout(function(){
	var element = document.getElementById("postal_message");
	element.innerHTML = "";
})

$('#help_ville').mouseover(function(){
	var element = document.getElementById("ville_message");
	element.innerHTML = "Ville de l'utilisateur. Notez que le service de livraison à domicile prend en compte que certaines villes.";
})
$('#help_ville').mouseout(function(){
	var element = document.getElementById("ville_message");
	element.innerHTML = "";
})

$('#button-edit-admin').click(function(){
	validateForm();
})

var validateForm = function(){
		$('.ui.form.admin.edit.user').form({
		    on: 'blur',
		    fields: {
		      nom_edit_admin: {
		        identifier : 'nom_edit_admin',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer un nom.'
		          }
		        ]
		      },
		      prenom_edit_admin: {
		      	identifier: 'prenom_edit_admin',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Veuillez entrer un prénom.'
		      		}
		      	]
		      },
		      mail_edit_admin: {
		      	identifier: 'mail_edit_admin',
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
		      }
		    }		
		});
	}