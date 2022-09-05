<!DOCTYPE html>
<html>
<head>
		<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="image/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
<link rel="manifest" href="image/site.webmanifest">
	<!-- Favicon -->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload An Image - Img Base</title>
    <meta name="description" content="Img Base is a Image Upload & Share Website. Upload your images and share it trough the link that created for each image.Free & Fast Upload. ">
    <meta name="robots" content="index">
</head>
<body>

<!-- Include navbar-->
	<?php include 'navbar.html';?>
<!-- Include navbar-->
<form enctype="multipart/form-data" action="upload.php" method="POST" class="main-form" id="formsu">
	<div class="main" id="container">
	<input type="file" name="image" id="imagei" accept="image/*">
	<img src="image/upload.png" class="main-image" alt="Upload An Image - Img Base">
	<h2>Drag & Drop Images Here <br>Or Click To Browse</h2>
	</div>

    	<div class="more">
<div class="row-info">
<div class="row-info-left">
		<h1>Why <strong class="bracket">&lt;</strong><strong class="code">img base</strong><strong class="bracket">&gt;</strong> ?</h1>
		<p>Img Base is an Ad Free , developer friendly , anonymous image upload platform .<br>Uploaded images will be stored and will be never deleted .</p>
	</div>
    <div class="row-info-right">
<h1>Dev Friendly ?</h1>
<p>Every image link has an speacial code block that provides you the <strong class="bracket">&lt;</strong><strong class="code">img</strong><strong class="bracket">&gt;</strong> code for that image .<br>This way you can save time from uploading an image to your project and directly upload & copy from here.</p>

<code><strong class="bracket">&lt;</strong><strong class="code">img</strong>
 <strong class="purple">src=</strong><strong class="green">'https://imgbase.xyz/i/i/ [Img] '</strong><strong class="bracket">&gt;</strong></code>
		</div>
        </div>
        </div>
</form>



<script type="text/javascript">
var dropZone = document.getElementById("container");
var imginput = document.getElementById("imagei");
var forms = document.getElementById("formsu");
imginput.style.display = "none";
dropZone.addEventListener("drop", function(event) {
		event.preventDefault();
		var imagetype = ['image/webp','image/svg+xml','image/png','image/jpeg','image/gif','image/avif','image/apng'];
		var filetype = event.dataTransfer.files[0].type;
		if(imagetype.includes(filetype)){
		imginput.files = event.dataTransfer.files;
		const timeout = setTimeout(sendForm, 100);
		}
		else{
			alert("The file that you tried to upload is not an image. Please upload an image.");
		}
	});
dropZone.ondragover = function(e){
	e.preventDefault();
}
dropZone.ondragend = function(e){
		e.preventDefault();
}
dropZone.onclick = function(e){
	imginput.click();
}
imginput.onchange = function(e){
	const timeout = setTimeout(sendForm, 100);
}
function sendForm(){
	formsu.submit();
}
</script>
</body>
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Image",
  "headline" : "Upload An Image - ImgBase",
  "author" : {
    "@type" : "Person",
    "name" : "ImgBase"
  },
  "datePublished" : "2022-02-19",
  "image" : "https://imgbase.xyz/image/upload.png"
}
</script>
</html>

