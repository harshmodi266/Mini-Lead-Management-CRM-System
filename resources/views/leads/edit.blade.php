@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-body">

        <h2 class="mb-4">
            Edit Lead
        </h2>

        <form method="POST" action="{{ route('leads.update',$lead->id) }}">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Full Name</label>

                <input
                    type="text"
                    name="full_name"
                    value="{{ $lead->full_name }}"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    value="{{ $lead->email }}"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Mobile Number</label>

                <input
                    type="text"
                    name="mobile_number"
                    value="{{ $lead->mobile_number }}"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Lead Source</label>

                <select
                    name="lead_source"
                    class="form-control"
                >

                    <option value="Facebook" {{ $lead->lead_source == 'Facebook' ? 'selected' : '' }}>
                        Facebook
                    </option>

                    <option value="Google" {{ $lead->lead_source == 'Google' ? 'selected' : '' }}>
                        Google
                    </option>

                    <option value="Website" {{ $lead->lead_source == 'Website' ? 'selected' : '' }}>
                        Website
                    </option>

                    <option value="Manual" {{ $lead->lead_source == 'Manual' ? 'selected' : '' }}>
                        Manual
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label>Lead Status</label>

                <select
                    name="lead_status"
                    class="form-control"
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

            </div>

            <div class="mb-3">

                <label>Notes</label>

                <textarea
                    name="notes"
                    class="form-control"
                >{{ $lead->notes }}</textarea>

            </div>

            <button class="btn btn-primary">
                Update Lead
            </button>

        </form>

    </div>

</div>

@endsection