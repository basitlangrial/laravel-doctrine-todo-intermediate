$(function(){
    var $orders = $("#orders");
    var $name = $("#name");
    var $drink = $("#drink");
    function addOrder(order){
                    $orders.append("<li>Name: "+order.name +","+ " Drink: "+order.drink+"</li>");
                }
    $.ajax({
        url: '/api/v1/drink',
        type: 'GET',
        dataType: 'json',
        //data: {param1: 'value1'},
    })
    .done(function(orders) {
        //console.log("success",orders);
        $.each(orders, function(i, order){
            addOrder(order);
        });
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
    $("#add-order").on('click', function(){

        var order = {
            name : $name.val(),
            drink : $drink.val()
        }
        $.ajax({
        url: '/api/v1/drink',
        type: 'POST',
        dataType: 'json',
        data: order,
    })
    .done(function(newOrder) {
        //console.log("success",orders);
       addOrder(newOrder);
        
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    })

});