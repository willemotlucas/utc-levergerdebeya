$('#help_denomination').mouseover(function(){
	var element = document.getElementById("denomination_message");
	element.innerHTML = "Le nom du produit qui s'affichera pour au public.";
})
$('#help_denomination').mouseout(function(){
	var element = document.getElementById("denomination_message");
	element.innerHTML = "";
})

$('#help_origine').mouseover(function(){
	var element = document.getElementById("origine_message");
	element.innerHTML = "Pays d'origine du produit";
})
$('#help_origine').mouseout(function(){
	var element = document.getElementById("origine_message");
	element.innerHTML = "";
})

$('#help_prix').mouseover(function(){
	var element = document.getElementById("prix_message");
	element.innerHTML = "Prix du produit.";
})
$('#help_prix').mouseout(function(){
	var element = document.getElementById("prix_message");
	element.innerHTML = "";
})

$('#help_type').mouseover(function(){
	var element = document.getElementById("type_message");
	element.innerHTML = "Le type de vente. Un produit peut être vendu au kilo, ou à la pièce.";
})
$('#help_type').mouseout(function(){
	var element = document.getElementById("type_message");
	element.innerHTML = "";
})

$('#help_description').mouseover(function(){
	var element = document.getElementById("description_message");
	element.innerHTML = "Description du produit. Vous pouvez noter une description exhaustive. Par exemple, vous pouvez donner les meilleures utilisations du produit.";
})
$('#help_description').mouseout(function(){
	var element = document.getElementById("description_message");
	element.innerHTML = "";
})

$('#help_moment').mouseover(function(){
	var element = document.getElementById("moment_message");
	element.innerHTML = "Cochez la case si c'est la saison du produit. Si ce n'est pas le cas, alors le produit ne sera pas affiché au public.";
})
$('#help_moment').mouseout(function(){
	var element = document.getElementById("moment_message");
	element.innerHTML = "";
})

$('#help_phare').mouseover(function(){
	var element = document.getElementById("phare_message");
	element.innerHTML = "Cochez la case si le produit est un produit phare. Si c'est le cas, alors le produit sera affiché en page d'accueil.";
})
$('#help_phare').mouseout(function(){
	var element = document.getElementById("phare_message");
	element.innerHTML = "";
})

$('#help_categorie').mouseover(function(){
	var element = document.getElementById("categorie_message");
	element.innerHTML = "La catégorie du produit. Si la catégorie que vous recherchez n'y est pas, alors il faut en ajouter une sur la page d'accueil de cette plateforme d'administration.";
})
$('#help_categorie').mouseout(function(){
	var element = document.getElementById("categorie_message");
	element.innerHTML = "";
})

$('#button-edit').click(function(){
	validateForm();
})

$('.ui.checkbox')
  .checkbox()
;

var validateForm = function(){
        $('.ui.admin.form.edit.product').form({
		    on: 'blur',
		    fields: {
		      denomination_edit: {
		        identifier : 'denomination_edit',
		        rules: [
		          {
		            type : 'empty',
		            prompt : 'Veuillez entrer un nom pour le produit.'
		          },
		          {
		            type : 'minLength[2]',
		            prompt : 'Mettez au minimum deux caractères pour le nom du produit.'
		          }
		        ]
		      },
		      categorie_edit: {
		      	identifier: 'categorie_edit',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'La catégorie est requise. Si vous ne trouvez pas la catégorie, vous devez en ajouter une via l\'accueil du menu d\'administration.'
		      		}
		      	]
		      },
		      prix_edit: {
		      	identifier: 'prix_edit',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Le prix est obligatoire.'
		      		}
		      	]
		      },
		      type_edit: {
		      	identifier: 'type_edit',
		      	rules: [
		      		{
		      			type: 'empty',
		      			prompt: 'Le type de vente (kg/pièce) est obligatoire.'
		      		}
		      	]
		      }
		    }		
		});
	}