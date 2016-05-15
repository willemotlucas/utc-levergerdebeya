<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Famille/admin_details/'.$famille->id; ?>" class="section"><?php echo $famille->denomination;?></a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Produit/admin_addProduct/'.$famille->id; ?>" class="section">Ajout de <?php echo $famille->denomination;?></a>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="sixteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Ajout d'un produit pour les <?php echo $famille->denomination;?></h1>
			</div>
			<div class="row">
				<?php echo validation_errors();?>
				<form class="ui form admin add product" action="<?php echo base_url().'index.php/Produit/admin_addProduct/'.$famille->id?>" method="post" accept-charset="utf-8">
				<div class="ui error message"></div>
				<div class="ui two column grid">
					<div class="eight wide column">
						<div class="row field">
							<label>
				        		Denomination *
				        		<i id="help_denomination" class="help circle icon"></i><span class="help-message" id="denomination_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="denomination_create"  name="denomination_create" type="text" placeholder="Entrez la dénomination du produit" value="">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Origine
				        		<i id="help_origine" class="help circle icon"></i><span class="help-message" id="origine_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<input id="origine_create"  name="origine_create" type="text" placeholder="Entrez l'origine du produit" value="">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Catégorie *
				        		<i id="help_categorie" class="help circle icon"></i><span class="help-message" id="categorie_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<select class="ui fluid dropdown" id="categorie_create"  name="categorie_create">
        							<option value="">Choisissez la catégorie</option>
        							<?php foreach($famille->categories() as $categ)
        									{
        										echo '<option value="'.$categ->id.'">'.$categ->denomination.'</option>';
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
							  	<input id="prix_create"  name="prix_create" type="number" step="0.01" placeholder="Entrez le prix du produit" value="">
							  	<i class="user icon"></i>  
							</div>
						</div>

						<div class="row field">
							<label>
				        		Vente par *
				        		<i id="help_type" class="help circle icon"></i><span class="help-message" id="type_message"></span>
				        	</label>
					        <div class="ui left icon input">
							  	<select class="ui fluid dropdown" id="type_create"  name="type_create">
        							<option value="">Choisissez le type de vente</option>
        							<option value="kg">kg</option>
        							<option value="piece">pièce</option>
        						</select>
							</div>
						</div>
						<div class="row field">
							<label>
				        		Description
				        		<i id="help_description" class="help circle icon"></i><span class="help-message" id="description_message"></span>
				        	</label>
					        <div class="ui">
							  	<textarea id="description_create" name="description_create" placeholder="Entrez une description du produit"></textarea> 
							</div>
						</div>
						<div class="row field">
						    <div class="ui checked checkbox">
						    	<label>
						    		Produit du moment  <i id="help_moment" class="help circle icon"></i><span class="help-message" id="moment_message"></span>
						    	</label>
						      	<input type="checkbox"  checked="" name="moment_create" tabindex="0" class="hidden">
						    </div>
						    <br/>
						    <div class="ui checkbox">
						    	<label>
						    		Produit Phare <i id="help_phare" class="help circle icon"></i><span class="help-message" id="phare_message"></span>
						    	</label>
						      	<input type="checkbox" name="phare_create" tabindex="0" class="hidden">
						    </div>
						</div>
						<div class="row field">
							
						</div>

						<div id="submit_div" class="row">
							<button type="submit" id="button-create" class="ui custom-green submit button">Créer le produit</button>
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