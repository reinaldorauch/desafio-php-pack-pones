<?php
declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

/**
 * @Entity
 * @Table(name="user")
 */
class User implements JsonSerializable
{
  const TYPE_USER = 'U';
  const TYPE_SELLER = 'L';

  /**
   * @Id
   * @Column(type="integer", name="user_id")
   * @GeneratedValue
   * @var int|null
   */
  private ?int $userId;

  /**
   * @var string
   * @Column(name="full_name")
   */
  private string $fullName;

  /**
   * @var string
   * @Column(type="string", unique=true)
   */
  private string $email;

  /**
   * @var string
   * @Column(name="cpf_cnpj", length="14", unique=true)
   */
  private string $cpfCnpj;

  /**
   * @var string
   * @Column(name="password_hash")
   */
  private string $passwordHash;

  /**
   * @var string
   * @Column(length="1")
   */
  private string $type;

  /**
   * @var \DateTime
   * @Column(name="created_at", type="datetime")
   */
  private \DateTime $createdAt;

  /**
   * @return int|null
   */
  public function getUserId(): ?int
  {
    return $this->userId;
  }

  /**
   * @return string
   */
  public function getFullName(): string
  {
    return $this->fullName;
  }

  /**
   * @return string
   */
  public function getCpfCnpj(): string
  {
    return $this->cpfCnpj;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  public function getCreatedAt(): \DateTime
  {
    return $this->createdAt;
  }

  public function checkPassword(string $password): bool
  {
    return password_verify($password, $this->passwordHash);
  }

  public function setPassword(string $password)
  {
    $this->passwordHash = password_hash($password, PASSWORD_BCRYPT);
  }

  /**
   * @return array
   */
  public function jsonSerialize()
  {
    return [
      'userId' => $this->userId,
      'fullName' => $this->fullName,
      'cpfCnpj' => $this->cpfCnpj,
      'email' => $this->email,
      'type' => $this->type,
      'createdAt' => $this->createdAt->format('c')
    ];
  }
}
