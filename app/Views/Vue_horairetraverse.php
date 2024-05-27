<div class="row">
<div class="col-sm-3">
<table class="table table-striped">
      <?php  foreach ($secteur as $secteur):
  echo '<tr>';
  echo '<a href="' . base_url('afficherhorairetraverser/' . $secteur->nosecteur) . '">' . $secteur->nom . '</a>'.'<br>';
  echo '</tr>';
    endforeach?> 
</table>
</div>
<div class="col-sm-9"></div>

</div> 
