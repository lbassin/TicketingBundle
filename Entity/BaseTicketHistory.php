<?php

namespace Maps_red\Ticketing\Entity;

use Doctrine\ORM\Mapping as ORM;
use Maps_red\TicketingBundle\Model\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Maps_red\Ticketing\Repository\BaseTicketHistoryRepository")
 */
class BaseTicketHistory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="Maps_red\Ticketing\Entity\User")
     */
    private $author;

    public function getId()
    {
        return $this->id;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAuthor(): ?UserInterface
    {
        return $this->author;
    }

    public function setAuthor(?UserInterface $author): self
    {
        $this->author = $author;

        return $this;
    }
}
