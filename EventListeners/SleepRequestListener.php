<?php

namespace Muspelheim\SleepBundle\EventListeners;

use Muspelheim\SleepBundle\Services\SleepManagerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelInterface;

class SleepRequestListener
{
    /** @var SleepManagerInterface */
    private $sleepManager;

    /** @var KernelInterface */
    private $kernel;

    /**
     * SleepRequestListener constructor.
     * @param SleepManagerInterface $sleepManager
     * @param KernelInterface $kernel
     */
    public function __construct(SleepManagerInterface $sleepManager, KernelInterface $kernel)
    {
        $this->sleepManager = $sleepManager;
        $this->kernel       = $kernel;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->sleepManager->doDelay($event->getRequest(), $this->kernel->getEnvironment());
    }
}
