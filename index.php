<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Перевод арабские - римские цифры</title>
	<link href="../css/style.css" rel="stylesheet"/>
</head>
<body>

<main>
<h1>Римляне, как известно, использовали для записи числа латинские буквы. Считается, что римская система
счисления является классическим примером непозиционной системы счисления, то есть такой системы
счисления, в которой величина (которую обозначает цифра) не зависит от положения в числе. <a href="https://ru.wikipedia.org/wiki/%D0%A0%D0%B8%D0%BC%D1%81%D0%BA%D0%B8%D0%B5_%D1%86%D0%B8%D1%84%D1%80%D1%8B" target="_blank">Подробнее о таблице ></a></h1>

 
	    <form method="post" id="ajax_form" action="" >
		<div class="col_l">
			<label>Введите число для расчета</label>
			<br><textarea type="text" name="numbers" id="van" placeholder="Введите одно арабское или римское число"><?= $resPost ?></textarea>
		</div>
		<div class="col_r">
			<label>Результат</label>
		
			<br><textarea type="text" name="res" class="result_form" placeholder="Результат" disabled ></textarea>
		</div>
		<div class="but">
			<input type="button" id="btn" value="Конвертировать →" />
		</div>
		</form>
</main>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<!-- Получение с php json результата -->
<script>
$( document ).ready(function() {
    $("#btn").click(
		function(){
			sendAjaxForm('result_form', 'ajax_form', 'function.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, ajax_form, url) {
    $.ajax({
        url:     url, 
        type:     "POST",
        dataType: "html", 
        data: $("#"+ajax_form).serialize(),  
        success: function(response) { 
        	result = $.parseJSON(response);
        	$('.result_form').html(' ' +result.number);
    	},
    	error: function(response) { 
            $('.result_form').html('Ошибка. Данные не отправлены.');
    	}
 	});
}
</script>


 <!-- Хотел добавить что бы показывались стили римских цифр больше миллиона, но не получилось вставить json. Оставил простой техтареа
<script type="text/javascript" src="../js/ckeditor/ckeditor.js" /> 
<script type="text/javascript">
    CKEDITOR.replace( 'editor1');
</script>
<script type="text/javascript">
CKEDITOR.replace( 'editor1');
	var ckeditor1 = CKEDITOR.replace( 'editor1');
	AjexFileManager.init({
		returnTo: 'ckeditor',
		editor: ckeditor1
	});
</script>
-->
</body>
</html>