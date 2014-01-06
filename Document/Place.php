<?php

namespace Black\Bundle\PlaceBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Gedmo\Timestampable\Traits\TimestampableDocument;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Black\Bundle\PlaceBundle\Model\AbstractPlace;
use Black\Bundle\CommonBundle\Traits\ThingDocumentTrait;

/**
 * Class Place
 *
 * @ODM\MappedSuperclass()
 *
 * @package Black\Bundle\PlaceBundle\Document
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
abstract class Place extends AbstractPlace
{
    use TimestampableDocument;

    /**
     * A short description of the item
     *
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $description;

    /**
     * The name of the item
     *
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     */
    protected $name;

    /**
     * The slug of the item
     *
     * @ODM\String
     * @Assert\Length(max="255")
     * @Assert\Type(type="string")
     * @Gedmo\Slug(fields={"name"})
     */
    protected $slug;

    /**
     * @ODM\Raw
     */
    protected $address;

    /**
     * @ODM\Raw
     */
    protected $containedIn;

    /**
     * @ODM\Raw
     */
    protected $events;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $faxNumber;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $geo;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $logo;

    /**
     * @ODM\Raw
     */
    protected $maps;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $openingHoursSpecification;

    /**
     * @ODM\Raw
     */
    protected $photos;

    /**
     * @ODM\Raw
     */
    protected $reviews;

    /**
     * @ODM\String
     * @Assert\Type(type="string")
     */
    protected $telephone;
}
