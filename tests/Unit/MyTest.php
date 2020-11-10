<?php

use App\Models\Invites;
use App\Services\InvitesReport;

beforeEach(function() {
    $invites = Invites::factory(7)->make();
    $invites = $invites->mergeRecursive(Invites::factory(3)->accepted()->make());
    $invitesReport = new InvitesReport($invites);
    $this->report = $invitesReport->generate();
});

test('first column should display the number 10 as total invites', function () {
    expect($this->report->getCellByColumnAndRow(1, 1)
        ->getValue())
        ->toBe(10);
});

test('second column should display the number 3 as total accepted invites', function() {
    expect($this->report->getCellByColumnAndRow(2, 1)
        ->getValue())
    ->toBe(3);
});

test('third column should display the string 30% as total accepted invites percentage', function() {
    expect($this->report->getCellByColumnAndRow(3, 1)
        ->getValue())
    ->toBe('30%');
});

test('second line should be an accepted invite', function() {
    expect($this->report->getCellByColumnAndRow(5, 2)
        ->getValue())
    ->toBe(1);
});

test('third line should be an accepted invite', function() {
    expect($this->report->getCellByColumnAndRow(5, 3)
        ->getValue())
    ->toBe(1);
});

test('forth line should be an accepted invite', function() {
    expect($this->report->getCellByColumnAndRow(5, 4)
        ->getValue())
    ->toBe(1);
});

test('fifth line should be a not accepted invite', function() {
    expect($this->report->getCellByColumnAndRow(5, 5)
        ->getValue())
    ->toBe(0);
});
