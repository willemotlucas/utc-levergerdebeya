<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php'; ?>" class="section">Accueil</a>
		  <div class="divider"> / </div>
		  <p class="section">Recherche</p>
		</div>
	</div>

	<div class="ui grid">
		<h1 class="ui header">Résultats de la recherche</h1>
	</div>

	<?php if($count > 0){ ?>

	<div class="ui four column centered grid">
		<?php foreach($products as $product):?>
			<div class="column">
				<div class="segment">
					<div class="ui card">
					  <div class="content center aligned">
					  	<a class="header" href="<?php echo base_url() . 'index.php/produit/details/' . $product->id; ?>"><?php echo ucfirst($product->denomination); ?></a>
					  </div>
					  <div class="image">
					    <?php 
							if($product->image != null)
								echo '<img src="'.base_url().'/assets/images/'.$product->image.'"/>';
							else
								echo '<img src="http://placehold.it/500x400"/>';
					  	?>
					  </div>
					  <div class="description">
					    <p>Origine : <?php echo ucfirst($product->origine); ?></p>
					    <p>Prix TTC : <?php echo $product->prix; ?> €/<?php echo $product->typeVente; ?></p>
					  </div>
					  <div class="extra content center aligned">
					    <button class="ui custom-green button"><a href="<?php echo base_url() . 'index.php/produit/details/' . $product->id; ?>">Voir le produit</a></button>
					  </div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>

	<? }else{ ?>

	<h4>Aucun résultat trouvé</h4>

	<?php }?>
</div>