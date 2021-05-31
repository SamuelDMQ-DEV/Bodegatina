function changePage(page, search) {
	let requesthttp = new XMLHttpRequest();	
	
	document.getElementById("item_table").innerHTML = `<div class="loading"><img src="https://acegif.com/wp-content/uploads/loading-25.gif" width="70px" height="70px"/><br/>Un momento por favor...</div>`
	
	if(search) {
		requesthttp.open("GET","inc/items_pag.php?page="+page+"&search="+search,true);
	} else {
		requesthttp.open("GET","inc/items_pag.php?page="+page,true);
	}
	requesthttp.send();
	
	requesthttp.onreadystatechange = function() {
		if (this.readyState==4 && this.status==200) {
			document.getElementById("menu-pagination").innerHTML = "";
			document.getElementById("menu-pagination").innerHTML=this.responseText;
		}
	}
}
