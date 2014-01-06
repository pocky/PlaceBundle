<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\PlaceBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Black\Bundle\CommonBundle\Configuration\Configuration;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Black\Bundle\CommonBundle\Form\Handler\HandlerInterface;
use Black\Bundle\PlaceBundle\Model\PlaceInterface;

/**
 * Class PlaceFormHandler
 *
 * @package Black\Bundle\PlaceBundle\Form\Handler
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PlaceFormHandler implements HandlerInterface
{
    /**
     * @var \Symfony\Component\Form\FormInterface
     */
    protected $form;
    /**
     * @var
     */
    protected $configuration;
    /**
     * @var
     */
    protected $url;

    /**
     * @param FormInterface $form
     * @param Configuration $configuration
     */
    public function __construct(
        FormInterface $form,
        Configuration $configuration
    )
    {
        $this->form             = $form;
        $this->configuration    = $configuration;
    }

    /**
     * @return FormInterface
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param $place
     *
     * @return bool
     */
    public function process($place)
    {
        $this->form->setData($place);

        if ('POST' === $this->configuration->getRequest()->getMethod()) {

            $this->form->handleRequest($this->configuration->getRequest());

            if ($this->form->has('delete') && $this->form->get('delete')->isClicked()) {
                return $this->onDelete($place);
            }

            if ($this->form->isValid()) {
                return $this->onSave($place);
            } else {
                return $this->onFailed();
            }
        }
    }

    /**
     * @param $url
     *
     * @return $this
     */
    protected function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @param       $route
     * @param array $parameters
     * @param bool  $referenceType
     *
     * @return string
     */
    protected function generateUrl($route, $parameters = array(), $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->configuration->getRouter()->generate($route, $parameters, $referenceType);
    }

    /**
     * @param PlaceInterface $place
     *
     * @return bool
     */
    protected function onDelete(PlaceInterface $place)
    {
        $this->configuration->getManager()->remove($place);
        $this->configuration->getManager()->flush();

        $this->configuration->setFlash('success', 'black.bundle.place.success.place.delete');
        $this->setUrl($this->generateUrl($this->configuration->getParameter('route')['index']));

        return true;
    }

    /**
     *
     */
    protected function onFailed()
    {
        $this->configuration->setFlash('error', 'black.bundle.place.success.place.fail');
    }

    /**
     * @param PlaceInterface $place
     *
     * @return bool
     */
    protected function onSave(PlaceInterface $place)
    {
        if (!$place->getId()) {
            $this->configuration->getManager()->persist($place);
        }

        $this->configuration->getManager()->flush();

        if ($this->form->get('save')->isClicked()) {
            $this->setUrl($this->generateUrl($this->configuration->getParameter('route')['update'], array('value' => $place->getId())));
            $this->configuration->setFlash('success', 'black.bundle.place.success.place.save');

            return true;
        }

        if ($this->form->get('saveAndAdd')->isClicked()) {
            $this->setUrl($this->generateUrl($this->configuration->getParameter('route')['create']));
            $this->configuration->setFlash('success', 'black.bundle.place.success.place.saveAndAdd');

            return true;
        }
    }
}
