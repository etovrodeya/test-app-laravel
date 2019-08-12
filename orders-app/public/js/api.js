function getDeliveryDaysForTariif(tariffId) {
   $.ajax({
         type:'GET',
         url:'/api/tariffs/deliveryDays/'+tariffId,
         data:'_token = <?php echo csrf_token() ?>',
         success: function(data) {
            $('option.day').remove()
            for (var i = 0; i != data.length; i++){
               $('<option>',
                  {text: data[i],
                     class: "day",
                  })
               .appendTo("#delivery_day")
            }
         }
   });
}
function loadTarrifs() {
   $.ajax({
         type:'GET',
         url:'/api/tariffs',
         data:'_token = <?php echo csrf_token() ?>',
         success: function(data) {
            for (var i = 0; i != data.length; i++){
               $('<button>',
                  {id: 'tariff' + data[i].id,
                     value: data[i].id,
                     text: data[i].title,
                     onClick: "setTarrif("+data[i].id+")",
                     class: "btn btn-success btn-lg"})
               .appendTo("#tariffs")
               setTarrif(1)
            }
         }
   });
}
function setAddress() {
   $.ajax({
         type:'GET',
         url:'/api/addresses/',
         data:'_token = <?php echo csrf_token() ?>',
         success: function(data) {
            $('option.address').remove()
            for (var i = 0; i != data.length; i++){
               $('<option>',
                  {id: 'tariff' + data[i].id,
                     value: data[i].id,
                     text: data[i].city + ", " + data[i].address,
                     class: "address",
                  })
               .appendTo("#addresses")
            }
         }
   });
}
function setAddressByCity(curCity) {
   $.ajax({
         type:'GET',
         url:'/api/addresses/city/'+curCity,
         data:'_token = <?php echo csrf_token() ?>',
         success: function(data) {
            $('option.address').remove()
            for (var i = 0; i != data.length; i++){
               $('<option>',
                  {id: 'address' + data[i].id,
                     value: data[i].id,
                     text: data[i].city + ", " + data[i].address,
                     class: "address",
                  })
               .appendTo("#addresses")
            }
         }
   });
}
function sendOrder(){
   var vals ={
      'phone': $("#phone").val(),
      'first_name': $("#first_name").val(),
      'last_name': $("#last_name").val(),
      'count': $("#count").val(),
      'addresses_id': $("#addresses option:selected").val(),
      'tariffs_id': $('button.active').val(),
      'delivery_day': $("#delivery_day option:selected").val()
   }
   console.log(vals)
   $.ajax({
      url: '/api/orders',
      type: "POST",
      data: vals,
      success: function(data) {
         $('#message').text(data.message)
      },
      error: function(data) {
         if(data.status == 500){
            $('#message').text(data.responseJSON.message)
         }
      }
   });
}
function setTarrif(id){
   $.ajax({
         type:'GET',
         url:'/api/tariffs/'+id,
         data:'_token = <?php echo csrf_token() ?>',
         success: function(data) {
            $('#tarrifTitle').text(data.title)
            $('#tarrifTitle').val(data.id)
            $('#tarrifDiscription').text(data.discription)
            $('#price').text(data.price)
            $('button').removeClass("active")
            $('#tariff'+id).addClass("active")
            getDeliveryDaysForTariif(id)
            if(data.city){
               setAddressByCity(data.city)
            }else{
               setAddress()
            }
         }
   })
};
function getFirstQuery(){
      $.ajax({
            type:'GET',
            url:'/api/secondTask/bigChek',
            data:'_token = <?php echo csrf_token() ?>',
            success: function(data) {
                  $('tbody#content').empty();
            for (var i = 0; i < data.length; i++) {
                  $('tbody#content').append('<tr id="'+ data[i].id + '" class="bg-light">\
                     <td colspan="7">'+ data[i].first_name + ' ' + data[i].last_name  + '<br/>Телефон: ' + data[i].phone + '</td></tr>')
                     for (var g = 0; g < data[i].orders.length; g++) {
                        $('tr#' + data[i].id).after('<tr id=client'+data[i].id+'>')
                        $('tr#client'+data[i].id).append('<td>'+data[i].orders[g].id+'</td>')
                        $('tr#client'+data[i].id).append('<td>'+data[i].orders[g].tariffs_id+'</td>')
                        $('tr#client'+data[i].id).append('<td>'+data[i].orders[g].addresses_id+'</td>')
                        $('tr#client'+data[i].id).append('<td>'+data[i].orders[g].price+'</td>')
                        $('tr#client'+data[i].id).append('<td>'+data[i].orders[g].count+'</td>')
                        $('tr#client'+data[i].id).append('<td>'+data[i].orders[g].delivery_day+'</td>')
                     }
            }
            }
})}
function setClients(clients){
      for (var i = 0; i < clients.length; i++) {
         $('tbody#content').append('<tr id="'+ clients[i].id + '" class="bg-light">\
            <td colspan="7">'+ clients[i].first_name + ' ' + clients[i].last_name + '<br/>Телефон: ' + clients[i].phone + '</td></tr>')
         }
}
function setOrders(orders){
      for (var i = 0; i < orders.length; i++) {
         $('tr#' + orders[i].clients_id).after('<tr id=client'+orders[i].id+'>')
         $('tr#client'+orders[i].id).append('<td>'+orders[i].id+'</td>')
         $('tr#client'+orders[i].id).append('<td>'+orders[i].tariffs_id+'</td>')
         $('tr#client'+orders[i].id).append('<td>'+orders[i].addresses_id+'</td>')
         $('tr#client'+orders[i].id).append('<td>'+orders[i].price+'</td>')
         $('tr#client'+orders[i].id).append('<td>'+orders[i].count+'</td>')
         $('tr#client'+orders[i].id).append('<td>'+orders[i].delivery_day+'</td>')
}}
function getSecondAndThirdQuery(url){
      $.ajax({
            type:'GET',
            url: url,
            data:'_token = <?php echo csrf_token() ?>',
            success: function(data) {
                  $('tbody#content').empty();
                  setClients(data[0].clients)
                  setOrders(data[1].orders)
            }
})}