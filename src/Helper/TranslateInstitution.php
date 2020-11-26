<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Helper;

use App\Infrastructure\Repository\PdoCourseRepository;

class TranslateInstitution
{
    /**
     * Translates the data it receives from the database into the course table
     * @param int $id
     * @return string
     */
    public static function handle(int $id): string
    {
        $repository = new PdoCourseRepository();
        $array = $repository->queryInstitution($id);
        return $array['institution_name'];
        }
}