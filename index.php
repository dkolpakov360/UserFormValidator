<?php

/*
2. Валидация с помощью исключений

a. Создайте простую html-страницу с веб-формой, в форме должны быть поля name - имя, age -
возраст, email - email.

b. При отправке формы если валидация пройдена, то должно быть выведено сообщение об
успешном изменении, при ошибке валидации - должна быть выведена соответствующая ошибка.

c. Код для обработки запроса формы должен выглядеть так:

$success = false;
if (! empty($_POST)) {
try {
$success = (new UserFormValidator())->validate($_POST);
} catch (\Exception $e) {
$error = $e->getMessage();
}
}

d. Создайте класс UserFormValidator - реализуйте метод validate.

e. Требования к валидации:
■ имя должно быть не пустым
■ возраст должен быть не менее 18 лет
■ email - должен быть заполнен и соответствовать формату email

*/

spl_autoload_register(function ($class) {

    $prefix = "Validation\\";

    $base_dir = __DIR__ . "/Validation/";

    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

$success = false;

if (!empty($_POST)) {
	try {
		$success = (new \Validation\UserFormValidation())->validate($_POST);
	} catch (\Exception $e) {
		$error = $e->getMessage();
	}
}

?>

<html>
<body>

<h1>Валидация 1.0</h1>

<form method="post">
	<input name="name" placeholder="Имя" value="<?= !empty($_POST['name']) ? $_POST['name'] : ''; ?>"><br>
	<input name="age" placeholder="Возраст" value="<?= !empty($_POST['age']) ? $_POST['age'] : ''; ?>"><br>
	<input name="email" placeholder="email" value="<?= !empty($_POST['email']) ? $_POST['email'] : ''; ?>"><br>
	<input type="submit">
</form>

<?php 
    if (isset($error)) {
        echo $error;
    } elseif (isset($success)) {
        echo 'Успех!';
    }
?>

</body>
</html>
