<div class="ui four column centered grid">
	<?php foreach($families as $family):?>
		<div class="column">
			<div class="segment">
				<div class="ui card">
				  <div class="content center aligned">
				  	<a class="header" href="<?php echo base_url() . 'index.php/famille/admin_details/' . $family->id; ?>">Voir tous les <?php echo strtolower($family->denomination); ?></a>
				  </div>
				  <div class="image">
				    <img src="http://placehold.it/350x200">
				  </div>
				  <div class="extra content center aligned">
				    <button class="ui custom-green button">Ajouter un produit</button>
				  </div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<?php foreach($families as $family):?>

	<div class="ui grid">
		<h1 class="ui header">Les catégories de <?php echo strtolower($family->denomination); ?> </h1>
	</div>
	<table id="example" class="ui celled table dataTable" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>Nom</th>
	            <th>Nombre de fruits</th>
	            <th>Voir tous les fruits</th>
	            <th>Modifier</th>
	            <th>Supprimer</th>
	        </tr>
	    </thead>
	    <tbody>
	    	<?php foreach($family->categories() as $category):?>
	        <tr>
	            <td><?php echo $category->denomination; ?></td>
	            <td><?php echo $category->count_products(); ?></td>
	            <td>Voir</td>
	            <td>Modifier</td>
	            <td>Supprimer</td>
	        </tr>
	        <?php endforeach; ?>
	    </tbody>
	</table>
<?php endforeach; ?>