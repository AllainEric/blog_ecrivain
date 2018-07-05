<?php $title = "billet simple pour l'Alaska"; ?>

<?php ob_start(); ?>

<?php foreach($chaptersList as $data)
{
?>
        <div class="post-preview">
            <a href="index.php?action=chapter&id=<?= $data['id'] ?> ">
              <h2 class="post-title">
                <?= htmlspecialchars($data['title']) ?>
              </h2>
              <h4 class="post-subtitle d-none d-sm-block">
                <?php echo substr($data['content'], 0, 500).'...'; ?>
              </h4>
              <h4 class="post-subtitle d-block d-sm-none">
                <?php echo substr($data['content'], 0, 300). '...'; ?>    
              </h4>
            </a>
            <p class="post-meta">
                Chapitre n° <?= htmlspecialchars($data['chapter_id']) ?>
                le <?= htmlspecialchars($data['creation_date_fr']) ?>
            </p>
        </div>
<?php 
}
?>
<?php $content = ob_get_clean(); ?>



