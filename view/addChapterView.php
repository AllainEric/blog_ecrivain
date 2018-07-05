<?php $title ='Création d\'un chapitre' ?>

<?php ob_start(); ?>

<a href="/../blog_ecrivain/index.php?action=admin_home"><input class="col-lg-offset-9 col-lg-2 btn btn-secundary" type="button" value="Retour à l'espace d'administration"/></a></br>

<!-- Comment Form -->
        <p><h2 class="col-lg-12">Création d'un Nouveau Chapitre </h2></br></p>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <form id="addChapter" name="addChapter" action="index.php?action=addChapter" method="post">
                <div>
                    <label class="col-form-label" for="title">Titre</label>
                    <input class="form-control" size="40" type="text" id="title" name="title" required /><br/>
                </div> <br/>

                <div>
                    <label class="col-form-label" for="chapter">Chapitre n°</label>
                    <input class="form-control" type="number" id="chapter_id" name="chapter_id" required />
                </div> <br/>
                    
                <div>
                    <label class="col-form-label" for="content">Texte</label><br />
                    <textarea rows="15" cols="50" class="form-control" id="content" name="content"></textarea>
                </div><br/>

                <div class="btn-toolbar">
                    <input class="btn btn-danger pull-right" type="reset" name="annuler" value=" Annuler ">
                    <input class="btn btn-success pull-right" type="submit" id="addChapter" name="addChapter" value="Publier">
                </div>
            </form>  
        </div>
    </div>
</div> 
<?php $content = ob_get_clean(); ?>    