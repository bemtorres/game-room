<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LotoBingo;
use App\Services\LotoGenerate;

class HomeController extends Controller
{
  const LIST_BLANK = [0,0,0,0,0,0,0,0,0];
  const LIST_NUM = [1,2,3,4,5,6,7,8,9];
  const NUM = 5;

  private function list(){
    return $this->array_numbers(self::LIST_BLANK, self::NUM);
  }

  public function array_numbers($l, $n) {
    return array_rand($l,$n);
  }

  public function game() {
    try {
      $loto2 = new LotoGenerate(1,1);
      $loto = $loto2->build();

      $boleto = $loto[0][0];
      $code = $loto[0][1];

      return view('template.admin.b',compact('boleto','code'));
    } catch (\Throwable $th) {
      return $th;
    }
  }

  // private function guardar($loto) {
  //   try {
  //     $l = new LotoBingo();
  //     $l->code = $loto[1];
  //     $l->numbers = $loto[0];
  //     $l->save();
  //   } catch (\Throwable $th) {
  //     return true;
  //   }
  // }

  public function index($id) {
    switch ($id) {
      case 1:
        return view('template.admin.index');
      case 2:
        return view('template.admin.charts_chartjs');
      case 3:
        return view('template.admin.icons_feather');
      case 4:
        return view('template.admin.maps_google');
      case 5:
        return view('template.admin.pages_blank');
      case 6:
        return view('template.admin.pages_profile');
      case 7:
        return view('template.admin.pages_sign_in');
      case 8:
        return view('template.admin.pages_sign_up');
      case 9:
        return view('template.admin.ui_buttons');
      case 10:
        return view('template.admin.ui_cards');
      case 11:
        return view('template.admin.ui_forms');
      case 12:
        return view('template.admin.ui_typography');
      case 13:
        return view('template.admin.upgrade_to_pro');
      default:
      return view('template.admin.index');
    }
  }

}
