<h1>Se connecter</h1>

<form id="formConnexion" method="POST" action="#" autocomplete="off">
    <label>Login :</label>
    <input type="text" name="login" required>
    <br>
    <label>Mot de passe :</label>
    <input type="password" name="password" required>
    <br>
    <input class="bouton" type='button' id="submit" value='Connexion'>
</form>

<div id="resultat">
    <!-- Nous allons afficher un retour en jQuery au visiteur -->
</div>

<script>
    $(function(){
        var monBouton = $('#submit').on('click',function(){
            /*$.ajax({
                url:'validationConnexion.php',
                data: $('[name="login"]').val(),
                success: function(data){
                    alert('gg wp my friend')
                },
                error: alert('fail')
            });*/

            $.post(
                'validationConnexion.php',
                {
                    login: $('[name="login"]').val(),
                    password: $('[name="password"]').val()
                },
                function(data){
                    if(data == 'Success'){
                        // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                        $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                    }else{
                        // Le membre n'a pas été connecté. (data vaut ici "failed")
                        $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                    }
                },
                'text'
            );
        });
    });
</script>
