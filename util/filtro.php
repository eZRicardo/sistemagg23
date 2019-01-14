<?php 

function gerarFiltro($arrayFiltros){
	include 'connection.php';

	$size = sizeof($arrayFiltros);
	$rowspan = (int) ($size / 3);
	
	if(($size % 3) != 0){
		$rowspan++;
	}

	echo "<form method='get'>";
	echo "<table id='tabelafiltro' class='table'>";
	echo "<tr>";
	echo "<td style='vertical-align: middle;' rowspan='".$rowspan."'>";
	echo "Filtros";
	echo "</td>";
	$count = 0;
	foreach ($arrayFiltros as $index => $filtro) {
		$filtrolower = strtolower($filtro);
		if($count == 3){
			echo "</tr>";
			echo "<tr>";
			$count = 0;
		}
		echo "<td>";
		echo "$filtro: <select name='$filtrolower' id='filtro$filtro'>";
		echo "<option value=''></option>";
		$sql = "SELECT id, nome FROM $filtrolower";
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			$selected = "";
			if($row['id'] == $_GET[$filtrolower]){
				$selected = "selected";
			}
			echo "<option value='$row[id]' $selected>$row[nome]</option>";
		}
		echo "</select>";
		echo "</td>";
		$count++;
	}
	echo "<td><input class='btn btn-warning' value='Filtrar' type='submit' /></td>";
	echo "</tr>";
	echo "</table>";
	echo "</form>";
}
?>