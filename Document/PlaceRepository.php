<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\PlaceBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * Class PlaceRepository
 *
 * @package Black\Bundle\PlaceBundle\Document
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PlaceRepository extends DocumentRepository
{
    /**
     * @param $key
     *
     * @return array|bool|\Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|null
     */
    public function getPlaceByIdOrSlug($key)
    {
        $qb     = $this->getQueryBuilder();

        $qb = $qb
            ->addOr($qb->expr()->field('id')->equals($key))
            ->addOr($qb->expr()->field('slug')->equals($key))
            ->getQuery();

        return $qb->getSingleResult();
    }

    /**
     * @param $slug
     *
     * @return object
     */
    public function getPlaceBySlug($slug)
    {
        $qb = $this->createQueryBuilder()
                ->field('slug')->equals($slug)
                ->getQuery();

        return $qb->getSingleResult();
    }

    /**
     * @param $id
     *
     * @return object
     * @throws UsernameNotFoundException
     */
    public function getPlaceById($id)
    {
        $qb = $this->createQueryBuilder()
            ->field('id')->equals($id)
            ->getQuery();

        return $qb->getSingleResult();
    }

    /**
     * @param array $ids
     *
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|\MongoCursor
     */
    public function getPlacesByIds(array $ids = array())
    {
        $qb = $this
            ->createQueryBuilder()
            ->field('id')->in($ids)
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @param $filetype
     *
     * @return \Doctrine\MongoDB\Query\Builder
     */
    public function getAllExcept($filetype)
    {
        $qb = $this
            ->createQueryBuilder()
            ->field('id')->notIn($filetype);

        return $qb;
    }

    /**
     * @return \Doctrine\MongoDB\ArrayIterator|\Doctrine\MongoDB\Cursor|\Doctrine\MongoDB\EagerCursor|mixed|\MongoCursor
     */
    public function getAll()
    {
        $qb = $this
            ->createQueryBuilder()
            ->sort('name', 'ASC')
            ->getQuery();

        return $qb->execute();
    }

    /**
     * @return \Doctrine\ODM\MongoDB\Query\Builder
     */
    protected function getQueryBuilder()
    {
        return $this->createQueryBuilder();
    }
}
