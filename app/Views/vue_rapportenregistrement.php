<br><br><br>
<?php
if ($champAjoute) { // true (1) si ajout, false (0) sinon
    echo 'Création du compte effectué.';
} else {
    echo 'Echec de la création du compte.';
}
?>
<br><br><br>
<p><a href="<?php echo site_url('accueil') ?>">Retour à l'accueil</a></p>