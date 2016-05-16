<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Ajout d'une famille
  </div>

  <div class="image content">
    
    <form id="add_family" class="ui form family" enctype="multipart/form-data">
      <div class="ui medium image left floated">
        <img id="image_preview" src="http://placehold.it/500x400"/>
        <label>Choisir une image</label>
        <input id="picture_create"  name="picture_create" type="file"/>
      </div>
    
      <div class="description">
        <div class="field">
          <label>Nom de la famille</label>
          <div class="ui input">
            <input id="family_name" name="family_name" type="text" placeholder="Nom de la famille" maxlength="50">
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