<?php

namespace Muspelheim\SleepBundle\Services;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class SleepManager
 * @package Muspelheim\SleepBundle\Services
 */
class SleepManager implements SleepManagerInterface
{
    const HTTP_GET  = 'get';
    const HTTP_POST = 'post';

    /** @var array */
    private $options;

    /**
     * SleepManager constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->options = $options;
    }

    /**
     * @param Request $request
     * @param $environment
     * @return bool
     */
    public function doDelay(Request $request, $environment)
    {
        $method = strtolower($request->getMethod());

        $this->{$method.'RequestDelay'}($environment);

        return true;
    }

    /**
     * @param $environment
     * @return int
     */
    private function getRequestDelay($environment)
    {
        return sleep($this->options[$environment][self::HTTP_GET]);
    }

    /**
     * @param $environment
     * @return int
     */
    private function postRequestDelay($environment)
    {
        return sleep($this->options[$environment][self::HTTP_POST]);
    }
}
