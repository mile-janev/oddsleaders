<?php

class UserRoleCheck{
    
    public static function admin_users()
    {
        $adminUsers = Role::model()->findAllByAttributes(array("role"=>Role::ROLE_ADMINISTRATOR));
        
        $adminArray = array("");
        
        foreach($adminUsers as $admin){
            $adminArray[$admin->user->id] = $admin->user->username;
        }
        
        return $adminArray;
    }
    
    public static function free_users()
    {
        $freeUsers = Role::model()->findAllByAttributes(array("role"=>Role::FREE_USER));
        
        $freeArray = array("");
        
        foreach($freeUsers as $free){
            $freeArray[$free->user->id] = $free->user->username;
        }
        
        return $freeArray;
    }
    
    public static function isAdmin($id=0)
    {
        $bool = false;
        
        $roles = Role::model()->findAllByAttributes(array("user_id" => $id));
        
        foreach ($roles as $role)
        {
            if($role->role == Role::ROLE_ADMINISTRATOR)
            {
                $bool = true;
            }
        }
        
        return $bool;
    }
    
    public static function isFree($id=0)
    {
        $bool = false;
        
        $roles = Role::model()->findAllByAttributes(array("user_id" => $id));
        
        foreach ($roles as $role)
        {
            if($role->role == Role::ROLE_FREE)
            {
                $bool = true;
            }
        }
        
        return $bool;
    }
    
    public static function get_roles($id=0)
    {
        $user_roles = array();
        
        $roles = Role::model()->findAllByAttributes(array("user_id" => $id));
        
        foreach ($roles as $role)
        {
            $user_roles[] = $role->role;
        }
        
        return $user_roles;
    }
    
}

?>
