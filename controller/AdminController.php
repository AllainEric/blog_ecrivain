<?php

namespace JeanForteroche\Blog\Controller;

require_once('model/CommentManager.php');
require_once('model/ChapterManager.php');
require_once('model/UserManager.php');

use JeanForteroche\Blog\Model\ChapterManager;
use JeanForteroche\Blog\Model\CommentManager;
use JeanForteroche\Blog\Model\UserManager;

 class AdminController
 {     
    /**
     * check connexion Admin
     * 
     */
    public function checkIfAdmin()
    {
        if (!isset($_SESSION['login']) || !isset($_SESSION['pass'])) {
             header('location: index.php?action=loginMember');        
        }
    }
    
    /**
     * home Admin dashboard
     */
    public function homeAdminAction()
    {
        $this->checkIfAdmin();

        $commentRepository = new CommentManager();
        $allComments = $commentRepository->getAllSignalComments();

        $chapterRepository = new ChapterManager();
           $allChapters = $chapterRepository->getAllAdminChapters();

        if ($allComments === false) {
           echo 'impossible afficher les commentaires !';
           throw new \Exception("impossible afficher les commentaires !");
       }

       if ($allChapters == false) {
        echo 'impossible afficher le titre du chapitre !';
        throw new \Exception("impossible afficher le titre du chapitre !");
       }
      
       include(__DIR__ . '/../admin/pages/index.php');
       include(__DIR__ . '/../admin/pages/adminTemplate.php');
    }

    /**
     * Display all moderate comments
     */
    public function displayModerateCommentAction()
    {
        $this->checkIfAdmin();

        $commentRepository = new CommentManager();
        $moderateComments = $commentRepository->getAllModerateComments();
        
        if ($moderateComments === false) {
            echo 'impossible afficher les commentaires !';
            throw new \Exception("impossible afficher les commentaires !");
        }
        
        include(__DIR__ . '/../view/commentsAdminView.php');
        include(__DIR__ . '/../admin/pages/adminTemplate.php');
    }

    /**
     * Delete comment
     * @param $id 
     */
    public function deleteCommentAction($id)
    {
        $this->checkIfAdmin();

        $commentRepository = new CommentManager();
        $deleteComment = $commentRepository->deleteComment($id);

        if ($deleteComment == false) {
            echo 'impossible de supprimer le commentaire !';
            throw new \Exception("impossible de supprimer le commentaire !");
        }
        header('location: index.php?action=admin_home');
    }   
    
    /**
     * Moderate comment
     * @param $id
     */
    public function moderateCommentAction($id)
    {
        $this->checkIfAdmin();
        
        $commentRepository = new CommentManager();
        $moderateComment = $commentRepository->moderateComment($id);

        if ($moderateComment == false) {
            echo 'impossible de modérer le commentaire !';
            throw new \Exception("impossible de modérer le commentaire !");
        }
        header('location: index.php?action=admin_home');
    }

    /**
     * Form for display and modify comment 
     * @param $id
     */
    public function modifyCommentActionForm($id)
    {
        $this->checkIfAdmin();

        $commentRepository = new CommentManager();
        $comment  =   $commentRepository->getComment($id);
        
        if ($comment == false) {
            echo 'impossible d\' afficher le commentaire !';
            throw new \Exception("impossible d\' afficher le commentaire !");
        }
        include(__DIR__ . '/../view/modifyCommentView.php');
        include(__DIR__ . '/../admin/pages/adminTemplate.php');
    }

    /**
     * Modify comment
     * @param $commentId
     * @param $author
     * @param $comment
     */
    public function modifyCommentAction($commentId, $author, $comment)
    {
        $this->checkIfAdmin();

        $commentRepository = new CommentManager();
        $modifyComment = $commentRepository->modifyComment($commentId, $author, $comment);
        
        if ($modifyComment == false) {
            echo 'impossible de modifier le commentaire !';
            throw new \Exception("impossible de modifier le commentaire !");
        }
        header('location: index.php?action=admin_home');
    }

    /**
     * Form for display and modify chapter
     * @param $id
     */
    public function modifyChapterActionForm($id)
    {
        $this->checkIfAdmin();

        $chapterRepository = new ChapterManager();
        $chapter  =   $chapterRepository->getChapter($id);
            
        if ($chapter == false) {
            echo 'impossible d\' afficher le chapitre !';
            throw new \Exception("impossible d\' afficher le chapitre !");
        }
        include(__DIR__ . '/../view/modifyChapterView.php');
        include(__DIR__ . '/../admin/pages/adminTemplate.php');
    }  
    
    /**
     * modify Chapter
     * 
     * @param $chapterId
     * @param $nbChapter
     * @param $title
     * @param $content
     */
    public function modifyChapterAction($chapterId, $nbChapter, $title, $content)
    {
        $this->checkIfAdmin();

        $chapterRepository = new ChapterManager();
        $modifyChapter = $chapterRepository->modifyChapter($chapterId, $nbChapter, $title, $content);
                
        if ($modifyChapter == false) {
            echo 'impossible de modifier le chapitre !';
            throw new \Exception("impossible de modifier le chapitre !");
            }
            header('location: index.php?action=admin_home');
    }
    
    /**
     * Delete Chapter
     * 
     * @param $id 
     */
        
    public function deleteChapterAction($id)
    {
        $this->checkIfAdmin();

        $chapterRepository = new ChapterManager();
        $deleteChapter = $chapterRepository->deleteChapter($id);

        if ($deleteChapter == false) {
            echo 'impossible de supprimer le chapitre !';
            throw new \Exception("impossible de supprimer le chapitre !");
            }
            header('location: index.php?action=admin_home');
    }
    
    /**
     * Form to add Chapter
     */
        
    public function addChapterFormAction()
    {
        $this->checkIfAdmin();

        include(__DIR__ . '/../view/addChapterView.php');
        include(__DIR__ . '/../admin/pages/adminTemplate.php');
    }
    
    /**
     * Add chapter 
     * @param $postId
     * @param $title
     * @param $content
     */
    public function addChapterAction($postId, $title, $content)
    {
        $this->checkIfAdmin();

        $chapterManager = new ChapterManager();
        $affectedLines = $chapterManager->addChapter($postId, $title, $content);

        if ($affectedLines === false) {
            echo 'impossible d\'ajouter le chapitre !';
            throw new \Exception("impossible d\'ajouter le chapitre !");
        }
        else {
            header('location: index.php?action=admin_home');
        }
    } 

    /**
     * Form for login to the dashboard
     */
        
    public function loginFormAction()
    {
        include(__DIR__ . '/../admin/pages/login.php');
    }

    /**
     * Login to the dashboard
     * @param $pseudo
     * @param $pass 
     */    
    public function loginAction($pseudo, $pass)
    {
        $userManager = new UserManager();
        $pseudo = htmlspecialchars($pseudo);
        $pass = htmlspecialchars($pass);
        $affectedLines = $userManager->connexion($pseudo, $pass);

        if ($affectedLines === false) {
            echo '<div class="alert alert-danger" role="alert">impossible de se connecter ! Les identifiants sont incorrects. Vérifiez votre pseudo ou votre mot de passe.</div>';
            include(__DIR__ . '/../admin/pages/login.php');
            throw new \Exception("impossible de se connecter ! Les identifiants sont incorrects. Vérifiez votre pseudo ou votre mot de passe.");
        }
            header('location: index.php?action=admin_home');
    }

    /**
     * Log out to the dashboard
     */
    public function logOutAction()
    {
        $this->checkIfAdmin();
        // On détruit les variables de notre session
        session_unset ();

        // On détruit notre session
        session_destroy ();

        // Suppression des cookies de connexion
        setcookie('pseudo','');
        setcookie('pass','');

        // On redirige le visiteur vers la page du site
        header('location: /../blog_ecrivain/index.php');
    }
}