<?php

namespace App\Policies;

use App\Models\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User\Admin  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return $this->getPermission($user, 11);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User\Admin  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user)
    {
        return $this->getPermission($user, 12);
    }

    // public function action(Admin $user)
    // {
    //     return $this->getPermission($user, 5);
    // }
    
    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User\Admin  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user)
    {
        return $this->getPermission($user, 14);
    }
    public function tag(Admin $user)
    {
        return $this->getPermission($user, 18);
    }
    public function category(Admin $user)
    {
        return $this->getPermission($user, 19);
    }

    protected function getPermission($user, $p_id)
    {
        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission->id == $p_id){
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User\Admin  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User\Admin  $user
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user)
    {
        //
    }
}
