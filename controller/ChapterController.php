<?php

namespace JeanForteroche\Blog\Controller;

    require_once('model/ChapterManager.php');
    require_once('model/CommentManager.php');

    use JeanForteroche\Blog\Model\ChapterManager;
    use JeanForteroche\Blog\Model\CommentManager;

    class ChapterController
    {
        /**
         * Home Page show all chapter
         */
        public function allChapterAction()  
        {
            $chapterRepository = new ChapterManager();
            $chaptersList = $chapterRepository->getAllChapter();

            if ($chaptersList == false) {
                echo 'impossible afficher les chapitres !';
                throw new \Exception("impossible afficher les chapitres !");
            }

            include(__DIR__ . '/../view/homeView.php');
            include(__DIR__ . '/../view/homeTemplate.php');
        }    

        /**
         * chapter detail
         *
         * @param $id
         */
        public function chapterShowAction($id)
        {
            $postChapter = new ChapterManager();
            $chapter = $postChapter->getChapter($id);

            $commentRepository = new CommentManager();
            $comments = $commentRepository->getAllComment($id);

            include(__DIR__ . '/../view/chapterView.php');
            include(__DIR__ . '/../view/template.php');
        }

        /**
         *  Add comment
         * 
         * @param $postId
         * @param $author
         * @param $comment
         */
        public function addCommentAction($postId, $author, $comment)
        {
            $commentManager = new CommentManager();
            $affectedLines = $commentManager->addComment($postId, $author, $comment);

            if ($affectedLines === false) {
                echo 'impossible d\'ajouter le commentaire !';
                throw new \Exception("impossible d\'ajouter le commentaire !");
            }
            else {
                header('location: index.php?action=chapter&id=' .$postId);
            }
        }

        /**
         * signal comment
         * 
         * @param $id
         * @param $chapter_id
         */

        public function signalCommentAction($id,$chapter_id)
        {
            $commentManager = new CommentManager();
            $affectedLines = $commentManager->signalComment($id);

            if ($affectedLines === false) {
                echo 'impossible de signaler le commentaire !';
                throw new \Exception("impossible de signaler le commentaire !");
            }
            header('location: index.php?action=chapter&id=' . $chapter_id);
       }
    }