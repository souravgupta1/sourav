@php
    $title ="Mail Setting | Mail";
    $mainHeading = "Settings";
@endphp
@extends('admin.layout.master')
@section('content-section')
   <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> Mail Setting
                                        @if (session('status'))
                                            <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                        @endif
                                    </div>
                                     </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" method="post" action="{{ route('Mail-send') }}">
                                    @csrf
                                        <div class="row">
                                            <x-input type="text" name="subject" label="Subject" value="Receipt Generated" required   />
                                            <x-input type="text" name="from" label="From Name" value="{{ ($admin)?$admin->name:'' }}" required />
                                            <x-input type="text" name="to" label="To :" value="{{ ($funder)?$funder->funder_email:'' }}" required />
                                            <x-input type="text" name="cc" label="Cc :"  />
                                            <input type="hidden" name="receipt_id" value="{{ $receipt }}"   />



                                            <small><b>Notie : Add more CC separated by semicolen ";"</b> </small>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                <label for="message-column">Message</label>
                                                    <textarea name="body" id="default" cols="30" rows="15">{{ $setting->message }}</textarea>

                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-start">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Send Mail</button>
                                                </div>

                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
