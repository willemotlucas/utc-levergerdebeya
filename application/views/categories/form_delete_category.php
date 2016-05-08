<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Suppression de la catégorie : <?php echo $get_category->denomination; ?>
  </div>

  <div class="image content">
    
    <div class="description">
      <form class="ui form category">
        <input type="hidden" id="category_id" value="<?php echo $get_category->id; ?>"/>
        <h3>Êtes-vous certain de vouloir supprimer la catégorie : "<?php echo $get_category->denomination; ?>"</h3>
      </form>
    </div>
  </div>

  <div class="actions">
    <div id="button-cancel" class="ui red deny button">
      Annuler
    </div>
    <div id="button-delete" class="ui custom-green submit right labeled icon button">
      Supprimer
      <i class="checkmark icon"></i>
    </div>
  </div>

</div>