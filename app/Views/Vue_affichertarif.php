<?php foreach ($liaison as $liaison): ?>
    <h2><?php echo $TitrePage."\t". $liaison->nom_port_depart."-".$liaison->nom_port_arrivee; ?></h2>
<?php endforeach;

/*echo '<table class="table-bordered">';
echo '<td rowspan="2">';
echo "categorie";
echo '</td>';
echo '<td rowspan="2">';
echo "Type";
echo '</td>';
echo '<td>';
echo " période";
echo '</td>';
echo '<tr>';?>
<?php foreach ($tarifs as $tarifs): 
    echo '<td>';
    echo $tarifs->datedebut .'<br>'. $tarifs->datefin;
    echo '</td>';

endforeach;?>
<?php
echo '</tr>';
echo '<td rowspan="3">';
echo $tarifs->lettrecategorie .'<br>'. $tarifs->libellecategorie;
echo '</td>';
foreach ($categorie as $typecategorie):
   echo '<tr>'; 
foreach ($type as $typeItem): 

    echo '<td>';
         echo $typeItem->notype . $typeItem->lettrecategorie . '-' . $typeItem->libelletype; 
         echo '</td>';

     foreach ($cout as $coutItem): 
        echo '<td>';
             echo $coutItem->tarif; 
             echo '</td>';
     endforeach; 
   
endforeach; 
echo '</tr>';
endforeach;?>


<?php echo '</table>';?> */
?><table class="table-bordered"><?php
    foreach ($tarifs as $tarifs): 
        echo '<tr>';
        echo '<td>';
        echo $tarifs->lettrecategorie ."\t". $tarifs->libellecategorie;
        echo '</td>';
        echo '<td>';
        echo $tarifs->lettrecategorie."\t". $tarifs->notype."\t". $tarifs->libelletype;
        echo '</td>';
        echo '<td>';
        echo $tarifs->datedebut ."\t". $tarifs->datefin;
        echo '</td>';
        echo '<td>';
        echo $tarifs->tarif;
        echo '</td>';
        echo '</tr>';
    endforeach;
    echo anchor('tarifliaison','Retour à la liste des liaisons');
?>