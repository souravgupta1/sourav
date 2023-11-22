@php
    $title ="Company | Receipt";
    $mainHeading = "Create Receipt";
    $companyProfile = "active";
    $funderOptions='';
 foreach ($funders as $funder ){
    $funderOptions .= "$funder->id:$funder->funder_entity|";
}
@endphp
@extends('admin.layout.master')
@section('content-section')
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Receipt Details
                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ route('CompanyReceipt') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <x-input type="select" name="funder_id"  class="choices form-select"  label="Received with thanks From" option="{{ $funderOptions }}" required/>
                                                <div class="col-md-3 col-12">
                                                <br>
                                                <a href="{{ route('create-funder') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="row mt-5">

                                            <h4>Funder Details</h4>

                                                <div class="col-md-3 col-12">
                                                <div class="form-group">
                                                    <label for="Address-column">Address</label>
                                                    <textarea  id="id_funder_address" class="form-control " disabled cols="30" rows="3"></textarea>
                                                </div>
                                            </div>
                                                <x-input readonly='readOnly' type="text" name="funder_email" label="Email ID" />
                                                <x-input readonly='readOnly' type="text" name="funder_pan" label="PAN Card" />
                                            <hr>
                                            </div>
                                            <div class="row">
                                                <x-input type="text" name="amount" label="a sum of Rupees" required />
                                                <x-input type="text" name="towards" label="towards" required/>
                                                <x-input type="text" name="for" label="For" required/>
                                                <x-input type="select" name="transfer_mode" label="vide" option="By Cash|Bank Transfer|By Cheque" required/>
                                                <x-input type="date" name="receipt_date" label="Date" required />
                                                <x-input type="text" name="receipt_no" label="Receipt No" value="{{ $receiptNumber }}" readonly='readOnly' />
                                                <div class="col-12 d-flex justify-content-start">
                                                    <div class="dropdown mt-4">
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Submit Methods
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                    <button class="dropdown-item" name="submit" type="submit" value="exit">Save & Exit</button>
                                                    <button class="dropdown-item" name="submit"  type="submit" value="new">Save & New</button>
                                                    <button class="dropdown-item" name="submit" type="submit" value="send">Save & Send</button>
                                                    <input type="hidden" name="funder_id" id="funder_id">
                                                    <input type="hidden" name="format_no" value="{{ $format_no }}" >
                                                </div>
                                            </div>
                                                </div>
                                            </div>
                                            <small><br  ><b>Note</b> :  Fields mark with <span class="text-danger">*</span> are medatory</small>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $('#id_funder_id').change(function(){
    var id = $(this).val();
    $.ajax({
        url: 'get-funder',
       data: {'id': id, '_token': "{{ csrf_token() }}" },
        type: 'POST',  // Use 'type' instead of 'method' for specifying the HTTP method
        success: function(data){
            // var json = JSON.parse(data)
            console.log(data.funder_entity);
            $('#id_funder_email').val(data.funder_email);
            $('#funder_id').val(data.id);
            $('#id_funder_pan').val(data.funder_pan);
            $('#id_funder_address').val(data.funder_address1+'\n'+data.funder_address2+'\n'+data.funder_city+' '+data.funder_state+' '+data.funder_country+' '+data.funder_pin);

        },
        error: function(xhr, status, error) {
            console.error("AJAX request failed with error:", status, error);
        }
    });
});

    </script>

@endsection
