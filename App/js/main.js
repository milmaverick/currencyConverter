$(document).ready(function()
{
  $('input:text').on('change', function ()
  {
    if (this.value.match(/[^0-9\.]/g))
    {
      this.value = this.value.replace(/[^0-9\.]/g, '');
    }
    changeCurrency()
    .then(
      result => {
        // первая функция-обработчик - запустится при вызове resolve
      //  $('input:text').not(this).val(result);
         alert(result); // result - аргумент resolve
      },
      error => {
        // вторая функция - запустится при вызове reject
        console.log("Rejected: " + error); // error - аргумент reject
      }
    );
  });
});

function changeCurrency() {
  return new Promise((resolve, reject) => {
    let fromInput= Number($('#firstCurrency').val());
    let toInput= Number($('#secondCurrency').val());
    let from = $('#inputGroupSelect01').val();
    let to = $('#inputGroupSelect02').val();
    if(fromInput && toInput){
      var params =
      {
        'from' : from,
        'to' : to ,
        'fromInput': fromInput,
        'toInput': toInput,
      };
      $.ajax({
        url : 'index/currentCurrency' ,
        method : 'POST' ,
        data: {
          params: params,
        },
        success : function(msg){
          resolve(msg);
  			},
  			error : function(){
  				throw new Error("o_O");
  			}
      });
    }
  });
}
