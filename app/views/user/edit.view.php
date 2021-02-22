<?php include_once(realpath('../app/views/partials/head.view.php')); ?>
<div class="container">

    <form action="/user/edit" method="POST" enctype="multipart/form-data">

        <?php if(isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
                <?=$_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['success'])) :?>
            <div class="alert alert-success">
                <?=$_SESSION['success']; unset($_SESSION['success']) ?>
            </div>
        <?php endif; ?>
        <div class="card">
            <div class="card-header">Редактировать</div>
            <div class="card-body">
                <form action="login" method="post">

                    <?php foreach($userOne as $user) :?>
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">Имя</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="firstname" id="firstname" value="<?=$user['firstname']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">Фамилия</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="lastname" id="lastname" value="<?=$user['lastname']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Почта</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="email" id="email" value="<?=$user['email']?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Телефон</label>
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="phone" id="phone" value="<?=$user['phone']?>">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right" for="avatar">Choose avatar</label>
                            <div class="col-md-6">
                                <input type="hidden" name="MAX_FILE_SIZE" value="3000000000">
                                <input class="" type="file" name="avatar" id="avatar">
                                <p class="none err" id="photoError"></p>
                            </div>
                        </div>

                    <?php endforeach; ?>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    
    </form>
    
</div>
</body>
</html> 
