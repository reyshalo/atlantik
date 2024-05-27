<div class="row">
<div class="col-sm-3">
<table class="table table-striped">
      <?php  foreach ($secteur as $secteur):
  echo '<tr>';
  echo '<a href="' . base_url('horairetraverser/' . $secteur->nosecteur) . '">' . $secteur->nom . '</a>'.'<br>';
  echo '</tr>';
    endforeach?> 
</table>
</div>

<div class="col-sm-9">
        <form action="<?= base_url('afficherhorairetraverser') ?>" method="post">
            <!-- Liste Déroulante Dynamique -->
            <div class="mb-2">
                <select class="form-select" id="liaisonSelect" name="liaison" required>
                    <option value="">Choisir liaison</option>
                    <?php foreach ($liaison as $liaison_item): ?>
                        <option value="<?= $liaison_item->noliaison ?>">
                            <?= $liaison_item->nom_port_depart . ' - ' . $liaison_item->nom_port_arrivee ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-4">
                <input type="date" class="form-control" id="dateInput" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">chercher</button>
        </form>
  </div>
 
