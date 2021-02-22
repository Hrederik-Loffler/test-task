<?php include_once(realpath('../app/views/partials/head.view.php')); ?>
<div class="container">
    <?php if(isset($_SESSION['success'])) :?>
        <div class="alert alert-success">
            <?=$_SESSION['success']; unset($_SESSION['success']) ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['error'])) :?>
        <div class="alert alert-danger">
            <?=$_SESSION['error']; unset($_SESSION['error']) ?>
        </div>
    <?php endif; ?>
        <div class="card">
            <div class="card-header">
                Регистрация
            </div>
            <div class="card-body">
                <form action="signup" method="POST">    

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="firstname">Имя</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Имя">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="lastname">Фамилия</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Фамилия">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="email">Почта</label>
                        <div class="col-md-6">
                            <input class="form-control" type="email" name="email" id="email" placeholder="email@example.com" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="phone">Телефон</label>
                        <div class="col-md-6">
                            <input class="form-control" type="tel" name="phone" id="phone" placeholder="Номер телефона">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password">Пароль</label>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Пароль">
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
        
    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']) ?>
</div>
</body>
</html>