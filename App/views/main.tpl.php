<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>esProject</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/App/css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">esProject</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="input-group mb-3" id="firstDiv">
      <div class="input-group-prepend">
        <select class="custom-select" id="inputGroupSelect01">
          <option value="RUB">RUB</option>
          <option value="USD" selected="selected">USD</option>
          <option value="EUR">EUR</option>
          <option value="CHF">CHF</option>
          <option value="GBP">GBP</option>
          <option value="JPY">JPY</option>
          <option value="UAH">UAH</option>
          <option value="KZT">KZT</option>
          <option value="BYN">BYN</option>
          <option value="TRY">TRY</option>
          <option value="CNY">CNY</option>
          <option value="AUD">AUD</option>
          <option value="CAD">CAD</option>
          <option value="PLN">PLN</option>
        </select>
      </div>
      <input type="text" class="form-control" value="1" id='firstCurrency' aria-label="Text input with dropdown button">
    </div>
    
    <div class="input-group mb-3" id="secondDiv">
      <div class="input-group-prepend">
        <select class="custom-select" id="inputGroupSelect02">
          <option value="RUB">RUB</option>
          <option value="USD" >USD</option>
          <option value="EUR" selected="selected" >EUR</option>
          <option value="CHF">CHF</option>
          <option value="GBP">GBP</option>
          <option value="JPY">JPY</option>
          <option value="UAH">UAH</option>
          <option value="KZT">KZT</option>
          <option value="BYN">BYN</option>
          <option value="TRY">TRY</option>
          <option value="CNY">CNY</option>
          <option value="AUD">AUD</option>
          <option value="CAD">CAD</option>
          <option value="PLN">PLN</option>
        </select>
      </div>
        <input type="text" class="form-control"  id='secondCurrency' aria-label="Text input with dropdown button">
    </div>
  </div>
  <div class="output">

  </div>

<script type="text/javascript" src="/App/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
