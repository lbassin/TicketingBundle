<?php
/**
 * Created by PhpStorm.
 * User: fma
 * Date: 25/05/18
 * Time: 17:41
 */

namespace Maps_red\TicketingBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

interface TicketInterface
{
    public function getId() : ?int;

    public function getDescription() : ?string;

    public function setDescription(string $description): TicketInterface;

    public function getStatus(): ?TicketStatusInterface;

    public function setStatus(?TicketStatusInterface $status): TicketInterface;

    public function getCategory(): ?TicketCategoryInterface;

    public function setCategory(?TicketCategoryInterface $category): TicketInterface;

    public function getPublic(): ?bool;

    public function setPublic(bool $public): TicketInterface;

    public function getAuthor(): ?UserInterface;

    public function setAuthor(?UserInterface $author): TicketInterface;

    public function getRating(): ?int;

    public function setRating(?int $rating): TicketInterface;

    public function getClosedAt(): ?\DateTimeInterface;

    public function setClosedAt(\DateTimeInterface $closed_at): TicketInterface;

    public function getClosedBy(): ?UserInterface;

    public function setClosedBy(?UserInterface $closed_by): TicketInterface;

    public function getPublicAt(): ?\DateTimeInterface;

    public function setPublicAt(\DateTimeInterface $public_at): TicketInterface;

}