function showResult(str) {
	let xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {	
		if (this.readyState==4 && this.status==200) {
			document.getElementById("menu-pagination").innerHTML="";
			document.getElementById("menu-pagination").innerHTML=this.responseText;
		}
	}
	if (str.length==0) {
		xmlhttp.open("GET","inc/items_pag.php", true);
		
	} else {
		xmlhttp.open("GET","inc/items_pag.php?search="+str,true);
	}
	xmlhttp.send();
}