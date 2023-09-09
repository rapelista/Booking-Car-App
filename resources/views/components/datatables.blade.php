<div class="table-responsive">
    <table
        cellspacing="0"
        class="table table-bordered"
        id="{{ $id }}"
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
                        @foreach ($booking->approvers as $approver)
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
                                    @if ($booking->approvals->where('user_id', $approver->id)->first()->is_approved)
                                        <span class="badge bg-success">APPROVED</span>
                                    @else
                                        <span class="badge bg-warning">PROCESS</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td style="text-align: center">
                        @if (Gate::allows('mark-done-booking'))
                            <a
                                class="btn btn-sm rounded bg-primary text-white @if (!$booking->is_approved_by_all() or $booking->is_done) disabled @endif"
                                href="{{ route('bookings.done', ['booking' => $booking->id]) }} "
                            >
                                Mark as Done
                            </a>
                        @endif
                        @if (route('dashboard.index') == url()->current())
                            <a
                                class="btn btn-sm rounded bg-primary text-white"
                                href="{{ route('bookings.approve', ['booking' => $booking->id]) }}"
                            >
                                Approve
                            </a>
                        @endif
                        <button class="btn btn-sm rounded bg-secondary text-white ">View Notes</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#{{ $id }}').DataTable();
    });
</script>
