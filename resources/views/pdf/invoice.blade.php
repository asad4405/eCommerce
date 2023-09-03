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
        <th>{{ $invoice->created_at->format('d M Y') }}</th>
    </tr>
    <tr>
        <td colspan="2">
            <strong>Pay To:</strong> <br> The Tech Park <br>
            123 Willow Street <br>
            Boulevard, LA - 567892
        </td>
        <td colspan="2">
            <strong>Customer:</strong> <br>
            John Lark <br>
            Dummy Apartments <br>
            276 Main Street <br>
            Boulevard, LA - 567892
        </td>
    </tr>
    <tr>
        <th>Name/Description</th>
        <th>Qty.</th>
        <th>MRP</th>
        <th>Amount</th>
    </tr>
    <tr>
        <td>Biryani</td>
        <td>3</td>
        <td>400</td>
        <td>1200</td>
    </tr>
    <tr>
        <td>Chocolate Shake</td>
        <td>3</td>
        <td>200</td>
        <td>600</td>
    </tr>
    <tr>
        <th colspan="3">Subtotal:</th>
        <td>1800</td>
    </tr>
    <tr>
        <th colspan="2">Tax</th>
        <td>10%</td>
        <td>180</td>
    </tr>
    <tr>
        <th colspan="3">Grand Total:</th>
        <td>Rs 1620</td>
    </tr>
</table>
