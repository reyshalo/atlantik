<h2><?php echo $TitreDeLaPage ?></h2>
<?php
if ($TitreDeLaPage == 'Saisie champ incorrecte')
  echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation
echo form_open('enregistrer') // ajouterproduit = entrée route vers Administrateur:ajouterProduit (!!)

?>


<?php echo csrf_field(); ?>


<label for="txtnom">Nom :</label>
<input type="input" name="txtnom" value="<?php echo set_value('txtnom'); ?>" /><br />

<label for="txtprenom">prenom :</label>
<input type="input" name="txtprenom" value="<?php echo set_value('txtprenom'); ?>" /><br />

<label for="txtadresse">adresse :</label>
<input type="input" name="txtadresse" value="<?php echo set_value('txtadresse'); ?>" /><br />

<label for="txtcp">code postal :</label>
<input type="input" name="txtcp" value="<?php echo set_value('txtcp'); ?>" /><br />

<label for="txtville">Ville :</label>
<input type="input" name="txtville" value="<?php echo set_value('txtville'); ?>" /><br />

<label for="txttelfixe">téléphone fixe:</label>
<input type="input" name="txttelfixe" value="<?php echo set_value('txttelfixe'); ?>" /><br />

<label for="txttelport">téléphone portable :</label>
<input type="input" name="txttelport" value="<?php echo set_value('txttelport'); ?>" /><br />

<label for="txtmel">mel :</label>
<input type="input" name="txtmel" value="<?php echo set_value('txtmel'); ?>" /><br />

<label for="txtmdp">mot de passe :</label>
<input type="password" name="txtmdp" value="<?php echo set_value('txtmdp'); ?>" /><br />

<input type="submit" name="submit" value="s'enregistrer" />

<?php echo form_close(); ?>
