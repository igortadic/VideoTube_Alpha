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

    return "<div class='controls'>
      $replyButton
      $likesCount
      $likeButton
      $dislikeBUtton
    </div>
    $replySection";
  }

  private function createReplyButton() {
    $text = "REPLY";
    $action = "toggleReply(this)";

    return ButtonProvider::createButton($text, null, $action, null);
  }

  private function createLikesCount() {
    $text = $this->comment->getLikes();

    if($text == 0) {
      $text = "";
    }

    return "<span class='likesCount'>$text</span>";

  }

  private function createReplySection() {
    $postedBy = $this->userLoggedInObj->getUsername();
    $videoId = $this->comment->getVideoId();
    $commentId = $this->comment->getId();

    $profileButton = ButtonProvider::createUserProfileButton($this->$con, $postedBy);

    $cancelButtonAction = "toggleReply(this)";
    $cancelButton = ButtonProvider::createButton("Cancel", null, $commentAction, "cancelComment");

    $postButtonAction = "postComment(this, \"$postedBy\", $videoId, $commentId, \"repliesSection\")";
    $postButton = ButtonProvider::createButton("Reply", null, $postButtonAction, "postComment");

    return "<div class='commentForm hidden'>
        $profileButton
        <textarea class='commentBodyClass' placeholder='Add a comment'></textarea>
        $cancelButton
        $postButton
      </div>";
  }

  private function createLikeButton() {
    $videoId = $this->video->getId();
    $commentId = $this->comment->getVideoId();
    $action = "likeComment($commentId, this, $videoId)";
    $class = "likeButton";

    $imageSrc = "assets/images/icons/thumb-up.png";

    if($this->comment->wasLikedBy()) {
      $imageSrc = "assets/images/icons/thumb-up-active.png";
    }

    return ButtonProvided::createButton("", $imageSrc, $action, $class);
  }

  private function createDislikeButton() {
    $commentId = $this->comment->getId();
    $videoId = $this->comment->getVideoId();
    $action = "dislikeComment($commentId, this, $videoId)";
    $class = "dislikeButton";

    $imageSrc = "assets/images/icons/thumb-down.png";

    if($this->comment->wasDislikedBy()) {
      $imageSrc = "assets/images/icons/thumb-down-active.png";
    }

    return ButtonProvided::createButton("", $imageSrc, $action, $class);
  }
}
?>
