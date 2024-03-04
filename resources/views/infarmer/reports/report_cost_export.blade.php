<table>
    <thead>
        <tr>
            <th>Cost ID </th>
            <th>Goat Name </th>
            <th>Tag No </th>
            <th>Amount </th>
            <th>Date</th>
            <th>Created At </th>
            <th>Created By </th>
            <th>Updated At </th>
            <th>Updated By </th>
        </tr>
    </thead>
    <tbody>
             @foreach($costs as $item)
             <tr>
                    <td> {{ $item->id }}  </td>
                    <td> {{ $item->goat->name }}  </td>
                    <td>{{ $item->goat->id }}</td>
                    <td>{{ $item->amount }}</td>
                    <td width="20%">{{ $item->date }}</td>
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
