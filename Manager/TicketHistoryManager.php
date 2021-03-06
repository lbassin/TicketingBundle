<?php
/**
 * Created by PhpStorm.
 * User: Maps_red
 * Date: 01/06/2018
 * Time: 21:06
 */

namespace Maps_red\TicketingBundle\Manager;

use Maps_red\TicketingBundle\Model\TicketHistoryInterface;
use Maps_red\TicketingBundle\Model\TicketInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class TicketHistoryManager extends AbstractManager
{
    const SEEN = 0;
    const UNSEEN = 1;

    /**
     * @param UserInterface $user
     * @param TicketInterface $ticket
     * @return bool
     */
    public function setUnseen(UserInterface $user, TicketInterface $ticket)
    {
        /** @var TicketHistoryInterface[] $histories */
        $histories = $this->getRepository()->findBy(['ticket' => $ticket]);
        foreach ($histories as $history) {
            $history->setStatus(self::UNSEEN);
            $this->getManager()->persist($history);
        }

        $this->getManager()->flush();
        $this->setSeen($user, $ticket);

        return true;
    }

    /**
     * @param UserInterface $user
     * @param TicketInterface $ticket
     * @return bool
     */
    public function setSeen(UserInterface $user, TicketInterface $ticket)
    {
        $history = $this->findOrCreateUserHistory($user, $ticket);
        $history->setStatus(self::SEEN);
        $this->persistAndFlush($history);

        return true;
    }

    /**
     * @param UserInterface $user
     * @param TicketInterface $ticket
     * @return null|TicketHistoryInterface
     */
    private function findOrCreateUserHistory(UserInterface $user, TicketInterface $ticket)
    {
        if (null === $history = $this->getRepository()->findOneBy(['ticket' => $ticket, 'user' => $user])) {
            $history = $this->newClass()
                ->setStatus(1)
                ->setTicket($ticket)
                ->setAuthor($user);

            $this->persistAndFlush($history);
        }

        return $history;
    }

}