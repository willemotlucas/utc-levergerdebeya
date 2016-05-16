<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Modification de la famille : <?php echo $get_family->denomination; ?>
  </div>

  <div class="image content">
    <form id="edit_family" class="ui form family" enctype="multipart/form-data">
      <div class="ui medium image left floated">
        <?php 
        if($get_family->image != null)
          echo '<img id="image_preview" src="'.base_url().'/assets/images/'.$get_family->image.'"/>';
        else
          echo '<img id="image_preview" src="http://placehold.it/500x400"/>';
        ?>
        <label>Modifier l'image</label>
        <input id="picture_create"  name="picture_create" type="file"/>
      </div>
      
        <div class="description">
          <div class="field">
            <label>Nom de la famille</label>
            <div class="ui input">
              <input id="family_id" type="hidden" value="<?php echo $get_family->id; ?>">
              <input id="family_name" name="family_name" type="text" placeholder="Nom de la famille" value="<?php echo $get_family->denomination; ?>" maxlength="50">
            </div>
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