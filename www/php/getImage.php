<?php header('Access-Control-Allow-Origin: *'); ?>
<?php


$servername = "localhost";
$username = "sol2050_photos";
$password = "android2015@";
$db = "sol2050_photos_anywhere";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

function getImages($startImages){
	$sql = "SELECT * FROM image ORDER BY id DESC LIMIT ".$startImages."";
	$result = $GLOBALS['conn']->query($sql);
	while($row = mysqli_fetch_assoc($result)) {
		
		$row = array(
			// data from theme
			'img_id'		=> $row['id'],
			'img_tagline' => $row['tagline'],
			'img_name'		=> $row['name'],
			'img_description'	=> $row['description'],
			'img_source_site'	=> $row['source_site'],
			'photo_url'	=> $row['photo_url'],
			'photo_thumb_url'	=> $row['photo_thumb_url'],
			'img_source_url'	=> $row['source_url'],
			'img_tags'	=> $row['tags'],
			'img_category_name'	=> $row['category_name'],
			'img_date_created'	=> $row['date_created'],
			'img_date_modified'	=> $row['date_modified'],
			'img_is_favourite'	=> $row['is_favourite'],
			'img_user_id'	=> $row['user_id'],
			'img_status'	=> $row['status'],
		);
				$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
	}  
		
	
	echo  json_encode($data);
}

function imgSearch($search)
{
	
	$sql = "SELECT * FROM image WHERE name LIKE '%".$search."%' or tags LIKE '%".$search."%'";
	$result = $GLOBALS['conn']->query($sql);
	while($row = mysqli_fetch_assoc($result)) {
		
		$row = array(
			// data from theme
			'img_id'		=> $row['id'],
			'img_tagline' => $row['tagline'],
			'img_name'		=> $row['name'],
			'img_description'	=> $row['description'],
			'img_source_site'	=> $row['source_site'],
			'photo_url'	=> $row['photo_url'],
			'photo_thumb_url'	=> $row['photo_thumb_url'],
			'img_source_url'	=> $row['source_url'],
			'img_tags'	=> $row['tags'],
			'img_category_name'	=> $row['category_name'],
			'img_date_created'	=> $row['date_created'],
			'img_date_modified'	=> $row['date_modified'],
			'img_is_favourite'	=> $row['is_favourite'],
			'img_user_id'	=> $row['user_id'],
			'img_status'	=> $row['status'],
		);
				$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
	}  
		
	
	echo  json_encode($data);
	
}
function catImagesSearch($category)
{
	if($category == "All"){
		$sql = "SELECT * FROM image";
		$result = $GLOBALS['conn']->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			
			$row = array(
				// data from theme
			'img_id'		=> $row['id'],
			'img_tagline' => $row['tagline'],
			'img_name'		=> $row['name'],
			'img_description'	=> $row['description'],
			'img_source_site'	=> $row['source_site'],
			'photo_url'	=> $row['photo_url'],
			'photo_thumb_url'	=> $row['photo_thumb_url'],
			'img_source_url'	=> $row['source_url'],
			'img_tags'	=> $row['tags'],
			'img_category_name'	=> $row['category_name'],
			'img_date_created'	=> $row['date_created'],
			'img_date_modified'	=> $row['date_modified'],
			'img_is_favourite'	=> $row['is_favourite'],
			'img_user_id'	=> $row['user_id'],
			'img_status'	=> $row['status'],
			);
					$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
		} 
	}else{
		$sql = "SELECT * FROM image WHERE category_name = '".$category."'";
		$result = $GLOBALS['conn']->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			
			$row = array(
				// data from theme
			'img_id'		=> $row['id'],
			'img_tagline' => $row['tagline'],
			'img_name'		=> $row['name'],
			'img_description'	=> $row['description'],
			'img_source_site'	=> $row['source_site'],
			'photo_url'	=> $row['photo_url'],
			'photo_thumb_url'	=> $row['photo_thumb_url'],
			'img_source_url'	=> $row['source_url'],
			'img_tags'	=> $row['tags'],
			'img_category_name'	=> $row['category_name'],
			'img_date_created'	=> $row['date_created'],
			'img_date_modified'	=> $row['date_modified'],
			'img_is_favourite'	=> $row['is_favourite'],
			'img_user_id'	=> $row['user_id'],
			'img_status'	=> $row['status'],
			);
					$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
		} 	
	} 
	
	echo  json_encode($data);
	
}

function getCat()
{

		$sql = "SELECT * FROM category";
		$result = $GLOBALS['conn']->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			
			$row = array(
				// data from theme
				'cat_id' => $row['id'],
				'cat_name' => $row['name'],
				'cat_code' => $row['code'],
				'cat_parent_id' => $row['parent_id'],
				'cat_date_created' => $row['date_created'],
				'cat_date_modified' => $row['date_modified'],
				'cat_is_favourite' => $row['is_favourite'],
				'cat_user_id' => $row['user_id'],
				'cat_status' => $row['status'],
			);
					$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
		} 

	
	echo  json_encode($data);
	
}

function getMoreImages($lastId){
	//$sql = "SELECT * FROM image ORDER BY id DESC LIMIT ".$lastId.", 9";
	$sql = "SELECT * FROM image WHERE id < ".$lastId." ORDER BY id DESC LIMIT 9 ";
	$result = $GLOBALS['conn']->query($sql);
	while($row = mysqli_fetch_assoc($result)) {
		
		$row = array(
			// data from theme
			'img_id'		=> $row['id'],
			'img_tagline' => $row['tagline'],
			'img_name'		=> $row['name'],
			'img_description'	=> $row['description'],
			'img_source_site'	=> $row['source_site'],
			'photo_url'	=> $row['photo_url'],
			'photo_thumb_url'	=> $row['photo_thumb_url'],
			'img_source_url'	=> $row['source_url'],
			'img_tags'	=> $row['tags'],
			'img_category_name'	=> $row['category_name'],
			'img_date_created'	=> $row['date_created'],
			'img_date_modified'	=> $row['date_modified'],
			'img_is_favourite'	=> $row['is_favourite'],
			'img_user_id'	=> $row['user_id'],
			'img_status'	=> $row['status'],
		);
				$data[] = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $row);
	}  
		
	
	echo  json_encode($data);
}




if ($_POST['action']=='getImages') {
	getImages($_POST['startImages']);
}
else if($_POST['action']=="getImagesSearch")
{
	imgSearch($_POST['search']);
}
else if($_POST['action']=="catImagesSearch")
{
	catImagesSearch($_POST['category']);
}
else if($_POST['action']=="getCat")
{
	getCat();
}
else if($_POST['action']=="catDrop")
{
	getCat();
}
else if($_POST['action']=="getMoreImages")
{
	getMoreImages($_POST['lastId']);
}


?>