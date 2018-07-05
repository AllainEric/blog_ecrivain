<?php ob_start(); ?>

        <h3 class="col-lg-12">Bienvenue sur l'espace d'Administration</h3><a href="/../blog_ecrivain/index.php"><input class="col-lg-offset-9 col-lg-2 btn btn-secundary" type="button" value="Retour sur le site"/></a>

        <h4 class="col-lg-offset-1 col-lg-5 col-lg-offset-6">Gestion des Chapitres :<a href="/../blog_ecrivain/index.php?action=showAddChapter"><input class="btn btn-primary" type="button" value="Ajouter"/></a></h4>

        <div class="table-responsive col-lg-offset-1 col-lg-10 col-lg-offset-1">
            <table class="table">
                <tr class="tete" >
                    <td class="td">Titres</td>
                    <td class="td">Date de création</td>
                    <td class="td">Modifier</td>
                    <td class="td">Supprimer</td>
                </tr>     
<?php foreach($allChapters as $chapter)
{
?>                     
                <tr class="td">
                    <td >
                    <?= $chapter['title'] ?>
                    </td> 
                    <td>
                    <?= $chapter['creation_date_fr'] ?>
                    </td>
                    <td><a href="/../blog_ecrivain/index.php?action=displayChapter&amp;id=<?= $chapter['id'] ?>"><input class="btn btn-success" method="post" type="button" value="Modifier"></a></td>
                    <td><a href="/../blog_ecrivain/index.php?action=deleteChapter&amp;id=<?= $chapter['id'] ?>"><input class="btn btn-danger" type="button" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?')"></a></td>
                </tr>
<?php
}
?>                   
            </table>
        </div>

        <h4 class="col-lg-offset-1 col-lg-5 col-lg-offset-6">Gestion des Commentaires :</h4>

        <div class="table-responsive col-lg-offset-1 col-lg-10 col-lg-offset-1">
            <table class="table">
                    <tr class="tete">
                        <td class="td">Commentaires</td>
                        <td class="td">Auteur</td>
                        <td class="td">Date d'ajout</td>
                        <td class="td">Statut</td>
                        <td class="td">Modérer</td>
                        <td class="td">modifier</td>
                        <td>Supprimer</td>
                    </tr>
                    
<?php foreach($allComments as $comment)
{
?>    
                <tr class="td">      
                    <td><?= $comment['comment'] ?></td>
                    <td><?= $comment['author'] ?></td> 
                    <td><?= $comment['comment_date_fr'] ?></td> 
                    <td>
                        <?php if ($comment['signal_comment'] == 0) {
                         ?>   
                                <span>Affiché</span>
                        <?php
                        }
                        elseif ($comment['signal_comment'] == 1) {
                        ?> 
                                <span style='color:orange'><strong>Signalé</strong></span>
                        <?php
                        }
                        elseif ($comment['signal_comment'] == 2) {
                        ?>
                                <span style='color:red'><strong>Modéré</strong></span>
<?php
}
?>
                    </td>
                    <td ><a href="/../blog_ecrivain/index.php?action=moderateComment&amp;id=<?= $comment['id'] ?>"><input class="btn btn-warning" method="post" type="button" value="Modérer" onclick="return confirm('Ce commentaire a été modéré avec succès !')"></a></td>
                    <td ><a href="/../blog_ecrivain/index.php?action=displayComment&amp;id=<?= $comment['id'] ?>"><input class="btn btn-success" method="post" type="button" value="Modifier"></a> </td>
                    <td><a href="/../blog_ecrivain/index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>"><input class="btn btn-danger" method="post" type="button" value="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')"></a> </td>  
                </tr>
<?php
}
?>                
            </table>
            <p><a href="/../blog_ecrivain/index.php?action=showModerateComment"><input class="col-lg-offset-9 col-lg-2 btn btn-secundary" type="button" value="tous les commentaires"/></a></br></p>
        </div>
        
    <?php
    $content = ob_get_clean();
     ?>    
    





