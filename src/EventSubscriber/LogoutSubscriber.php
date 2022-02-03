<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Event\LogoutEvent;

/**
 * Logout event subscriber.
 *
 * @author Hans Grinwis <hans@kwootjes.nl>
 */
final class LogoutSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [LogoutEvent::class => 'onLogout'];
    }

    public function onLogout(LogoutEvent $event): void
    {
        // json logout?
        if (str_contains($event->getRequest()->getPreferredFormat(), 'json')) {
            // 204 No Content
            $event->setResponse(new Response(null, Response::HTTP_NO_CONTENT));
        }

        // else let logout continue with redirect
    }
}