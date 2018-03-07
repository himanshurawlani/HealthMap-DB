<?php

	$table = $_SESSION["selected_table"];
	$connec		= $_SESSION["conn"];
				$values 	= "SELECT * FROM '$table'";
				$counter	= "SELECT COUNT(*) FROM '$table'";
				$p_counter	= oci_parse($connec,$counter);
				$p_values	= oci_parse($connec,$values);
				oci_execute($p_values);
				oci_execute($p_counter);
				$cols = oci_num_fields($p_values);
				echo '<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white"><tbody>';
				while(($row = oci_fetch_array($p_values))!=false)
				{
					echo '<tr>';
					for($i=0;$i<$cols;$i++)
					{
						echo '<td>'.$row[$i].'</td>';
					}
					echo '</tr>';
				}
				echo '</tbody></table>';
?>