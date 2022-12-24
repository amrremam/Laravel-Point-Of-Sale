<div id="print-area">
    <table class="table table-hover table-bordered">

        <thead>
        <tr>
            <th>@lang('Name')</th>
            <th>@lang('Quantity')</th>
            <th>@lang('Price')</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->Name }}</td>
                <td>{{ $product->pivot->Quantity }}</td>
                <td>{{ number_format($product->pivot->Quantity * $product->sale _price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h3>@lang('Total') <span>{{ number_format($order->total_price, 2) }}</span></h3>

</div>

<button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i> @lang('Print')</button>
