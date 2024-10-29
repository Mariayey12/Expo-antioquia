<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'user_id' => 1,
                'service_id' => 1,
                'fecha_reserva' => '2024-10-28',
                'hora_reserva' => '10:00:00',
                'cantidad_personas' => 4,
                'estado' => 'confirmada',
                'notas' => 'Reserva de ejemplo para 4 personas.',
            ],
            [
                'user_id' => 2,
                'service_id' => 2,
                'fecha_reserva' => '2024-11-01',
                'hora_reserva' => '14:00:00',
                'cantidad_personas' => 2,
                'estado' => 'pendiente',
                'notas' => 'Reserva pendiente para 2 personas.',
            ],
            [
                'user_id' => 3,
                'service_id' => 3,
                'fecha_reserva' => '2024-11-05',
                'hora_reserva' => '18:30:00',
                'cantidad_personas' => 1,
                'estado' => 'cancelada',
                'notas' => 'Reserva cancelada.',
            ]
        ];

        foreach ($reservations as $reservation) {
            Reservation::create($reservation);
        }
    }
}
