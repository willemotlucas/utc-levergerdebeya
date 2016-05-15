<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a href="" class="section"><?php echo ucfirst($product->categorie()->family()->denomination);?></a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/Produit/admin_details/' . $product->id; ?>" class="section"><?php echo ucfirst($product->denomination);?></a>
		</div>
	</div>

	<div class="ui one column grid">
		<div class="thirteen wide column">
			<div class="ui two column grid" style="margin-right:0; margin-left:0;">
				<div class="nine wide column">
					<div class="ui image">
						<?php 
							if($product->image != null)
								echo '<img src="'.base_url().'/assets/images/'.$product->image.'"/>';
							else
								echo '<img src="http://placehold.it/500x400"/>';
					  	?>
					</div>
				</div>
				<div class="seven wide column">
					<h1 class="ui dividing header"><?php echo ucfirst($product->denomination); ?></h1>
					<br/>
					<div class="origine">
						<p>Origine : <?php echo ucfirst($product->origine);?></p>
					</div>
					<br/>
					<div class="prix">
						<p>Prix TTC : <?php echo ucfirst($product->prix);
							if(strcmp($product->typeVente, 'kg') == 0)
								echo '€ le kg';
							else if(strcmp($product->typeVente, 'piece') == 0)
								echo '€ la pièce';
						?></p>
					</div>
					<br/>
					<div class="row">
						<p>Description: <?php echo $product->description;?></p>
					</div>
					<br/>
					<div class="row">
						<p>Categorie: <?php echo $product->categorie()->denomination;?></p>
					</div>
					<br/>
					<div class="row">
						<p>Produit du moment: <?php echo ($product->produit_du_moment == 1 ?  'oui' : 'non');?></p>
					</div>
					<br/>
					<div class="row">
						<p>Produit phare: <?php echo ($product->produit_phare == 1 ?  'oui' : 'non');?></p>
					</div>
					<br/>
					<div class="row">
						<a href="<?php echo base_url().'index.php/Produit/admin_edit/'.$product->id;?>" class="ui custom-green submit button">Modifier le produit</a>
					</div>
					<br/>
					<div id="submit_div" class="row">
						<a href="<?php echo base_url().'index.php/Produit/admin_addImage/'.$product->id?>" class="ui custom-green submit button">Modifier l'image</a>
					</div>
				</div>

			</div>
			<div class="ui one column grid"  style="margin-right:0; margin-left:0;">
				<div class="column">

				</div>
			</div>
		</div>
	</div>
</div>