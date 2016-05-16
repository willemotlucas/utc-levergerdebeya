<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Modification de la catégorie : <?php echo $get_category->denomination; ?>
  </div>
  
  <div class="image content">
    <form id="edit_category" class="ui form category" enctype="multipart/form-data">

      <div class="ui medium image left floated">
        <?php 
        if($get_category->image != null)
          echo '<img id="image_preview" src="'.base_url().'/assets/images/'.$get_category->image.'"/>';
        else
          echo '<img id="image_preview" src="http://placehold.it/500x400"/>';
        ?>
        <label>Modifier l'image</label>
        <input id="picture_create"  name="picture_create" type="file"/>
      </div>
    
        <div class="description">
          <div class="field">
            <label>Nom de la catégorie</label>
            <div class="ui input">
              <input id="category_id" type="hidden" value="<?php echo $get_category->id; ?>">
              <input id="category_name" name="category_name" type="text" placeholder="Nom de la catégorie" value="<?php echo $get_category->denomination; ?>" maxlength="50">
            </div>
          </div>

          <div class="field">
            <label>Famille</label>
            <select id="family_id" class="ui dropdown" name="dropdown">
              <?php foreach ($get_families as $family){
                if($family->id == $get_category->famille_id)
                echo "<option value=" . $family->id . " selected>" . $family->denomination . "</option>";
                else
                echo "<option value=" . $family->id . ">" . $family->denomination . "</option>";
              } 
              ?>
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
        </div>
      </form>
    </div>

</div>