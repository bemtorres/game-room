<?php

namespace App\Services\Policies;

use App\Models\User;

class PolicyModel
{
  public function abort(){
    return abort('403');
  }

  // public function admin(User $user) {
  //   return $user->admin;
  // }

  public function admin() {
    if (current_user()->admin) {
      return true;
    }
    return $this->abort();
  }
}
