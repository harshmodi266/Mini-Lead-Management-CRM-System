@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-body">

        <h2 class="mb-4">
            Lead Details
        </h2>

        <table class="table table-bordered">

            <tr>
                <th>Name</th>
                <td>{{ $lead->full_name }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $lead->email }}</td>
            </tr>

            <tr>
                <th>Mobile</th>
                <td>{{ $lead->mobile_number }}</td>
            </tr>

            <tr>
                <th>Source</th>
                <td>{{ $lead->lead_source }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ $lead->lead_status }}</td>
            </tr>

            <tr>
                <th>Notes</th>
                <td>{{ $lead->notes }}</td>
            </tr>

        </table>

    </div>

</div>

@endsection