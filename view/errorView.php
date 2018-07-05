<?php $title = "Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>      

<h1>Blog de Jean Forteroche : "Billet simple pour l'Alaska"</h1>

<div class="post">
	<div class="post_header">
		<h3>Oups ! Il semblerait y avoir une erreur...</h3>
	</div>
	<div class="post_content">
		<p>
			<?= $error=''; $error ?>
		</p>
		<a href="../index.php">Retour à l'accueil</a>
	</div>
</div>
<?php
$content = ob_get_clean();

include(__DIR__ . '/../view/errorTemplate.php');
?>