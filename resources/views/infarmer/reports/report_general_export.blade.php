<table>
    <thead>
        <tr>
            <th>General Cost ID </th>
            <th>Amount </th>
            <th>Reason </th>
            <th>Date </th>
            <th>Created At </th>
            <th>Created By </th>
            <th>Updated At </th>
            <th>Updated By </th>
        </tr>
    </thead>
    <tbody>
             @foreach($general_costs as $item)
             <tr>
                <td> GC{{ $item->id }}  </td>
                <td> {{ $item->amount }}  </td>
                <td>{{ $item->reason }}</td>
                <td >{{ $item->date }}</td>
                <td>{{ \Carbon\Carbon::parse($item->created_at )->format('d F Y')}}</td>
                  <td>{{ $item->created_by }}</td>
                  @if($item->updated_by)
                  <td>{{ $item->updated_by }}</td>
                  @else
                  <td><p>No Information</p></td>
                  @endif
                  @if($item->updated_at)
                  <td>{{ \Carbon\Carbon::parse($item->updated_at )->format('d F Y')}}</td>  
                  @else
                  <td><p>No Information</p></td>
                  @endif        
             </tr>
              @endforeach
            </tbody>
</table>
