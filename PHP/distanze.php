<?php
include "database_distanze.php";

$listapartenza = array_keys($distanze); //trova le possibili città di partenza
$listadestinazione = array();

$partenza="";
if (isset($_GET["partenza"])) {
	if (isset($distanze[ $_GET["partenza"] ])) {
		$partenza = $_GET["partenza"];
		//trova le città destinazione in base 
		//alla città di partenza specificata
	$listadestinazione = array_keys($distanze[$partenza]);
	}
}

$destinazione = "";
if (isset($_GET["destinazione"])) {
	if (isset($distanze [$partenza] [$_GET["destinazione"] ])){
		$destinazione = $_GET["destinazione"];
	}
}

$distanza = "sconosciuta";
if ($partenza != "" && $destinazione != ""){
	//le città di destinazione e di partenza sono valide
	$distanza = $distanze[$partenza][$destinazione];
}
?>

<html>
<body>
	<form method="get">

	<?php if ($partenza == "") : ?>
		Seleziona città di partenza:
		<select name="partenza">
			<?php foreach($listapartenza as $c) : ?>
				<option value = "<?php echo $c; ?>">
				<?php echo $c; ?>
				</option>
			<?php endforeach; ?>
		</select>
	<?php else : ?>
			Città di partenza: <?php echo $partenza; ?>
			<br/>
			<input type="hidden" value="<?php echo $partenza; ?>" name="partenza"></input>
	<?php endif; ?>


	<?php if ($partenza != "" && $destinazione == "") : ?>	
		Seleziona città di destinazione:
		<select name="destinazione">
			<?php foreach($listadestinazione as $c) : ?>
				<option value = "<?php echo $c; ?>">
				<?php echo $c; ?>
				</option>

			<?php endforeach; ?>
		</select>
	<?php endif; ?>
		<input type="submit" value="Next"></input>
	</form>

	La distanza tra <?php echo $partenza; ?> e <?php echo $destinazione; ?> è di <?php echo $distanza; ?> km.
</body>
</html>