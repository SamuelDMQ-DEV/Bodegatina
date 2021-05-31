<table class="item_table items" id="item_table">
    <tr>
        <td>ID</td>
        <td>NOMBRE DE PRODUCTO</td>
        <td>PRECIO EN DOLAR</td>
        <td>PRECIO EN BOLIVAR SOBERANO</td>
    </tr>
<?php
require_once 'iniciar_conexion.php';

$dt_data = file_get_contents('https://s3.amazonaws.com/dolartoday/data.json');
$dt_data = utf8_encode($dt_data);
$dt_items = json_decode($dt_data, true);
$dolar_actual = $dt_items['USD']['dolartoday'];

$default = true;

if(!empty($_GET["search"])) {
	$default = false;
	$search=$_GET["search"];
	
	$result = $conexion->query("SELECT COUNT(*) as total_products FROM `items_bodegatina` WHERE `item_name` LIKE '$search%' ORDER BY `item_id`");
	$row = $result->fetch_assoc();
	$num_total_rows = $row['total_products']; 
} else {
	$result = $conexion->query('SELECT COUNT(*) as total_products FROM items_bodegatina WHERE 1');
	$row = $result->fetch_assoc();
	$num_total_rows = $row['total_products']; 
}

if(empty($_GET["page"])) {
	$page = 1;
} else {
	$default = false;
	$page = $_GET["page"];
}



if ($num_total_rows > 0) {
    $num_pages = ceil($num_total_rows / ITEMS_FOR_PAG);
	if($default) {
		$result = $conexion->query('SELECT * FROM `items_bodegatina` ORDER BY `item_id` ASC LIMIT '.ITEMS_FOR_PAG);
	} else {
		if($page > 1) {
			$result = $conexion->query("SELECT * FROM `items_bodegatina` WHERE `item_name` LIKE '$search%' ORDER BY `item_id` ASC LIMIT ".ITEMS_FOR_PAG*$page);
		} else {
			$result = $conexion->query("SELECT * FROM `items_bodegatina` WHERE `item_name` LIKE '$search%' ORDER BY `item_id` ASC LIMIT ".ITEMS_FOR_PAG);
		}
	}
    
    if ($result->num_rows > 0) {
		if($page > 1) {
			$count = 1;
			$nosequenombreponer = ( (ITEMS_FOR_PAG*$page)-5 );
			while ($row = $result->fetch_assoc()) {
				if($count <= $nosequenombreponer ) {
					$count++;
					continue;
				}
				echo '
					<tr>
						<th>'.$row['item_id'].'</th>
						<th>'.$row['item_name'].'</th>
						<th>'.$row['item_dolar'].'$</th>
						<th>'.number_format(($dolar_actual * $row['item_dolar']), 2, "," , "." ).'</th>
					</tr>            
				';
			}
		} else {
			while ($row = $result->fetch_assoc()) {
				echo '
					<tr>
						<th>'.$row['item_id'].'</th>
						<th>'.$row['item_name'].'</th>
						<th>'.$row['item_dolar'].'$</th>
						<th>'.number_format(($dolar_actual * $row['item_dolar']), 2, "," , "." ).'</th>
					</tr>            
				';
			}
		}
    }
    echo '</table>';
	
	   if ($num_pages > 1) {
        echo '<nav aria-label="Pagination">';
        echo '<ul class="pagination">';
 
        for ($i=1;$i<=$num_pages;$i++) {
            $class_active = '';
            if ($i == $page) {
                $class_active = 'active';
            }
			if($search) {
				echo '<a class="page-link '.$class_active.'" href="#" onclick="changePage('.$i.', \''.$search.'\')"><li class="page-item">'.$i.'</li></a>';
			} else {
				echo '<a class="page-link '.$class_active.'" href="#" onclick="changePage('.$i.', 0)"><li class="page-item">'.$i.'</li></a>';
			}
        }
		
        /*for ($i=1;$i<=$num_pages;$i++) {
            $class_active = '';
            if ($i == $page) {
                $class_active = 'active';
            }
            echo '<a class="page-link '.$class_active.'" href="#"><li class="page-item" data="'.$i.'" data-search=''.$search.''>'.$i.'</li></a>';
        }*/
 
        echo '</ul>';
        echo '</nav>';
    }
} else {
	echo '<p>No hay datos</p>';
}
?>  