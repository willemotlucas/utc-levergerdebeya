<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Utilisateur/admin_gestion'?>" class="section">Gestion des utilisateurs</a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Utilisateur/admin_showUser/'.$userShown->id;?>" class="section"><?php echo ucfirst($userShown->prenom).' '.ucfirst($userShown->nom);?></a>
		</div>
	</div>
</div>

<div class="content-container">
	<div  class="ui info message">Vous pouvez utiliser cette page afin de modifier les données de l'utilisateur, ou simplement les consulter.</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sexteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Les informations de l'utilisateur <?php echo ucfirst($userShown->prenom).' '.ucfirst($userShown->nom);?></h1>
			</div>
				<div class="row">
					<?php echo validation_errors(); ?>
					<form id="admin_edit_user" class="ui form admin edit user" action="<?php echo base_url().'index.php/Utilisateur/admin_showUser/'.$userShown->id;?>" method="POST">
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
								  	<input id="nom_edit_admin"  name="nom_edit_admin" type="text" placeholder="Nom de l'utilisateur" value="<?php echo ucfirst($userShown->nom); ?>">
								  	<i class="user icon"></i>  
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Prenom *
					        		<i id="help_prenom" class="help circle icon"></i><span class="help-message" id="prenom_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="prenom_edit_admin"  name="prenom_edit_admin" type="text" placeholder="Prenom de l'utilisateur" value="<?php echo ucfirst($userShown->prenom); ?>">
								  	<i class="user icon"></i>  
								</div>
							</div>

							<div class="row field">
								<label>
					        		Adresse email *
					        		<i id="help_mail" class="help circle icon"></i><span class="help-message" id="mail_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="mail_edit_admin"  name="mail_edit_admin" type="text" placeholder="Email de l'utilisateur" value="<?php echo $userShown->email; ?>">
								  	<i class="at icon"></i> 
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Date de naissance
					        		<i id="help_birth" class="help circle icon"></i><span class="help-message" id="birth_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="birth_edit_admin"  name="birth_edit_admin" type="date" placeholder="Date de naissance de l'utilisateur" value="<?php echo substr($userShown->date_naissance,0,10); ?>">
								  	<i class="birthday icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Telephone portable
					        		<i id="help_cell" class="help circle icon"></i><span class="help-message" id="cell_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="cell_edit_admin"  name="cell_edit_admin" type="text" placeholder="Telephone portable de l'utilisateur" value="<?php echo $userShown->tel_portable; ?>">
								  	<i class="phone icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Telephone Domicile
					        		<i id="help_phone" class="help circle icon"></i><span class="help-message" id="phone_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="phone_edit_admin"  name="phone_edit_admin" type="text" placeholder="Telephone domicile de l'utilisateur" value="<?php echo $userShown->tel_domicile; ?>">
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
								  	<input id="adresse_edit_admin"  name="adresse_edit_admin" type="text" placeholder="Adresse de l'utilisateur" value="<?php echo $userShown->adresse; ?>">
								  	<i class="mail icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Complément d'adresse
					        		<i id="help_compl" class="help circle icon"></i><span class="help-message" id="compl_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="compl_adresse"  name="compl_adresse" type="text" placeholder="Si besoin, un complément d'adresse" value="<?php echo $userShown->compl_adresse; ?>">
								  	<i class="mail icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Code Postale
					        		<i id="help_postal" class="help circle icon"></i><span class="help-message" id="postal_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="postal_edit_admin"  name="postal_edit_admin" type="number" placeholder="Code postale de l'utilisateur" value="<?php echo $userShown->code_postal; ?>">
								  	<i class="road icon"></i>
								</div>
								
							</div>

							<div class="row field">
								<label>
					        		Ville
					        		<i id="help_ville" class="help circle icon"></i><span class="help-message" id="ville_message"></span>
					        	</label>
						        <div class="ui left icon input">
								  	<input id="ville_edit_admin"  name="ville_edit_admin" type="text" placeholder="Ville de l'utilisateur" value="<?php echo $userShown->ville; ?>">
								  	<i class="university icon"></i>
								</div>	
							</div>
							<div id="submit_div" class="row">
								<button type="submit" id="button-edit-admin" class="ui custom-green submit button">Modifier les données</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			

		</div>
	</div>
</div>