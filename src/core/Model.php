<?php
namespace mani\lottery\core;

/**
 * Class Model
 * @package mani\lottery\core
 */
abstract class Model
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}