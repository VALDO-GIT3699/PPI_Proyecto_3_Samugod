<?php
namespace Tests\Feature;
use App\Models\Citas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CitasControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_crear_cita()
    {
        $this->withoutExceptionHandling();  // Deshabilita la gestión de excepciones para obtener más detalles en caso de fallos

        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Crear una cita (se guarda en la base de datos)
         $cita = Citas::factory()->make();  // Usamos 'create()' en lugar de 'make()' para guardar la cita en la DB

        // Realizar la solicitud POST autenticada para crear una cita
        $response = $this->actingAs($user)->post(route('citas.store'), $cita->toArray());

        // Validar que después de la solicitud se redirige al índice de citas
        $response->assertRedirect(route('citas.index'));

        // Validar que la cita fue almacenada en la base de datos
        $this->assertDatabaseHas('citas', [
            'email' => $cita->email,  // Verifica que el email de la cita esté en la DB
            'nombre' => $cita->nombre,  // Verifica otro campo relevante
        ]);
    }

}