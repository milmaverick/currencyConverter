<?php

class IndexModel extends Model
{
//Получение Значения валют из ЦБ ------------------------------------------------------------------------------------
  public function getAllCurrency()
  {
    if (isset($_SESSION['data']))
    {
      return $_SESSION['data'];
    }
    else {
      if ($xml =simplexml_load_file(LINK)) {
        $_SESSION['data']['RUB']=1.00;
        foreach ($xml->xpath('//Valute') as $valute) {
          $_SESSION['data'][(string)$valute->CharCode] = (float)str_replace(',', '.', $valute->Value);
        }
        return  $_SESSION['data'];
      }
      return false;
    }
  }

// Конвертация валюты --------------------------------------------------------------------------------------------------
  public function convert($params)
  {
    $data= $this->getAllCurrency();
    if ($data) {
      foreach ($data as $key => $value) {
        if ($key==$params['from']) $currency['fromValue']= $value*$params['fromInput'];
        if ($key==$params['to']) $currency['toValue']=$value*$params['toInput'];
      }
      if ( $currency['fromValue'] && $currency['toValue']) return $currency;
    }
    return false;
  }
}

?>
