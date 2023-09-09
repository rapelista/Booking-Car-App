@extends('layout.dashboard')

@section('content')
    <x-page.heading page_heading="Book a Car" />

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form
                        action="{{ route('bookings.store') }}"
                        class="row g-3"
                        method="POST"
                    >
                        @csrf
                        <div class="col-md-4">
                            <label
                                class="form-label"
                                for="inputDriver"
                            >Driver</label>
                            <select
                                aria-describedby="driverFeedback"
                                aria-label="Driver"
                                class="form-select @if ($errors->has('driver')) is-invalid @endif"
                                id="inputDriver"
                                name="driver"
                            >
                                <option selected>Select driver...</option>
                                @foreach ($drivers as $driver)
                                    <option
                                        @if (old('driver') == $driver->id) selected @endif
                                        value="{{ $driver->id }}"
                                    >{{ $driver->name }}</option>
                                @endforeach
                            </select>
                            @error('driver')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label
                                class="form-label"
                                for="inputCar"
                            >Car</label>
                            <select
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
                        <div class="col-md-4">
                            <label
                                class="form-label"
                                for="inputOperationDate"
                            >Operation date</label>
                            <input
                                class="form-control"
                                id="inputOperationDate"
                                min="{{ $timeNow }}"
                                name="operation_date"
                                type="date"
                                value="{{ $timeNow }}"
                            />

                        </div>
                        <div class="col-md-4">
                            <label for="inputApprovers">Approvers</label>
                            @foreach ($approvers as $_approvers)
                                @php
                                    $old_approver = null;
                                    if (old('approver')) {
                                        $old_approver = old('approver')[$loop->index];
                                    }
                                @endphp
                                <select
                                    class="form-select mb-3 @if (Str::contains($old_approver, 'Select')) is-invalid @endif"
                                    name="approver[{{ $loop->index }}]"
                                >
                                    <option selected>Select approver {{ $loop->iteration }}</option>
                                    @foreach ($_approvers as $approver)
                                        <option
                                            @if ($old_approver == $approver->id) selected @endif
                                            value="{{ $approver->id }}"
                                        >{{ $approver->name }}</option>
                                    @endforeach
                                </select>
                            @endforeach
                            @error('approver')
                                <input
                                    class="form-control is-invalid"
                                    type="hidden"
                                >
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="inputNotes">Notes</label>

                            <textarea
                                class="form-control"
                                id="inputNotes"
                                name="notes"
                                placeholder="Leave a notes here"
                                style="height: 145px"
                            ></textarea>
                        </div>
                        <div class="col-12">
                            <button
                                class="btn btn-primary"
                                type="submit"
                            >Finish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
