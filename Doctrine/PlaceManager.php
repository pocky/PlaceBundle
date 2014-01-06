<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\PlaceBundle\Doctrine;

use Black\Bundle\CommonBundle\Doctrine\ManagerInterface;
use Doctrine\Common\Persistence\ObjectManager as AbstractObjectManager;

/**
 * Class PlaceManager
 *
 * @package Black\Bundle\PlaceBundle\Doctrine
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PlaceManager implements ManagerInterface
{
    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var string
     */
    protected $class;

    /**
     * Constructor
     *
     * @param ObjectManager $dm
     * @param string        $class
     */
    public function __construct(AbstractObjectManager $dm, $class)
    {
        $this->manager     = $dm;
        $this->repository  = $dm->getRepository($class);

        $metadata          = $dm->getClassMetadata($class);
        $this->class       = $metadata->name;
    }

    /**
     * @return ObjectManager
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return ObjectRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param object $model
     *
     * @throws \InvalidArgumentException
     */
    public function persist($model)
    {
        if (!$model instanceof $this->class) {
            throw new \InvalidArgumentException(gettype($model));
        }

        $this->getManager()->persist($model);
    }

    /**
     * Flush
     */
    public function flush()
    {
        $this->getManager()->flush();
    }

    /**
     * Remove the model
     * 
     * @param object $model
     *
     * @throws \InvalidArgumentException
     */
    public function remove($model)
    {
        if (!$model instanceof $this->class) {
            throw new \InvalidArgumentException(gettype($model));
        }
        $this->getManager()->remove($model);
    }

    /**
     * Create a new model
     *
     * @return $config object
     */
    public function createInstance()
    {
        $class  = $this->getClass();
        $model = new $class;

        return $model;
    }

    /**
     * @return string
     */
    protected function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    public function findDocuments()
    {
        return $this->repository->findAll();
    }

    /**
     * @param $value
     *
     * @return mixed
     */
    public function findDocument($value)
    {
        return $this->getRepository()->getPlaceByIdOrSlug($value);
    }

    /**
     * @return array
     */
    public function findPlaces()
    {
        return $this->getRepository()->getAll();
    }

    /**
     * @param string $slug
     * 
     * @return Object
     */
    public function findPlaceBySlug($slug)
    {
        return $this->getRepository()->getPlaceBySlug($slug);
    }

    /**
     * @param integer $id
     * 
     * @return Object
     */
    public function findPlaceById($id)
    {
        return $this->getRepository()->getPlaceById($id);
    }

    /**
     * @param array $ids
     * 
     * @return Object
     */
    public function findPlacesByIds(array $ids = array())
    {
        return $this->getRepository()->getPlacesByIds($ids);
    }

    /**
     * @return integer
     */
    public function countAll()
    {
        return count($this->getRepository()->getAll());
    }
}
