<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "download_photos";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

function getImages(){
	$sql = "SELECT * FROM cars";
	$result = $GLOBALS['conn']->query($sql);
	while($row = mysqli_fetch_assoc($result)) {
		
		$row = array(
			// data from theme
			'id'		=> $row['id'],
			'photoName'		=> $row['photoName'],
			'photoThumb'	=> $row['photoThumb'],
			'photoURL'	=> $row['photoURL'],
		);
				$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
	}  
		
	echo  json_encode($data);

}
function imgSearch($photoName)
{
	
	$sql = "SELECT * FROM cars WHERE photoName LIKE '%".$photoName."%'";
	$result = $GLOBALS['conn']->query($sql);
	while($row = mysqli_fetch_assoc($result)) {
		
		$row = array(
			// data from theme
			'id'		=> $row['id'],
			'photoName'		=> $row['photoName'],
			'photoThumb'	=> $row['photoThumb'],
			'photoURL'	=> $row['photoURL'],
		);
				$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
	}  
		
	
	echo  json_encode($data);
	
	
}
if ($_POST['action']=='getImages') {
	getImages();
}
else if($_POST['action']=="getImagesSearch")
{
	imgSearch($_POST['photoName']);
}



?>