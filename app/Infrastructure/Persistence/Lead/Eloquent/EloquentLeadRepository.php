<?php


namespace App\Infrastructure\Persistence\Lead\Eloquent;

use App\Domain\Lead\Entities\Lead;
use App\Domain\Lead\Enums\LeadStatusEnum;
use App\Domain\Lead\Repositories\LeadRepositoryInterface;
use App\Infrastructure\Persistence\Lead\Eloquent\LeadModel;

class EloquentLeadRepository implements LeadRepositoryInterface
{
    public function save(Lead $lead): void
    {
        $model = $lead->getId()
            ? LeadModel::findOrFail($lead->getId())
            : new LeadModel();

        $model->name = $lead->getName();
        $model->phone = $lead->getPhone();
        $model->status = $lead->getStatus();
        $model->comment = $lead->getComment();
        $model->save();

        if ($lead->getId() === null) {
            $lead->setId($model->id);
        }
    }

    public function findById(int $id): Lead
    {
        $model = LeadModel::findOrFail($id);

        $lead = new Lead(
            name: $model->name,
            phone: $model->phone,
            status: LeadStatusEnum::from($model->status),
            comment: $model->comment,
        );

        $lead->setId($model->id);

        return $lead;
    }

    public function delete(Lead $lead): void
    {
        LeadModel::findOrFail($lead->getId())->delete();
    }
}
