<table>
    <thead>
    <tr>
        <th colspan="4">الصنف</th>
        <th>البركود</th>
        <th colspan="2">العدد</th>
        <th>سعر الشراء</th>
        <th>سعر البيع</th>
    </tr>
    </thead>
    <tbody>
    @foreach($product as $prod)
        <tr>
            <td colspan="4">{{ $prod->name }}</td>
            <td>{{ $prod->parcod }}</td>
            <td colspan="2">{{ $prod->count }}</td>
            <td>{{ $prod->pruch_prices }}</td>
            <td>{{ $prod->prices }}</td>

        </tr>
    @endforeach
    </tbody>
</table>