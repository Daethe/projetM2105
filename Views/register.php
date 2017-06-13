<?php if(!(count($_POST) === 0)): ?>
    <?php

    require_once "Object/Database/database.php";

    if (insert('enseignants', [
        'nom' => $_POST['lastname'],
        'prenom' => $_POST['firstname'],
        'username' => strtolower($_POST['lastname']) . "." . strtolower($_POST['firstname']),
        'password' => md5($_POST['password'])
    ])) {
        echo "Congratulations";
    } else {
        http_redirect("?p=register");
    }

    ?>
<?php else: ?>
    <div class="row">
        <form action="?p=register" method="post" class="small-12 columns">
            <div class="small columns">
                <input type="text" name="lastname" id="lastname" placeholder="Nom">
            </div>

            <div class="small columns">
                <input type="text" name="firstname" id="firstname" placeholder="Prenom">
            </div>

            <div class="small columns">
                <input type="text" name="username" id="username" disabled>
            </div>

            <div class="small columns">
                <input type="password" name="password" id="password" placeholder="Mot de passe">
            </div>

            <div class="small columns">
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmer le mot de passe">
            </div>

            <div class="small columns">
                <button class="button" style="width:100%;" disabled>
                    M'inscrire
                </button>
            </div>
        </form>
    </div>

    <script>
        var items = {
            lastname: document.querySelector("#lastname"),
            firstname: document.querySelector("#firstname"),
            lastfirst: document.querySelector("#username"),
            password: document.querySelector("#password"),
            cpassword: document.querySelector("#confirmpassword")
        }

        items["lastname"].addEventListener('input', function() {
            items["lastfirst"].value = items["lastname"].value.toLowerCase() + "." + items["firstname"].value.toLowerCase();
        });
        items["firstname"].addEventListener('input', function() {
            items["lastfirst"].value = items["lastname"].value.toLowerCase() + "." + items["firstname"].value.toLowerCase();
        });
        items["cpassword"].addEventListener('input', function() {
            if (items["password"].value === items["cpassword"].value) {
                document.querySelector("button.button").removeAttribute("disabled");
            } else {
                document.querySelector("button.button").disabled = true;
            }
        });
    </script>
<?php endif; ?>
