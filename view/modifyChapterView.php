<?php $title ='Modification d\'un chapitre' ?>

<?php ob_start(); ?>

<a href="/../blog_ecrivain/index.php?action=admin_home"><input class="col-lg-offset-9 col-lg-2 btn btn-secundary" type="button" value="Retour à l'espace d'administration"/></a></br>

<p><h2 class="col-lg-12"><b>Modification du chapitre N°<?= $chapter['chapter_id'] ?> : </b><?= $chapter['title']?></h2></p></br>

<!-- Comment Form -->
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
			<form action="index.php?action=modifyChapter&amp;id=<?=$chapter['id'] ?>" method="post">
				<div>
					<label class="col-form-label" for="title">Titre</label>
					<input class="form-control" size="40" type="text" id="title" name="title" value="<?= $chapter['title']?>" required /> <br/>
				</div> <br/>

				<div>
					<label class="col-form-label" for="chapter">Chapitre n°</label>
					<input class="form-control" type="number" id="chapter_id" name="chapter_id" value="<?= $chapter['chapter_id']?>" required />
				</div> <br/>

				<div>
					<label class="col-form-label" for="content">Texte</label><br />
					<textarea rows="15" cols="50" class="form-control" id="content" name="content"> <?= $chapter['content']?></textarea>
				</div> <br/>

				<div class="btn-toolbar">
					<a class="btn btn-danger pull-right" href="/../blog_ecrivain/index.php?action=deleteChapter&amp;id=<?= $chapter['id'] ?>" role="button" method="post" value="Supprimer" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce chapitre ?')">Supprimer</a>
					<input class="btn btn-success pull-right" type="submit" value="Modifier" name="modify" onclick="return confirm('Êtes-vous sûr de vouloir modifer ce chapitre ?')"/>
				</div>
			</form>
		</div>
     </div>
</div>  
<?php $content = ob_get_clean(); ?>