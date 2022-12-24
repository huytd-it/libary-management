<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\TaiKhoan;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(TaiKhoan $taiKhoan)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(TaiKhoan $taiKhoan, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(TaiKhoan $taiKhoan)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(TaiKhoan $taiKhoan, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(TaiKhoan $taiKhoan, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(TaiKhoan $taiKhoan, Setting $setting)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\TaiKhoan  $taiKhoan
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(TaiKhoan $taiKhoan, Setting $setting)
    {
        //
    }
}
