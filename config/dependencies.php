<?php

$builder = new DI\ContainerBuilder();

try {
    return $builder->build();
} catch (Exception $e) {
    $e->getMessage();
}
