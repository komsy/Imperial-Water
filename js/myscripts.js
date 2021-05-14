
//Update delivery
$('.delivery').click(function(e){
    e.preventDefault();
    var productId = $(this).attr('productId');
    var userId = $(this).attr('userId');
    var orderId = $(this).attr('orderId');
    var total = $(this).attr('total');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
        url: baseUrl+"/product/delivery?productId="+productId+"&userId="+userId+"&orderId="+orderId+"&total="+total,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
 });

//Add deposit
$('.deposit').click(function(e){
            e.preventDefault();
           $.get('deposit',function(data){
                $('#deposit').modal('show')
                    .find('#depositContent')
                    .html(data);
        });
    });

//Cashier Delete POS
$('.delete').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/cashier/delete?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });

//Update Cart
$('.update').click(function(e){
    e.preventDefault();
    var orderItemsId = $(this).attr('orderItemsId');
    var orderId = $(this).attr('orderId');
    var productId = $(this).attr('productId');
    var baseUrl = $(this).attr('baseUrl');
    var quantity = $("#quantity_"+productId).val();
    var price = $(this).attr('price');
    
    $.ajax({
       url: baseUrl+"/product/update?orderId="+orderId+"&orderItemsId="+orderItemsId+"&quantity="+quantity+"&productId="+productId+"&price="+price,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
 });

//Updated Delivery
$('.orderupdate').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/cashier/cashier?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
 });


//Cashier Restore POS
$('.restore').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/cashier/update?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Restore selected?');
 });

//user delete orders
$('.cut').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/product/cut?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });

//stepper wizzard
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});

  $(document).ready(function() {
        $('#contact_no').keyup(function() {         
            var oldvalue=$(this).val();
            var field=this;
            setTimeout(function () {
                if(field.value.indexOf('+254') !== 0) {
                    $(field).val("+254" +oldvalue);
                } 
            }, 1);
        });
    });

