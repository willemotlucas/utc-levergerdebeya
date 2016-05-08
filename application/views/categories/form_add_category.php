<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Ajout d'une catégorie
  </div>

  <div class="image content">

    <div class="ui medium image">
      <img src="http://placehold.it/500x400"/>
      <a>Modifier l'image</a>
    </div>
    
    <div class="description">
      <form class="ui form category">
        <div class="field">
          <label>Nom de la catégorie</label>
          <div class="ui input">
            <input id="category_name" name="category_name" type="text" placeholder="Nom de la catégorie" maxlength="50">
          </div>
        </div>

        <div class="field">
          <label>Famille</label>
          <select id="family_id" class="ui dropdown" name="dropdown">
            <?php foreach ($get_families as $family):?>
              <option value="<?php echo $family->id; ?>"><?php echo $family->denomination;?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="ui error message"></div>

        <div id="button-cancel" class="ui red deny button">
          Annuler
        </div>
        <div id="button-save" class="ui custom-green submit right labeled icon button">
          Enregistrer
          <i class="checkmark icon"></i>
        </div>
      </form>
    </div>

  </div>

</div>