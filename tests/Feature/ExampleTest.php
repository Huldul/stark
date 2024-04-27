<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User; // Убедись, что используешь правильный namespace для модели User

class ExampleTest extends TestCase
{
    /** @test */
    public function test_the_application_returns_a_successful_response()
    {
        // Если для доступа к странице требуется аутентификация:
        $user = User::factory()->create(); // Создаём тестового пользователя
        $response = $this->actingAs($user)->get('/'); // Используем этого пользователя для выполнения запроса

        // Если для доступа к странице аутентификация не требуется:
        // $response = $this->get('/');

        $response->assertStatus(200); // Проверяем, что статус ответа 200
    }
}
