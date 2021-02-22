<?php include_once(realpath('../app/views/partials/head.view.php')); ?>
<div class="container">

    <?php if(isset($_SESSION['error'])) :?>
        <div class="alert alert-danger">
            <?=$_SESSION['error']; unset($_SESSION['error']) ?>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION['user'])) :?>
        <?php if(isset($_SESSION['success'])) :?>
            <div class="alert alert-success">
                <?=$_SESSION['success']; unset($_SESSION['success']) ?>
            </div>
        <?php endif; ?>
        <?php if($_SESSION['user'][0]['status'] == 'disable') :?>
            <?=$_SESSION['error']?>
        <?php endif; ?>
        
    <?php else : ?>
        <div class="card">
            <div class="card-header">Вход</div>
            <div class="card-body">
                <form action="login" method="post">

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="email" id="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-4">
                            <button class="btn btn-primary" type="submit">Отправить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>
</body>
</html> 
