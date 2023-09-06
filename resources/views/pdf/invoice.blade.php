<style>
    table,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    td,
    caption {
        padding: 16px;
    }

    p{
        margin-left: 50%;
    }

    th {
        padding: 16px;
        background-color: lightblue;
        text-align: left;
    }
</style>
<table>
    <caption><b> Invoice </b></caption>
    <tr>
        <th colspan="3">Invoice #{{ $invoice->id }}</th>
        <th colspan="3">{{ $invoice->created_at->format('d F Y') }}</th>
    </tr>
    <tr>
        <td colspan="3">
            <strong>Pay To:</strong> <br> {{ $invoice->relationtoVendor->name }} <br>
            123 Willow Street <br>
            Boulevard, LA - 567892
        </td>
        <td colspan="3">
            <strong>Customer:</strong> <br>
            {{ $invoice->relationtoCustomer->name }} <br>
            {{ $invoice->relationtoAddress->address }} <br>
            Phone Number: {{ $invoice->relationtoAddress->phone_number }} <br>
            Email: {{ $invoice->relationtoCustomer->email }}
        </td>
    </tr>
    <tr>
        <th>Product Name</th>
        <th>Color</th>
        <th>Size</th>
        <th>Qty</th>
        <th>MRP</th>
        <th>Amount</th>
    </tr>
    @foreach ($invoice_details as $invoice_detail)
        <tr>
            <td>{{ $invoice_detail->relationtoProduct->product_name }}</td>
            <td>{{ $invoice_detail->relationtoColor->color_name }}</td>
            <td>{{ $invoice_detail->relationtoSize->size_name }}</td>
            @php
                $inventories = App\Models\Inventory::where([
                    'product_id' => $invoice_detail->product_id,
                    'color_id' => $invoice_detail->color_id,
                    'size_id' => $invoice_detail->size_id,
                ])->first();
            @endphp
            <td>{{ $invoice_detail->user_input }}</td>
            <td>{{ $inventories->product_discount_price }}</td>
            <td>{{ $invoice_detail->user_input * $inventories->product_discount_price }}</td>
        </tr>
    @endforeach
    <tr>
        <th colspan="5">Subtotal:</th>
        <td>{{ $invoice->sub_total }}</td>
    </tr>
    <tr>
        <th colspan="4">Coupon Discount ({{ $invoice->coupon_name ? $invoice->coupon_name : 'N\A' }})</th>
        <td>{{ $invoice->coupon_discount }}%</td>
        <td>{{ $invoice->coupon_discount_amount }}</td>
    </tr>
    <tr>
        <th colspan="5">Delivery Charge</th>
        <td>{{ $invoice->delivery_cost }}</td>
    </tr>
    <tr>
        <th colspan="5"> Total:</th>
        <td>{{ $invoice->delivery_cost + $invoice->total_amount }}</td>
    </tr>
    <tr>
        <th colspan="5"> Payment Option:</th>
        <td>{{ $invoice->delivery_option }}</td>
    </tr>
    <tr>
        <th colspan="5"> Invoice Status:</th>
        <td>{{ $invoice->delivery_status }}</td>
    </tr>
</table>
<p> #invoice download time: {{ \Carbon\Carbon::now()->format('d/m/Y h:i:s A') }} </p>
