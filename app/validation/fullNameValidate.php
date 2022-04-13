<?php
session_start();

const FULL_NAME_PATTERN = "/^[А-ЯЁ][а-яё]{2,}([-][А-ЯЁ][а-яё]{2,})?\s[А-ЯЁ][а-яё]{2,}\s[А-ЯЁ][а-яё]{2,}$/u";

function fullNameValidate($fullName): bool
{
    if (!empty($fullName)) {

        if (!preg_match(FULL_NAME_PATTERN, $fullName)) {
            $_SESSION['fullNameError'] = 'Поле должно соответствовать формату Иванов Иван Иванович';
            return false;
        }

    } else {
        $_SESSION['fullNameError'] = 'Поле не может быть пустым';
        return false;
    }
    return true;
}
