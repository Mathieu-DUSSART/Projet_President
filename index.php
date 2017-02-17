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
            //Fonction qui vérifie si l'utilisateur est connecté ou non
            function estConnecte(){
                $.ajax({
                    url: 'estConnecte.php',
                    success: function(data){
                        if(!data){
                            $(".divConnexion").show();
                            $(".divPartie").hide();
                        }else{
                            $(".divConnexion").hide();
                            $(".divPartie").show();
                        }
                    }
                });
            }

            $(function(){
                $.ajax({
                    url: 'include/include.inc.php'
                });

                estConnecte();

                //Click sur le bouton connexion
                var boutonConnexion = $('#submitConnexion').on('click',function(){
                    //Requete AJAX qui vérifie que le login et password sont correct
                    $.post(
                        'validationConnexion.php',
                        {
                            login: $('[name="login"]').val(),
                            password: $('[name="password"]').val()
                        },
                        function(data){
                            estConnecte();
                            if(data == 'Success'){
                                // Le membre est connecté. Ajoutons lui un message dans la page HTML.
                                $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                            }else{
                                // Le membre n'a pas été connecté. (data vaut ici "failed")
                                $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                            }

                        }
                    );
                });

                //Click sur le bouton déconnexion
                var boutonDeconnexion = $('#submitDeconnexion').on('click',function(){
                    $.ajax({
                        url: 'deconnexion.php',
                        success: function(data){
                            estConnecte();
                        }
                    });
                });

				$.ajax({
                        url: 'listePartie.php',
						dataType: 'json',
                        success: function(data,data2){  
							console.log(data);
							$.each(data[0],function(index, value){
								$(".tableauPartie").append('<tr><td>'+index+'</td><td>'+value+'</td><td>'+data[1][value]+'</td></tr>');
								console.log(index +":"+value);
							});
								
							
							
                        }
                });
            });
        </script>
    </head>

	<body>
        <header>

        </header>

        <div id="corps">
            <!--Formulaire de connexion-->
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

            <!--Affichage des parties-->
            <div class="divPartie">
                <input class="bouton" type='button' id="submitDeconnexion" value='Deconnexion'>
                <table class="tableauPartie">
                	<tr>
                		<th>Partie en cours </th>
                	</tr>

                </table>
            </div>
        </div>
    </body>
</html>
