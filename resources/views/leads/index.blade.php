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
<div class="mb-3">

    <select id="statusFilter" class="form-control">

        <option value="">
            All Status
        </option>

        <option value="New">
            New
        </option>

        <option value="Follow-up">
            Follow-up
        </option>

        <option value="Converted">
            Converted
        </option>

        <option value="Lost">
            Lost
        </option>
    </select>
</div>

  <a href="{{ route('leads.create') }}" class="btn btn-primary">
        Add Lead
    </a>
    
  <div class="d-flex align-items-center gap-2">

    <a href="{{ route('dashboard') }}" class="btn btn-secondary">
        Back To Dashboard
    </a>

    <!-- <h2 class="mb-0">Lead Management</h2> -->

</div>
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

                <tr id="leadRow{{ $lead->id }}">

                    <td>{{ $lead->id }}</td>

                    <td>{{ $lead->full_name }}</td>

                    <td>{{ $lead->email }}</td>

                    <td>{{ $lead->mobile_number }}</td>

                    <td>{{ $lead->lead_source }}</td>

                    <td>

                        <select
                            class="form-control status-change"
                            data-id="{{ $lead->id }}"
                        >

                            <option value="New" {{ $lead->lead_status == 'New' ? 'selected' : '' }}>
                                New
                            </option>

                            <option value="Follow-up" {{ $lead->lead_status == 'Follow-up' ? 'selected' : '' }}>
                                Follow-up
                            </option>

                            <option value="Converted" {{ $lead->lead_status == 'Converted' ? 'selected' : '' }}>
                                Converted
                            </option>

                            <option value="Lost" {{ $lead->lead_status == 'Lost' ? 'selected' : '' }}>
                                Lost
                            </option>

                        </select>

                    </td>

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
<div class="d-flex justify-content-center mt-4">
    {{ $leads->links() }}
</div>
    </div>

</div>
@push('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
// search 
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

//Filter Leads by Status
$('#statusFilter').change(function(){

    let status = $(this).val();

    $.ajax({

        url:'/filter-leads',

        type:'GET',

        data:{
            status:status
        },

        success:function(response){

            $('#leadTable').html(response);

        }

    });

});

// status update
$(document).on('change', '.status-change', function(){

    let status = $(this).val();

    let id = $(this).data('id');

    $.ajax({

        url:'/lead-status-update/' + id,

        type:'POST',

        data:{
            _token:$('meta[name="csrf-token"]').attr('content'),
            status:status
        },

        success:function(response){

            alert('Status Updated Successfully');

        }

    });

});

// delete
$(document).on('click', '.deleteLead', function(){

    if(confirm('Are you sure you want to delete this lead?')){

        let id = $(this).data('id');

        $.ajax({

            url:'/leads/' + id,

            type:'POST',

            data:{
                _token:$('meta[name="csrf-token"]').attr('content'),
                _method:'DELETE'
            },

            success:function(response){

                $('#leadRow' + id).remove();

                alert('Lead Deleted Successfully');

            }

        });

    }

});

</script>


@endpush

@endsection