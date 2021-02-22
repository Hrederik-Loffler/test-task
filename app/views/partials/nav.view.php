<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="rounded float-left" width="100px" max-height="50px" src="<?=$_SESSION['user'][0]['avatar']?>" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="navbar-brand" href="/">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                
                <?php if(isset($_SESSION['user'])) :?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="/user/index">Личный кабинет</a>
                    </li>
                <?php endif; ?>

                <?php if(isset($_SESSION['user']) and (isset($_SESSION['admin']))) :?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Админка</a>
                    </li>
                <?php endif; ?>
                <?php if(isset($_SESSION['user'])) :?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Выйти</a>
                    </li>
                <?php else :?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Войти</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                <a class="nav-link" href="/signup">Регистрация</a>
                </li>

            </ul>
            </div>
        </div>
    </nav>
</div>






