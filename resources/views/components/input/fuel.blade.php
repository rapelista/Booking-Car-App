<div class="col-md-6">
    <label
        class="form-label"
        for="inputFuelUsage"
    >Amount</label>
    <input
        class="form-control"
        min="0"
        name="fuel_usage[{{ $index }}][amount]"
        type="number"
        value="0"
    >
</div>
<div class="col-md-6">
    <label
        class="form-label"
        for="inputFuelUsage"
    >Fuel Type</label>
    <select
        aria-describedby="fuelUsageFeedback"
        aria-label="Fuel Usage"
        class="form-select"
        id="inputFuelUsage"
        name="fuel_usage[{{ $index }}][fuel_type]"
    >
        <option selected>Select fuel type...</option>
        @foreach ($fuelTypes as $fuelType)
            <option value="{{ $fuelType->id }}">{{ $fuelType->name }}</option>
        @endforeach
    </select>
</div>
