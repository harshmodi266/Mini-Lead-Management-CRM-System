@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Lead Management</h2>
    <div class="mb-3">

    <input
        type="text"
        id="search"
        class="form-control"
        placeholder="Search Lead..."
    >

</div>

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

            <tbody id="leadTable">

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
@push('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>

$(document).ready(function(){

    $('#search').keyup(function(){

        let search = $(this).val();

        $.ajax({

            url:'/search-leads',

            type:'GET',

            data:{
                search:search
            },

            success:function(response){

                $('#leadTable').html(response);

            }

        });

    });

});

</script>

@endpush

@endsection