var xmlhttp;

function ShowAddProduct() {
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = showResult;
	xmlhttp.open("GET", "addProduct.php" ,true);
	xmlhttp.send();
}


function ShowProducts() {
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = showResult;
	// var url = "RestController.php?view=all&output=html";
	//var url = "RestController.php?view=all&output=json";
	var url = "RestController.php?view=all&output=xml";
	console.log(url);
	xmlhttp.open("GET",url ,true);
	xmlhttp.send();
}

function showProduct() {
	var ProductID = document.getElementById("poductID").value;
	console.log("the product number is : "+ProductID);
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = showResult;
	//var url = "RestController.php?view=single&id=p$"+ProductID+"";
	var url = "RestController.php?view=single&id=p$"+ProductID+"&output=json";
	//var url = "RestController.php?view=single&id=p$"+ProductID+"&output=xml";
	console.log(url);
	xmlhttp.open("GET", url ,true);
	xmlhttp.send();
}

function showResult() {
	if(xmlhttp.readyState == 4|| xmlhttp.status == 200){
		console.log(xmlhttp.responseText);
		document.getElementById('result').innerHTML = xmlhttp.responseText;
	}
}