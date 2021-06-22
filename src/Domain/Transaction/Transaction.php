<?php

declare(strict_types=1);

namespace App\Domain\Transaction;

use App\Domain\User\User;

/**
 * @Entity
 * @Table(name="transaction")
 */
class Transaction implements \JsonSerializable 
{
  /**
   * @Id
   * @Column(type="integer", name="transaction_id")
   * @GeneratedValue
   * @var int|null
   */
  private ?int $transactionId;

  /**
   * @Column(type="decimal", precision=20, scale=2)
   */
  private string $value;

  /**
   * @ManyToOne(targetEntity="App\Domain\User\User")
   * @JoinColumn(name="from_user_id", referencedColumnName="user_id")
   */
  private User $fromUser;

  /**
   * @ManyToOne(targetEntity="App\Domain\User\User")
   * @JoinColumn(name="to_user_id", referencedColumnName="user_id")
   */
  private User $toUser;

  /**
   * @Column(name="created_at", type="datetime")
   */
  private \DateTime $createdAt;


  public function getTransactionId(): ?int
  {
    return $this->transactionId;
  }

  public function getValue(): string
  {
    return $this->value;
  }

  public function getFromUser(): User
  {
    return $this->fromUser;
  }

  public function getToUser(): User
  {
    return $this->toUser;
  }

  public function getCreatedAt(): \DateTime
  {
    return $this->createdAt;
  }

  public function jsonSerialize()
  {
    return [
      'transacitonId' => $this->transactionId,
      'value' => $this->value,
      'fromUser' => $this->fromUser,
      'toUser' => $this->toUser,
      'createdAt' => $this->createdAt->format('c')
    ];
  }
}