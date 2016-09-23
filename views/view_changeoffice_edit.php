<script src="<?=$jsScript?>"></script>

<div id = "msg"></div>

<h1>Администрирование пунктов обмена.</h1>
<form id = "view_changeoffice">

<table class = "changeoffice">
<tr><td align="left">Наименование</td><td><input size=50px type="text" name = "name" id = "name"></td></tr>
<tr><td align="left">Адрес</td><td><input size=50px type="text" name = "adress" id = "adress"></td></tr>
<tr><td align="left">Геолокация</td><td><input size=50px type="text" name = "geolocation" id = "geolocation"></td></tr>
<tr><td align="left">Логин</td><td><input size=50px type="text" name = "login" id = "login"></td></tr>
<tr><td align="left">Пароль</td><td><input size=50px type="text" name = "pass" id = "pass"></td></tr>
</table>
<input type="submit" id="save" value="Сохранить"/>
<input type="button" id="cancel" value="Отменить"/>
<input type="button" id="addinfo" value="Заполнить"/>
</form>