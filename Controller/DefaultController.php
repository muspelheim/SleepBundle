<?php

namespace Muspelheim\SleepBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MuspelheimSleepBundle:Default:index.html.twig');
    }
}
