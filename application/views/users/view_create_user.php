<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php'; ?>" class="section">Accueil</a>
		  <div class="divider"> / </div>
		  Création de compte
		</div>
	</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sexteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Création de compte utilisateur</h1>
			</div>
			<?php echo validation_errors(); ?>
			<form class="ui form create user" action="<?php echo base_url().'index.php/Utilisateur/signup/';?>" method="POST">
				<div class="ui error message"></div>
				<div class="ui two column grid">
					<div class="eight wide column">

						<div class="row field">
							<label>
				        		Nom *
				        		<i id="help_nom" class="help circle icon"></i><span class="help-message" id="nom_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="nom_create" name="nom_create" type="text" placeholder="Entrez votre nom" value="<?php echo set_value('nom_create'); ?>">
							  	<i class="user icon"></i>  
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Prenom *
				        		<i id="help_prenom" class="help circle icon"></i><span class="help-message" id="prenom_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="prenom_create" name="prenom_create" type="text" placeholder="Entrez votre prenom" value="<?php echo set_value('prenom_create'); ?>">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Adresse email*
				        		<i id="help_mail" class="help circle icon"></i><span class="help-message" id="mail_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="mail_create" name="mail_create" type="text" placeholder="Entrez votre adresse email" value="<?php echo set_value('mail_create'); ?>">
							  	<i class="at icon"></i> 
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Mot de passe *
				        		<i id="help_password" class="help circle icon"></i><span class="help-message" id="password_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="password_create" name="password_create" type="password" placeholder="Entrez votre mot de passe" value="">
							  	<i class="lock icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Confirmation mot de passe *
				        		<i id="help_conf" class="help circle icon"></i><span class="help-message" id="conf_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="password_confirm" name="password_confirm" type="password" placeholder="Confirmez votre mot de passe" value="">
							  	<i class="lock icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Date de naissance
				        		<i id="help_birth" class="help circle icon"></i><span class="help-message" id="birth_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="birth_create" name="birth_create" type="date" placeholder="Entrez votre date de naissance" value="<?php echo set_value('birth_create'); ?>">
							  	<i class="birthday icon"></i>
							</div>
							
						</div>

					</div>

					<div class="eight wide column">
						<div class="row field">
							<label>
				        		Telephone portable
				        		<i id="help_cell" class="help circle icon"></i><span class="help-message" id="cell_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="cell_create" name="cell_create" type="text" placeholder="Entrez votre telephone portable" value="<?php echo set_value('cell_create'); ?>">
							  	<i class="phone icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Telephone Domicile
				        		<i id="help_phone" class="help circle icon"></i><span class="help-message" id="phone_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="phone_create" name="phone_create" type="text" placeholder="Entrez votre telephone domicile" value="<?php echo set_value('phone_create'); ?>">
							  	<i class="text telephone icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Adresse
				        		<i id="help_adresse" class="help circle icon"></i><span class="help-message" id="adresse_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="adresse_create" name="adresse_create" type="text" placeholder="Entrez votre adresse" value="<?php echo set_value('adresse_create'); ?>">
							  	<i class="mail icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Complément d'adresse
				        		<i id="help_compl" class="help circle icon"></i><span class="help-message" id="compl_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="compl_adresse" name="compl_adresse" type="text" placeholder="Si besoin, un complément d'adresse" value="<?php echo set_value('compl_adresse'); ?>">
							  	<i class="mail icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Code Postale
				        		<i id="help_postal" class="help circle icon"></i><span class="help-message" id="postal_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="postal_create" name="postal_create" type="number" placeholder="Entrez votre code postale" value="<?php echo set_value('postal_create'); ?>">
							  	<i class="road icon"></i>
							</div>
							
						</div>

						<div class="row field">
							<label>
				        		Ville
				        		<i id="help_ville" class="help circle icon"></i><span class="help-message" id="ville_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="ville_create" name="ville_create" type="text" placeholder="Entrez votre ville" value="<?php echo set_value('ville_create'); ?>">
							  	<i class="university icon"></i>
							</div>
							
						</div>

						<div class="row">
							<button type="submit" id="button-create" class="ui custom-green submit button">Créer le compte</button>
						</div>
					</div>
				</div>
			</form>

		</div>
	</div>
</div>