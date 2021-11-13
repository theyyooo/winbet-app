<?php
require_once '../src/Models/Entities/Permission.php';
require_once '../src/Models/DAO/DAOUser.php';

class Auth
{
    /**
     * Verifie si l'utilisateur est connecté
     *
     * @return boolean
     */
    public static function isLogged()
    {
        return isset($_SESSION['user_id']) ? true : false;
    }

    //vérifie si il a la permission
    /**
     * Undocumented function
     *
     * @param $p
     * @return boolean
     */
    public static function hasPermission($p)
    {
        $permissions = (isset($_SESSION['user_Permissions'])) ? $_SESSION['user_Permissions'] : null ;
        return $p & $permissions;
    }

    //inscrit l'user
    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public static function addUser($newUser)
    {
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $user = $DAOUser->findByLogin($newUser->getEmail());
        if(!$user){
            $DAOUser->save($newUser);
        } 
        else{
            header('Location: /user/signup');
            exit;
        }
        //$user = $DAOUser->findByLogin($user->getEmail());
        //$DAOUser->saveDefaultUserRole($user);
    }

    /**
     * Connecte l'user
     *
     * @param string $email
     * @param string $password
     * @return void
     */
    public static function logUser($email, $password)
    {
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $user = $DAOUser->findByLogin($email);
        // echo $password;
        //var_dump($user);
        // echo $user->password;
        if ($user->getPassword() == $password) {
            //$roles = $DAOUser->findRolesFromUser($user);
            $permissions = 0;
            // foreach ($roles as $role) {
            //     $permissions += $role->getPermissions();
            // }
            // echo $user->User_Id;
            $_SESSION['user_id'] = $user->getId();
            $_SESSION['user_firstname'] = $user->getFirstname();
            $_SESSION['user_permissions'] = $permissions;
            header('Location: /');
            exit;
        } else {
            header('Location: /user/login');
        }
    }

    /**
     * Deconnecte l'utilisateur
     *
     * @return void
     */
    public static function logout()
    {
        session_destroy();
        header('Location: /');
    }
}