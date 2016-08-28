<h2>Администрирование пунктов обмена.</h2><!--Форма отражения информации по пунктам обмена-->

<div id = "msg"></div>
<form id = "edit_changeoffice" hidden="hidden">
<table class = "changeoffice">
<tr><td align="left">Наименование</td><td><input size=50px type="text" name = "Наименование" id="name"></td></tr>
<tr><td align="left">Адрес</td><td><input size=50px type="text" name = "Адрес" id="adress"></td></tr>
<tr><td align="left">Геолокация</td><td><input size=50px type="text" name = "Геолокация" id="geolocation"></td></tr>
<tr><td align="left">Логин</td><td><input size=50px type="text" id="login"></td></tr>
<tr><td align="left">Пароль</td><td><input size=50px type="text" id="pass"></td></tr>
</table>
<input type="button" id="save" value="Сохранить"/>
<input type="button" id="cancel" value="Отменить"/>
</form>

<form action="" name="view_changeoffice">
	<p>&nbsp;</p>
	<input type="button" value="Добавить" id = "add" />
	<input type="button" value="Редактировать" id = "edit" />
	<input type="button" value="Удалить" id = "del" />
	<p>&nbsp;</p>
<table class = "changeoffice" border="1" width="700">
<tr align="center"><td></td><td><b>Наименование</b></td><td><b>Адрес</b></td><td><b>Геолокация</b></td></tr>
<?foreach($viewdata as $po):?>
<tr>
<td><input type="radio" name="id" value="<?=$po["id"]?>"/></td>
<td><?=$po["name"]?></td>
<td><?=$po["adress"]?></td>
<td><?=$po["geolocation"]?></td>
</tr>
<?endforeach?>
</table>
</form>