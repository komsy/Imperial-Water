
//Delete cashier
$('.delet').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/site/delet?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });
//Delete Delivery
$('.komsy').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/delivery/komsy?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });
/*//Activate User
$('.activate').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/user/activate?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
 });
*/
//Delete user
$('.activate').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/user/activate?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Are you sure you want to change the Status of this User?');
 });

//Delete user
$('.del').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/user/del?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });

//Delete Product
$('.delete').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/product/delete?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });

//Delete POS
$('.deletd').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/site/deletd?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
    alert(' Delete selected?');
 });

//Updated Delivery
$('.orderupdate').click(function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    var baseUrl = $(this).attr('baseUrl');
    
    $.ajax({
       url: baseUrl+"/site/admin?id="+id,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            console.log(res);
            alert(res);
        }
    });
    
 });
