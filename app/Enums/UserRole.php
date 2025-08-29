<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case MAHASISWA = 'mahasiswa';
    case DOSEN = 'dosen';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}