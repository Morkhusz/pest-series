<?php

use Illuminate\Database\Eloquent\Collection;
use App\Services\InvitesReport;

$invites = new Collection();
$invites->add([
    'name' => 'José',
    'email' => 'jose.filho@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 2',
    'email' => 'jose.filho2@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho2@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 3',
    'email' => 'jose.filho3@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho3@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 4',
    'email' => 'jose.filho4@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho4@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 5',
    'email' => 'jose.filho5@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho5@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 6',
    'email' => 'jose.filho6@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho6@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 7',
    'email' => 'jose.filho7@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho7@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 0,
]);
$invites->add([
    'name' => 'José 8',
    'email' => 'jose.filho8@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho8@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 1,
]);
$invites->add([
    'name' => 'José 9',
    'email' => 'jose.filho9@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho9@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 1,
]);
$invites->add([
    'name' => 'José 10',
    'email' => 'jose.filho10@laraveling.tech',
    'link' => 'https://invite.me?e=jose.filho10@laraveling.tech&u=1',
    'user_id' => 1,
    'accepted' => 1,
]);

$inviteService = new InvitesReport($invites);

test('first column should display the number 10 as total invites')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(1, 1)
        ->getValue())
    ->toBe(10);

test('second column should display the number 3 as total accepted invites')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(2, 1)
        ->getValue())
    ->toBe(3);

test('third column should display the string 30% as total accepted invites percentage')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(3, 1)
        ->getValue())
    ->toBe('30%');

test('second line should be an accepted invite')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(5, 2)
        ->getValue())
    ->toBe(1);

test('third line should be an accepted invite')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(5, 3)
        ->getValue())
    ->toBe(1);

test('forth line should be an accepted invite')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(5, 4)
        ->getValue())
    ->toBe(1);

test('fifth line should be a not accepted invite')
    ->expect($inviteService->generate()
        ->getCellByColumnAndRow(5, 5)
        ->getValue())
    ->toBe(0);
