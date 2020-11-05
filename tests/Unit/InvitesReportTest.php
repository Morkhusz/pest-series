<?php

use Illuminate\Database\Eloquent\Collection;
use App\Services\InvitesReport;

$invites = new Collection();
$inviteService = new InvitesReport($invites);

test('first column should display the number 10 as total invites')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(1, 1)
        ->getValue())
    ->toBe(10);
