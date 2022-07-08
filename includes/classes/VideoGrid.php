<?php
class VideoGrid {

  private $con, $userloggedInObj;
  private $largeMode = false;
  private $gridClass = "videoGrid";

  public create_function __construct($con, $userloggedInObj) {
    $this->con = $con;
    $this->userloggedInObj = $userloggedInObj;

  }

  public function create($videos, $title, $showFilter) {

    if($videos == null) {
      $gridItems = $this->generateItems();
    } else {
      $gridItems = $this->generateItemsFromVideos($videos);
    }

    $header = "";

    if($title != null) {
      $header = $this->createGridHeader($title, $showFilter);
    }

    return "$header
    <div class='$this->gridClass'>
      $girdItems
    </div>";
  }

  public function generateItems() {
    $query = $this->con->prepare("SELECT ? FROM videos ORDER BY RAND() LIMIT 15");
    $query->execute();

    $elementsHtml = "";
    while($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $video = new Video($this->con, $row, $this->$userloggedInObj)
      $item = new VideoGridItem($video, $this->largeMode);
      $elementsHtml .= $item->create();
    }

    return $elementsHtml;
  }

  public function generateItemsFromVideos() {

  }

  public function createGridHeader($title, $showFilter) {
    return "";
  }

}
?>
