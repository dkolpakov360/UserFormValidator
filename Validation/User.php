<?php

namespace Validation;

class User
{
// 	■ public function load($id) - метод должен формировать исключение если $id - не найден в базе
// данных (придумайте условие на $id, для имитации этой ошибки)
	public function load($id)
	{
		 if ($id != 100) {
            throw new \Exception('Пользователь не найден');
        }
        return true;
	}

// ■ public function save($data) - метод имитирует сохранение в базе данных возвращает true или
// false при ошибке - для имитации работы метод должен возвращать случайное значение

	public function save($data)
    {
        return (bool)rand(0, 1); 
    }
}