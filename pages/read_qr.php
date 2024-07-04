<!-- Index.html file -->
<!DOCTYPE html> 
<html lang="en"> 

<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet"
          href="styleread.css"> 
    <title>QR Code Scanner / Reader 
    </title> 
</head> 
  
<body> 
    <div class="container"> 
        <h1>Scan QR Codes</h1> 
        <div class="section"> 
            <div id="my-qr-reader"> 
            </div> 
        </div> 
    </div> 
    <script
        src="https://unpkg.com/html5-qrcode"> 
    </script> 

    <script>       
function domReady(fn) { 
	if ( 
		document.readyState === "complete" || 
		document.readyState === "interactive"
	) { 
		setTimeout(fn, 1000); 
	} else { 
		document.addEventListener("DOMContentLoaded", fn); 
	} 
} 

domReady(function () { 

	// If found you qr code 
	function onScanSuccess(decodeText, decodeResult) { 
		if(confirm("User QR identified, Mark the attendance? USER ID : " + decodeText, decodeResult)==true){
            var url= "http://localhost/QR/test/pages/user.php?decodeText="+decodeText; 
            window.location = url;
        }else{
            alert("KFJ");
        }
	} 

	let htmlscanner = new Html5QrcodeScanner( 
		"my-qr-reader", 
		{ fps: 10, qrbos: 250 } 
	); 
	htmlscanner.render(onScanSuccess); 
});

    </script> 
</body> 
  
</html>