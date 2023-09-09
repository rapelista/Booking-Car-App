@extends('layout.dashboard')

@section('content')
    <x-page.heading page_heading="Bookings" />

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            cellspacing="0"
                            class="table table-bordered"
                            id="dataTable"
                            width="100%"
                        >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Driver</th>
                                    <th>Car</th>
                                    <th style="text-align: center">Approvement Status</th>
                                    <th style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Driver</th>
                                    <th>Car</th>
                                    <th style="text-align: center;">Approvement Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($booking->operation_date)->toDateString() }}</td>
                                        <td>{{ $booking->driver->name }}</td>
                                        <td>{{ $booking->car->name }}</td>
                                        <td style="text-align: center;">
                                            @if ($booking->is_done)
                                                <h4>
                                                    <span class="badge badge-lg bg-primary">
                                                        Done
                                                    </span>
                                                </h4>
                                            @endif
                                            @foreach ($booking->approvers->reverse() as $approver)
                                                <div class="row">
                                                    <div class="col-4 text-start">
                                                        <span class="badge bg-info">
                                                            {{ Str::upper($approver->role->name) }}
                                                        </span>
                                                    </div>
                                                    <div class="col-4">
                                                        {{ $approver->name }}
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        @if ($booking->approvals->get($loop->index)->is_approved)
                                                            <span class="badge bg-success">APPROVED</span>
                                                        @else
                                                            <span class="badge bg-warning">PROCESS</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </td>
                                        <td style="text-align: center">
                                            <a
                                                class="btn btn-sm rounded bg-primary text-white @if (!$booking->is_approved_by_all() or $booking->is_done) disabled @endif"
                                                href="{{ route('bookings.done', ['booking' => $booking->id]) }} "
                                            >
                                                Mark as Done
                                            </a>
                                            <button class="btn btn-sm rounded bg-secondary text-white ">View Notes</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
