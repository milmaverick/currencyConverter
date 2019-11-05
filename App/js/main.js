$(document).ready(function()
{
  changeCurrency()  //Получаем значения Доллара и Евро
  .then(
    result => {
      $('input:text').on('keyup', function () // При изменении любого текстового поля
      {
        if (this.value.match(/[^0-9\.]/g))
        {
          this.value = this.value.replace(/[^0-9\.]/g, '');
        }
        changeCurrency($(this).parent(), $('input:text').not(this).parent());
      });

      $('.custom-select').on('change', function () //  При изменении любого селекта
      {
          changeCurrency($(this).parents('.input-group'),$('.custom-select').not(this).parents('.input-group'));
      });
    },
    error => {
      console.log("Rejected: " + error);
    }
  );
});

function changeCurrency(thisCurrencyDiv = $('#firstDiv'), otherCurrencyDiv= $('#secondDiv')) {
  return new Promise((resolve, reject) => {
    let from = thisCurrencyDiv.find('.custom-select').val(); //  Валюта "из"
    let to = otherCurrencyDiv.find('.custom-select').val();//  Валюта "в"
    let fromInput= Number(thisCurrencyDiv.find('.form-control').val()); // Значение валюты "из"
    let toInput=  1 ;

    if(!fromInput || isNaN(fromInput)){
      otherCurrencyDiv.find('.form-control').val('');
      thisCurrencyDiv.find('.form-control').val('');
    }

    if(fromInput && toInput){
      var params =
      {
        'from' : from,
        'to' : to ,
        'fromInput': fromInput,
        'toInput': toInput,
      };
      $.ajax({
        url : 'index/currentCurrency/' ,
        method : 'POST' ,
        data: {
          params: params,
        },
        success : function(msg){
          if (parseFloat(msg)) {
            resolve(msg);
            otherCurrencyDiv.find('.form-control').val(parseFloat(msg)); // Меняем значение поля "в" 
          }
          else {
            alert(msg);
          }
        },
        error : function(){
          reject(new Error("Не корректный URL"));
        }
      });
    }
  });
}
