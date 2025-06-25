<?php

// namespace App\Domain\Shared;

// trait EventTrait
// {
//     /** @var array */
//     private array $events = [];

//     /**
//      * Регистрирует доменное событие.
//      */
//     protected function registerEvent(object $event): void
//     {
//         $this->events[] = $event;
//     }

//     /**
//      * Возвращает накопленные события и очищает их.
//      *
//      * @return array
//      */
//     public function releaseEvents(): array
//     {
//         $releasedEvents = $this->events;
//         $this->events = [];
//         return $releasedEvents;
//     }

//     /**
//      * Получить все накопленные события без очистки.
//      */
//     public function getEvents(): array
//     {
//         return $this->events;
//     }
// }
