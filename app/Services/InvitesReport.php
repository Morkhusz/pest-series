<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvitesReport
{
    private $invites;

    public function __construct(Collection $invites)
    {
        $this->invites = $invites;
    }

    public function generate(): Worksheet
    {
        $sheet = new Worksheet();
        $sheet->setCellValueByColumnAndRow(1, 1, 10);

        return $sheet;
    }
}
