@extends('.layouts.layout')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Orders</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Name
                </th>
                <th>
                    Category
                </th>
                <th>
                    When sended
                </th>
                <th>
                    Amount
                </th>
                <th>
                    Action
                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->allPrice() }} $.</td>
{{--                    <td>{{ $order->sum }} {{ $order->currency->symbol }}</td>--}}
                    <td>
{{--                        <div class="btn-group" role="group">--}}
{{--                            <a class="btn btn-success" type="button"--}}
{{--                               @admin--}}
{{--                               href="{{ route('orders.show', $order) }}"--}}
{{--                               @else--}}
{{--                               href="{{ route('person.orders.show', $order) }}"--}}
{{--                               @endadmin--}}
{{--                            >Открыть</a>--}}
{{--                        </div>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        {{ $orders->links() }}--}}
    </div>
@endsection
