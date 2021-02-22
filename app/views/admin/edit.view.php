<?php include_once(realpath('../app/views/partials/head.view.php')); ?>
<div class="container">
    <div class="card">
        <div class="card-header">Редактирование пользователя</div>
        <div class="card-body">
            <form action="/admin/users/edit/" method="POST">
                <?php foreach($userOne as $user) : ?>

                    <div class="form-group row">
                        <label for="firstname" class="col-sm-2 col-form-label">Имя </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="<?=$user['firstname'] ?>" value="<?=$user['firstname'] ?>" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Почта</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" placeholder="<?=$user['email'] ?>" value="<?=$user['email'] ?>" disabled>
                        </div>
                    </div>

                    <fieldset class="form-group">

                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Permission</legend>
                            <div class="col-md-6 ">

                                <div class="form-check">
                                    <i class="mr-4">Role</i>
                                    <?php foreach($role as $v) :?>
                                        <input class="form-check-input px-2" type="checkbox" name="role" id="role" value="<?=$v?>" id="<?=$v?>"
                                        <?=($v === 'user' ? "checked" : "")?>>
                                        <label class="form-check-label mr-4" for="<?=$v?>"><?=$v?></label>
                                    <?php endforeach;?>
                                </div>
                            
                        
                                <div class="form-check">
                                    <i class="mr-4">Status</i>
                                    <?php foreach($status as $v) :?>
                                        <input class="form-check-input" type="checkbox" name="status" value="<?=$v?>" id="<?=$v?>"
                                        <?=($v === 'enable' ? "checked='checked'" : '')?>>
                                        <label class="form-check-label mr-4" for="<?=$v?>"><?=$v?></label>
                                    <?php endforeach;?>
                                </div>

                            </div>
                        </div>
                    </fieldset>

                <?php endforeach; ?>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>