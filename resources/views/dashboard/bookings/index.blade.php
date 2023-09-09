@extends('layout.dashboard')

@section('content')
    <x-page.heading page_heading="Bookings">

        <a
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
            href="{{ route('bookings.export') }}"
        ><i class="fas fa-download fa-sm text-white-50"></i> Generate Booking Report</a>

    </x-page.heading>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <x-datatables
                        :bookings="$bookingsProcess"
                        id="tableBookingsProcess"
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a
                    aria-controls="collapseCardHistory"
                    aria-expanded="true"
                    class="d-block card-header py-3"
                    data-toggle="collapse"
                    href="#collapseCardHistory"
                    role="button"
                >
                    <h6 class="m-0 font-weight-bold text-primary">
                        History
                    </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div
                    class="collapse show"
                    id="collapseCardHistory"
                >
                    <div class="card-body">
                        <x-datatables
                            :bookings="$bookingsDone"
                            id="tableBookingsDone"
                        />
                    </div>
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
