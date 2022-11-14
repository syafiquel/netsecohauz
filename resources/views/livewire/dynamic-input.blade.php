<div>
    <label>{{ $label }}</label>
    <button type="button" wire:click="addInput" class="btn btn-primary btn-sm float-right mb-3" >Add {{ $model_str }}</button>
    @foreach($inputs as $key => $value)
    <div id="{{ $model_str . $key }}" class="form-group">
        <select wire:model="selected.*" class="form-control selectric">
        <option value="">Select a {{ $label }}</option>
        @foreach($value as $k => $v)
            @php $model_id = 'selected.' . $key . '.' . $k . '.' . $v['id'] @endphp
            <option value="{{ $model_id }}">{{ ucfirst( $v['name'] ) }}</option>
         @endforeach
        </select>
    </div>
    @endforeach
</div>
