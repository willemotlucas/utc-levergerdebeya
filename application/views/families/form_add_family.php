<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Ajout d'une famille
  </div>

  <div class="image content">

    <div class="ui medium image">
      <img src="http://placehold.it/500x400"/>
      <a>Modifier l'image</a>
    </div>
    
    <div class="description">
      <form class="ui form family">
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
      </form>
    </div>

  </div>

</div>