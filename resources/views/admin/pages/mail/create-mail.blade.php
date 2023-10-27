@php
    $title ="Mail Compose | Mail";
    $mainHeading = "Compose Mail";
@endphp
@extends('admin.layout.master')
@section('content-section')
   <section class="section">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Send Mail  </h4>
                                </div>
                                <div class="card-body">
                                    <form class="form">
                                        <div class="row">
                                            <x-input type="text" name="to" label="To :" value='soorugupta999@gmail.com' />
                                            <x-input type="text" name="cc" label="Cc :" value='soorugupta999@gmail.com' />

                                            <x-input type="file" name="attachment" label="Attach File :" />
                                            <small><b>Notie : Add more CC separated by semicolen ";"</b> </small>
                                            <div class="col-md-7 col-12">
                                                <div class="form-group">
                                                <label for="message-column">Message</label>
                                                    <textarea name="" id="default" cols="30" rows="10">hello Sourav</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-start">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Send Mail</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>

                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
