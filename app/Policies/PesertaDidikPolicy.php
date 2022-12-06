<?php

namespace App\Policies;

use App\Models\PesertaDidik;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PesertaDidikPolicy
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
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, PesertaDidik $pesertaDidik)
  {
    return
      $user->isAdmin() ||
      ($user->isPembina() &&
        $user->pembina->pangkalan_id === $pesertaDidik->pangkalan_id
      ) ||
      ($user->isPesertaDidik() &&
        $user->peserta_didik->pangkalan_id === $pesertaDidik->pangkalan_id
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
    return $user->isAdminPangkalan();
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, PesertaDidik $pesertaDidik)
  {
    return ($user->isAdminPangkalan() &&
      $user->pembina->pangkalan_id === $pesertaDidik->pangkalan_id
    ) ||
      $user->id === $pesertaDidik->user_id;
  }

  /**
   * Determine whether the user can verify any model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function verifyAny(User $user)
  {
    return $user->isAdminPangkalan();
  }

  /**
   * Determine whether the user can verify the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function verify(User $user, PesertaDidik $pesertaDidik)
  {
    return
      $user->isAdminPangkalan() && //is the user Admin Pangkalan?
      $user->pembina->pangkalan->verified && // is user pangkalan is verified?
      !$pesertaDidik->verified && // is peserta didik not verified yet?
      $user->pembina->pangkalan_id === $pesertaDidik->pangkalan_id; // is user and peserta didik in the same pangkalan?
  }

  /**
   * Determine whether the user can uji the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function uji(User $user, PesertaDidik $pesertaDidik)
  {
    return
      $user->isPembina() &&
      $user->pembina->pangkalan->verified &&
      $pesertaDidik->verified &&
      $user->pembina->pangkalan_id === $pesertaDidik->pangkalan_id;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, PesertaDidik $pesertaDidik)
  {
    return
      $user->isAdmin() ||
      ($user->isAdminPangkalan() &&
        $user->pembina->pangkalan_id === $pesertaDidik->pangkalan_id
      ) ||
      $user->id === $pesertaDidik->user_id;
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, PesertaDidik $pesertaDidik)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, PesertaDidik $pesertaDidik)
  {
    //
  }
}
