<?if($jsScript !== NULL):?> 
<script src="<?=$jsScript?>"></script>
<?endif?>

<?if($viewdata == TRUE):?> 
<img src="/images/unlock.png" width="16" height="16">
<?else:?> 
<img src="/images/lock.png" width="16" height="16">
<?endif?>

<div class="popup_overlay"></div>
<div class="popup">
  <div class="popup_title">Заголовок всплывающего окна <span class="closer">X</span></div>
  <div class="popup_content">Содержимое всплывающего окна, форма обратной связи или что-то, что вам нужно.</div>
  <button id = "close">llk</button>
</div>