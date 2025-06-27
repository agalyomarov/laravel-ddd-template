<?php

declare(strict_types=1);

namespace App\Domain\Lead\Services;

use App\Domain\Lead\Aggregate\Lead;
use App\Domain\Shared\Enums\RoleEnum;
use App\Domain\Lead\Enums\LeadStatusEnum;
use App\Domain\Lead\Repositories\LeadRepositoryInterface;
use App\Domain\Lead\Specifications\CanChangeLeadStatusSpecification;

class LeadService
{

    public function __construct(
        private readonly LeadRepositoryInterface $repository
    ) {}

    public function changeStatus(Lead $lead, RoleEnum $actorRole, LeadStatusEnum $newStatus): void
    {
        $canChangeStatus = (new CanChangeLeadStatusSpecification(
            $actorRole,
            $lead->getStatusEnum(),
            $newStatus
        ))->isSatisfiedBy();

        if (!$canChangeStatus) {
            throw new \DomainException("Вы не можете перевести заявку в статус: {$newStatus->value}");
        }

        $lead->setStatus($newStatus);
        $this->repository->save($lead);
    }
}
