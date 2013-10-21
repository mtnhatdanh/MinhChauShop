<?php 
	//convert dd/mm/yyyy to yyyy-mm-dd
	function convertday($date) {
		$day = substr($date,0,2);
		$month = substr($date,3,2);
		$year = substr($date,6,4);
		$result = "$year-$month-$day";
		return $result;
	}
	
	//kiem tra file hinh upload
	
	function chkUploadPicture($url) {
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES[$url]["name"]);
		$extension = end($temp);
		if ((($_FILES[$url]["type"] == "image/gif")
		|| ($_FILES[$url]["type"] == "image/jpeg")
		|| ($_FILES[$url]["type"] == "image/jpg")
		|| ($_FILES[$url]["type"] == "image/pjpeg")
		|| ($_FILES[$url]["type"] == "image/x-png")
		|| ($_FILES[$url]["type"] == "image/png"))
		&& ($_FILES[$url]["size"] < 20000)
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES[$url]["error"] > 0)
		    {
		    echo "Return Code: " . $_FILES[$url]["error"] . "<br>";
		    return false;
		    }
		  else
		    {
/*
		    echo "Upload: " . $_FILES[$url]["name"] . "<br>";
		    echo "Type: " . $_FILES[$url]["type"] . "<br>";
		    echo "Size: " . ($_FILES[$url]["size"] / 1024) . " kB<br>";
		    echo "Temp file: " . $_FILES[$url]["tmp_name"] . "<br>";
*/
		
		    if (file_exists("../img/sanpham/" . $_FILES[$url]["name"]))
		      {
		      echo $_FILES[$url]["name"] . " already exists. ";
		      return false;
		      }
		    else
		      {
		      move_uploaded_file($_FILES[$url]["tmp_name"],
		      "../img/sanpham/" . $_FILES[$url]["name"]);
		      echo "Stored in: " . "../img/sanpham/" . $_FILES[$url]["name"];
		      return true;
		      }
		    }
		  }
		else
		  {
		  echo "Invalid file";
		  return false;
		  }	
	}
?>