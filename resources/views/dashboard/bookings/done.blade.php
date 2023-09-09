@extends('layout.dashboard')

@section('content')
    <x-page.heading page_heading="Mark as Done" />

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form
                        action="{{ route('bookings.done.post', ['booking' => $bookingId]) }}"
                        class="row g-3"
                        method="POST"
                    >
                        @csrf
                        <div
                            class="row pt-3"
                            id="inputWrapper"
                        >
                            @if (old('fuel_usage'))
                                @foreach (old('fuel_usage') as $old_fuel_usage)
                                    @php
                                    @endphp
                                    <div class="col-md-6 mb-3">
                                        <label
                                            class="form-label"
                                            for="inputFuelUsage"
                                        >Amount</label>
                                        <input
                                            class="form-control @if ($errors->has('fuel_usage.' . $loop->index . '.amount')) is-invalid @endif"
                                            min="2"
                                            name="fuel_usage[{{ $loop->index }}][amount]"
                                            step="0.01"
                                            type="number"
                                            value="{{ $old_fuel_usage['amount'] ?? '2' }}"
                                        >
                                        @error('fuel_usage.' . $loop->index . '.amount')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label
                                            class="form-label"
                                            for="inputFuelUsage"
                                        >Fuel Type</label>
                                        <select
                                            aria-describedby="fuelUsageFeedback"
                                            aria-label="Fuel Usage"
                                            class="form-select @if ($errors->has('fuel_usage.' . $loop->index . '.fuel_type')) is-invalid @endif"
                                            id="inputFuelUsage"
                                            name="fuel_usage[{{ $loop->index }}][fuel_type]"
                                        >
                                            <option selected>Select fuel type...</option>
                                            @foreach ($fuelTypes as $fuelType)
                                                <option
                                                    @if ($old_fuel_usage['fuel_type'] == $fuelType->id) selected @endif
                                                    value="{{ $fuelType->id }}"
                                                >{{ $fuelType->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('fuel_usage.' . $loop->index . '.fuel_type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-6 mb-3">
                                    <label
                                        class="form-label"
                                        for="inputFuelUsage"
                                    >Amount</label>
                                    <input
                                        class="form-control"
                                        min="2"
                                        name="fuel_usage[0][amount]"
                                        step="0.01"
                                        type="number"
                                        value="2"
                                    >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label
                                        class="form-label"
                                        for="inputFuelUsage"
                                    >Fuel Type</label>
                                    <select
                                        aria-describedby="fuelUsageFeedback"
                                        aria-label="Fuel Usage"
                                        class="form-select"
                                        id="inputFuelUsage"
                                        name="fuel_usage[0][fuel_type]"
                                    >
                                        <option selected>Select fuel type...</option>
                                        @foreach ($fuelTypes as $fuelType)
                                            <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>
                        <div class="col-12">
                            <button
                                class="btn btn-primary"
                                type="submit"
                            >Finish</button>
                            <button
                                class="btn btn-light btn-icon-split"
                                id="btnAddFuelUsage"
                            >
                                <span class="icon text-gray-600">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Add Fuel Usage</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const btnAddFuelUsage = document.getElementById('btnAddFuelUsage');
        const inputWrapper = document.getElementById('inputWrapper');
        const inputFuelUsage = document.querySelectorAll('#inputFuelUsage');

        let i = inputFuelUsage.length;

        btnAddFuelUsage.addEventListener('click', function(e) {
            e.preventDefault();
            console.log()
            inputWrapper.insertAdjacentHTML('beforeend',
                '<div class="col-md-6 mb-3"><label class="form-label" for="inputFuelUsage">Amount</label><input class="form-control" min="2" step="0.01" name="fuel_usage[' +
                i +
                '][amount]" type="number" value="2"> </div> <div class="col-md-6 mb-3"><label class="form-label" for="inputFuelUsage">Fuel Type</label><select aria-describedby="fuelUsageFeedback" aria-label="Fuel Usage" class="form-select" id="inputFuelUsage" name="fuel_usage[' +
                i +
                '][fuel_type]"><option selected>Select fuel type...</option> @foreach ($fuelTypes as $fuelType) <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option> @endforeach </select> </div>'
            );
            i++;
        })
    </script>
@endsection
