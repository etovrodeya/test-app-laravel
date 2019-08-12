# test-app-laravel
 
Для запуска приложения необходимо:<br/>
- установить Open Server 5.3.0<br/>
- папку "orders-app" скопировать в "OSPanel\domains\"<br/>
- папку userdata в "OSPanel" заменить на userdata из репозитория<br/>
- запустить Open Server. будет доступен в трее<br/>
- настроки->домены.<br/>
    Управление доменами=Ручное+Автопоиск.<br/>
    Имя домена=orders-app,<br/>
    Папка домена=\orders-app\public.<br/>
    ->добавить<br/>
    ->сохранить<br/>
- открыть PHPMyAdmin. Open Server->Дополнительно->PHPMyAdmin. Логин: root<br/>
- сервер MySQL располагается по адресу 127.0.0.1:3306<br/>
- создать базу данных "orders_app"<br/>
- импортировать базу данных<br/>
    "Импорт" в шапке страницы<br/>
    Импортируемый файл после замены userdata будет доступен для загрузки из каталога "ospanel/userdata/temp/"<br/>
    Импортировать файл "orders_app.sql"
<p>
Когда Open server запущен, приложение будет доступно по адресу: "http://orders-app"
</p>
