<?php

/**
 * Created by PhpStorm.
 * User: Ievgen_Kyvgyla
 * Date: 12-Dec-18
 * Time: 16:38
 */

namespace Infrastructure\App\ReadModel;

use App\Entity\Post\Post;
use App\ReadModel\PostReadRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Psr\Container\ContainerInterface;

class PostReadRepositoryFactory
{
    public function __invoke(ContainerInterface $container)
    {
        /**
         * @var EntityManagerInterface $em
         * @var EntityRepository $repository
         */
        $em = $container->get(EntityManagerInterface::class);
        $repository =  $em->getRepository(Post::class);

        return new PostReadRepository($repository);
    }
}
