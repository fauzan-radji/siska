<?php

namespace App\Policies;

use App\Models\Pangkalan;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PangkalanPolicy
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
    return $user->isAdmin() || $user->isPembina();
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Pangkalan $pangkalan)
  {
    return
      $user->isAdmin() ||
      $user->isPembina() ||
      ($user->isPesertaDidik() &&
        $user->peserta_didik->pangkalan_id === $pangkalan->id
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
    return auth()->guest();
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, Pangkalan $pangkalan)
  {
    return
      $user->isAdminPangkalan() &&
      $user->pembina->pangkalan_id === $pangkalan->id;
  }

  /**
   * Determine whether the user can verify any model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function verifyAny(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can verify all the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function verifyAll(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can verify the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function verify(User $user, Pangkalan $pangkalan)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, Pangkalan $pangkalan)
  {
    return $user->isAdmin() || ($user->isAdminPangkalan() &&
      $user->pembina->pangkalan_id === $pangkalan->id);
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, Pangkalan $pangkalan)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pangkalan  $pangkalan
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, Pangkalan $pangkalan)
  {
    //
  }
}
