<?php if($this->session->flashdata('edit-category-error')){ ?>

	<div class="ui grid negative message">
	  <i class="close icon"></i>
	  <p><?php echo $this->session->flashdata('message-error'); ?></p>
	</div>

<?php } 
	if($this->session->flashdata('edit-category-success')){ ?>

	<div class="ui grid positive message">
	  <i class="close icon"></i>
	  <p><?php echo $this->session->flashdata('message-success'); ?></p>
	</div>

<?php }?>

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

<?php foreach($families as $family):?>

	<div class="ui grid">
		<h1 class="ui header">
			Les catégories de <?php echo strtolower($family->denomination); ?>
			<div class="sub header right floated"><a id="<?php echo $family->id; ?>" class="add-category-button">Ajouter une catégorie</a></div>
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
	            <td>Supprimer</td>
	        </tr>
	        <?php endforeach; ?>
	    </tbody>
	</table>
<?php endforeach; ?>