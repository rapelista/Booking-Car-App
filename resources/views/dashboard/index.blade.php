@extends('layout.dashboard')

@section('content')
    <x-page.heading page_heading="Dashboard" />

    <div class="row">
        <div class="col-md-8">
            <x-chart.area
                :labels="$bookingsData->keys()"
                :values="$bookingsData->values()"
                id="myAreaChart"
                title="Booking History"
            />
        </div>
        <div class="col-md-4">
            <x-chart.pie
                :labels="$fuelUsagesData->keys()"
                :values="$fuelUsagesData->values()"
                id="myPieChart"
                title="Total Fuel Usages"
            />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Need to Approve</h6>
                </div>
                <div class="card-body">
                    <x-datatables
                        :bookings="$bookings"
                        id="table"
                    />
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
        <x-toast
            color="success"
            message="{{ session()->get('success') }}"
        />
    @endif
@endsection
