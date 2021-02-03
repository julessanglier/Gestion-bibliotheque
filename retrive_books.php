<?php
  require("connect.php");

  $linker = connect();
  $sql = 'SELECT idLivre FROM livre';
  if (!$linker->query($sql))
    echo "Pb d'accès à la table livres";
  else{
    $livres = Array();
    foreach($linker->query($sql) as $row){
      $livres[] = $row;
    }

    
  }
  /*$result = $linker->query($query);
   while($row = $result->fetch()){
      echo '<tr>';
      echo '<td>' . $row['idLivre'] . '</td>';
      //echo '<td>'. $row['']
      echo '<td>Une Brève histoire du temps</td>';
      echo '<td>Stephen Hawking</td>';
      echo '<td>Champ Sciences</td>';
      echo '<td>Eyrolles</td>';
      echo '<td>Oui</td>';
      echo '</tr>';
  }*/
?>
