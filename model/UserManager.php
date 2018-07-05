<?php
namespace JeanForteroche\Blog\Model;

require_once("Manager.php");

class UserManager extends Manager
{

    /**
     * connexion back-office
     *
     * @param $pseudo
     * @param $pass
     * @return $esult
     */
   
    public function connexion($pseudo, $pass)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT member_id, pseudo, pass FROM users WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $result = $req->fetch();
        
        if(password_verify($pass, $result['pass'])){
            $_SESSION['login'] = $pseudo;
            $_SESSION['pass'] = $pass;

            return true;

        } else {
            return false;
        }
    }
}
