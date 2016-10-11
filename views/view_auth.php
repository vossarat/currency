<?if($jsScript !== NULL):?> 
	<script src="<?=$jsScript?>"></script>
<?endif?>

<?if($viewdata == TRUE):?> 
<a><img src="/images/unlock.png" width="16" height="16"></a>
<?else:?> 
<a><img src="/images/lock.png" width="16" height="16"></a>
<?endif?>

<form id="auth_form"> <!--Форма аутентификации-->

<div id = "msg"></div>

<table>
<tr><td>Логин:</td>
           <td><input style="border:1px silver solid; width:160px;" type=text id=login></td>
</tr>
<tr><td>Пароль:</td>
      	  <td><input style="border:1px silver solid; width:160px;" type=text id = pass></td>
</tr>
</table>
<input type="button" id="auth_button" value="Войти">
</form>

<div id = "substrate"></div> <!--Подложка-->