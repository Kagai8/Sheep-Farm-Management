<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Customer Name </th>
            <th>Total Amount </th>
            <th>Mode</th>
            <th>Quantity</th>
            <th>Created At </th>
            <th>Created By </th>
            <th>Updated At </th>
        </tr>
    </thead>
    <tbody>
             @foreach($sales as $item)
             <tr>
                <td>SL{{ $item->id }}  </td>
                <td>{{ $item->customer_name }} </td>
                <td>KES{{ $item->total_amount }}</td>
                <td>{{ $item->mode_of_payment }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
                <td>{{ $item->created_by }}</td>
                @if($item->updated_at)
                <td>{{ \Carbon\Carbon::parse($item->updated_at )->format('d F Y')}}</td>  
                @else
                <td><p>No Information</p></td>
                @endif
             </tr>
              @endforeach
    </tbody>
</table>