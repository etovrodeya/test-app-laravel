<html>
  <head>
     <title>Второе тестовое задание</title>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
     <script src="{{ asset('js/api.js') }}" >
     </script>
     <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
     </script>
     <script>
     </script>
  </head>
  
    <body class="container h-100 border-left border-right px-0">
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Первое тестовое задание</a>
                <a class="nav-item nav-link" href="/secondTask">Второе тестовое задание</a>
                </div>
            </div>
        </nav>
        <div class="h-75">
            <ul class="nav py-3 bg-white border-top">
                <li class="nav-item pl-3">
                    <button class="btn btn-outline-dark" onClick="getFirstQuery()">Первый запрос</button>
                </li>
                <li class="nav-item pl-3">
                    <button class="btn btn-outline-dark" onClick="getSecondAndThirdQuery('/api/secondTask/getOrderOffset3')">Второй запрос</button>
                </li>
                <li class="nav-item pl-3">
                    <button class="btn btn-outline-dark" onClick="getSecondAndThirdQuery('/api/secondTask/getOrderOffset3After1000')">Третий запрос</button>
                </li>
            </ul>
            <table class="table border bg-white">
                <thead  class="thead-light">
                    <th scope="col" id="orders_id">Номер заказа</th>
                    <th scope="col" id="tariffs_id">Номер тарифа</th>
                    <th scope="col" id="address_id">Номер адреса</th>
                    <th scope="col" id="price">Цена</th>
                    <th scope="col" id="count">Количество</th>
                    <th scope="col" id="delivery_day">День доставки</th>
                </thead>
                <tbody id="content">
                </tbody>
            </table>
        </div>
    </body>
</html>