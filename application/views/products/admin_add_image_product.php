<div class="content-container">
	<div class="ui grid">
		<div class="ui breadcrumb">
		  <a href="<?php echo base_url() . 'index.php/Admin'; ?>" class="section">Accueil Admin</a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Famille/admin_details/'.$product->categorie()->family()->id; ?>" class="section"><?php echo $product->categorie()->family()->denomination;?></a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Produit/admin_addProduct/'.$product->categorie()->family()->id; ?>" class="section">Ajout de <?php echo $product->categorie()->family()->denomination;?></a>
		  <div class="divider"> / </div>
		  <a  href="<?php echo base_url() . 'index.php/Produit/admin_addImage/'.$product->id; ?>" class="section"> Image pour le produit <?php echo $product->denomination;?></a>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="ui one column grid">
		<div class="ui form add image sixteen wide column">
			<div class="row">
				<h1 class="ui dividing header">Ajout d'une image pour le produit <?php echo $product->denomination?></h1>
			</div>
			<?php echo form_open_multipart('Produit/admin_addImage/'.$product->id);?>
			<div class="row">	
				<div class="field">
					<label>
		        		Choisir une image
		        		<i id="help_picture" class="help circle icon"></i><span class="help-message" id="picture_message"></span>
		        	</label>
			        <div class="row">
					  	<input id="picture_create"  name="picture_create" type="file"/>
					</div>
					<br/>
					<div id="submit_div" class="row">
						<button type="submit" id="button-create" class="ui custom-green submit button">Ajouter l'image</button>
						<a href="<?php echo base_url().'index.php/Produit/admin_details/'.$product->id;?>" class="ui orange submit button"> ignorer </a>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>