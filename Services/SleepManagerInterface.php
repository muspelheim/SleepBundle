<?php

namespace Muspelheim\SleepBundle\Services;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface SleepManagerInterface
 * @package Muspelheim\SleepBundle\EventListeners
 */
interface SleepManagerInterface
{
    /**
     * @param Request $request
     * @param $environment
     * @return bool
     */
    public function doDelay(Request $request, $environment);
}
