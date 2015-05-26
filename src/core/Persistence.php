<?php
namespace mani\lottery\core;

/**
 * Class Persistence
 *
 * @package mani\lottery\core
 */
class Persistence
{
    /**
     * @param Model $model
     */
    public static function persist(Model $model)
    {
        global $entityManager;

        $entityManager->persist($model);
        $entityManager->flush();
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public static function query()
    {
        global $entityManager;

        return $entityManager->createQueryBuilder();
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public static function manager()
    {
        global $entityManager;

        return $entityManager;
    }
}
