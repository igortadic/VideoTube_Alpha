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

  private function createThumb() {
    return
  }

  private function createThumb() {
    return
  }

}
?>
