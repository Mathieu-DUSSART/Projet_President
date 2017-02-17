<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
    	<title>Président</title>

        <!-- Import CSS-->
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!-- Import JQuery-->
        <script src="/Projet_President/js/jquery-3.1.1.min.js"></script>
        <!-- Import JQueryUI-->
        <script src="/Projet_President/js/JQueryUI/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="/Projet_President/js/JQueryUI/jquery-ui.min.css">

        <script>
            $(function(){
                var boutonConnexion = $('#submitConnexion').on('click',function(){
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
                                $(".divConnexion").hide();
                                $(".divPartie").toggle();
                                
                            }else{
                                // Le membre n'a pas été connecté. (data vaut ici "failed")
                                $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                            }
                        },
                        'text'
                    );
                });
                $.ajax({
                    url: 'include/pages/include.inc.php'
                });

                var boutonDeconnexion = $('#submitDeconnexion').on('click',function(){
                    $.ajax({
                        url: 'include/pages/deconnexion.inc.php',
                        success: function(data){
                            alert(data);
                        }
                    });
                });

            });
        </script>
    </head>

	<body>
        <header>

        </header>

        <div id="corps">
            <!--Formulaire de connexion-->
            <?php
            if(!isset($_SESSION["login"])){?>
                <div class="divConnexion">
                    <h1>Se connecter</h1>

                    <form id="formConnexion" method="POST" action="#" autocomplete="off">
                        <label>Login :</label>
                        <input type="text" name="login" required>
                        <br>
                        <label>Mot de passe :</label>
                        <input type="password" name="password" required>
                        <br>
                        <input class="bouton" type='button' id="submitConnexion" value='Connexion'>
                    </form>

                    <div id="resultat">
                        <!-- Nous allons afficher un retour en jQuery au visiteur -->
                    </div>
                </div>
            <?php
            }else{
            ?>
                <!--Affichage des parties-->
                <div class="divPartie">
                    <input class="bouton" type='button' id="submitDeconnexion" value='Deconnexion'>
                    <table class="tableauPartie">
                    	<tr>
                    		<th>Partie en cours </th>
                    	</tr>

                    	<tr>
                    		<td>Test1</td>
                    		<td>test2</td>
                    	</tr>
                        <tr>
                    		<td>Test1</td>
                    		<td>test2</td>
                    	</tr>
                        <tr>
                    		<td>Test1</td>
                    		<td>test2</td>
                    	</tr>
                    </table>
                </div>
            <?php
            } ?>

        </div>
    </body>
</html>
