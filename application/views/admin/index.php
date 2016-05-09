<!-- Products -->

<div class="ui four column centered grid">
	<?php foreach($families as $family):?>
		<div class="column">
			<div class="segment">
				<div class="ui card">
				  <div class="content center aligned">
				  	<a class="header" href="<?php echo base_url() . 'index.php/famille/admin_details/' . $family->id; ?>">Voir tous les <?php echo strtolower($family->denomination); ?></a>
				  </div>
				  <div class="image">
				    <?php 
				      if($family->image != null)
				        echo '<img src="'.base_url().'/assets/images/'.$family->image.'"/>';
				      else
				        echo '<img src="http://placehold.it/500x400"/>';
				    ?>
				  </div>
				  <div class="extra content center aligned">
				    <button class="ui custom-green button">Ajouter un produit</button>
				  </div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<!-- List of families -->

<div class="ui grid">
	<h1 class="ui header">
		Liste des familles de produits
		<div class="sub header right floated"><a class="add-family-button">Ajouter une famille</a></div>
	</h1>
</div>

<table id="example" class="ui celled table dataTable" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    	<?php foreach($families as $family):?>
        <tr>
            <td><?php echo $family->denomination; ?></td>
            <td><a id="<?php echo $family->id ?>" class="edit-family-button">Modifier</a></td>
            <td><a id="<?php echo $family->id ?>" class="delete-family-button">Supprimer</a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- List of categories -->

<?php foreach($families as $family):?>

	<div class="ui grid">
		<h1 class="ui header">
			Les catégories de <?php echo strtolower($family->denomination); ?>
			<div class="sub header right floated"><a class="add-category-button">Ajouter une catégorie</a></div>
		</h1>
	</div>

	<table id="example" class="ui celled table dataTable" cellspacing="0" width="100%">
	    <thead>
	        <tr>
	            <th>Nom</th>
	            <th>Nombre de <?php echo strtolower($family->denomination); ?></th>
	            <th>Voir tous les <?php echo strtolower($family->denomination); ?> de la catégorie</th>
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
	            <td><a id="<?php echo $category->id ?>" class="edit-category-button">Modifier</a></td>
	            <td><a id="<?php echo $category->id ?>" class="delete-category-button">Supprimer</a></td>
	        </tr>
	        <?php endforeach; ?>
	    </tbody>
	</table>
<?php endforeach; ?>