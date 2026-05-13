@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-body">

        <h2 class="mb-4">
            Add Lead
        </h2>

        <form method="POST" action="{{ route('leads.store') }}">

            @csrf

            <div class="mb-3">

                <label>Full Name</label>

                <input
                    type="text"
                    name="full_name"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Mobile Number</label>

                <input
                    type="text"
                    name="mobile_number"
                    class="form-control"
                >

            </div>

            <div class="mb-3">

                <label>Lead Source</label>

                <select
                    name="lead_source"
                    class="form-control"
                >

                    <option value="">
                        Select Source
                    </option>

                    <option value="Facebook">
                        Facebook
                    </option>

                    <option value="Google">
                        Google
                    </option>

                    <option value="Website">
                        Website
                    </option>

                    <option value="Manual">
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

            <div class="mb-3">

                <label>Notes</label>

                <textarea
                    name="notes"
                    class="form-control"
                ></textarea>

            </div>

            <button class="btn btn-success">
                Save Lead
            </button>

        </form>

    </div>

</div>

@endsection