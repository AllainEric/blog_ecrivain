<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="login page">
    <meta name="author" content="">

    <title>Page de connexion à l'Espace d'administration de Jean Forteroche</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="header text-center">
                        <div class="col-xs-12" style="height:30px;"></div>
                            <p><img class="pull-center" src="/../blog_ecrivain/view/public/img/jean-forteroche.png" alt=""></p>  
                                   <h2>Billet simple pour l'Alaska</h2>
                                   <span>Une histoire vrai d'un voyage hors norme</span> 
                                   <div class="col-xs-12" style="height:30px;"></div>                      
                        </div>

                    <div class="panel-heading">
                        <h3 class="panel-title">Connectez-vous à votre tableau de bord</h3>
                    </div>
                    <div class="panel-body">
                            <!-- pour le login des membres  --> 
                        <fieldset>
                        <form id="login" name="login" action="index.php?action=login" method="post">
                            <div class="form-group">
                                <label for="Pseudo">
                                    Identifiant
                                </label>
                                    <input placeholder="Pseudo" name="pseudo" type="text" size="48" maxsize="48">
                            </div>
                            <div class="form-group">
                                <label for="Pseudo">
                                    Mot de passe
                                </label>
                                    <input placeholder="Mot de passe" name="pass" type="password" size="48" maxsize="48" value="">
                            </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" id="login" name="login" value="Connexion">   
                        </fieldset>
                        </form>
                        <div class="col-xs-12" style="height:20px;"></div>
                        <p class="go-back mt-3">
                            Retour au site ?
                            <a href="/../blog_ecrivain/index.php">Cliquez ici.</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
