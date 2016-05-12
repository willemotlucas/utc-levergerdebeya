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
				<div class="ui one column grid">
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

						<div class="row">
							<button type="submit" id="button-create" class="ui custom-green submit button">Créer le compte</button>
						</div>

					</div>

				</div>
			</form>

		</div>
	</div>
</div>