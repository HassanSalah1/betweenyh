<div class="col-md-6">
    <div class="mb-1">
        <label class="form-label" for="status">{{ __('Status') }}</label>
        <select id="status" class="custom-select select2" name="status">
            <option value="Request" {{ isset($order) && $order->status == 'Request'  ? 'selected' : '' }}>Request</option>
            <option value="Processing" {{ isset($order) && $order->status == 'Processing'  ? 'selected' : '' }}>Processing</option>
            <option value="Waiting confirmation from client" {{ isset($order) && $order->status == 'Waiting confirmation from client'  ? 'selected' : '' }}>Waiting confirmation from client</option>
            <option value="Confirmed" {{ isset($order) && $order->status == 'Confirmed'  ? 'selected' : '' }}>Confirmed</option>
            <option value="Shipped" {{ isset($order) && $order->status == 'Shipped'  ? 'selected' : '' }}>Shipped</option>
            <option value="Delivered successfully" {{ isset($order) && $order->status == 'Delivered successfully'  ? 'selected' : '' }}>Delivered successfully</option>
        </select>
        @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-md-4">
  <div class="mb-1">
    <label class="form-label" for="price">{{ __('Price') }}</label>
    <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="{{ __('Price') }}" name="price"
      value="{{ isset($order) ? $order->price : old('price') }}" />
    @error('price')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

