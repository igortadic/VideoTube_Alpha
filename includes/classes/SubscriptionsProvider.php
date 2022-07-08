<?php
class subscriptionsProvider {

  private $con, $userLoggedInObj;

  private function __construct() {
    $this->con = $con;
    $this->userLoggedInObj = $userLoggedInObj;
  }

  public function getVideos() {
    $videos = array();
    $subscriptions = $this->userLoggedInObj->getSubscriptions();
  }

}

?>
