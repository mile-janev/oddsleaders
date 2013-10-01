<?php

class UserRoleCheck{
    
    public static function admins()
    {
        $adminUsers = Role::model()->findAllByAttributes(array("role"=>Role::ADMIN_USER));
        
        $adminsArray = array();
        
        foreach($adminUsers as $admin){
            $adminsArray[$admin->user->id] = $admin->user->username;
        }
        
        return $adminsArray;
    }
    
    public static function frees()
    {
        $freeUsers = Role::model()->findAllByAttributes(array("role"=>Role::FREE_USER));
        
        $freesArray = array();
        
        foreach($freeUsers as $free){
            $freesArray[$free->user->id] = $free->user->username;
        }
        
        return $freesArray;
    }
    
    public static function isAdmin($id=0)
    {
        $bool = false;
        
        $role = new Role();
        $roles = $role->findAllByAttributes(array("user_id" => $id));
        foreach ($roles as $role)
        {
            if($role->role == Role::ADMIN_USER)
            {
                $bool = true;
            }
        }
        
        return $bool;
    }
    
    public static function isFree($id=0)
    {
        $bool = false;
        
        $role = new Role();
        $roles = $role->findAllByAttributes(array("user_id" => $id));
        foreach ($roles as $role)
        {
            if($role->role == Role::FREE_USER)
            {
                $bool = true;
            }
        }
        
        return $bool;
    }
    
    public static function get_roles($id=0)
    {
        $user_roles = array();
        
        $role = new Role();
        $roles = $role->findAllByAttributes(array("user_id" => $id));
        foreach ($roles as $role)
        {
            $user_roles[] = $role->role;
        }
        
        return $user_roles;
    }
    
}

?>
