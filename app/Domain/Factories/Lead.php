<?php

declare(strict_types=1);

namespace App\Domain\Factories;

use App\Domain\Aggregate\Lead;
use App\Domain\Shared\Enums\RoleEnum;
use App\Domain\Lead\Enums\LeadSource;
use App\Domain\Lead\Enums\LeadStatusEnum;
use App\Domain\Lead\ValueObjects\Lead\Phone;

class LeadFactory
{
    public static function createForOperator(
        ?int $employeeId,
        string $name,
        Phone $phone,
        ?string $comment,
    ): Lead {
        if (!$creatorRole->equals(RoleEnum::OPERATOR)) {
            throw new \DomainException('Только оператор может создать лид');
        }

        return new Lead(
            title: $title,
            source: LeadSource::OPERATOR,
            status: LeadStatusEnum::NEW
        );
    }

    public static function createFromApi(
        string $title,
        string $apiKey
    ): Lead {
        if (!self::isValidApiKey($apiKey)) {
            throw new \DomainException('Invalid API credentials');
        }

        return new Lead(
            title: $title,
            source: LeadSource::API,
            status: LeadStatusEnum::NEW
        );
    }
}
