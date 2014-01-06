<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\PlaceBundle\Controller;

use Black\Bundle\CommonBundle\Controller\CommonController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * Class PlaceController
 *
 * @Route("/place", service="black_place.controller.place")
 *
 * @package Stroos\Bundle\MissionBundle\Controller
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PlaceController extends CommonController
{
    /**
     * @Method({"GET", "POST"})
     * @Route("/new", name="place_create")
     * @Template()
     *
     * @return array
     */
    public function createAction()
    {
        return parent::createAction();
    }

    /**
     * @Method({"POST", "GET"})
     * @Route("/{value}/delete", name="place_delete")
     *
     * @param $value
     *
     * @return mixed
     */
    public function deleteAction($value)
    {
        return parent::deleteAction($value);
    }

    /**
     * @Method("GET")
     * @Route("/index.html", name="place_index")
     * @Template()
     *
     * @return Template
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function indexAction()
    {
        return parent::indexAction();
    }

    /**
     * @param string $value
     *
     * @Method("GET")
     * @Route("/{value}.html", name="place_read")
     * @Template()
     *
     * @return Template
     */
    public function readAction($value)
    {
        return parent::readAction($value);
    }

    /**
     * @Method({"GET", "POST"})
     * @Route("/{value}/update", name="place_update")
     * @Template()
     *
     * @param $value
     *
     * @return mixed
     */
    public function updateAction($value)
    {
        return parent::updateAction($value);
    }
}
