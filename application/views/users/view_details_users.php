<div class="ui grid">
	<div class="ui breadcrumb">
	  <a href="<?php echo base_url() . 'index.php'; ?>" class="section">Accueil</a>
	  <div class="divider"> / </div>
	  <a href="<?php echo base_url() . 'index.php/Utilisateur/showAccount'?>" class="section">Votre espace utilisateur</a>
	</div>
</div>

<div class="ui one column grid">
	<div class="ten wide column">
		<div class="row">
			<h1 class="ui dividing header">Vos informations</h1>
		</div>
		<br/>

		<div class="row">
			<div class="ui one column grid" style ="margin-left:0; margin-right:0;">
				<div class="row">
					<h3 class="ui header">Informations personnelles</h1>
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Nom
				  </div>
				  <input type="text" placeholder="" value="<?php echo $nom; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Prénom
				  </div>
				  <input type="text" placeholder="" value="<?php echo $prenom; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Email
				  </div>
				  <input type="text" placeholder="" value="<?php echo $email; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Tel. Portable
				  </div>
				  <input type="text" placeholder="" value="<?php echo $tel_portable; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Tel. Domicile
				  </div>
				  <input type="text" placeholder="" value="<?php echo $tel_domicile; ?>">
				</div>
			</div>
		</div>
		<br/>

		<div class="row">
			<div class="ui one column grid" style ="margin-left:0; margin-right:0;">
				<div class="row">
					<h3 class="ui header">Adresse</h1>
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Adresse
				  </div>
				  <input type="text" placeholder="" value="<?php echo $adresse; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Complément d'adresse
				  </div>
				  <input type="text" placeholder="" value="<?php echo $compl_adresse; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Code Postal
				  </div>
				  <input type="text" placeholder="" value="<?php echo $code_postal; ?>">
				</div>
				<div class="ui labeled input row">
				  <div class="ui label">
				    Ville
				  </div>
				  <input type="text" placeholder="" value="<?php echo $ville; ?>">
				</div>
			</div>
		</div>
	</div>
</div>