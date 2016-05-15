<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Famille/admin_details/'.$product->categorie()->family()->id; ?>" class="section"><?php echo $product->categorie()->family()->denomination;?></a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Categorie/admin_show/'.$product->categorie()->id; ?>" class="section"><?php echo $product->categorie()->denomination;?></a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Produit/admin_details/'.$product->id; ?>" class="section"><?php echo $product->denomination;?></a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Produit/admin_edit/'.$product->id; ?>" class="section">Modification de <?php echo $product->denomination;?></a>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sixteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Modification de <?php echo $product->denomination;?></h1>
			</div>
			<div class="row">
				<?php echo validation_errors();?>
				<form class="ui form admin edit product" action="<?php echo base_url().'index.php/Produit/admin_edit/'.$product->id?>" method="post" accept-charset="utf-8">
				<div class="ui error message"></div>
				<div class="ui two column grid">
					<div class="eight wide column">
						<div class="row field">
							<label>
				        		Denomination *
				        		<i id="help_denomination" class="help circle icon"></i><span class="help-message" id="denomination_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="denomination_edit"  name="denomination_edit" type="text" placeholder="Entrez la dénomination du produit" value="<?php echo $product->denomination;?>">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Origine
				        		<i id="help_origine" class="help circle icon"></i><span class="help-message" id="origine_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="origine_edit"  name="origine_edit" type="text" placeholder="Entrez l'origine du produit" value="<?php echo $product->origine;?>">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Catégorie *
				        		<i id="help_categorie" class="help circle icon"></i><span class="help-message" id="categorie_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<select class="ui fluid dropdown" id="categorie_edit"  name="categorie_edit">
        							<option value="">Choisissez la catégorie</option>
        							<?php foreach($product->categorie()->family()->categories() as $categ)
        									{
        										if($product->categorie_id == $categ->id)
        										{
        											echo '<option value="'.$categ->id.'" selected="selected">'.$categ->denomination.'</option>';
        										}
        										else
        										{
        											echo '<option value="'.$categ->id.'">'.$categ->denomination.'</option>';
        										}
        									}
        							?>
        						</select> 
							</div>
						</div>

						<div class="row field">
							<label>
				        		Prix *
				        		<i id="help_prix" class="help circle icon"></i><span class="help-message" id="prix_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="prix_edit"  name="prix_edit" type="number" step="0.01" placeholder="Entrez le prix du produit" value="<?php echo $product->prix;?>">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Vente par *
				        		<i id="help_type" class="help circle icon"></i><span class="help-message" id="type_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<select class="ui fluid dropdown" id="type_edit"  name="type_edit">
        							<option value="">Choisissez le type de vente</option>
        							<option <?php if(strcmp($product->typeVente, 'kg') == 0) echo 'selected="selected"';?> value="kg">kg</option>
        							<option <?php if(strcmp($product->typeVente, 'piece') == 0) echo 'selected="selected"';?> value="piece">pièce</option>
        						</select>
							</div>
						</div>
						<div class="row field">
							<label>
				        		Description
				        		<i id="help_description" class="help circle icon"></i><span class="help-message" id="description_message"></span>
				        	</label>
					        <div class="ui">
							  	<textarea id="description_edit" name="description_edit" placeholder="Entrez une description du produit" value="<?php echo $product->description;?>"></textarea> 
							</div>
						</div>
						<div class="row field">
						    <div class="ui checked checkbox">
						    	<label>
						    		Produit du moment  <i id="help_moment" class="help circle icon"></i><span class="help-message" id="moment_message"></span>
						    	</label>
						      	<input type="checkbox"  <?php if($product->produit_du_moment == 1) echo 'checked=""';?> name="moment_edit" tabindex="0" class="hidden">
						    </div>
						    <br/>
						    <div class="ui checkbox">
						    	<label>
						    		Produit Phare <i id="help_phare" class="help circle icon"></i><span class="help-message" id="phare_message"></span>
						    	</label>
						      	<input type="checkbox" <?php if($product->produit_phare == 1) echo 'checked=""';?> name="phare_edit" tabindex="0" class="hidden">
						    </div>
						</div>
						<div class="row field">
							
						</div>

						<div id="submit_div" class="row">
							<button type="submit" id="button-edit" class="ui custom-green submit button">Modifier le produit</button>
						</div>
					</div>
					<div class="eight wide column">
						
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>