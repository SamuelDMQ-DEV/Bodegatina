<?php 
require_once 'inc/iniciar_conexion.php';
require_once 'inc/all_define.php';
//require_once 'inc/dolar_today.php';  
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
            <!--<div class="menu">
			<?php 
                for($i = 0; $i <sizeof($menu); $i++) {
                    echo '<a onclick="DisplayOption('.($i+1).','.sizeof($menu).')">'.$menu[$i].'</a>';
                }
             ?>
            </div>-->
        </div>
        <div class="menu">
			<form class="item_search" action="">
				<input type="text" name="search" id="search" placeholder="Buscar producto" onkeyup="showResult(this.value)">
			</form>
			<div id="menu-pagination">
			<?php include 'inc/items_pag.php';?>    
            <!--<div id="option_1">
            </div>-->
            <!--<div id="option_2">
                <h1>hola 2</h1>                
            </div>
            <div id="option_3">
                <h1>hola 3</h1>                
            </div>-->
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
    <script type="text/javascript">
        /*function DisplayOption(id, max_size) {
            var name_id;
            var x;
            for (var i = 0; i <max_size; i++) {
                var real_id = i+1;
                if (id != real_id) {
                    name_id = 'option_' + real_id;
                    x = document.getElementById(name_id);
                    if (x.style.display !== "none") x.style.display = "none";
                }
            }
            name_id = 'option_' + id;
            x = document.getElementById(name_id);
            x.style.display = "block";
        }*/
        /*$(document).ready(function() {	
            $('.pagination a').on('click', function(){
                $('.items').html('<div class="loading"><img src="https://acegif.com/wp-content/uploads/loading-25.gif" width="70px" height="70px"/><br/>Un momento por favor...</div>');

                var page = $(this).attr('data');		
                var dataString = 'page='+page;
                
                $.ajax({
                    type: "GET",
                    url: "inc/ajax.php",
                    data: dataString,
                    success: function(data) {
                        $('.items').fadeIn(2000).html(data);
                        $('.pagination a').removeClass('active');
                        $('.pagination a[data="'+page+'"]').addClass('active');
                    }
                });
                return false;
            });              
        });*/  
    </script>
</body>
</html>