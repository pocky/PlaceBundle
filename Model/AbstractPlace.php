<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\PlaceBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class AbstractPlace
 *
 * @package Black\Bundle\PlaceBundle\Model
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class AbstractPlace implements PlaceInterface
{
    protected $id;

    protected $name;

    protected $description;

    protected $address;

    protected $containedIn;

    protected $events;

    protected $faxNumber;

    protected $geo;

    protected $logo;

    protected $maps;

    protected $openingHoursSpecification;

    protected $photos;

    protected $reviews;

    protected $telephone;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->events   = new ArrayCollection();
        $this->maps     = new ArrayCollection();
        $this->photos   = new ArrayCollection();
        $this->reviews  = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $address
     *
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param $containedIn
     *
     * @return $this
     */
    public function setContainedIn($containedIn)
    {
        $this->containedIn = $containedIn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContainedIn()
    {
        return $this->containedIn;
    }

    /**
     * @param $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $events
     *
     * @return $this
     */
    public function setEvents($events)
    {
        foreach ($events as $event) {
            $this->addEvent($event);
        }

        return $this;
    }

    /**
     * @param $event
     *
     * @return $this
     */
    public function setEvent($event)
    {
        $this->addEvent($event);

        return $this;
    }

    /**
     * @param $event
     */
    public function addEvent($event)
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
        }
    }

    /**
     * @param $event
     */
    public function removeEvent($event)
    {
        if($this->events->contains($event)) {
            $this->events->removeElement($event);
        }
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param $faxNumber
     *
     * @return $this
     */
    public function setFaxNumber($faxNumber)
    {
        $this->faxNumber = $faxNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param $geo
     *
     * @return $this
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param $logo
     *
     * @return $this
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param $maps
     *
     * @return $this
     */
    public function setMaps($maps)
    {
        foreach ($maps as $map) {
            $this->addMap($map);
        }

        return $this;
    }

    /**
     * @param $map
     *
     * @return $this
     */
    public function setMap($map)
    {
        $this->addMap($map);

        return $this;
    }

    /**
     * @param $map
     */
    public function addMap($map)
    {
        if (!$this->maps->contains($map)) {
            $this->maps->add($map);
        }
    }

    /**
     * @param $map
     */
    public function removeMap($map)
    {
        if ($this->maps->contains($map)) {
            $this->maps->removeElement($map);
        }
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getMaps()
    {
        return $this->maps;
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $openingHoursSpecification
     *
     * @return $this
     */
    public function setOpeningHoursSpecification($openingHoursSpecification)
    {
        $this->openingHoursSpecification = $openingHoursSpecification;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOpeningHoursSpecification()
    {
        return $this->openingHoursSpecification;
    }

    /**
     * @param $photos
     *
     * @return $this
     */
    public function setPhotos($photos)
    {
        foreach ($photos as $photo) {
            $this->addPhoto($photo);
        }

        return $this;
    }

    /**
     * @param $photo
     *
     * @return $this
     */
    public function setPhoto($photo)
    {
        $this->addPhoto($photo);

        return $this;
    }

    /**
     * @param $photo
     */
    public function addPhoto($photo)
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
        }
    }

    /**
     * @param $photo
     */
    public function removePhoto($photo)
    {
        if ($this->photos->contains($photo)) {
            $this->photos->removeElement($photo);
        }
    }
    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param $reviews
     *
     * @return $this
     */
    public function setReviews($reviews)
    {
        foreach ($reviews as $review) {
            $this->addReview($review);
        }

        return $this;
    }

    /**
     * @param $review
     *
     * @return $this
     */
    public function setReview($review)
    {
        $this->addReview($review);

        return $this;
    }

    /**
     * @param $review
     */
    public function addReview($review)
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews->add($review);
        }
    }

    /**
     * @param $review
     */
    public function removeReview($review)
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
        }
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param $telephone
     *
     * @return $this
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
} 
