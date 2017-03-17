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
            var login = "";
            var numJoueurPartie = "";
            var numPartie;
			existeJoueurPartie();

            function afficherConnexion(){
                $(".divConnexion").show(300);
                $(".divPartie").hide(300);
                $(".divPlateau").hide(300);
            }

            function afficherListePartie(){
                $('#msgBienvenue').html("Bienvenue " + login);
                $(".divConnexion").hide(300);
                $(".divPartie").show(300);
                $(".divPlateau").hide(300);
            }

            function afficherPlateau(){
                $(".divConnexion").hide(300);
                $(".divPartie").hide(300);
                $(".divPlateau").show(300);
            }

            //Fonction qui vérifie si l'utilisateur est connecté ou non
            function estConnecte(){
				$.ajaxSetup({async: false});
                $.ajax({
                    url: 'estConnecte.php',
                    success: function(data){
                        if(!data){
                            afficherConnexion();
                        }else{
                            login = data;
                            afficherListePartie();
                        }
                    }
                });
            }

			function existeJoueurPartie(){
				$.ajaxSetup({async: false});
				$.ajax({
                    url: 'existeJoueurPartie.php',
                    success: function(data){
						console.log(data);
						numPartie=data;
					}
				});
			}

            function rejoindrePartie(){
                var divPlateau = $(".divPlateau");
                var divPartie = $(".divPartie");


                divPartie.hide(300);
                divPlateau.show(300);
            }

            function distributionCarte(nbJoueur, idPartie){
                var carteJoueur1 = [];
                var carteJoueur2 = [];
                var carteJoueur3 = [];
                var carteJoueur4 = [];
                var carteJoueur = [];
                var nbCarteParJoueur = 52 / nbJoueur;
				$.ajaxSetup({async: false});
                $.post({
                    url: 'recupCarte.php',
                    data: { nbJoueur: nbJoueur, idPartie: idPartie },
                    dataType: 'json',
                    success: function(data){
                        alert("ouiii");
                        console.log(data);
                        //console.log(data[1][0]);
                        carteJoueur1 = data[0][0];
                        carteJoueur2 = data[1][0];
                        carteJoueur3 = data[2][0];
                        carteJoueur4 = data[3][0];

                        console.log(numJoueurPartie);
                        for(i = 0 ; i<13 ; i++){
                            //console.log(carteJoueur1[i]);
                            if(numJoueurPartie == 1){
                                $(".divMainJoueur1").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur1[i][2] + '"></p></div>');
                                $(".divMainJoueur1").addClass("divMainJoueur");
                            }else if(numJoueurPartie == 2){
                                $(".divMainJoueur2").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur2[i][2] + '"></p></div>');
                            }else if(numJoueurPartie == 3){
                                $(".divMainJoueur3").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur3[i][2] + '"></p></div>');
                            }else if (numJoueurPartie == 4) {
                                $(".divMainJoueur4").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur4[i][2] + '"></p></div>');
                                $(".divMainJoueur4").addClass("divMainJoueur");
                                //sdqsd
                                $(".divMainJoueur1").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur1[i][2] + '"></p></div>');
                                $(".divMainJoueur1").addClass("divMainAutreJoueur1");
                                $(".divMainJoueur2").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur2[i][2] + '"></p></div>');
                                $(".divMainJoueur2").addClass("divMainAutreJoueur2");
                                $(".divMainJoueur3").append('<div class="carteMainJoueur"><img alt="" src="' + carteJoueur3[i][2] + '"></p></div>');
                                $(".divMainJoueur3").addClass("divMainAutreJoueur3");
                            }
                        }
                    },
                    error : function(resultat, statut, erreur){
                        console.log("echec " + resultat);
                    }
                });
            }



            $(function(){
                $.ajaxSetup({async: false});
                $.ajax({
                    url: 'include/include.inc.php'
                });

                estConnecte();

                //Click sur le bouton connexion
                var boutonConnexion = $('#submitConnexion').on('click',function(){
                    //Requete AJAX qui vérifie que le login et password sont correct
                    $.ajaxSetup({async: false});
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
                    $.ajaxSetup({async: false});
                    $.ajax({
                        url: 'deconnexion.php',
                        success: function(data){
                            estConnecte();
                        }
                    });
                });

                //Requête AJAX qui récupère la liste des parties en cours
                $.ajaxSetup({async: false});
				$.ajax({
                        url: 'listePartie.php',
						dataType: 'json',
                        success: function(data){
							$.each(data,function(index, value){
								$(".tableauPartie").append('<tr><td>'+value[0]+'</td><td>'+value[1]+'</td><td>'+value[2]+' / 4</td><td><input class="bouton boutonRejoindrePartie" type="button" value="Rejoindre"></td></tr>');
							});
                            //Click sur le bouton rejoindre partie
                            var boutonRejoindrePartie = $(".boutonRejoindrePartie").on("click", function(){
                                idPartie = $(this).parents("tr").children("td:first").text();


                                //Requete AJAX qui permet de rejoindre une partie
                                $.ajaxSetup({async: false});
                                $.ajax({
                                    url: 'rejoindrePartie.php',
                                    data: "idPartie=" + idPartie,
                                    success: function(data){
                                        if(data == 'Success'){
                                            alert("oui");
                                            //Requete AJAX qui permet de récupérer le numéro du joueur dans la partie
                                            $.ajaxSetup({async: false});
                                            $.ajax({
                                                url:'attributionNumJoueur.php',
                                                data: "idPartie=" + idPartie,
                                                success:function(data){
                                                    numJoueurPartie = data;
                                                    alert(numJoueurPartie);
                                                }
                                            });
                                        }else{
                                            //alert(data);
                                        }
                                    }
                                });

                                rejoindrePartie();
                                distributionCarte(4, idPartie);
                            });
                        }
                });

                $('.tab').sortable({
                    containerSelector: 'table',
                    itemPath: '> tbody',
                    itemSelector: 'tr',
                    placeholder: '<tr class="placeholder"/>'
                });
            });


            $(function(){
                if(numPartie != ""){
                    afficherPlateau();
                    
                }
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
                <span id="msgBienvenue"></span>
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
                <table id='j1' class="tab">
                    <div class="divMainJoueur1">

                    </div>
                </table>
                <table id='j2' class="tab">
                    <div class="divMainJoueur2">
                    </div>
                </table>
                <table id='j3' class="tab">
                    <div class="divMainJoueur3">
                    </div>
                </table>
                <table id='j4' class="tab">
                    <div class="divMainJoueur4">
                    </div>
                </table>
            </div>
        </div>
    </body>
</html>
