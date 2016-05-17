<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php'; ?>" class="section">Accueil</a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/famille/details/' . $product->categorie()->family()->id; ?>" class="section"><?php echo ucfirst($product->categorie()->family()->denomination);?></a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/categorie/details/' . $product->categorie()->id; ?>" class="section"><?php echo ucfirst($product->categorie()->denomination);?></a>
		  <div class="divider"> / </div>
		  <a href="<?php echo base_url() . 'index.php/produit/details/' . $product->id; ?>" class="section"><?php echo ucfirst($product->denomination);?></a>
		</div>
	</div>

	<div class="ui two column divided grid">
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
					<div class="quantite">
						<p>Quantité :
							<span class="ui input">
							  <input type="number" oninput="calculate_price(this, <?php echo $product->prix ?>);" placeholder="écrivez la quantité" min="0">
							</span>
							<?php
								if(strcmp($product->typeVente, 'kg') == 0)
									echo ' kg';
								else if(strcmp($product->typeVente, 'piece') == 0)
									echo 'pièces';
							?>
						</p>
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
					<div class="prix total">
						<p>Prix total TTC : <span id="prix_total"></span>€</p>
					</div>
				</div>
			</div>
			<div class="ui one column grid"  style="margin-right:0; margin-left:0;">
				<div class="column">
					<div class="row">
						<h1 class="ui header">Description</h1>
					</div>
					<div class="row">
						<p><?php echo $product->description;?></p>
					</div>
				</div>
			</div>
		</div>


		<div class="three wide column">
			<h4 class="ui dividing header">Dans la même catégorie</h4>
			<?php foreach($product_categories->result() as $pcs):?>
				<div class="segment">
					<div class="ui card">
					  <div class="content center aligned">
					  	<a class="header" href="<?php echo base_url() . 'index.php/produit/details/' . $pcs->id; ?>"><?php echo ucfirst($pcs->denomination); ?></a>
					  </div>
					  <div class="image">
					    <?php 
							if($pcs->image != null)
								echo '<img src="'.base_url().'/assets/images/'.$pcs->image.'"/>';
							else
								echo '<img src="http://placehold.it/500x400"/>';
					  	?>
					  </div>
					  <div class="description">
					    <p>Origine : <?php echo ucfirst($pcs->origine); ?></p>
					    <p>Prix TTC : <?php echo $pcs->prix; ?> €/<?php echo $pcs->typeVente; ?></p>
					  </div>
					  <div class="extra content center aligned">
					    <a class="ui custom-green button" href="<?php echo base_url() . 'index.php/produit/details/' . $pcs->id; ?>">Voir le produit</a>
					  </div>
					</div>
				</div>
				<br/>
			<?php endforeach; ?>
		</div>
	</div>
</div>