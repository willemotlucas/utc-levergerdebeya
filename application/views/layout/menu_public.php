  <div class="ui centered grid">
    <div class="center aligned column">
      <div class="row">
          <a href="<?php echo base_url().'index.php/';?>"><img class="ui fluid image" src="<?php echo base_url().'assets/images/banière.png';?>"/></a>
      </div>
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
          <a class="item" href="<?php echo(base_url('index.php/home/contact')) ?>">
            Contact
          </a>
          <a class="item" href="<?php echo(base_url('index.php/home/magasins')) ?>">
            Nos magasins
          </a>
          <div class="right menu">
          <div class="item">
            <div class="ui icon input">
              <form class="ui form search-form" action="<?php echo base_url() . 'index.php/home/search' ?>" method="POST">
                <div class="ui action input">
                  <input name="search_text" type="text" placeholder="Rechercher un produit"/>
                  <button type="submit" id="search_product" class="ui hidden button custom-green submit">Rechercher</button>
                </div>
              </form>
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
        <div class="ui one column centered grid">
          <div class="column">
            <h3>Vous n'avez pas encore de compte ? <br/> Inscrivez-vous, c'est gratuit !</h3>
            <a class="container" href="<?php echo base_url().'index.php/Utilisateur/signup';?>">
              <button class="massive custom-green ui button">
                Créer un compte
              </button>
            </a>
          </div>
        </div>
        <!--<form id="formSignup" class="ui form signup" action="<?php echo base_url().'index.php/Utilisateur/signup'?>" method="POST">
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
            <input type="hidden" name="currentUrl" value="<?php echo uri_string(); ?>" />
            <button id="button-signup" type="submit" class="ui custom-green submit button">S'inscrire</button>
          </div>
        </form>-->
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

