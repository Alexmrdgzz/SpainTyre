<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->map(fn (string $name) => Str::of($name)->substr(0, 1))
            ->implode('');
    }

    public function cliente()
    {
        // Relación 1:1 (un usuario es un cliente)
        return $this->hasOne(Cliente::class);
    }

    public function carrito()
    {
        return $this->hasOneThrough(Carrito::class, Cliente::class, 'id', 'cliente_id', 'id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            // Crear cliente
            $cliente = new Cliente();
            $cliente->id_cliente = $user->id;
            $cliente->direccion = '';
            $cliente->dni = null;
            $cliente->save();

            // Crear carrito relacionado al cliente
            $carrito = new Carrito();
            $carrito->id_carrito = $cliente->id_cliente;
            $carrito->save();
        });
    }
}
