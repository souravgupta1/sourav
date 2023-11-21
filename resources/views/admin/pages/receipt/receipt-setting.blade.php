@php
    $title ="Company | Receipt";
    $mainHeading = "Receipt Setting";
    $companyProfile = "active";

@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Setting
                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('receipt-setting-form') }}" method="POST">
                                        @csrf
                                            <div class="row">
                                                <x-input type="text" name="prefix" label="Prefix for Receipt" value="{{ ($setting!=null)?$setting->prefix:''}}" />
                                                <x-input type="text" name="suffix" label="Suffix for Receipt" value="{{ ($setting!=null)?$setting->suffix:''}}" />
                                                <x-input type="number" name="number" label="Number for Receipt" value="{{ ($setting!=null)?$setting->receipt_number:''}}" required />
                                                <x-input type="text" name="number_format" label="Number format" value="{{ ($setting!=null)?$setting->number_format:''}} digit" required />
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                    <label for="">Receipt Footer <span class="text-danger">*</span></label>
                                                        <textarea name="footer" class="form-control" cols="30" rows="5">{{ ($setting!=null)?$setting->footer:''}}</textarea>
                                                    </div>
                                                </div>
                                                <x-input type="select"  name="receipt_format" required label="Receipt Format" value="Format-{{ ($setting!=null)?$setting->receipt_format:'' }}" option="Format-1|Format-2|Format-3" />

                                                <div class="col-md-3 col-12">
                                                   @if ((($setting!=null)?$setting->receipt_format:null)!=null) <a target="_blank" href="{{ route('pdf-preview', ['format' => ($setting!=null)?$setting->receipt_format:'']) }}" class="btn btn-warning mt-4 pdf" data-format="Format-1">Format-{{ $setting->receipt_format }}</a> @endif
                                                    <a target="_blank" href="{{ route('pdf-preview', ['format' => 1]) }}" class="btn btn-warning mt-4 pdf-button" data-format="Format-1">Format-1</a>
                                                    <a target="_blank" href="{{ route('pdf-preview', ['format' => 2]) }}" class="btn btn-warning mt-4 pdf-button" data-format="Format-2">Format-2</a>
                                                    <a target="_blank" href="{{ route('pdf-preview', ['format' => 3]) }}" class="btn btn-warning mt-4 pdf-button" data-format="Format-3">Format-3</a>
                                                </div>

                                                    <div class="col-12 d-flex justify-content-start my-5">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Save </button>


                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
    <script>
     $('.pdf-button').hide();
$('#id_receipt_format').change(function(){
    var format = $(this).val();

    // Hide all PDF buttons
    $('.pdf-button').hide();
    $('.pdf').hide();

    // Show the PDF button for the selected format
    $('.pdf-button[data-format="' + format + '"]').show();
});

</script>
@endsection
