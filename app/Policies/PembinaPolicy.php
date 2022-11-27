<?php

namespace App\Policies;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembinaPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can view any models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAny(User $user)
  {
    // Semua bisa liat daftar pembina
    return true;
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Pembina $pembina)
  {
    return
      $user->isAdmin() ||
      ($user->isPembina() &&
        $user->pembina->pangkalan_id === $pembina->pangkalan_id
      ) ||
      ($user->isPesertaDidik() &&
        $user->peserta_didik->pangkalan_id === $pembina->pangkalan_id
      );
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user)
  {
    return $user->isAdminPangkalan() || auth()->guest();
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, Pembina $pembina)
  {
    return ($user->isAdminPangkalan() &&
      $user->pembina->pangkalan_id === $pembina->pangkalan_id
    ) ||
      $user->id === $pembina->user_id;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, Pembina $pembina)
  {
    return
      $user->isAdmin() ||
      ($user->isAdminPangkalan() &&
        $user->pembina->pangkalan_id === $pembina->pangkalan_id
      ) ||
      $user->id === $pembina->user_id;
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, Pembina $pembina)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, Pembina $pembina)
  {
    //
  }
}
