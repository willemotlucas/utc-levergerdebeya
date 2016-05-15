<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Suppression du produit : <?php echo $get_product->denomination; ?>
  </div>

  <div class="image content">
    
    <div class="description">
      <form class="ui form product">
        <h3>Êtes-vous certain de vouloir supprimer le produit : "<?php echo $get_product->denomination; ?>" ?</h3>
      </form>
    </div>
  </div>

  <div class="actions">
    <div id="button-cancel" class="ui red deny button">
      Annuler
    </div>
    <div id="<?php echo $get_product->id; ?>" class="button-delete ui custom-green submit right labeled icon button">
      Supprimer
      <i class="checkmark icon"></i>
    </div>
  </div>

</div>