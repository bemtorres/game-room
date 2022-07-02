<?php

namespace App\Services;

use Illuminate\Http\Request;

class LotoGenerate {
  const LIST_BLANK = [0,0,0,0,0,0,0,0,0];
  const LIST_NUM = [1,2,3,4,5,6,7,8,9];
  const NUM = 5;

  private $count_type;
  private $count_boleto;

  public function __construct(int $count_type = 1, $count_boleto = 1){
    $this->count_type = $count_type;
    $this->count_boleto = $count_boleto;
  }


  public function build() {
    $list = array();

    for ($i=0; $i < $this->count_type; $i++) {
      for ($j=0; $j < $this->count_boleto; $j++) {
        $boleto_blank = $this->build_template();
        $boleto = $this->build_loto($boleto_blank);
        array_push($list, $boleto);
      }
    }

    return $list;
  }


  // PRIVATE
  private function list(){
    return $this->array_numbers(self::LIST_BLANK, self::NUM);
  }

  public function array_numbers($l, $n) {
    return array_rand($l,$n);
  }

  private function get_range($n) {
    $s = [1,11,21,31,41,51,61,71,81];
    $e = [10,20,30,40,50,60,70,80,90];
    return range($s[$n],$e[$n]);
  }

  public function list_prob() {
    // $array1 = $this->array_numbers([0,0],1);
    // $array2 = $this->array_numbers([0,0,0,0,0,0,0],4);
    // return array_merge($array1,$array2);
    // return array([])
  }

  private function build_template() {
    try {
      $boleto = [self::LIST_BLANK, self::LIST_BLANK, self::LIST_BLANK];
      $list_1 = $this->list();
      $list_2 = $this->list();
      for ($i=0; $i < self::NUM; $i++) {
        $boleto[0][$list_1[$i]] = 1;
        $boleto[1][$list_2[$i]] = 1;
      }

      $col_busy = [];
      $count_one = 0;

      for ($c=0; $c < 9; $c++) {
        if ($boleto[0][$c] == 1 && $boleto[1][$c] == 1) {
          array_push($col_busy, $c);
        } else {
          if ($boleto[0][$c] == 0 && $boleto[1][$c] == 0 ) {
            $boleto[2][$c] = 1;
            $count_one++;
            array_push($col_busy, $c);
          }
        }
      }

      if ($count_one < 5 ) {
        $faltantes = array_diff(self::LIST_NUM,$col_busy);
        $select = $this->array_numbers($faltantes, (5-$count_one));
        for ($i=0; $i < count($select); $i++) {
          $boleto[2][$faltantes[$select[$i]]] = 1;
        }
      }

      $count = 0;
      for ($r=0; $r < 3; $r++) {
        for ($c=0; $c < 9; $c++) {
          if ($boleto[$r][$c] == 1) {
            $count++;
          }
        }
      }
      if ($count == 15) {
        return $boleto;
      }
      return $this->build_template();
    } catch (\Throwable $th) {
      return $this->build_template();
    }
  }

  private function build_loto($boleto) {
    try {
      $listado = self::LIST_BLANK;
      $count = 0;
      for ($r=0; $r < 3; $r++) {
        for ($c=0; $c < 9; $c++) {
          if ($boleto[$r][$c] == 1) {
            $listado[$c] +=1;
            $count++;
          }
        }
      }

      $array_numbers = array();
      for ($i=0; $i < 9; $i++) {
        $rango = $this->get_range($i);
        $numbers = $this->array_numbers($rango, $listado[$i]);
        if (is_numeric($numbers)) {
          $n = $rango[$numbers];
          array_push($array_numbers,$n);
        }else{
          ksort($numbers);
          $nn = array();
          for ($j=0; $j < $listado[$i]; $j++) {
            $n = $rango[$numbers[$j]];
            array_push($nn,$n);
          }
          array_push($array_numbers,$nn);
        }
      }

      for ($c=0; $c < 9; $c++) {
        if (is_numeric($array_numbers[$c])) {
          if ($boleto[0][$c] == 1) {
            $boleto[0][$c] = $array_numbers[$c];
            continue;
          }
          if ($boleto[1][$c] == 1) {
            $boleto[1][$c] = $array_numbers[$c];
            continue;
          }
          if ($boleto[2][$c] == 1) {
            $boleto[2][$c] = $array_numbers[$c];
            continue;
          }
        }elseif (count($array_numbers[$c]) == 2) {
          for ($m=0; $m < 2; $m++) {
            for ($n=0; $n < 3; $n++) {
              if ($boleto[$n][$c] == 1) {
                $boleto[$n][$c] = $array_numbers[$c][$m];
                break;
              }
            }
          }
          if($boleto[0][0] > $boleto[1][0] && $boleto[0][0]>1 && $boleto[1][0]>1) {
            $a = $boleto[0][0];
            $b = $boleto[1][0];
            $boleto[0][0] = $b;
            $boleto[1][0] = $a;
          } else {
            if($boleto[0][0] > $boleto[2][0] && $boleto[0][0]>1 && $boleto[2][0]>1) {
              $a = $boleto[0][0];
              $b = $boleto[2][0];
              $boleto[0][0] = $b;
              $boleto[2][0] = $a;
            } else {
              if($boleto[1][0] > $boleto[2][0] && $boleto[1][0]>1 && $boleto[2][0]>1) {
                $a = $boleto[1][0];
                $b = $boleto[2][0];
                $boleto[1][0] = $b;
                $boleto[2][0] = $a;
              }
            }
          }
        }
      }

      $zzz = array_reduce($array_numbers, function ($a, $b) {
        return array_merge($a, (array) $b);
      }, []);

      $code = '';
      $count = count($zzz);
      $aux = 0;
      foreach($zzz as $k => $v) {
        $code .=$v;
        $aux++;
        if($aux != $count){
          $code .=",";
        }
      }
      return [$boleto, $code];
    } catch (\Throwable $th) {
      return array(null, null);
    }
  }

}
