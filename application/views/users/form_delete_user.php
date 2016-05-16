<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Suppression de l'utilisateur : <?php echo ucfirst($get_user->prenom).' '.ucfirst($get_user->nom); ?>
  </div>

  <div class="image content">
    
    <div class="description">
      <form class="ui form user">
        <h3>Êtes-vous certain de vouloir supprimer l'utilisateur : "<?php echo ucfirst($get_user->prenom).' '.ucfirst($get_user->nom); ?>" ?</h3>
      </form>
    </div>
  </div>

  <div class="actions">
    <div id="button-cancel" class="ui red deny button">
      Annuler
    </div>
    <div id="<?php echo $get_user->id; ?>" class="button-delete ui custom-green submit right labeled icon button">
      Supprimer
      <i class="checkmark icon"></i>
    </div>
  </div>

</div>