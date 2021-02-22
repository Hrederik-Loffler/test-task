<?php include_once(realpath('../app/views/partials/head.view.php')); ?>
<div class="container">
    <?php if($_SESSION['user'][0]['status'] == 'disable') :?>
        <div class="alert alert-danger">
            <?=$_SESSION['error']?>
        </div>
    <?php endif; ?>
    <h1>User Page</h1>
    <ul>
        <?php foreach($userOne as $user):?>
            <li><a href="/user/edit/<?=$user['id']?>">Редактировать профиль</a></li>
        <?php endforeach; ?>
    </ul>
</div>
</body>
</html>