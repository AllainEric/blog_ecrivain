<?php

require_once('controller/ChapterController.php');
require_once('controller/AdminController.php');

use JeanForteroche\Blog\Model\ChapterManager;
use JeanForteroche\Blog\Controller\ChapterController;
use JeanForteroche\Blog\Controller\AdminController;
use JeanForteroche\Blog\Model\UserManager;
use JeanForteroche\Blog\Model\CommentManager;
use JeanForteroche\Blog\Model\ControllerManager;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start ();

try
{
    $chapters_controller = new ChapterController();
    $admin_controller = new AdminController();

    if(empty($_SERVER['QUERY_STRING'])){ 
       $chapters_controller->allChapterAction(); 
    }

    if(isset($_GET['action'])){
        if ($_GET['action'] == 'chapter') { 
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $id = $_GET['id'];
                $chapters_controller->chapterShowAction($id);
            }
        }        
    } 
    if (isset($_GET['action']) && $_GET['action'] == 'addComment') {
       if(isset($_GET['id']) && $_GET['id'] > 0) {  
          if (isset($_POST['author'], $_POST['comment']) && !empty($_POST['author']) && !empty($_POST['comment'])) {
              $chapters_controller->addCommentAction($_GET['id'], $_POST['author'], $_POST['comment']);
           }
           else {
               throw new Exception("tous les champs ne sont pas remplis !");               
           }  
       }
       else {
           throw new Exception("Aucun billet envoyé");
       }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'signalComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['chapter_id']) && $_GET['chapter_id'] > 0){
            $chapters_controller->signalCommentAction($_GET['id'], $_GET['chapter_id']);
        }
    }
        
    if (isset($_GET['action']) && $_GET['action'] == 'admin_home') {
         
            $admin_controller->homeAdminAction();
    }

    if (isset($_GET['action']) && $_GET['action'] == 'admin_getAllComments') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $comments->getAllCommentsForAdmin();
        }
        else {
            throw new Exception('Aucun commentaire envoyé pour modération');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'admin_getAllChapters') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $chapters_controller->getAllChaptersForAdmin();
        }
        else {
            throw new Exception('Aucun chapitre envoyé au tableau de bord !');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'deleteComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin_controller->deleteCommentAction($_GET['id']);
        }
        else {
            throw new Exception('Aucun commentaire supprimé du tableau de bord !');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'moderateComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin_controller->moderateCommentAction($_GET['id']);
        }
        else {
            throw new Exception('Aucun commentaire modéré par Jean de Forteroche !');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'showModerateComment') {
        $admin_controller->displayModerateCommentAction();
    }

    if (isset($_GET['action']) && $_GET['action'] == 'displayComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin_controller->modifyCommentActionForm($_GET['id']);
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'modifyComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (isset($_POST['author'], $_POST['comment']) && !empty($_POST['author']) && !empty($_POST['comment'])) {
               
                $admin_controller->modifyCommentAction($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('tous les champs ne sont pas remplis !');
            }
        }
        else {
            throw new Exception("Aucun commentaire modifié par Jean de Forteroche !");
        }
    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'displayChapter') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin_controller->modifyChapterActionForm($_GET['id']);
        }
        else {
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'modifyChapter') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (isset($_POST['title'], $_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                $admin_controller->modifyChapterAction($_GET['id'], $_POST['chapter_id'], $_POST['title'], $_POST['content']);
            }
            else {
                throw new Exception('Aucun chapitre modifié par Jean de Forteroche !');
            }
        }
    }
    
    if (isset($_GET['action']) && $_GET['action'] == 'deleteChapter') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $admin_controller->deleteChapterAction($_GET['id']);
        }
        else {
            throw new Exception('Aucun chapitre supprimé du tableau de bord !');
        }
    }

    
    if (isset($_GET['action']) && $_GET['action'] == 'showAddChapter') {
            $admin_controller->AddChapterFormAction();
    }
    

    if (isset($_GET['action']) && $_GET['action'] == 'addChapter') {
        if(isset($_POST['chapter_id']) && $_POST['chapter_id'] > 0) {  
            if (isset($_POST['title'], $_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                $admin_controller->addChapterAction($_POST['chapter_id'], $_POST['title'], $_POST['content']);
                }
                else {
                    throw new Exception("tous les champs ne sont pas remplis !");               
                }  
            }
            else {
                throw new Exception("Aucun chapitre envoyé");
        }
     }

     if (isset($_GET['action']) && $_GET['action'] == 'loginMember'){
        $admin_controller->loginFormAction();
     }  

     if (isset($_GET['action']) && $_GET['action'] == 'login') { 
        if (!empty($_POST['pseudo']) || !empty($_POST['pass'])) { 
            if (!$admin_controller->loginAction($_POST['pseudo'], $_POST['pass'])) {

                throw new Exception("Les identifiants sont incorrects. Vérifiez votre pseudo ou votre mot de passe.");
            }
        }
    }  
    
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        $admin_controller->logOutAction($_GET['id']);
    }
}

catch(Exception $e) {
    $error = 'Erreur : ' .$e->getMessage();
    require("view/errorView.php");
}
