$(document).ready(function()
{
  $('input:text').on('change', function ()
  {
    if (this.value.match(/[^0-9\.]/g))
    {
      this.value = this.value.replace(/[^0-9\.]/g, '');
    }
    changeCurrency($(this), $('input:text').not(this))
    .then(
      result => {
        $('input:text').not(this).val(result);// result - аргумент resolve
      },
      error => {
        console.log("Rejected: " + error); // error - аргумент reject
      }
    );
  });
  $('custom-select').on('change', function ()
  {

  });

});

function changeCurrency(thisCurrency,otherCurrency) {
  return new Promise((resolve, reject) => {

    let from = thisCurrency.prev(".input-group-prepend").children().val() ;
    let to = otherCurrency.prev(".input-group-prepend").children().val() ;
    let fromInput= Number(thisCurrency.val());
    let toInput=  1 ;
    console.log('thisCurrency'+ fromInput + ' otherCurrency='+ toInput +'VALUTEThis = '+from   +' VALUTEOther = '+to );

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
