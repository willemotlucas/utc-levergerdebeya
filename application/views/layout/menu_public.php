<div class="ui centered grid">
  <div class="center aligned column">
    <div class="ui menu">
        <?php foreach($familles as $famille): ?>
          <div class="ui pointing dropdown link item">
            <span class="text"><?php echo $famille->denomination ?></span>
            <i class="dropdown icon"></i>
            <div class="menu">
              <div class="header"><a href="<?php echo(base_url('index.php/famille/details/' . $famille->id)); ?>">Catégories</a></div>
              <?php foreach($famille->categories() as $category):
                if($category->products()){
              ?>
                <div class="item">
                  <i class="dropdown icon"></i>
                  <span class="text"><a href="<?php echo(base_url('index.php/categorie/details/' . $category->id)); ?>"><?php echo $category->denomination ?></a></span>
                  <div class="menu">
                  <?php foreach($category->products() as $product):?>
                    <div class="item"><?php echo $product->denomination ?></div>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php     
                }else{
              ?>
                <div class="item"><a href="<?php echo(base_url('index.php/categorie/details/' . $category->id)); ?>"><?php echo $category->denomination ?></a></div>
              <?php    
                }
              ?>
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
        <a id="login" class="item">
          <i class="user icon"></i>
          Espace utilisateur
        </a>
      </div>
    </div>
  </div>
</div>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="content">
    <div class="ui two column very relaxed stackable grid">
      <div class="column">
        <h3>Vous n'avez pas encore de compte ? <br/> Inscrivez-vous, c'est gratuit !</h3>
        
        <?php echo validation_errors(); ?>
        <?php echo form_open('utilisateur/signup'); ?>
          <div class="ui form">
            <div class="field">
              <label>Adresse e-mail</label>
              <div class="ui left icon input">
                <input name="email" type="text" placeholder="E-mail">
                <i class="user icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Mot de passe</label>
              <div class="ui left icon input">
                <input name="password" type="password">
                <i class="lock icon"></i>
              </div>
            </div>
            <div class="field">
              <label>Confirmation du mot de passe</label>
              <div class="ui left icon input">
                <input name="confpassword" type="password">
                <i class="lock icon"></i>
              </div>
            </div>
            <button type="submit" class="ui custom-green submit button">S'inscrire</button>
          </div>
        </form>
      </div>
      <div class="ui vertical divider">
        OU
      </div>
      <div class="column">
        <h3>Vous possédez déjà un compte ? <br/> Connectez-vous !</h3>

        <?php echo validation_errors(); ?>
        <?php echo form_open('utilisateur/login'); ?>
        <div class="ui form">
          <div class="field">
            <label>Adresse e-mail</label>
            <div class="ui left icon input">
              <input name="email" type="text" placeholder="E-mail">
              <i class="user icon"></i>
            </div>
          </div>
          <div class="field">
            <label>Mot de passe</label>
            <div class="ui left icon input">
              <input name="password" type="password">
              <i class="lock icon"></i>
            </div>
          </div>
          <button type="submit" class="ui custom-green submit button">Se connecter</button>
        </div>
      </div>
    </div>
  </div>
</div>

