/*window.onload = function() {
	let anchors = document.getElementsByClassName('page-item');
	for(let i = 0; i < anchors.length; i++) {
		let anchor = anchors[i];
		let page, search;
		anchor.onclick = function() {
			let requesthttp = new XMLHttpRequest();
			page = anchor.getAttribute("data");
			search = anchor.getAttribute("data-search");
			
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
	}
}*/

/*let anchors = document.getElementsByClassName('page-item');
for(let i = 0; i < anchors.length; i++) {
	let anchor = anchors[i];
	let page, search;
	anchor.onclick = function() {
		let requesthttp = new XMLHttpRequest();
		page = anchor.getAttribute("data");
		search = anchor.getAttribute("data-search");
		
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
}*/

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