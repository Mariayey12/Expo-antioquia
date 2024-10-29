<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Service;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $comments = [
            [
                'user_id' => 1,
                'service_id' => 1,
                'contenido' => 'Este es un comentario de ejemplo.',
                'calificacion' => rand(1, 5),
            ],
            [
                'user_id' => 2,
                'service_id' => 2,
                'contenido' => 'Este es otro comentario de ejemplo.',
                'calificacion' => rand(1, 5),
            ],
            [
                'user_id' => 3,
                'service_id' => 3,
                'contenido' => 'Este es un tercer comentario de ejemplo.',
                'calificacion' => rand(1, 5),
            ],
            [
                'user_id' => 4,
                'service_id' => 4,
                'contenido' => 'Este es un cuarto comentario de ejemplo.',
                'calificacion' => rand(3, 4),
            ]
        ];

        // Crear comentarios desde el arreglo predefinido
        foreach ($comments as $comment) {
            Comment::create($comment);
        }

        // Crear comentarios adicionales de prueba solo si existen usuarios y servicios
        $users = User::all();
        $services = Service::all();

        if ($users->count() > 0 && $services->count() > 0) {
            foreach ($users as $user) {
                Comment::create([
                    'user_id' => $user->id,
                    'service_id' => $services->random()->id,
                    'contenido' => 'Comentario adicional generado aleatoriamente.',
                    'calificacion' => rand(1, 5),
                ]);
            }
        }
    }
}
