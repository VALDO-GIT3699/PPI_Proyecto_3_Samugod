<?php

namespace Tests\Feature;

use App\Models\Citas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitasControllerTest extends TestCase
{
    use RefreshDatabase; // Para asegurar una base de datos limpia en cada prueba

    /**
     * Test para consultar una ruta y verificar un texto.
     */
    public function test_usuario_puede_consultar_ruta_y_verificar_texto()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Realizar la solicitud GET autenticada
        $response = $this->actingAs($user)->get(route('citas.index'));

        // Validar el código de respuesta 200 y un texto específico
        $response->assertStatus(200)
                 ->assertSee('Mis Citas'); // Cambia el texto según tu implementación
    }

    /**
     * Test para crear un registro mediante una petición POST.
     */
    public function test_usuario_puede_crear_registro_con_post()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Crear datos de prueba
        $cita = Citas::factory()->make()->toArray();

        // Realizar la solicitud POST autenticada
        $response = $this->actingAs($user)->post(route('citas.store'), $cita);

        // Validar redirección y que la cita se creó en la base de datos
        $response->assertRedirect(route('citas.index'));
        $this->assertDatabaseHas('citas', [
            'email' => $cita['email'],
            'nombre' => $cita['nombre'],
        ]);
    }

    /**
     * Test para enviar datos incorrectos y validar errores.
     */
    public function test_usuario_envia_datos_incorrectos_y_recibe_error()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Enviar datos incompletos o incorrectos
        $response = $this->actingAs($user)->post(route('citas.store'), [
            'email' => '', // Campo obligatorio vacío
            'nombre' => 'Nombre de prueba', // Otros campos omitidos
        ]);

        // Validar que hay errores de validación
        $response->assertSessionHasErrors(['email']); // Verifica que el campo específico tiene errores
    }

    /**
     * Test para eliminar un registro con DELETE.
     */
    public function test_usuario_puede_eliminar_registro_con_delete()
    {
        // Crear un usuario autenticado
        $user = User::factory()->create();

        // Crear una cita en la base de datos
        $cita = Citas::factory()->create();

        // Realizar la solicitud DELETE autenticada
        $response = $this->actingAs($user)->delete(route('citas.destroy', $cita->id));

        // Validar redirección y que el registro fue eliminado
        $response->assertRedirect(route('citas.index'));
        $this->assertDatabaseMissing('citas', [
            'id' => $cita->id,
        ]);
    }
}
