<?php header("Content-type: text/xml"); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'?>

<?php echo("<markers>"); ?>
<?php echo("<marker>lat="). $data->lat . " lng=".$data->lng; ?>
<?php echo("</markers>"); ?>

/*<?php
  header("Content-type: text/xml");
  echo '<?xml version="1.0" encoding="UTF-8"?>';
  
echo "<markers>". "\n";
  foreach ( $model->isearch()->getData() as $marker)
  {
   echo "<marker>lat='", $marker->lat, "' lng='", $marker->lng, "'</marker>". "\n";
 }
  echo "</markers>";
?>*/