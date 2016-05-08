var xmlhttp;

function makeCall() {
	xmlhttp = new XMLHttpRequest();

	id = document.getElementById('id').value;
	password = document.getElementById('password').value;

	console.log(id + " " + password);

	xmlhttp.onreadystatechange = CheckPassID;
	xmlhttp.open("GET", "index.php?id="+id+"&password="+password ,true);
	xmlhttp.send();
	//alert("in makeCall");
	//document.write("<h2 style='color : red' class='text-center'>in makeCall</h2>");
}


function CheckPassID() {
	if(xmlhttp.readyState == 4|| xmlhttp.status == 200){
		document.getElementById('error').innerHTML = xmlhttp.responseText;
}
}


// check if the value of the id and password is not empty
function CheckifEMpty() {

	id = document.getElementById('id').value;
	password = document.getElementById('password').value;
	console.log(id);
	console.log(password);

	if(id =='' || id.length === 0){
		document.getElementById('error').innerHTML = 'Please don\'t let anything empyt';
		return false;
	}else{
		return true;
	}
}

function AddTocart(AddTocart) {
	var ProductID = AddTocart.value;
	console.log(ProductID);

	var products = new Array();

	setCookie("ProductID", ProductID, 365);
	var id=getCookie("ProductID");
	console.log(id);

}

function showCart() {
	var ProductID=getCookie("ProductID");
	document.getElementById('cartItem').innerHTML = ProductID;

}


