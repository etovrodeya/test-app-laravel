<html>
  <head>
      <title>Первое тестовое задание</title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
      <script src="{{ asset('js/api.js') }}" >
      </script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script>
            $(function(){
               loadTarrifs()
            })
      </script>
      <style>
      </style>
  </head>
  
   <body class="container h-100 border-left border-right px-0">
      <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link" href="/">Первое тестовое задание</a>
            <a class="nav-item nav-link" href="/secondTask">Второе тестовое задание</a>
            </div>
         </div>
      </nav>
      <div class="row w-100 h-75 justify-content-center align-items-center border-top border-bottom bg-white mx-auto">
         <div class="col-md-2 col-lg-2 col-sm-2">
            <div id="tariffs" class="btn-group-vertical btnGroup">

            </div>
         </div>
         <div class="col-md-1 col-lg-1 col-sm-1"></div>
         <div class="col-md-8 col-lg-8 col-sm-8">
            <div class="">
               <h2 id="tarrifTitle">Выбирите тариф</h2>
               <h3 id="tarrifDiscription">У тарифа могу быть ограничения в выборе адреса</h3>
                  <div id="message"></div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label>Имя</label>
                     <input type="text" class="form-control" id="first_name" required>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Фамилия</label>
                     <input type="text" class="form-control" id="last_name" required>
                  </div>
               </div>
               <div class="form-group">
                  <label>Телефон</label>
                  <input type="text" class="form-control" id="phone" required>
               </div>
               <div class="form-group">
                  <label>Количество</label>
                  <input type="text" class="form-control" id="count" required>
               </div>
               <div class="form-group">
                  <label>Адресс</label>
                  <select class="form-control" id="addresses"></select>
               </div>
               <div class="form-group">
                  <label>Цена:</label>
                  <label id="price"></label>
               </div>
               <div class="form-group">
                  <label>День доставки</label>
                  <select class="form-control" id="delivery_day"></select>
               </div>
               <button class="btn btn-success btn-block" id="sendButton" onClick="sendOrder()">Отправить</button>
            </div>
         </div>
      </div>
  </body>
 
</html>