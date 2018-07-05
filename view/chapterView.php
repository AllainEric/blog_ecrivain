<?php ob_start(); ?>

    <div class="text-center">
      <img class="img responsive" src="<?= htmlspecialchars($chapter['image']) ?>" alt=""> 
    </div>      
      <div class="post-preview">
        <article> 
          <div class="container"> 
              <a href="index.php?action=chapter&id=<?= $chapter['id'] ?> ">
                <p><a href='index.php#chapters'>Retour aux chapitres</a></p>
                <p class="post-meta">
                      Chapitre n° <?= htmlspecialchars($chapter['chapter_id']) ?>
                      le <?= htmlspecialchars($chapter['creation_date_fr']) ?>
                </p>
                <p><h2 class="post-title">
                    <?= htmlspecialchars($chapter['title']) ?>
                  </h2>
                  <class="post-subtitle d-none d-sm-block">
                    <?php echo ($chapter['content']) ?>
                </p>
              </a>  
           
  
                <p><class="post-comments">
                <h2>Commentaires</h2> 

<?php
foreach($comments as $comment)
{                
?>
            <div> 
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> 
                  <em>le <?= $comment['comment_date_fr'] ?></p></em>

                  <!-- bouton signalement --> 
                  <div class="pull-right actions">
                    <button type="button" class="btn btn-danger btn-ms" title="Signaler" data-toggle="modal" data-target="#spamDialog{{ comment.idcom }}">
                      <i class="far fa-thumbs-down" size="5"></i>
                    </button>
                  </div>  
                  <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            
                   <!-- popup signalement -->  
                    <div class="modal fade" id="spamDialog{{ comment.idcom }}" tabindex="-1" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="dataConfirmLabel">Confirmation nécessaire</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                            
                          </div>
    <?php
      if ($comment['signal_comment'] == 0) {
    ?>                            
                          <div class="modal-body">
                            <p> Voulez-vous vraiment Signaler ce commentaire ?<br></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <a href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>&amp;chapter_id=<?= $chapter['id'] ?>" method="post" class="btn btn-danger" >Confirmer</a>
                          </div>
                       
    <?php
      }
      elseif ($comment['signal_comment'] == 1) {
      ?>
                          <div class="modal-body">
                            <p class='confirmate'>Ce commentaire a été signalé à Jean de Forteroche.</p>
                          </div>  
    <?php
      }
      elseif ($comment['signal_comment'] == 2) {
      ?>
                          <div class="modal-body">
                            <p class='moderate'>Ce commentaire a été modéré par Jean de Forteroche.</p>
                          </div>
    <?php    
      }
    ?>       
                        </div>
                      </div>
                    </div>              
            </div>

<?php
}
?>  
        </article>     

<!-- Comment Form -->
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p><b>Laisser un commentaire sur ce Chapitre :</b></p>
            <form id="comment" name="comment" action="index.php?action=addComment&id=<?= $chapter['id'] ?>" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Pseudo</label>
                <input type="text" class="form-control" placeholder="Pseudo" id="author" name="author" required data-validation-required-message="Veuillez entrer votre pseudo.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Commentaire</label>
                <textarea rows="5" class="form-control" placeholder="Commentaire" id="comment" name="comment" required data-validation-required-message="Veuillez entrer votre message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="addCommentButton" name="addComment">Envoyer</button>
            </div>
          </form>
        </div>
      </div>
    </div>        

<?php $content = ob_get_clean(); ?>