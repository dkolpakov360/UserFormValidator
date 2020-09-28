<?php

namespace Validation;

class UserFormValidation
{
	public $name;
	public $age;
	public $email;

	public function validate($request)
	{
		$name = $request['name'];
		$age = $request['age'];
		$email = $request['email'];

		if (empty($name)) {
            throw new \Exception('Вы забыли указать свое имя');
        }

        if ($age < 18) {
            throw new \Exception('Вы слишком молоды');
        }

        if ( !strstr($email, '@') || !strstr($email, '.') ){
            throw new \Exception('Укажите корректный email');
        }

		if (!empty($_POST['name']) && $_POST['age'] >= 18 && $_POST['email'])
		{
			return true; 
		}
	}
}