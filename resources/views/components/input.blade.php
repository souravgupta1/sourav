
@if ($type=="select")

 <div class="col-md-3 col-12">
 <label for="id_{{ $name }}">{{ $label }}
    @if (!empty($required)) <span class='text-danger'>*</span> @endif
</label>
   <select
   name="{{ $name }}"
   id="id_{{ $name }}"
   @if (!empty($required)) {{ "required" }} @endif

   class="form-control {{ $class }}"
   @if (!empty($style)) style="{{ $value }}" @endif
   >
   <option value={{ !empty($value)?$value:"" }}> {{ !empty($value)?$value:"None Selected" }} </option>
        @foreach ($options as $option)
                @php
                  $array =  explode(':',$option);
                  $array[1] = !empty($array[1])?$array[1]:$array[0];
                @endphp
                @if ($array[0]==$value)
                    @continue
                @endif
            <option value="{{ $array[0] }}">{{ $array[1] }}</option>
        @endforeach
   </select>
</div>
@else
 <div class="col-md-3 col-12">
    <div class="form-group">
        <label for="id_{{ $name }}">{{ $label }}
            @if (!empty($required)) <span class='text-danger'>*</span> @endif

        </label>
        <input
        type="{{ $type }}"
        id="id_{{ $name }}"
        class="form-control {{ $class }}"
        name="{{ $name }}"
        @if (!empty($value)) value="{{ $value }}" @endif
        @if (!empty($style)) style="{{ $value }}" @endif
        @if (!empty($required)) {{ "required" }} @endif
        {{ $readonly }}
        @if ($type=='file')accept="image/*,application/pdf"@endif
         >

    </div>
</div>
@endif

