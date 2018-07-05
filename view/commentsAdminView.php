<?php ob_start(); ?>

        <h3 class="col-lg-12">Bienvenue sur l'espace d'Administration</h3><a href="/../blog_ecrivain/index.php?action=admin_home"><input class="col-lg-offset-9 col-lg-2 btn btn-secundary" type="button" value="retour à l'espace d'administration"/></a>

        <h4 class="col-lg-offset-1 col-lg-5 col-lg-offset-6">Gestion des Commentaires :</h4>

<div class="table-responsive col-lg-offset-1 col-lg-10 col-lg-offset-1">
    <table class="table">
            <tr class="tete">
                <td class="td">Commentaires</td>
                <td class="td">Auteur</td>
                <td class="td">Date d'ajout</td>
                <td class="td">Statut</td>
            </tr>

<?php foreach($moderateComments as $comment)
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
        </tr>
<?php
}
?>                
    </table>
</div>

<?php $content = ob_get_clean(); ?>
