<div class="ui centered grid">
  <div class="center aligned column">
    <div class="ui menu">
      <a href="<?php echo base_url() . 'index.php/Admin' ?>" class="item">Gestion des produits</a>
      <a href="<?php echo base_url() . 'index.php/Utilisateur/admin_gestion' ?>"class="item">Gestion des utilisateurs</a>

        <div class="right menu">
        <!--<div class="item">
          <div class="ui icon input">
            <input type="text" placeholder="Rechercher un produit ...">
            <i class="search link icon"></i>
          </div>
        </div>-->
       <?php if($this->session->has_userdata('userLogged')){ ?>
          <div class="ui pointing dropdown link item">
            <i id="userIcon" class="user icon"></i>
            <span class="text"><?php echo ucfirst($this->session->userLogged->prenom)." ".ucfirst($this->session->userLogged->nom);?></span>
            <div class="menu">
              <a class="item" href="<?php echo(base_url('index.php/Utilisateur/showAccount')); ?>">Voir mon compte</a>
              <a id="disconnect" class="item" href="<?php echo(base_url('index.php/Utilisateur/disconnect/' . uri_string())); ?>">Déconnexion</a>
            </div>
          </div>
        <?php }else{?>
          <a id="login" class="item">
            <i class="user icon"></i>
            Espace utilisateur
          </a>
        <?php };?>
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