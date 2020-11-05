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
        $total = $this->invites->count();
        $accepted = $this->invites->where('accepted', 1)->count();
        $acceptedPercentage = ($accepted * 100) / $total;
        $sheet = new Worksheet();
        $sheet->setCellValueByColumnAndRow(1, 1, $total);
        $sheet->setCellValueByColumnAndRow(2, 1, $accepted);
        $sheet->setCellValueByColumnAndRow(3, 1, "{$acceptedPercentage}%");

        $row = 2;
        $this->invites
            ->sortByDesc('accepted')
            ->each(function ($invite) use (&$sheet, &$row) {
                $sheet->setCellValueByColumnAndRow(1, $row, $invite['name']);
                $sheet->setCellValueByColumnAndRow(2, $row, $invite['email']);
                $sheet->setCellValueByColumnAndRow(3, $row, $invite['link']);
                $sheet->setCellValueByColumnAndRow(4, $row, $invite['user_id']);
                $sheet->setCellValueByColumnAndRow(5, $row, $invite['accepted']);
                ++$row;
            });

        return $sheet;
    }
}
