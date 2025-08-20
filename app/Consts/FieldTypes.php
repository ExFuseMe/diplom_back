<?php

namespace App\Consts;

enum FieldTypesEnum
{
    const TEXT = 'text';
    const TEXTAREA = 'textarea';
    const SELECT = 'select';
    const CHECKBOX = 'checkbox';
    const RADIO = 'radio';
    const FILE = 'file';

    public function getAll(): array
    {
        return [
            self::TEXT,
            self::TEXTAREA,
            self::SELECT,
            self::CHECKBOX,
            self::RADIO,
            self::FILE,
        ];
    }
}
