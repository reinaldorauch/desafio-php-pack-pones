<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\User\User;
use App\Domain\User\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DatabaseUserRepository implements UserRepository
{
  private EntityRepository $repo;
  
  public function __construct(EntityManager $em)
  {
    $this->repo = $em->getRepository(User::class);
  }

  public function findAll(): array
  {
    return $this->repo->findAll();
  }

  public function findUserOfId(int $id): User
  {
    return $this->repo->findOneBy(['user_id' => $id]);
  }
}