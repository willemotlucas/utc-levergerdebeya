<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php'; ?>" class="section">Accueil</a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Utilisateur/showAccount'?>" class="section">Votre espace utilisateur</a>
		</div>
	</div>
</div>

<div class="content-container">
	<div  class="ui info message">Vous pouvez utiliser cette page afin de modifier vos données, ou simplement les consulter.</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sexteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Vos informations</h1>
			</div>
				<div class="row">
					<?php echo validation_errors(); ?>
					<form id="edit_user" class="ui form edit user" action="<?php echo base_url().'index.php/Utilisateur/showaccount/';?>" method="POST">
					<div class="ui error message"></div>
					
					<div class="ui two divided column grid">
						<div class="eight wide column">

							<div class="row">
								<h3 class="ui header">Informations personnelles</h1>
							</div>

							<div class="row field">
								<label>
					        		Nom *
					        		<i id="help_nom" class="help circle icon"></i><span class="help-message" id="nom_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="nom_edit"  name="nom_edit" type="text" placeholder="Entrez votre nom" value="<?php echo $nom; ?>">
								  	<i class="user icon"></i>  
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Prenom *
					        		<i id="help_prenom" class="help circle icon"></i><span class="help-message" id="prenom_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="prenom_edit"  name="prenom_edit" type="text" placeholder="Entrez votre prenom" value="<?php echo $prenom; ?>">
								  	<i class="user icon"></i>  
								</div>
							</div>

							<div class="row field">
								<label>
					        		Adresse email *
					        		<i id="help_mail" class="help circle icon"></i><span class="help-message" id="mail_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="mail_edit"  name="mail_edit" type="text" placeholder="Entrez votre adresse email" value="<?php echo $email; ?>">
								  	<i class="at icon"></i> 
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Date de naissance
					        		<i id="help_birth" class="help circle icon"></i><span class="help-message" id="birth_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="birth_edit"  name="birth_edit" type="date" placeholder="Entrez votre date de naissance" value="<?php echo ''; ?>">
								  	<i class="birthday icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Telephone portable
					        		<i id="help_cell" class="help circle icon"></i><span class="help-message" id="cell_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="cell_edit"  name="cell_edit" type="text" placeholder="Entrez votre telephone portable" value="<?php echo $tel_portable; ?>">
								  	<i class="phone icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Telephone Domicile
					        		<i id="help_phone" class="help circle icon"></i><span class="help-message" id="phone_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="phone_edit"  name="phone_edit" type="text" placeholder="Entrez votre telephone domicile" value="<?php echo $tel_domicile; ?>">
								  	<i class="text telephone icon"></i>
								</div>
								
							</div>

						</div>

						<div class="eight wide column">
							
							<div class="row">
								<h3 class="ui header">Adresse</h1>
							</div>

							<div class="row field">
								<label>
					        		Adresse
					        		<i id="help_adresse" class="help circle icon"></i><span class="help-message" id="adresse_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="adresse_edit"  name="adresse_edit" type="text" placeholder="Entrez votre adresse" value="<?php echo $adresse; ?>">
								  	<i class="mail icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Complément d'adresse
					        		<i id="help_compl" class="help circle icon"></i><span class="help-message" id="compl_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="compl_adresse"  name="compl_adresse" type="text" placeholder="Si besoin, un complément d'adresse" value="<?php echo $compl_adresse; ?>">
								  	<i class="mail icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Code Postale
					        		<i id="help_postal" class="help circle icon"></i><span class="help-message" id="postal_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="postal_edit"  name="postal_edit" type="number" placeholder="Entrez votre code postale" value="<?php echo $code_postal; ?>">
								  	<i class="road icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Ville
					        		<i id="help_ville" class="help circle icon"></i><span class="help-message" id="ville_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="ville_edit"  name="ville_edit" type="text" placeholder="Entrez votre ville" value="<?php echo $ville; ?>">
								  	<i class="university icon"></i>
								</div>	
							</div>
							<div id="submit_div" class="row">
								<button type="submit" id="button-edit" class="ui custom-green submit button">Modifier les données</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			

		</div>
	</div>
</div>