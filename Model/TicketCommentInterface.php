<?php
/**
 * Created by PhpStorm.
 * User: fma
 * Date: 25/05/18
 * Time: 17:41
 */

namespace Maps_red\TicketingBundle\Model;


use Symfony\Component\Security\Core\User\UserInterface;

interface TicketCommentInterface
{

    public function getId() : ?int;

    public function getText(): ?string;

    public function setText(string $text): TicketCommentInterface;

    public function getStatus(): ?int;

    public function setStatus(int $status): TicketCommentInterface;

    public function getAuthor(): ?UserInterface;

    public function setAuthor(?UserInterface $author): TicketCommentInterface;

}