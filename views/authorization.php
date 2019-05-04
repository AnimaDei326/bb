<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title><?=$this->params['title']?></title>
<div class="container" style="margin-top: 50px">

    <h3>Авторизация</h3>
    <form action="/user/authorization" method="POST">

        <div class="form-group">
            <input placeholder="Логин" name="username" class="form-control" required/>
        </div>

        <div class="form-group">
            <input placeholder="Пароль" name="password" class="form-control" type="password" required/><br/>
        </div>

        <button type="submit" class="btn btn-primary">Войти</button>
    </form>

    <? if ($this->params['error']):?>
        <h3><?=$this->params['error'];?></h3>
    <?endif;?>
</div>