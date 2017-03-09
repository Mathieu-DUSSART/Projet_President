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
                            $(".divPlateau").hide();
                        }else{
                            $(".divConnexion").hide();
                            $(".divPartie").show();
                        }
                    }
                });
            }

            function rejoindrePartie(){
                var divPlateau = $(".divPlateau");
                var divPartie = $(".divPartie");

                divPartie.hide();
                divPlateau.show();
            }

            function distributionCarte(nbJoueur){
                var carteJoueur1 = [];

                $.ajax({
                    url: 'recupCarte.php',
                    success: function(data){
                        alert(data);
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

                //Requête AJAX qui récupère la liste des parties en cours
				$.ajax({
                        url: 'listePartie.php',
						dataType: 'json',
                        success: function(data){
							$.each(data,function(index, value){
								$(".tableauPartie").append('<tr><td>'+value[0]+'</td><td>'+value[1]+'</td><td>'+value[2]+' / 4</td><td><input class="bouton boutonRejoindrePartie" type="button" value="Rejoindre"></td></tr>');
							});
                            //Click sur le bouton rejoindre partie
                            var boutonRejoindrePartie = $(".boutonRejoindrePartie").on("click", function(){


                                //Requete AJAX qui permet de rejoindre une partie
                                $.ajax({
                                    url: 'rejoindrePartie.php',
                                    data: "id=" + $(this).parents("tr").children("td:first").text(),
                                    success: function(data){
                                        //estConnecte();
                                        if(data == 'Success'){
                                            alert("coucou");
                                        }else{
                                            alert(data);
                                        }
                                    }
                                });

                                rejoindrePartie();
                                distributionCarte();
                            });
                        }
                });


            });

            $(window).on("load resize ", function() {
                var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
                $('.tbl-header').css({'padding-right':scrollWidth});
            }).resize();
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
                <span>Bienvenue </span>
                <section>
                    <h1>Rejoindre une partie</h1>
                    <div class="tbl-header">
                        <table cellpadding="0" cellspacing="0" border="0">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Nombre de joueur</th>
                            <th>rejoindre</th>
                            </tr>
                        </thead>
                        </table>
                    </div>
                    <div class="tbl-content">
                        <table class="tableauPartie" cellpadding="0" cellspacing="0" border="0">
                        </table>
                    </div>
                </section>
            </div>

            <!--Plateau de jeu-->
            <div class="divPlateau">

            </div>
        </div>
    </body>
</html>
