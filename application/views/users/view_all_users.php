<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Utilisateur/admin_gestion'?>" class="section">Gestion des utilisateurs</a>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sixteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Gestion des utilisateurs</h1>
			</div>
			<div class="row">
				<table id="example" class="ui sortable celled table dataTable" cellspacing="0" width="100%">
				    <thead>
				        <tr>
				        	<th>id</th>
				            <th>Nom</th>
				            <th>Prénom</th>
				            <th>Email</th>
				            <th>Voir</th>
				            <th>Supprimer</th>
				        </tr>
				    </thead>
				    <tbody>
				    	<?php foreach($users as $user):?>
					        <tr>
					            <td><?php echo $user->id; ?></td>
					            <td><?php echo $user->nom; ?></td>
					            <td><?php echo $user->prenom; ?></td>
					            <td><?php echo $user->email; ?></td>
					            <td><a id="<?php echo $user->id ?>" href="<?php echo base_url().'index.php/Utilisateur/admin_showUser/'.$user->id ?>" class="edit-family-button">Voir</a></td>
					            <td><a id="<?php echo $user->id ?>" class="delete-user-button">Supprimer</a></td>
					        </tr>
				        <?php endforeach; ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>