/**
 * Created by Komsy on 11/05/2021.
 */
 //addorder
$('.order').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    var quantity = $("#quantity_"+id).val();
    var withCan = $("#can_"+id).is(':checked')?$("#can_"+id).val():0;
    
    $.ajax({
        url: baseUrl+"/site/addorder?id="+id+"&withCan="+withCan+"&quantity="+quantity,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
        
    alert(id+' and '+withCan+' and '+quantity);
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