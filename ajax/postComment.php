<?php
require_once("../includes/config.php");

if(isset($_POST['commentText']) && isset($_POST['postedBy']) && isset($_POST['videoId'])) {
  echo "success";
} else {
  echo "Couldn't perform the action!";
}

?>
