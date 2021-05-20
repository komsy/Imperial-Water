/**
 * Created by Komsy on 11/05/2021.
 */
 //addorder
$('.order').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    const $cartQuantity = $('#cart-quantity');
    
    $.ajax({
        url: baseUrl+"/site/addorder?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        $cartQuantity.text(parseInt($cartQuantity.text() || 0) + 1);
        }
    });
        
    alert(id);
 });
 //addorder
$('.cans').click(function(e){
    e.preventDefault();
    var canId = $(this).attr('canId');
    var baseUrl = $(this).attr('baseUrl');
    const $cartQuantity = $('#cart-quantity');
    
    $.ajax({
        url: baseUrl+"/site/addorder?canId="+canId,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        $cartQuantity.text(parseInt($cartQuantity.text() || 0) + 1);
        }
    });
        
    alert(canId);
 });

//Pay with Mpesa
$('.deposit').click(function(e){
            e.preventDefault();
           $.get('deposit',function(data){
                $('#deposit').modal('show')
                    .find('#depositContent')
                    .html(data);
        });
    });


//change quantity in the cart
$(function(){
 const $itemQuantities = $('.item-quantity');
 const $cartQuantity = $('#cart-quantity');
  $itemQuantities.change(ev => {
    const $this = $(ev.target);
    let $tr = $this.closest('tr');
    const $td = $this.closest('td');
    const id = $tr.data('id');

    $.ajax({
      method: 'post',
      url: $tr.data('url'),
      data: {id, quantity: $this.val()},
      success: function(totalQuantity){
        $cartQuantity.text(totalQuantity);
      }
    })
  })
});     