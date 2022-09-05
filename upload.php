<?php
// Image Upload
$Rand = substr(md5(microtime()),rand(0,26),5);
	$dir = "i/i/";
	$target = $dir.time().basename($_FILES['image']['name']);
	$fname = basename($_FILES['image']['name']);
	$u = 1;
	$imagefiletype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
	// Check if image
	$check = getimagesize($_FILES['image']['tmp_name']);
	if($check != false){
		echo "file is image";
		$u = 1;
	}else{
		echo "file is not image";
		$u = 0;
	}
	// Check file size
	if($_FILES["image"]["size"] > 33554432){
		echo "file is too large";
		$u = 0;
	}else{
		echo "file good to go";
		$u = 1;
	}
	// Check if file already exists
	if (file_exists($target)) {
  	echo "Sorry, file already exists.";
  	$u = 0;
	} 
	if ($u = 0){
		header("location:index.php");
	}
	else{
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)){
			echo "Succesfully Uploaded Files";
		}
		else{
			echo "Failed to Upload Files";
            die();
		}
	}

// Image Upload
?>
<?php 
// File Content
$content = 
"

<!DOCTYPE html>
<html>
<head>
	<!-- Favicon -->
<link rel='apple-touch-icon' sizes='180x180' href='../image/apple-touch-icon.png'>
<link rel='icon' type='image/png' sizes='32x32' href='../image/favicon-32x32.png'>
<link rel='icon' type='image/png' sizes='16x16' href='../image/favicon-16x16.png'>
<link rel='manifest' href='image/site.webmanifest'>
	<!-- Favicon -->

	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' href='../css/main.css'>
	<title>Img Base - <?php echo '".$fname."' ?></title>
<meta property='og:title' content='Img Base - <?php echo '".$fname."' ?>' />
<meta property='og:type' content='website' />
<meta property='og:url' content='https://www.imgbase.xyz/<?php echo '".$Rand."'.'.php' ?>' />
<meta property='og:image' content='https://www.imgbase.xyz/<?php echo '".$target."' ?>' />
<meta property='og:image:secure_url' content='https://www.imgbase.xyz/<?php echo '".$target."' ?>' />
<meta property='twitter:image:src' content='https://www.imgbase.xyz/<?php echo '".$target."' ?>' />
<meta property='og:image:width' content='400' />
<meta property='og:image:height' content='300' />

</head>
<body>
<!-- Include navbar-->
	<?php include '../navbar.html';?>
<!-- Include navbar-->
<div class='c'>
<img src='<?php echo '../'.'".$target."'; ?>' onclick='openimg()' class='i'>
<br>
<textarea readonly class='t' onclick='copyLink()'> <?php echo 'https://imgbase.xyz/i/'.'".$Rand."'.'.php' ?></textarea>

<br>
<code><strong class='bracket'>&lt;</strong><strong class='code'>img</strong><strong class='purple'> src=</strong><strong class='green'>'https://imgbase.xyz/<?php echo '".$target."' ?>'</strong><strong class='bracket'>&gt;</strong></code>

<button class='cop' id='copylink' onclick='copyLink()'>Copy Link</button>
<button onclick='home()'>Upload An Image</button>
</div>
<!-- Copy Link -->
<script type='text/javascript'>
	function copyLink(){
		   document.getElementById('copylink').innerHTML = 'Copied !';
		   		var link = 'https://imgbase.xyz/'+'i/'+'".$Rand."'+'.php';
   navigator.clipboard.writeText(link);
	}
</script>
<!-- Copy Link -->
<!-- Open Img -->
<script type='text/javascript'>
	function openimg(){

		window.open('<?php echo '../'.'".$target."' ?>','_self');
	}
</script>
<!-- Open Img -->
<script type='text/javascript'>
	function home(){
		window.open('https://imgbase.xyz/','_self');
	}
</script>

</body>
</html>

";
?>
<?php 
// File Upload

$file = fopen("i/".$Rand.".php", "w") or die("Unable to open file!");

fwrite($file, $content);
fclose($file);

header("location:i/".$Rand.".php");
?>