<?php

namespace App\Presenters;

use App\Presenters\Presenter;
use App\Services\Imagen;

class TiendaPresenter extends Presenter
{
  private $folderImgLogo = 'public/photo_eventos_web/';
  private $imgLogo = "/assets/img/logo.png";

  public function getLogo(){
    $folderImg = $this->folderImgLogo.$this->model->codigo;
    return (new Imagen($this->model->logo, $folderImg, $this->imgLogo))->call();
  }
}
