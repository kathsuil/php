<?php include('header.php')?>
<section>

<?php
  $la_url = $_GET['url'];
  $json = file_get_contents($la_url);
  $datos = json_decode($json,true);
?>

<h3>PHP+GeoJSON:</h3>

<p>En esta página vemos el detalle de <strong><?php print($datos['properties']['place']);?></strong></p>
<p>La magnitud fue:<strong> <?php echo round($datos["properties"]["mag"],2);?> </strong></p>
<p>Registrado el:<strong> <?php echo($datos["properties"]["products"]["dyfi"][0]["properties"]["eventtime"]);?> </strong></p>
<p>Fue clasificado como:<strong> <?php echo ($datos["properties"]["type"]);?> </strong></p>
</section>
<?php if ($datos["properties"]["alert"] == "yellow"){?>
  <div class="alert alert-warning"><strong>ALERTA AMARILLA</strong></div>
<?php } elseif ($datos["properties"]["alert"] == "green"){?>
<div class="alert alert-success"><strong>ALERTA VERDE</strong></div>
<?php } else {?>
<div class="alert alert-info"><strong>SIN ALERTA</strong></div>
<? } ?>

<?php include('footer.php');?>
