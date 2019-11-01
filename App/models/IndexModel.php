<?php

class IndexModel extends Model
{

  public function getAllCurrency()
  {
    if (isset($_SESSION['data']))
    {
      // code...
      return $_SESSION['data'];
    }
    else {
      $xml =simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp");
      $currencies = array();
      foreach ($xml->xpath('//Valute') as $valute) {
         $_SESSION['data'][(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);
      }
      return  $_SESSION['data'];
    }
  }

  public function convert($params)
  {
    $data= $this->getAllCurrency();
    foreach ($data as $key => $value) {
      if ($key==$params['from']) $currency['fromValue']= $value*$params['fromInput'];
      if ($key==$params['to']) $currency['toValue']=$value*$params['toInput'];
    }

   return $currency;
  }
}

?>
