<?php

namespace App\Services;

class ConvertDatetime
{
  protected $date;

  public function __construct(string $date){
    $this->date = $date;
  }

  public function getDatetime(){
    return $this->format($this->date,'d-m-Y H:i');
  }

  public function getDate(){
    return $this->format($this->date,'d-m-Y');
  }

  public function getDateV2(){
    return $this->format($this->date,'Y-m-d');
  }

  public function getTime(){
    return $this->format($this->date,'H:i');
  }

  public function getDateTimeZ(){
    return $this->format($this->date,'Y-m-d H:i:s');
  }

  public function getDateFormatEmail(){
    // 1 5 March 2021 a las 9:16 pm
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    return $this->getDateTimeFormat("j"). " ". $meses[$this->getDateTimeFormat("m")-1] ." ". $this->getDateTimeFormat("Y") . " a las " . $this->getDateTimeFormat("g:i a");
  }

  public function isToday(){
    return date('d-m') == $this->getDateTimeFormat('d-m');
  }

  public function getDatatable() {
    return $this->format($this->date,'Ymd H:i:s');
  }

  public function getDatatimelocal() {
    return $this->format($this->date,'Y-m-d\TH:i');
  }



  public function getDateTimeFormat($format){
    return $this->format($this->date,$format);
  }

  public function getStartEnd() {
    $year = $this->format($this->date,'Y');
    $month = $this->format($this->date,'m');
    $date = \Carbon\Carbon::parse($year."-".$month."-01"); // universal truth month's first day is 1
    $start = $date->startOfMonth()->format('Y-m-d'); // 2000-02-01 00:00:00
    $end = $date->endOfMonth()->format('Y-m-d'); // 2000-02-29 23:59:59

    return array('start' => $start,'end' => $end);
  }

  // PRIVATE
  private function format($date, string $format){
    return date_format(date_create($date),$format);
  }
}
