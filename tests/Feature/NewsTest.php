<?php

test('news are not shown on news page', function () {
    $response = $this->get('/ogloszenia');
    $response->assertStatus(200);

    $response->assertSee(__('Aktualnie nie odnaleziono żadnych ogłoszeń.'));
});

test('news are shown on news page', function () {
    $response = $this->get('/ogloszenia');
    $response->assertStatus(200);

    $response->assertDontSee(__('Aktualnie nie odnaleziono żadnych ogłoszeń.'));
});
