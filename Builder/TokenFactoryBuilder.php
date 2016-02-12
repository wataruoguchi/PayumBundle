<?php
namespace Payum\Bundle\PayumBundle\Builder;

use Payum\Core\Bridge\Symfony\Security\TokenFactory;
use Payum\Core\Registry\StorageRegistryInterface;
use Payum\Core\Security\TokenFactoryInterface;
use Payum\Core\Storage\StorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TokenFactoryBuilder
{
    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param StorageInterface $tokenStorage
     * @param StorageRegistryInterface $storageRegistry
     *
     * @return TokenFactoryInterface
     */
    public function build(StorageInterface $tokenStorage, StorageRegistryInterface $storageRegistry)
    {
        return new TokenFactory($tokenStorage, $storageRegistry, $this->urlGenerator);
    }
}