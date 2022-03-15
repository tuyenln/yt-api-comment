<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['all' => true],
    Liip\FunctionalTestBundle\LiipFunctionalTestBundle::class => ['all' => true],
    Liip\TestFixturesBundle\LiipTestFixturesBundle::class => ['all' => true],
    Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle::class => ['dev' => true, 'test' => true],
    SimpleBus\AsynchronousBundle\SimpleBusAsynchronousBundle::class => ['all' => true],
    JMS\SerializerBundle\JMSSerializerBundle::class => ['all' => true],
    SimpleBus\JMSSerializerBundleBridge\SimpleBusJMSSerializerBundleBridgeBundle::class => ['all' => true],
    BNNVARA\SimpleBusAwsBridgeBundle\SimpleBusAwsBridgeBundle::class => ['all' => true],
    SimpleBus\SymfonyBridge\SimpleBusCommandBusBundle::class => ['all' => true],
    SimpleBus\SymfonyBridge\SimpleBusEventBusBundle::class => ['all' => true],
];
