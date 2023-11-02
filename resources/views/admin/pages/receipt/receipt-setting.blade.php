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
                                                <x-input type="text" name="prefix" label="Prefix for Receipt" value="{{ $setting->prefix }}" />
                                                <x-input type="text" name="suffix" label="Suffix for Receipt" value="{{ $setting->suffix}}" />
                                                <x-input type="number" name="number" label="Number for Receipt" value="1" />
                                                <x-input type="text" name="number" label="Number format" value="3 digit" />
                                                <x-input type="select" name="format" label="Receipt Format" option="Format-1|Format-2|Format-3" />
                                                <div class="col-md-3 col-12">
                                                    <a href="{{ route('pdf-preivew', ['format' => 1]) }}" class="btn btn-warning mt-4 f1" style="display: none">Format-1</a>
                                                    <a href="{{ route('pdf-preivew', ['format' => 2]) }}" class="btn btn-warning mt-4 f2" style="display: none">Format-2</a>
                                                    <a href="{{ route('pdf-preivew', ['format' => 3]) }}" class="btn btn-warning mt-4 f3" style="display: none">Format-3</a>
                                                </div>


                                                <div class="col-12 d-flex justify-content-start my-5">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">save</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
    $('#id_format').change(function(){
        var format = $(this).val();
        if(format=='Format-1'){
            $('.f1').show();
            $('.f2').hide();
            $('.f3').hide();
        }else if(format=='Format-2'){
            $('.f2').show();
            $('.f1').hide();
            $('.f3').hide();
        }
        else if(format=='Format-3'){
            $('.f3').show();
            $('.f1').hide();
            $('.f2').hide();
        }
    });
</script>
@endsection
