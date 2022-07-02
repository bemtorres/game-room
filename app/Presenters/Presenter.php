<?php

namespace App\Presenters;

use Illuminate\Database\Eloquent\Model;

abstract class Presenter
{
  protected $model;

  public function __construct(Model $model){
    $this->model = $model;
  }

}