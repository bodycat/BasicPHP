<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
     <title>GeekBrains BasicPHP Hw06</title>
  </head>
  <body>
	<div class="container">
    <div class="page-header">
         <h1>GeekBrains BasicPHP Hw06 Calc 2 </h1>
    </div>
  <pre>
1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление.
Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <b>select</b>.
2. Создать калькулятор, который будет определять тип выбранной пользователем операции,
ориентируясь на нажатую кнопку.  
</pre>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $arg1 = $_POST['A'];
  $arg2 = $_POST['B'];
  $operation = $_POST['operation'];
  $reset = $_POST['reset'];
 
  if ($reset) {
        $view = "";
        $arg1 = 0;
        $arg2 = 0;
        $operation = false;
  }else{
     if ($arg1 != "" && $arg2 != "" && $operation != ""){
      $result = mathOp($arg1, $arg2, $operation);
      $view = "$arg1 $operation $arg2 = " . $result;
    }
     else{
        $view = "Не введено одно из значений или операция";
      }
  }
}
  $result = "";
function mathOp($arg1, $arg2, $operation){
    switch ($operation){
      case "+":
          $result = ($arg1+$arg2);
        break;
      case "-":       
          $result = ($arg1-$arg2);
        break;
      case "*":
          $result = ($arg1*$arg2);
        break;
      case "/":
         $result = ($arg2 != 0) ? $arg1 / $arg2 : "На 0 делить нельзя";
          break;
        }
      return $result;
  }
?>
<form action="" method="post">
  <fieldset>
    <div class="form-group">
      <label for="disabledTextInput">Введите число</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Введите число" name="A" value="<?=$A?>">
    </div>
    <div class="form-group">
      <label for="disabledTextInput">Введите число</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Введите число" name="B" value="<?=$B?>">
    </div>
    <label for="disabledSelect">Выберите операцию</label>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="operation" value="+">+</button>
      <button type="submit" class="btn btn-primary" name="operation" value="-">-</button>
      <button type="submit" class="btn btn-primary" name="operation" value="*">*</button>
      <button type="submit" class="btn btn-primary" name="operation" value="/">/</button>
    </div> 
    <div class="form-group">
      <input  type="text" class="form-control mt-3" value="<?= $view ?>" name="result" disabled>
    </div> 
    <button type="submit" class="btn btn-primary" name="reset" value="reset">Сброс</button>
  </fieldset>
</form>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="
    sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>