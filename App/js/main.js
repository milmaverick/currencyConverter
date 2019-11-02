$(document).ready(function()
{
  changeCurrency()
  .then(
    result => {
      $('input:text').on('change keyup', function ()
      {
        if (this.value.match(/[^0-9\.]/g))
        {
          this.value = this.value.replace(/[^0-9\.]/g, '');
        }
          // if(this.value.match(/\./g).length > 1) {
          //   this.value = this.value.substr(0, this.value.lastIndexOf("."));
          // }
        changeCurrency($(this).parent(), $('input:text').not(this).parent());
      });
      $('.custom-select').on('change', function ()
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
    let from = thisCurrencyDiv.find('.custom-select').val();
    let to = otherCurrencyDiv.find('.custom-select').val();
    let fromInput= Number(thisCurrencyDiv.find('.form-control').val());
    let toInput=  1 ;

    //  console.log('thisCurrency'+ fromInput + ' otherCurrency='+ toInput +' VALUTEThis = '+from   +' VALUTEOther = '+to );
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
        url : 'index/currentCurrency' ,
        method : 'POST' ,
        data: {
          params: params,
        },
        success : function(msg){
          if (msg =='Not Found' ) {
            alert(msg);
          }
          else {
            resolve(msg);
            otherCurrencyDiv.find('.form-control').val(parseFloat(msg));
          }
        },
        error : function(){
          reject(new Error("Не корректный URL"));
        }
      });
    }

  });
}

function validate(value) {
  let re = /^[-+]?d+(.dd)?$/;
  return re.test(value);
}
