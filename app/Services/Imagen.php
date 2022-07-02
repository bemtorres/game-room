<?php

namespace App\Services;
use Illuminate\Support\Facades\Storage;

class Imagen
{
  private $photo;
  private $folder;
  private $img_default;

  function __construct($photo, $folder, $img_default = null) {
    $this->photo = $photo;
    $this->folder = $folder;
    $this->img_default = $img_default;
  }

  public function call(){
    return $this->build();
  }

  // PRIVATE

  private function build(){
    try {
      if(empty($this->photo)){
        return $this->img_default;
      } elseif (filter_var($this->photo, FILTER_VALIDATE_URL)) {
        return $this->photo;
      }else{
        return \Storage::url("{$this->folder}/{$this->photo}");
      }
    } catch (\Throwable $th) {
      return $this->img_default;
    }
  }
}
