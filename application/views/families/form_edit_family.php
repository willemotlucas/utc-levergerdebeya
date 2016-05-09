<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Modification de la famille : <?php echo $get_family->denomination; ?>
  </div>

  <div class="image content">

    <div class="ui medium image">
      <?php 
      if($get_family->image != null)
        echo '<img src="'.base_url().'/assets/images/'.$get_family->image.'"/>';
      else
        echo '<img src="http://placehold.it/500x400"/>';
      ?>

      <a>Modifier l'image</a>
    </div>
    
    <div class="description">
      <form class="ui form family">
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
      </form>
    </div>

  </div>

</div>