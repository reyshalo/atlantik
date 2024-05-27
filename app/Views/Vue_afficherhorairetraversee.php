<div class="row">
    <div class="col-sm-3">
        <table class="table table-striped">
            <?php foreach ($secteur as $secteur_item): ?>
                <tr>
                    <td>
                        <a href="<?= base_url('afficherhorairetraverser/' . $secteur_item->nosecteur) ?>">
                            <?= $secteur_item->nom ?>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
    <div class="col-sm-9">

        <?php if (isset($lesliaison) && !empty($lesliaison)): ?>
            <form action="<?= base_url('afficherhorairetraverser/' . $sect) ?>" method="post">
                <!-- Champ caché pour conserver le secteur -->
                <input type="hidden" name="secteur" value="<?= $sect ?>">
                
                <!-- Liste Déroulante Dynamique -->
                <div class="mb-2">
                    <select class="form-select" id="liaisonSelect" name="liaison" required>
                        <option value="">Choisir liaison</option>
                        <?php foreach ($lesliaison as $liaison_item): ?>
                            <option value="<?= $liaison_item->noliaison ?>">
                                <?= $liaison_item->nom_port_depart . ' - ' . $liaison_item->nom_port_arrivee ?>
                            </option>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="mb-4">
                    <input type="date" class="form-control" id="dateInput" name="date" required>
                </div>
                <button type="submit" class="btn btn-primary">Chercher</button>
            </form>
        <?php else: ?>
            <p>chossissez un secteur pour voir les liasion associé.</p>
        <?php endif; ?>
    </div>
</div>

<?php 
if (isset($date)&& !empty($date)):
    echo '<pre>';
    var_dump($date);
    var_dump($liason);
    echo '</pre>';
     endif; 
?>

<br>

<?php if (isset($horaire) && !empty($horaire)): ?>
    <table class="table table-bordered">
            <tr>
                <td>N° Traversée</td>
                <td>Heure Départ</td>
                <td>Nom</td>
                <td>Lettre Catégorie</td>
                <td>Libellé</td>
                <td>Quantité Réservée</td>
            </tr>
            <?php foreach ($horaire as $horaire_item): ?>
                <tr>
                    <td><?= $horaire_item->notraversee ?></td>
                    <td><?= $horaire_item->heure_depart ?></td>
                    <td><?= $horaire_item->nom ?></td>
                    <td><?= $horaire_item->LETTRECATEGORIE ?></td>
                    <td><?= $horaire_item->libelle ?></td>
                    <td><?= $horaire_item->quantite_reservee ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
<?php endif; ?>