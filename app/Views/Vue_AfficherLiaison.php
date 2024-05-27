<h2><?php echo $TitrePage ?></h2>
<?php 

echo '<table class="table-bordered">';
echo '<td rowspan="2">';
echo "secteur";
echo '<td>';
echo "liaison";
echo '<tr>';
echo '<td>';
echo " Code liaison";
echo '<td>';
echo " distance en milles marin";
echo '</td>';
echo '<td>';
echo "Port de départ";
echo '</td>';
echo '<td>';
echo "Port d'arriver";
echo '</td>';
echo '</tr>';


echo '</tr>';
    foreach ($liaison as $liaison) :
    echo '<tr>';
    echo '<td>';
    echo $liaison->nom_secteur; 
    echo '</td>';
    echo '<td>';
    echo '<a href="' . base_url('tarifliaison/' . $liaison->codeliaison) . '">' . $liaison->codeliaison . '</a>';
    
    echo '</td>';
    echo '<td>';
    echo $liaison->distance; 
    echo '</td>';
    echo '<td>';
    echo $liaison->nom_port_depart; 
    echo '</td>';
    echo '<td>';
    echo $liaison->nom_port_arrivee; 
    echo '</td>';
    echo '</tr>';
    

endforeach ?>
<?php 
echo '</table>';
?>
<a href="<?php echo site_url('accueil') ?>">Retour à l'accueil</a>
<p>Pour afficher les tarifs des liaisons cliquer sur le code des liaisons</p>