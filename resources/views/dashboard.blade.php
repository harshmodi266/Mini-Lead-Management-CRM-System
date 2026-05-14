@extends('layouts.app')

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card">

            <div class="card-body p-5 text-center">

                <h2>
                    Welcome To Mini CRM Dashboard
                </h2>

                <p class="mt-3">
                    Authentication Module Successfully Working.
                </p>

                <div class="row mt-5">

                    <!-- <div class="col-md-3"> -->
                        <a href="{{ route('leads.index') }}" class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <!-- <h4>20</h4> -->
                                <h4>{{ $totalLeads }}</h4>
                                <p>Total Leads</p>
                            </div>
                        </div>
                        </a>
                    <!-- </div> -->

                    <!-- <div class="col-md-3"> -->
                        <a href="{{ route('leads.index', ['lead_status' => 'converted']) }}" class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <!-- <h4>8</h4> -->
                                <h4>{{ $convertedLeads }}</h4>
                                <p>Converted Leads</p>
                            </div>
                        </div>
                        </a>
                    <!-- </div> -->

                    <!-- <div class="col-md-3"> -->
                    <a href="{{ route('leads.index', ['lead_status' => 'Follow-up']) }}" class="col-md-3">
                    <div class="card bg-warning text-white">
                            <div class="card-body">
                                <!-- <h4>5</h4> -->
                                 <h4>{{ $followUpLeads }}</h4>
                                <p>Follow Up</p>
                            </div>
                        </div>
                        </a>
                    <!-- </div> -->

                    <!-- <div class="col-md-3"> -->
                        <a href="{{ route('leads.index', ['lead_status' => 'lost']) }}" class="col-md-3">
                        <div class="card bg-danger text-white">
                            <div class="card-body">
                                <!-- <h4>2</h4> -->
                                <h4>{{ $lostLeads }}</h4>
                                <p>Lost Leads</p>
                            </div>
                        </div>
                        </a>
                    <!-- </div> -->

                </div>

            </div>

        </div>

    </div>

</div>

@endsection