@if ($type=="select")
 <div class="col-md-3 col-12">
 <label for="{{ $label }}-column">{{ $label }}</label>
   <select
   name="{{ $name }}"
   id="id_{{ $name }}"
   class="form-control {{ $class }}"
   @if (!empty($style)) style="{{ $value }}" @endif
   >
   <option> None Selected </option>
        @foreach ($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach


   </select>
</div>
@else

 <div class="col-md-3 col-12">
    <div class="form-group">
        <label for="{{ $label }}-column">{{ $label }}</label>
        <input
        type="{{ $type }}"
        id="id_{{ $name }}"
        class="form-control {{ $class }}"
        name="{{ $name }}"
        @if (!empty($value)) value="{{ $value }}" @endif
        @if (!empty($style)) style="{{ $value }}" @endif
        {{ $readonly }}
         >

    </div>
</div>
@endif

