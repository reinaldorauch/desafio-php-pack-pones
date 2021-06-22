<?php

namespace App\Infrastructure\Persistence\Transaction;

use App\Domain\Transaction\Transaction;
use App\Domain\Transaction\TransactionRepository;
use Doctrine\ORM\EntityManager;

class DatabaseTransactionRepository implements TransactionRepository
{
  public function __construct(EntityManager $em)
  {
    $this->repo = $em->getRepository(Transaction::class);
  }

  public function findAll(): array
  {
    return $this->repo->findAll(); 
  }

  public function findTransactionOfId(int $id): Transaction
  {
    return $this->repo->findOneBy(['transactionId' => $id]) ;
  }
}