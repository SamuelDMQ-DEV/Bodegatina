<?php 
require_once 'inc/iniciar_conexion.php';
require_once 'inc/all_define.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME - <?php echo TITLE_FOR_PAG;?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script src="search.js"></script>
	<script src="pagination.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contenedor">
        <div class="top">
           <h1 class="title"><?php echo TITLE_FOR_PAG;?></h1>
		<hr>
        </div>
        <div class="menu">
			<form class="item_search" action="">
				<input type="text" name="search" id="search" placeholder="Buscar producto" onkeyup="showResult(this.value)">
			</form>
			<div id="menu-pagination">
			<?php include 'inc/items_pag.php';?>    
			</div>
        </div>
        <div class="spam">
            <p class="p_spam">
                Buenos días, el precio del dolar actualmente es de <?php echo number_format($dolar_actual, 2, "," , "." );?>
            </p>
        </div>
        <footer>
            <p>© copyright | <?php echo TITLE_FOR_PAG;?></p>
        </footer>
    </div>
</body>
</html>
