  <div class="ui centered grid">
    <div class="center aligned column">
      <div class="ui menu">
        <a href="<?php base_url() . 'index.php/admin' ?>" class="item">Gestion des produits</a>
        <a class="item">Gestion des utilisateurs</a>

          <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <input type="text" placeholder="Rechercher un produit ...">
              <i class="search link icon"></i>
            </div>
          </div>
          <a id="login" class="item">
            <i class="user icon"></i>
            Espace utilisateur
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php if($this->session->flashdata('message-success')){ ?>

    <div class="ui grid positive message">
      <p><?php echo $this->session->flashdata('message-success'); ?></p>
    </div>
  <?php }?>

  <?php if($this->session->flashdata('message-error')){ ?>

    <div class="ui grid negative message">
      <p><?php echo $this->session->flashdata('message-error'); ?></p>
    </div>
  <?php }?>
