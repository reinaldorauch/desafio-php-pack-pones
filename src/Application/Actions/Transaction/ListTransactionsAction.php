<?php

declare(strict_types=1);

namespace App\Application\Actions\Transaction;

use App\Application\Actions\Action;
use Slim\Psr7\Response;

class ListTransactionsAction extends TransactionAction 
{
  public function action(): Response
  {
    $transactions = $this->transactionRepo->findAll();
    $this->logger->info("Users list was viewed.");
    return $transactions;
  }
}