<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\PlaceBundle\Form\Type;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class PlaceType
 *
 * @package Black\Bundle\PlaceBundle\Form\Type
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PlaceType extends AbstractType
{
    /**
     * @var type 
     */
    protected $class;

    /**
     * @var \Symfony\Component\EventDispatcher\EventSubscriberInterface
     */
    protected $buttonSubscriber;

    /**
     * @param                          $class
     * @param EventSubscriberInterface $buttonSubscriber
     */
    public function __construct($class, EventSubscriberInterface $buttonSubscriber)
    {
        $this->class            = $class;
        $this->buttonSubscriber  = $buttonSubscriber;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventSubscriber($this->buttonSubscriber);

        $builder
            ->add('name', 'text', array(
                    'label'         => 'black.bundle.place.type.place.name.label'
                )
            )
            ->add('description', 'textarea', array(
                    'label'         => 'black.bundle.place.type.place.description.label'
                )
            )
            ->add('address', 'text', array(
                    'label'         => 'black.bundle.place.type.place.address.label'
                )
            )
            ->add('containedIn', 'text', array(
                    'label'         => 'black.bundle.place.type.place.containedIn.label'
                )
            )
            ->add('events', 'collection', array(
                    'label'         => 'black.bundle.place.type.place.events.label',
                    'type'          => 'text',
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'attr'          => array(
                        'class'         => 'events-collection',
                        'add'           => 'add-another-event'
                    )
                )
            )
            ->add('faxNumber', 'text', array(
                    'label'         => 'black.bundle.place.type.place.faxNumber.label'
                )
            )
            ->add('geo', 'text', array(
                    'label'         => 'black.bundle.place.type.place.geo.label'
                )
            )
            ->add('logo', 'text', array(
                    'label'         => 'black.bundle.place.type.place.logo.label'
                )
            )
            ->add('maps', 'collection', array(
                    'label'         => 'black.bundle.place.type.place.maps.label',
                    'type'          => 'text',
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'attr'          => array(
                        'class'         => 'maps-collection',
                        'add'           => 'add-another-map'
                    )
                )
            )
            ->add('openingHoursSpecification', 'text', array(
                    'label'         => 'black.bundle.place.type.place.openingHoursSpecification.label'
                )
            )
            ->add('photos', 'collection', array(
                    'label'         => 'black.bundle.place.type.place.photos.label',
                    'type'          => 'text',
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'attr'          => array(
                        'class'         => 'photos-collection',
                        'add'           => 'add-another-photo'
                    )
                )
            )
            ->add('reviews', 'collection', array(
                    'label'         => 'black.bundle.place.type.place.reviews.label',
                    'type'          => 'text',
                    'allow_add'     => true,
                    'allow_delete'  => true,
                    'attr'          => array(
                        'class'         => 'reviews-collection',
                        'add'           => 'add-another-review'
                    )
                )
            )
            ->add('telephone', 'text', array(
                    'label'         => 'black.bundle.place.type.place.telephone.label'
                )
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class'            => $this->class,
                'intention'             => 'place_form',
                'translation_domain'    => 'form'
            )
        );
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'black_place_place';
    }
}
