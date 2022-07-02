<?php

namespace App\Services;

class Currency
{
  protected $money;
  protected $decimal;

  public function __construct(string $money,int $decimal = 0){
    $this->money = $money;
    $this->decimal = $decimal;
  }

  public function money(){
    return number_format($this->money, $this->decimal, ',', '.');
  }
}
