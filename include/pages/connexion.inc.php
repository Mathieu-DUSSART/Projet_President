<h1>Se connecter</h1>

<form id="formConnexion" method="POST" action="#" autocomplete="off">
    <label>Login :</label>
    <input  type="text" name="login" required>
    <br>
    <label>Mot de passe :</label>
    <input  type="password" name="password" required>
    <br>
    <input class="bouton" type='button' id="submit" value='Connexion'>
</form>

<script>
    $(function(){
        var monBouton = $('#submit').on('click',function(){
            $.ajax({
                url:'validationConnexion.php',
                data: $('[name="login"]').val(),
                success: function(data){
                    alert('gg wp my friend')
                },
                error: alert('fail')
            })
        });
    }
</script>