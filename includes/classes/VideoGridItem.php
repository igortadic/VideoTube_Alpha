<?php
class VideoGridItem {

  public functio __construct($video, $largeMode) {
    $this->video = $video;
    $this->largeMode = $largeMode
  }

  public function create() {
    $thumbnail = $this->createThumbnail();
    $detials = $this->createDetails();
    $url = "watch.php?id=" . $this->video->getId();

    return "<a href='$url'>
      <div class='videoGridItem'>
        $thumbnail
        $details
      </div>
    <a/>"
  }

  private function createThumbnail() {

    $thumbnail = $this->video->getThumbnail();
    $duration  = $this->video->getDuration();

    return "<div class='thumbnail'>
      <img src='$thumbinal'>
      <div class='duration'>
        <span>$duration</span>
      </div>
    </div>";
  }

  private function createDetails() {
    $title = $this->video->getTitle();
    $username = $this->video->getUploadedby();
    $views = $this->video->getViews();
    $description = $this->video->getDescription();
    $timestamp = $this->video->getTimestamp();
  }

}
?>
