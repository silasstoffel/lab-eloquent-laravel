<?php

use App\Model\OrderStatus;
use Illuminate\Database\Seeder;

class CreateOrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan make:seeder CreateOrderStatus
        OrderStatus::create([
            'name'   => 'Aguardando Pagamento',
            'active' => true,
        ]);

        OrderStatus::create([
            'name'   => 'Pagamento Aprovado',
            'active' => true,
        ]);

        OrderStatus::create([
            'name'   => 'Pagamento Reprovado',
            'active' => true,
        ]);

        // Outra forma
        $order         = new OrderStatus();
        $order->name   = 'Cancelado';
        $order->active = true;
        $order->save();

        // Outra forma
        $order = new OrderStatus();
        $order->fill([
            'name'   => 'Em Preparação',
            'active' => true,
        ]);
        $order->save();

        $order = new OrderStatus();
        $order->fill([
            'name'   => 'Despachado',
            'active' => true,
        ]);
        $order->save();

        $order = new OrderStatus();
        $order->fill([
            'name'   => 'Entregue',
            'active' => true,
        ]);
        $order->save();

        $order = new OrderStatus();
        $order->fill([
            'name'   => 'Devolvido',
            'active' => true,
        ]);
        $order->save();

        $order = new OrderStatus();
        $order->fill([
            'name'   => 'Destinário Ausente',
            'active' => true,
        ]);
        $order->save();

    }
}
