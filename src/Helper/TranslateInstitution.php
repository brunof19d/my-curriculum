<?php


namespace App\Helper;


use App\Infrastructure\Repository\PdoCourseRepository;

class TranslateInstitution
{
    public static function handle(int $id): string
    {
        $repository = new PdoCourseRepository();
        $array = $repository->queryInstitution($id);
        return $array['institution_name'];
        }
}