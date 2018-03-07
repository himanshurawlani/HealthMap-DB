<?php

	session_start();
	$table = $_SESSION["selected_table"];
	$connec		= $_SESSION["conn"];
				$values 	= "SELECT * FROM '$table'";
				$p_values	= oci_parse($connec,$values);
				oci_execute($p_values);
				$cols = oci_num_fields($p_values);
				echo '<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white"><tbody>';
				echo '<form class="w3-container w3-card-4">';
				while(($row = oci_fetch_array($p_values))!=false)
				{
					echo '<tr>';
					echo '<td><input class="w3-check" type="checkbox">';
					for($i=0;$i<$cols;$i++)
					{
						echo $row[$i];
					}
					echo '</td>';
					echo '</tr>';
				}
				echo '</form>';
				echo '</tbody></table>';
?>