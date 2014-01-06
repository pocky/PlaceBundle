<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Black\Bundle\PlaceBundle\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class PlaceNotFoundException
 *
 * @package Black\Bundle\PlaceBundle\Exception
 * @author  Alexandre Balmes <albalmes@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class PlaceNotFoundException extends NotFoundHttpException
{
    /**
     * Constructor.
     *
     * @param string     $message  The internal exception message
     * @param \Exception $previous The previous exception
     * @param integer    $code     The internal exception code
     */
    public function __construct($message = 'Place Not Found!', \Exception $previous = null, $code = 0)
    {
        parent::__construct($message, $previous, $code);
    }
} 
