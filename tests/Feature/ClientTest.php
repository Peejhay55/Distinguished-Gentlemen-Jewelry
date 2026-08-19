<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, mixed>
     */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'Ana',
            'last_name' => 'Torres',
            'email' => 'ana@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'phone' => '3001234567',
            'address' => 'Calle 10 #5-20',
            'role' => 'customer',
            'registration_date' => '2026-08-01',
            'active' => '1',
        ], $overrides);
    }

    private function makeClient(): Client
    {
        return Client::create(
            collect($this->payload())->except('password_confirmation')->all()
        );
    }

    public function test_la_vista_inicial_enlaza_a_crear_y_listar(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee(route('clients.create'))
            ->assertSee(route('clients.index'));
    }

    public function test_muestra_el_formulario_de_creacion(): void
    {
        $this->get(route('clients.create'))
            ->assertOk()
            ->assertSee('Fecha de registro');
    }

    public function test_crea_un_cliente_con_mensaje_de_exito(): void
    {
        $this->post(route('clients.store'), $this->payload())
            ->assertSessionHas('status', 'Elemento creado satisfactoriamente');

        $this->assertDatabaseHas('clients', [
            'email' => 'ana@example.com',
            'active' => true,
        ]);
        $this->assertNotSame('secret123', Client::first()->password);
    }

    public function test_rechaza_datos_invalidos(): void
    {
        $this->post(route('clients.store'), $this->payload([
            'email' => 'no-es-correo',
            'role' => 'hacker',
            'password_confirmation' => 'otra',
        ]))->assertSessionHasErrors(['email', 'role', 'password']);

        $this->assertDatabaseCount('clients', 0);
    }

    public function test_lista_los_clientes_con_id_y_nombre(): void
    {
        $client = $this->makeClient();

        $this->get(route('clients.index'))
            ->assertOk()
            ->assertSee($client->fullName())
            ->assertSee(route('clients.show', $client));
    }

    public function test_muestra_el_detalle_completo(): void
    {
        $client = $this->makeClient();

        $this->get(route('clients.show', $client))
            ->assertOk()
            ->assertSee('Calle 10 #5-20', escape: false)
            ->assertSee('customer');
    }

    public function test_borra_un_cliente_y_redirige_al_listado(): void
    {
        $client = $this->makeClient();

        $this->delete(route('clients.destroy', $client))
            ->assertRedirect(route('clients.index'));

        $this->assertDatabaseMissing('clients', ['id' => $client->id]);
    }
}
