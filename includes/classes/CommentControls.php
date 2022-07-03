<?php
require_once("ButtonProvider.php");
class VideoInfoControls {

  private $con, $comment, $userLoggedInObj;

  public function __construct($con, $comment, $userLoggedInObj) {
    $this->con = $con;
    $this->comment = $comment;
    $this->userLoggedInObj = $userLoggedInObj;
  }

  public function create() {

    $replyButton = $this->createReplyButton();
    $replyButton = $this->createLikesCount();
    $likeButton = $this->createLikeButton();
    $dislikeBUtton = $this->createDislikeButton();
    $replySection = $this->createReplySection();

    return "<div class='controls>
      $likeButton
      $dislikeBUtton
    </div>'"
  }

  private function createReplyButton() {
    return
  }

  private function createLikesCount() {
    return
  }

  private function createReplySection() {
    return
  }

  private function createLikeButton() {
    $text = $this->video->getLikes();
    $videoId = $this->video->getId();
    $action = "likeVideo(this, $videoId)";
    $class = "likeButton";

    $imageSrc = "assets/images/icons/thumb-up.png";

    if($this->video->wasLikedBy()) {
      $imageSrc = "assets/images/icons/thumb-up-active.png";
    }

    return ButtonProvided::createButton($text, $imageSrc, $action, $class);
  }

  private function createDislikeButton() {
    $text = $this->video->getDislikes();
    $videoId = $this->video->getId();
    $action = "dislikeVideo(this, $videoId)";
    $class = "dislikeButton";

    $imageSrc = "assets/images/icons/thumb-down.png";

    if($this->video->wasDislikedBy()) {
      $imageSrc = "assets/images/icons/thumb-down-active.png";
    }

    return ButtonProvided::createButton($text, $imageSrc, $action, $class);
  }
}
?>
