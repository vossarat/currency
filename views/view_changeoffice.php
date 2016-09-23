<script src="<?=$jsScript?>"></script>

<h1>Пункты обмена.</h1>

<div id = "edit_changeoffice"></div>

<form action="" name="view_changeoffice"><!--Форма отражения информации по пунктам обмена-->
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