<?php

namespace JeanForteroche\Blog\Model;

require_once("Manager.php");

class ChapterManager extends Manager
{

    /**
     *  get all chapter value
     * @return $chapters
     */
    public function getAllChapter()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *, DATE_FORMAT(creation_date, "%d/%m/%Y") AS creation_date_fr FROM chapters ORDER BY chapter_id DESC');
        $req->execute();
        $chapters = $req->fetchAll();
        $req->closeCursor();
        return $chapters;
    }

    /**
     * get all chapter value for admin
     * @return $allChapters
     */
    public function getAllAdminChapters()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, DATE_FORMAT(creation_date, "%d/%m/%Y") AS creation_date_fr FROM chapters WHERE chapter_id > 0 ORDER BY chapter_id DESC ');
        $req->execute();
        $allChapters = $req->fetchAll();
        $req->closeCursor();
        return $allChapters;
    }

    /**
     * get chapter value
     * 
     * @param $chapterId
     * @return $chapter
     */
    public function getChapter($chapterId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, chapter_id, title, content, image, DATE_FORMAT(creation_date, "%d/%m/%Y") AS creation_date_fr FROM chapters WHERE id=?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
        return $chapter;
    }

    /**
     * create new chapter
     *
     * @param $postId
     * @param $title
     * @param $content
     * @return $affectedLines
     */
    public function addChapter($postId, $title, $content)
    {
        $db = $this->dbconnect();

        $req = $db->prepare('INSERT INTO chapters(chapter_id, title, content, creation_date) VALUES (?, ?, ?, NOW())');
        $affectedLines = $req->execute(array($postId, $title, $content));
        return $affectedLines;

    }

    /**
     * delete chapter
     *
     * @param $id
     */    
    public function deleteChapter($id)
    {
        $db = $this->dbConnect();
        
        $req = $db->prepare('DELETE FROM chapters WHERE id=:id');
        $req->bindValue('id', $id, \PDO::PARAM_INT);
        return $req->execute();
    }
    
    /**
     * modify Chapter
     * 
     * @param $chapterId
     * @param $nbChapter
     * @param $title
     * @param $content
     * @return $affectedLines
     */
    public function modifyChapter($chapterId, $nbChapter, $title, $content)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE chapters SET chapter_id = :chapter_id, title = :title, content = :content  WHERE id = :id');
        $affectedLines = $req->execute(array('id'=>$chapterId, 'chapter_id'=>$nbChapter, 'title'=>$title, 'content'=>$content));

        return $affectedLines;
    }
}
