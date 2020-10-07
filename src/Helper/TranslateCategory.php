<?php


namespace App\Helper;


use App\Infrastructure\Repository\PdoCourseRepository;

class TranslateCategory
{
    public static function handle(int $id): string
    {
        $repository = new PdoCourseRepository();
        $array = $repository->queryCategory($id);
        return $array['category_name'];
    }
}