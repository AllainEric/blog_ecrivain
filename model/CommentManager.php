<?php
namespace JeanForteroche\Blog\Model;

require_once("Manager.php");

class CommentManager extends Manager
{

    /**
     * get  all comments
     *
     * @param $postId
     * @return $comments
     */
    public function getAllComment($postId)
    {
        $db = $this->dbConnect();
       
        $req = $db->prepare('SELECT id, author, comment, signal_comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date_fr FROM comments WHERE chapter_id=?  ORDER BY comment_date DESC');
        $req->execute(array($postId));
        $comments = $req->fetchAll();
        $req->closeCursor();
        return $comments;
    }

    /**
     * get signal comments display and signal_comment
     *
     * @return $allComments
     */
    public function getAllSignalComments()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, author, comment, signal_comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date_fr FROM comments WHERE signal_comment=0 OR signal_comment=1 ORDER BY comment_date DESC');
        $req->execute();
        $allComments = $req->fetchAll();
        $req->closeCursor();
        return $allComments;
    }

    /**
     * get All moderate comments : display, signal_comment and moderate comment
     * @return $moderateComments
     */
    public function getAllModerateComments()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, author, comment, signal_comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date_fr FROM comments WHERE signal_comment=0 OR signal_comment=1 OR signal_comment=2 ORDER BY comment_date DESC');
        $req->execute();
        $moderateComments = $req->fetchAll();
        $req->closeCursor();
        return $moderateComments;
    }

    /**
     * add comment
     *
     * @param $postId 
     * @param $author 
     * @param $comment
     * @return $affectedLines
     */
    public function addComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO comments(chapter_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($postId, $author, $comment));
        
        return $affectedLines;
    }

    /**
     * signal comment
     *
     * @param $id
     * @return $req->execute()
     */
    public function signalComment($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET signal_comment = 1 WHERE id=:id');
        $req->bindValue('id', $id);

        return $req->execute();
    }

     /**
     * delete comment
     *
     * @param  $id
     * @return $req->execute()
     */
    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        
        $req = $db->prepare('DELETE FROM comments WHERE id=:id');
        $req->bindValue('id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }

    /**
     * moderate comment
     * @param $id
     * @return $req->execute()
     */
    public function moderateComment($id)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET signal_comment = 2 WHERE id=:id');
        $req->bindValue('id', $id);

        return $req->execute();
    }

    /**
     * get comment
     * @param $commentId
     * @return $req->fetch()
     */
    public function getComment($commentId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, comment, author, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%i") AS comment_date_fr FROM comments WHERE id = ?');
        $req->execute(array($commentId));

        return $req->fetch();
    }

    /**
     * modify comment
     * @param $commentId
     * @param $author
     * @param $comment
     * @return $affectedLines
     */
    public function modifyComment($commentId, $author, $comment)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE comments SET author = :author, comment = :comment WHERE id = :id');
        $affectedLines = $req->execute(array('id'=>$commentId, 'author'=>$author, 'comment'=>$comment));
       
        return $affectedLines;
    }
}
    
