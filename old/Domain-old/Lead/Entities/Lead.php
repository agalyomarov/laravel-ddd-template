<?php


// namespace App\Domain\Lead\Entities;

// use App\Domain\Lead\ValueObjects\Lead\Id;
// use App\Domain\Lead\ValueObjects\Lead\Name;
// use App\Domain\Lead\ValueObjects\Lead\Phone;
// use App\Domain\Lead\ValueObjects\Lead\Status;

// class Lead
// {
//     public Id $id;
//     public Name $name;
//     public Phone $phone;
//     public ?string $comment;
//     public Status $status;

//     public function __construct(Id $id, Name $name, Phone $phone, Status $status)
//     {
//         $this->id = $id;
//         $this->name = $name;
//         $this->phone = $phone;
//         $this->status = $status;
//     }

//     public function setStatus(Status $status): void
//     {
//         $this->status->ensureCanBeChangedTo($status);
//         $this->status = $status;
//     }
// }
