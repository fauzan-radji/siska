<?php

namespace App\Policies;

use App\Models\Kwarran;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KwarranPolicy
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
    // siapapun bisa liat models kwarran apapun
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Kwarran $kwarran)
  {
    // siapapun bisa liat model kwarran spesifik
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, Kwarran $kwarran)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, Kwarran $kwarran)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, Kwarran $kwarran)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Kwarran  $kwarran
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, Kwarran $kwarran)
  {
    //
  }
}
