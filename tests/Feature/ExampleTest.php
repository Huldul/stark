<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ExampleTest extends TestCase
{
    use WithoutMiddleware; // Отключаем middleware, если это необходимо

    /** @test */
    public function test_the_application_returns_a_successful_response()
    {
        // Мы вызываем маршрут и проверяем ответ напрямую без взаимодействия с базой данных
        $response = $this->get('https://site.limestone.kz/'); // Предполагаем, что '/' - это маршрут, который не требует аутентификации и других условий зависящих от БД

        $response->assertStatus(200); // Ожидаемый статус ответа 200 OK
        $response->assertSee('Welcome'); // Проверяем, содержит ли ответ определенный текст (например, "Welcome")
    }
}
