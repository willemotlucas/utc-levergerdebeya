<div class="ui grid">
	<div class="ui breadcrumb">
	  <a href="<?php echo base_url() . 'index.php'; ?>" class="section">Accueil</a>
	  <div class="divider"> / </div>
	  <a href="<?php echo base_url() . 'index.php/famille/details/' . $famille->id; ?>" class="section"><?php echo ucfirst($famille->denomination);?></a>
	</div>
</div>

<div class="ui grid">
	<h1 class="ui header">Nos <?php echo strtolower($famille->denomination); ?> frais</h1>
</div>

<div class="ui four column centered grid">
	<?php foreach($categories as $categorie):?>
		<div class="column">
			<div class="segment">
				<div class="ui card">
				  <div class="content center aligned">
				  	<a class="header" href="<?php echo base_url() . 'index.php/categorie/details/' . $categorie->id; ?>"><?php echo $categorie->denomination; ?></a>
				  </div>
				  <div class="image">
				    <img src="http://placehold.it/350x200">
				  </div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>





