<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Suppression de la famille : <?php echo $get_family->denomination; ?>
  </div>

  <div class="image content">
    
    <div class="description">
      <form class="ui form category">
        <input type="hidden" id="family_id" value="<?php echo $get_family->id; ?>"/>
        <h3>Êtes-vous certain de vouloir supprimer la famille : "<?php echo $get_family->denomination; ?>" ?</h3>
      </form>
    </div>
  </div>

  <div class="actions">
    <div id="button-cancel" class="ui custom-green button">
      Annuler
    </div>
    <div id="button-delete" class="ui red deny submit right labeled icon button">
      Supprimer
      <i class="checkmark icon"></i>
    </div>
  </div>

</div>