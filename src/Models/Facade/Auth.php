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
        return isset($_SESSION['user_Id']) ? true : false;
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
    public static function addUser($user)
    {
        $DAOUser = new DAOUser(Singleton::getInstance()->cnx);
        $DAOUser->save($user);
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
        if ($user->password == $password) {
            //$roles = $DAOUser->findRolesFromUser($user);
            $permissions = 0;
            // foreach ($roles as $role) {
            //     $permissions += $role->getPermissions();
            // }
            // echo $user->User_Id;
            $_SESSION['user_Id'] = $user->user_Id;
            $_SESSION['user_Firstname'] = $user->firstname;
            $_SESSION['user_Permissions'] = $permissions;
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