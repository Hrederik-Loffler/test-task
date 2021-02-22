<?php include_once('partials/head.view.php');?>
<div class="container">
  <?php if(isset($_SESSION['user'])) :?>
    <h1>Hello, <?=$_SESSION['user'][0]['firstname']?></h1>
  <?php else : ?>
    <h1>Здравствуйте гость!</h1>
  <?php endif; ?>
</div>
</body>
</html>
