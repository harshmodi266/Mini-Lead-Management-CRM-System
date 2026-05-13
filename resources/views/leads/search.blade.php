@foreach($leads as $lead)

<tr>

    <td>{{ $lead->id }}</td>

    <td>{{ $lead->full_name }}</td>

    <td>{{ $lead->email }}</td>

    <td>{{ $lead->mobile_number }}</td>

    <td>{{ $lead->lead_source }}</td>

    <td>{{ $lead->lead_status }}</td>

    <td>

        <a
            href="{{ route('leads.show',$lead->id) }}"
            class="btn btn-info btn-sm"
        >
            View
        </a>

        <a
            href="{{ route('leads.edit',$lead->id) }}"
            class="btn btn-warning btn-sm"
        >
            Edit
        </a>

    </td>

</tr>

@endforeach