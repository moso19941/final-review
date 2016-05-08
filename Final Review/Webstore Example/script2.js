var xmlHttp = getXMLHTTPRequest();
// alert("inside script 2");
// console.log("inside script 2");
function getXMLHTTPRequest(){
	var xmlHttp;

	if (window.ActiveXObject){
		try{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlHttp=false;
		}
	}else {try{
		xmlHttp=new XMLHttpRequest();
		//alert("create http");
	}catch(e){
		xmlHttp=false;
	}
	}
	if (!xmlHttp){
		alert("cannot create xmlHttp object");
	}else{
		return xmlHttp;
	}
}


function process(){
alert("inside process");
	/*
	 * readyState	Holds the status of the XMLHttpRequest. Changes from 0 to 4: 
		0: request not initialized 
		1: server connection established
		2: request received 
		3: processing request 
		4: request finished and response is ready
	 * 
	 */
	//if the server is not busy and ready to communicate
	if (xmlHttp.readyState ==0 || xmlHttp.readyState ==4){
		//echo "<p>if</p>";
		var keyword = document.getElementById("keyword").value;

		// console.log(keyword);
		var url = "getResult.php?keyword="+keyword;
		// console.log(url);

		xmlHttp.open("GET", url, true);
		xmlHttp.onreadystatechange= ServerResponseCallback;
		xmlHttp.send(null);
	}else { //if the server is busy with a communication
		setTimeout('process()', 100);
	}

}


function ServerResponseCallback(){
	
	if (xmlHttp.readyState==4){
		if (xmlHttp.status==200){
			//FOR XML ****
			// var xmlResponse = xmlHttp.responseXML;
			// var xmlDocumentElement = xmlResponse.documentElement;
			// var message = xmlDocumentElement.firstChild.data;
			// document.getElementById("search_result").innerHTML = '<span style="color:blue;">'+message+'</span>';
			// setTimeout('process()', 2000);

			// FOR JSON
			var myArr = xmlHttp.responseText;
			console.log(myArr);
			document.getElementById("result").innerHTML = myArr;
		//	setTimeout('process()', 100);

		}
	}else{
		//alert("Something went wrong!");
	}
	
}

function showResult() {
		var keyword = document.getElementById("keyword").value;

		// console.log(keyword);
		var url = "getResult.php?keyword="+keyword;
		// console.log(url);

		xmlHttp.open("GET", url, true);
		xmlHttp.onreadystatechange= ServerResponseCallback;
		xmlHttp.send(null);
}