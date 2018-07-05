<?php $title ='Modification du commentaire' ?>

<?php ob_start(); ?>

	<a href="/../blog_ecrivain/index.php?action=admin_home"><input class="col-lg-offset-9 col-lg-2 btn btn-secundary" type="button" value="Retour à l'espace d'administration"/></a></br>
	
	<h1 class="col-lg-12"> Modification du commentaire de <?= $comment['author'] ?> : </h1> 
	<h3 class="col-lg-12">du <?= $comment['comment_date_fr']?>  </h3> <br/>
	<br/>

<!-- Comment Form -->
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			<form action="index.php?action=modifyComment&amp;id=<?=$comment['id'] ?>" method="post">

				<div>
					<label class="col-form-label" for="author">Auteur</label>
					<input class="form-control" type="text" id="author" name="author" value="<?= $comment['author']?>" required />
				</div> <br/>
				
				<div>
					<label class="col-form-label" for="comment">Texte</label><br />
					<textarea rows="15" cols="40" class="form-control" id="comment" name="comment" required > <?= $comment['comment']?></textarea>
				</div> <br/>

				

				<div class="btn-toolbar">
					<a class="btn btn-danger pull-right" href="/../blog_ecrivain/index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>" role="button" method="post" value="Supprimer" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">Supprimer</a>
					<input class="btn btn-success pull-right" type="submit" value="modifier" name="modify" onclick="return confirm('Êtes-vous sûr de vouloir modifer ce commentaire ?')"/>
				</div>
			</form>
		</div>
     </div>
</div>  
<?php $content = ob_get_clean(); ?>