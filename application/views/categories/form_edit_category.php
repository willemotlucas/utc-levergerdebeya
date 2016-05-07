<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Modification de la catégorie <?php echo $get_category->denomination; ?>
  </div>
  <div class="image content">
    <div class="ui medium image">
      <img src="http://placehold.it/500x300">
    </div>
    <div class="description">

    <?php if (validation_errors()) : ?>
    <div class="error"><?php echo validation_errors(); ?></div>
    <?php endif; ?>

      <div class="field">
        <label>Nom de la catégorie</label>
        <div class="ui input">
          <input id="category_id" type="hidden" value="<?php echo $get_category->id; ?>">
          <input id="category_name" name="category_name" type="text" placeholder="Nom de la catégorie" value="<?php echo $get_category->denomination; ?>">
        </div>
      </div>

    </div>
  </div>
  <div class="actions">
    <div id="button-cancel" class="ui red deny button modal-button">
      Annuler
    </div>
    <div id="button-save" class="ui custom-green right labeled icon button modal-button">
      Enregistrer
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>