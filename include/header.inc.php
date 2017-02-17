<?php session_start();
 ?>
<<<<<<< HEAD

<!doctype html>
<html lang="fr">

    <head>

      <meta charset="utf-8">

    <?php
    	$title = "Président";?>
    	<title>
    	<?php echo $title ?>
    	</title>

        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <!-- Import JQuery-->
        <script src="/Projet_President/js/jquery-3.1.1.min.js"></script>

        <!-- Import JQueryUI-->
        <script src="/Projet_President/js/JQueryUI/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="/Projet_President/js/JQueryUI/jquery-ui.min.css">
        <script>
            $(function(){
                var monBouton = $('#submit').on('click',function(){
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
            });

            $(function(){
                $(".divPartie").hide();
            });
        </script>
    </head>
	<body>
        <header>

        </header>

