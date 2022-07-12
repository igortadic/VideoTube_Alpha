<?php
require_once("includes/header.php");
require_once("includes/SearchResultsProvider.php");

if(!isset($_GET["term"]) || $_GET["term"] == "") {
  echo "you must enter a search term";
  exit();
}


$term = $_GET["term"];

if(!isset($_GET["orderBy"]) || $_GET["orderBy"] == "views") {
  $orderBy = "views";
} else {
  $orderBy = "uploadDate";
}

$SearchResultsProvider = new SearchResultsProvider($con, $userLoggedInObj);
$videos = $searchResultsProvider->getVideos($term, $orderBy);

$videoGrid = new VideoGrid($con, $userLoggedInObj);
?>

<div class="largeVideoGridContainer">
  <?php

  if(sizeof($videos) > 0 ) {
    echo  $videoGrid->createLarge($videos, sizeof($videos) . "videos found", true);
  } else {
    echo "No results found";
  }

  ?>

</div>














<?php
require_once("includes/footer.php");
?>
