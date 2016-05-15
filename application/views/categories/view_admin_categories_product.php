<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Famille/admin_details/'.$categ->family()->id?>" class="section"><?php echo $categ->family()->denomination?></a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Categorie/admin_show/'.$categ->id?>" class="section"><?php echo $categ->denomination?></a>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sixteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Tous les <?php echo $categ->denomination?></h1>
			</div>
				<div class="row">
					<table id="example" class="ui sortable celled table dataTable" cellspacing="0" width="100%">
					    <thead>
					        <tr>
					        	<th>id</th>
					            <th>denomination</th>
					            <th>Prix</th>
					            <th>Type</th>
					            <th>Voir</th>
					            <th>Supprimer</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php foreach($categ->products() as $prod):?>
						        <tr>
						            <td><?php echo $prod->id; ?></td>
						            <td><?php echo $prod->denomination; ?></td>
						            <td><?php echo $prod->prix.' €'; ?></td>
						            <td><?php echo $prod->typeVente; ?></td>
						            <td><a id="<?php echo $prod->id ?>" href="<?php echo base_url().'index.php/Produit/admin_details/'.$prod->id ?>" class="edit-family-button">Voir</a></td>
						            <td><a id="<?php echo $prod->id ?>" class="delete-product-button">Supprimer</a></td>
						        </tr>
					        <?php endforeach; ?>
					    </tbody>
					</table>
				</div>
		</div>
	</div>
</div>