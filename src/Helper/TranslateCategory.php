<?php


namespace App\Helper;


use App\Infrastructure\Repository\PdoCourseRepository;

class TranslateCategory
{
    /**
     * Translates the data it receives from the database into the course table
     * @param int $id
     * @return string
     */
    public static function handle(int $id): string
    {
        $repository = new PdoCourseRepository();
        $array = $repository->queryCategory($id);
        return $array['category_name'];
    }
}