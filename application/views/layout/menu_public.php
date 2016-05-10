<div class="ui centered grid">
  <div class="center aligned column">
    <div class="ui menu">
        <?php foreach($familles as $famille): ?>
          <div class="ui pointing dropdown link item">
            <span class="text"><?php echo $famille->denomination ?></span>
            <i class="dropdown icon"></i>
            <div class="menu">
              <div class="header"><a href="<?php echo(base_url('index.php/famille/details/' . $famille->id)); ?>">Catégories</a></div>
              <?php foreach($famille->categories() as $category):?>
                <a class="item" href="<?php echo(base_url('index.php/categorie/details/' . $category->id)); ?>"><?php echo $category->denomination ?></a>
            <?php endforeach; ?>  
            </div>
          </div>
        <?php endforeach; ?>
        <a class="item">
          Contact
        </a>
        <a class="item">
          Nos magasins
        </a>
        <div class="right menu">
        <div class="item">
          <div class="ui icon input">
            <input type="text" placeholder="Rechercher un produit ...">
            <i class="search link icon"></i>
          </div>
        </div>
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

<div class="ui modal">
  <i class="close icon"></i>
  <div class="content">
    <div class="ui two column very relaxed stackable grid">
      <div class="column">
        <h3>Vous n'avez pas encore de compte ? <br/> Inscrivez-vous, c'est gratuit !</h3>
        
        <form class="ui form signup">
          <div>
            <div class="field">
              <label>Adresse e-mail</label>
              <div class="ui left icon input">
                <input id="email_signup" name="email_signup" type="text" placeholder="Tapez votre e-mail">
                <i class="user icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Mot de passe</label>
              <div class="ui left icon input">
                <input id="password_signup" name="password_signup" type="password" placeholder="Tapez votre mot de passe">
                <i class="lock icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Confirmation du mot de passe</label>
              <div class="ui left icon input">
                <input id="password_confirm" name="password_confirm" type="password" placeholder="Confirmez votre mot de passe">
                <i class="lock icon"></i>
              </div>
            </div>
            <div class="ui error message"></div>
            <button id="button-signup" type="submit" class="ui custom-green submit button">S'inscrire</button>
          </div>
        </form>
      </div>
      <div class="ui vertical divider">
        OU
      </div>
      <div class="column">
        <h3>Vous possédez déjà un compte ? <br/> Connectez-vous !</h3>

        <form id="formLogin" class="ui form login" action="<?php echo base_url().'index.php/Utilisateur/login'?>" method="post">
          <div>
            <div class="field">
              <label>Adresse e-mail</label>
              <div class="ui left icon input">
                <input id="email_login" name="email_login" type="text" placeholder="Tapez votre adresse e-mail">
                <i class="user icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Mot de passe</label>
              <div class="ui left icon input">
                <input id="password_login" name="password_login" type="password" placeholder="Tapez votre adresse mot de passe">
                <i class="lock icon"></i>
              </div>
            </div>
            <input type="hidden" name="currentUrl" value="<?php echo uri_string(); ?>" />
            <div class="ui error message"></div>
            <button type="submit" id="button-connect" class="ui custom-green submit button">Se connecter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

