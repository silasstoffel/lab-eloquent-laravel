<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref">

            <div class="content">

                <div>
                    <h1>1. Produtos ({{$products->count()}})</h1>
                    <hr>


                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Estoque</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->total_in_stock }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


                <div>
                    <h1>2. Situação do Pedido ({{$status->count()}})</h1>
                    <hr>


                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrição</th>
                                <th>URL Nome</th>
                                <th>Url ID</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($status as $item)
                            <tr>
                                <td scope="row">{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name_url }}</td>
                                <td>{{ $item->url_suffix }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>



                <div>
                    <h1>3. Pedidos ({{$orders->count()}})</h1>
                    <hr>

                    @foreach ($orders as $order)

                    <p><strong>Detalhes do Pedido: {{ $order->id }}</strong></p>

                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <td align="right" style="font-weight: bold">Numero:</td>
                                <td>{{ $order->id }}</td>
                                <td align="right" style="font-weight: bold">Status:</td>
                                <td>{{ $order->orderStatus->name }}</td>
                                <td align="right" style="font-weight: bold">Criado em:</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>

                            <tr>
                                <td align="right" style="font-weight: bold">Enviado em:</td>
                                <td colspan="2">{{ $order->dispatched_on }}</td>
                                <td align="right" style="font-weight: bold">Entregue em:</td>
                                <td colspan="2">{{ $order->deliver_in }}</td>
                            </tr>
                        </tbody>
                    </table>


                    <table border="1" width="100%" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>R$ valor</th>
                                <th>Qtd</th>
                                <th>R$ Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td scope="row">{{ $item->product->name }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" align="right" style="font-weight: bold">R$ {{ $order->total }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    <p></p>

                    @endforeach

                </div>

            </div>


        </div>
    </body>
</html>
