<?php require_once("includes/header.php"); ?>

<div class="videoSection">
  <?php
  $videoGrid = new VideoGrid($con, $userloggedInObj->getUsername());
  echo $videoGrid->create(null, "Suggested", false);
  ?>
</div>

<?php require_once("includes/footer.php"); ?>
