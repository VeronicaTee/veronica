<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		
		<link rel="stylesheet" href="Veronica.css" />
		
        <title>Veronica EMIOLA</title>
    </head>

<script>
		function openContactForm() {
			document.getElementById("contact_me").style.display = "block";
		}
		function verification(){
	var name = document.forms["formName"]["YourName"];                 
    var phone = document.forms["formName"]["YourPhone"];  
    var message =  document.forms["formName"]["YourMessage"];
	var error = document.getElementById("msgText");
var nameV= name.value;
var phoneV= phone.value;	
	
	if (nameV.length <4)                                 
    { 
        //window.alert("Please enter your name at least 4 characters"); 
		error.innerHTML = " Please enter your name at least 4 characters ";
		error.style.color="red";
		//error.style.font-size="25";
        name.focus(); 
        return false;
    } 
	if (isNaN(phoneV) )                                 
    { 
        //window.alert("Please enter good phone number ");
		error.innerHTML = " Please enter good phone number  ";
		error.style.color="red";
		//error.style.font-size="25";
        phone.focus(); 
        return false;
	}
	if(phoneV.length <11){
        //window.alert("Please enter good phone number ");
		error.innerHTML = " Please enter good phone number  ";
		error.style.color="red";
		//error.style.font-size="25";
        phone.focus(); 
        return false;
    } 
    if (message.value.length <20)                                 
    { 
        //window.alert("Please your message is too short");
		error.innerHTML = " Please your message is too short  ";
		error.style.color="red";
		//error.style.font-size="25";
        message.focus(); 
        return false;
    }
	return true; 
	}
	</script>

    <body>
	
	
	<?php


// define variables and set to empty values
$positive_Message = $negative_Message = "";
$name = $email = $phone = $message = $title = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  if (empty($_POST["name"])) {
    //$negative_Message = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $negative_Message = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    //$negative_Message = "email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $negative_Message = "Invalid email format";
    }
  }
  
  if (empty($_POST["phone"])) {
    //$negative_Message = "Phone number is required";
  } else {
    $phone = $_POST["phone"];
    // check if e-mail address is well-formed
  }
  
  if (empty($_POST["title"])) {
    //$negative_Message = "Name is required";
  } else {
    $title = test_input($_POST["title"]);
    // check if name only contains letters and whitespace
  }

  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
$UserInfo = "User Information Name : " . $name . ", E-mail : ". $email . ", Phone : ". $phone . ", Msg Object : ".
 $title . ", Message : " . $message;
writeData($UserInfo);


$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $er = "This File is not support.";
		$negative_Message = $er;
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $negative_Message = "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $er = "Sorry, your file is too large.";
	$negative_Message = $er;
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "pdf" ) {
    $er = "Sorry, only JPG, JPEG, PNG, GIF & pdf files are allowed.";
	$negative_Message = $er;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $negative_Message = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$positive_Message = " Your message was send succesfully";
    } else {
        $negative_Message= "Sorry, there was an error uploading your file.";
    }
}

}

function writeData($infoUser){
	$d = $infoUser;
$file = fopen("Datafile.txt", "w") or die("Unable to open file!");
fwrite($file, $d);
fclose($file);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function upload(){
	
}
	
?>
	
	
	<div id="head">
		<div id="name">
			 <h1> EMIOLA VERONICA TOMILOLA </h1>
			<a id="image" href=" https://res.cloudinary.com/vtomilola/image/upload/v1566942482/samples/IMG_20190814_112259_ubl3ra.jpg"> 
				<img src="avar.jpg" style="width:50px"/> </a>
		</div>
		
		<div id="contact">
			<div id="address">
			  <p>	Address: House 19, Road 23, Obafemi Awolowo University Senior Staff Quarters, Ile-Ife, Osun State </p>
			</div>
			<div id="email">
			  <p>	Email: vtomilola@gmail.com Telephone: +2348053726116 </p>
			</div>
		</div>
		<span class="error"> <?php  echo $positive_Message ; echo $negative_Message ?></span> 
		
	</div>

	<div id="body">
		<div id="prof">
			<p> <h2 class="section_name">PROFFESSIONAL SUMMARY </h2> </p>
			<p class="pro"> An Estate Surveyor and Valuer, and an Economist, with the ability to work in a diverse multicultural environment,
				a zeal to learn more, and a drive to make an impact and offer expert knowledge and skills to the best of my ability,
				for the benefit of my team and my organization. 
			</p>
		</div>
		
		<div id="comp">
			<h2 class="section_name">COMPETENCE AND SKILLS</h2> 
			<ul>
				<li> HTML (Proficient)
				<li> CSS (Proficient)
				<li> Software Usage: Slack, GitHub, Pivotal Tracker, Cloudinary, Microsoft Word,
				 Power Point, Microsoft Excel, Online research skills. </li>
				<li> Experience in Real Estate, Property Management, and Property Valuation. </li>
				<li> Knowledge of land policies, principles of property valuation, asset valuation,
				 advanced valuation, plant and machinery valuation </li>
				<li> Knowledge of relevant laws (including law of torts, law of contract, arbitration and awards, land law). </li>
				<li> Knowledge of building construction and materials, building maintenance,management of building projects, 
				 building services and equipment, project planning and control. </li>
				<li> Knowledge of principles of Economics, microeconomic and macroeconomic theories.</li>
				<li> Knowledge of Environmental Impact Assessment </li>
				<li> Research </li>
			</ul>
		</div>

	
		
		<div id="edu">		
			<h2 class="section_name" > EDUCATION </h2>
			<h3 class="section_name_2"> Post Graduate Diploma in Economics - Obafemi Awolowo University, Ile-Ife, Nigeria (April 2018 - March 2019) </h3>
			<p> Background, foundation and understanding of courses such as Microeconomic Theory, Macroeconomic Theory, Basic Econometrics, Mathematical Economics,
			Banking and Financial Institutions, History of Economic Thought, Statistical Economics, Structure of An Economy, Managerial Economics, Research in Economics, Research and Long Essay on Fiscal Regimes in the Extractive Industry </p>

			<h3 class="section_name_2"> Bachelor of Science, Estate Management - Obafemi Awolowo University, Ile-Ife, Nigeria (Oct 2006 – March 2014) </h3>
			<p>	Background, foundation and understanding of courses such as land policies, principles of property valuation, asset valuation, advanced valuation, plant and machinery
			valuation, Rating and Taxation, principles of town and country planning, Environmental Impact Assessment, building construction and materials, building maintenance,
			management of building projects, building services and equipment, project planning and control, introduction to programming, principles of Economics, microeconomic and
			macroeconomic theories, Full participation in Students Industrial Work Experience Scheme, Long dissertation writing on Staff Housing Maintenance </p>
		</div>
		
		<div id="hobbies">
			<h2 class="section_name"> Hobbies </h2>
			<p> Music, Reading, Travelling, and acquiring new knowledge. </p>
		</div><br>
		
		<button id="btn_contact" type="button" onclick="openContactForm()"> Contact Me </button>
	</div>
	
</body>
</html>
