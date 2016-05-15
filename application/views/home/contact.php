<div class="content-container">
	<div class="ui grid">
		<h1 class="ui header">Contactez-nous</h1>
	</div>

	<div class="ui grid centered contact-header">
		<h3 class="ui header">Une question ? Une remarque ?</h3>
		<h5 class="ui header">N'hésitez pas à nous contacter via le formulaire ci-dessous. <br/> Nous vous répondrons dans les plus brefs délais.</h5>
	</div>

	<div class="ui grid centered">
		<form class="ui form contact-form" method="POST" action="<?php echo base_url() . 'index.php/home/contact'?>">
		  <div class="field">
		    <label>Votre nom :</label>
		    <input type="text" name="full_name" id="full_name" placeholder="Entrez votre nom">
		  </div>
		  <div class="field">
		    <label>Votre e-mail :</label>
		    <input type="email" name="email" id="email" placeholder="Entrez votre e-mail">
		  </div>
		  <div class="field">
		    <label>Objet du message :</label>
		    <input type="text" name="objet" id="objet" placeholder="Entrez l'objet du message">
		  </div>
		  <div class="field">
		    <label>Contenu du message :</label>
		    <textarea name="message" id="message"></textarea>
		  </div>
		  <div class="ui error message"></div>
		  <button class="ui button custom-green" type="submit">Envoyer</button>
		</form>
	</div>
</div>