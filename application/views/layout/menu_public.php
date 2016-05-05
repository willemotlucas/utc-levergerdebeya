<div class="ui centered grid">
  <div class="center aligned column">
    <div class="ui menu">
        <?php foreach($familles as $famille): ?>
          <div class="ui pointing dropdown link item">
            <span class="text"><?php echo $famille->denomination ?></span>
            <i class="dropdown icon"></i>
            <div class="menu">
              <div class="header"><a href="<?php echo(base_url('index.php/famille/view/' . $famille->id)); ?>">Catégories</a></div>
              <?php foreach($famille->categories() as $categorie):
                if($categorie->produits()){
              ?>
                <div class="item">
                  <i class="dropdown icon"></i>
                  <span class="text"><a href="<?php echo(base_url('index.php/categorie/view/' . $categorie->id)); ?>"><?php echo $categorie->denomination ?></a></span>
                  <div class="menu">
                  <?php foreach($categorie->produits() as $produit):?>
                    <div class="item"><?php echo $produit->denomination ?></div>
                  <?php endforeach; ?>
                </div>
              </div>
              <?php     
                }else{
              ?>
                <div class="item"><a href="<?php echo(base_url('index.php/categorie/view/' . $categorie->id)); ?>"><?php echo $categorie->denomination ?></a></div>
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
        <a class="item">
          <i class="user icon"></i>
          Espace utilisateur
        </a>
      </div>
    </div>
  </div>
</div>

