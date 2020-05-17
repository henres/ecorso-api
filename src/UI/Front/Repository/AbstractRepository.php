<?php

namespace Ecorso\UI\Front\Repository;

use GuzzleHttp\Client;
use Symfony\Component\Routing\RouterInterface;

class AbstractRepository
{
    /**
     * @var Client
     */
    private $ecorsoApiClient;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var DecoderInterface
     */
    private $serializer;

    /**
     * @var EventDispatcherInterface
     */
    private $ecorsoApiClientDispatcher;

    /**
     * @var ProxyHandlerFactory
     */
    private $proxyHandlerFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * AbstractRepository constructor.
     * @param Client $ecorsoApiClient
     * @param RouterInterface $router
     * @param DecoderInterface $serializer
     * @param EventDispatcherInterface $ecorsoApiClientDispatcher
     * @param ProxyHandlerFactory $proxyHandlerFactory
     * @param LoggerInterface $logger
     */
    public function __construct(
        Client $ecorsoApiClient,
        RouterInterface $router,
        DecoderInterface $serializer,
        EventDispatcherInterface $ecorsoApiClientDispatcher,
        ProxyHandlerFactory $proxyHandlerFactory,
        LoggerInterface $logger
    ) {
        $this->ecorsoApiClient = $ecorsoApiClient;
        $this->router = $router;
        $this->serializer = $serializer;
        $this->ecorsoApiClientDispatcher = $ecorsoApiClientDispatcher;
        $this->proxyHandlerFactory = $proxyHandlerFactory;
        $this->logger = $logger;
    }
}