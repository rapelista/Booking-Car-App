@extends('layout.dashboard')

@section('content')
    <x-page.heading page_heading="Service Schedule">

    </x-page.heading>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form
                        action="{{ route('services.store') }}"
                        class="row g-3"
                        method="POST"
                    >
                        <div class="col-12">
                            @csrf
                            <label
                                class="form-label"
                                for="inputCar"
                            >Car</label>
                            <select
                                aria-describedby="carFeedback"
                                aria-label="Car"
                                class="form-select @if ($errors->has('car')) is-invalid @endif"
                                id="inputCar"
                                name="car"
                            >
                                <option selected>Select car...</option>
                                @foreach ($cars as $car)
                                    <option
                                        @if (old('car') == $car->id) selected @endif
                                        value="{{ $car->id }}"
                                    >{{ $car->name }}</option>
                                @endforeach
                            </select>
                            @error('car')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12 ">
                            <label
                                class="form-label"
                                for="inputServiceDate"
                            >Service date</label>
                            <input
                                class="form-control"
                                id="inputServiceDate"
                                min="{{ $timeNow }}"
                                name="service_date"
                                type="date"
                                value="{{ $timeNow }}"
                            />
                        </div>

                        <div class="col-12 ">
                            <button
                                class="btn btn-primary"
                                type="submit"
                            >Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            cellspacing="0"
                            class="table table-bordered"
                            id="serviceTables"
                            width="100%"
                        >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Driver</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Driver</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($schedule->service_date)->toDateString() }}</td>
                                        <td>{{ $schedule->car->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <script>
                        // Call the dataTables jQuery plugin
                        $(document).ready(function() {
                            $('#serviceTables').DataTable();
                        });
                    </script>

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
