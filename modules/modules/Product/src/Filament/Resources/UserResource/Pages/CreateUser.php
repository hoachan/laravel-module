<?php

namespace Modules\Product\Filament\Resources\UserResource\Pages;

use Modules\Product\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
