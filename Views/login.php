<?php if(!(count($_POST) === 0)): ?>
    <?php

    require_once "Object/Database/database.php";

    var_dump(find('enseignants', [
        "username" => $_POST['username'],
        "password" => md5($_POST['password'])
    ]));

    ?>
<?php else: ?>
    <div class="row">
        <form action="?p=login" method="post" class="small-12 columns">
            <div class="small columns">
                <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" class="box">
            </div>

            <div class="small columns">
                <input type="password" name="password" id="password" placeholder="Mot de passe" class="col-xs-12">
            </div>

            <div class="small columns">
                <button class="button" style="width:100%;">
                    Me connecter
                </button>
            </div>
        </form>
    </div>
<?php endif; ?>
