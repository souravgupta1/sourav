 <div class="col-md-3 col-12">
    <div class="form-group">
        <label for="{{ $label }}-column">{{ $label }}</label>
        <input
        type="{{ $type }}"
        id="{{ $name }}"
        class="form-control"
        name="{{ $name }}"
        @if (!empty($value)) value="{{ $value }}" @endif >
      
    </div>
</div>
