@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Lead Management</h2>

    <a href="{{ route('leads.create') }}" class="btn btn-primary">
        Add Lead
    </a>

</div>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Mobile</th>

                    <th>Source</th>

                    <th>Status</th>

                    <th width="220">Action</th>

                </tr>

            </thead>

            <tbody>

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

                        <form
                            action="{{ route('leads.destroy',$lead->id) }}"
                            method="POST"
                            class="d-inline"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')"
                            >
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection