<table class="ui celled striped table">
  <thead>
    <tr><th colspan="3">
      Users
    </th>
  </tr></thead>
  <tbody>
        <?php foreach($utilisateur as $u) : ?>
        <tr>
                <td><?php echo $u->nom; ?></td>
                <td><?php echo $u->prenom; ?></td>
                <td><?php echo $u->email; ?></td>
                <td><?php echo $u->date_naissance; ?></td>
                <td><?php echo $u->ville; ?></td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>

<table class="ui celled striped table">
  <thead>
    <tr><th colspan="3">
      Ville Livraison
    </th>
  </tr></thead>
  <tbody>
        <?php foreach($ville_livraison as $v) : ?>
        <tr>
                <td><?php echo $v->code_postal; ?></td>
                <td><?php echo $v->ville; ?></td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>

<table class="ui celled striped table">
  <thead>
    <tr><th colspan="3">
      Ville Livraison
    </th>
  </tr></thead>
  <tbody>
        <?php foreach($famille as $f) : ?>
        <tr>
                <td><?php echo $f->denomination; ?></td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>

<table class="ui celled striped table">
  <thead>
    <tr><th colspan="3">
      Ville Livraison
    </th>
  </tr></thead>
  <tbody>
        <?php foreach($categorie as $c) : ?>
        <tr>
                <td><?php echo $c->denomination; ?></td>
        </tr>
        <?php endforeach; ?>
  </tbody>
</table>
