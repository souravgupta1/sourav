@php
    $title ="Company | receipt";
    $mainHeading = "List receipt";
    $companyProfile = "active";

@endphp
@extends('admin.layout.master')
@section('content-section')
<script src="https://kit.fontawesome.com/37284525fc.js" crossorigin="anonymous"></script>
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List receipt

                                    @if (session('status'))
                                        <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                                    @endif
                                </div>
                                <div class="card-content">

                                    <!-- table bordered -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Receiver Name</th>
                                                    <th>Amount</th>
                                                    <th>Towards</th>
                                                    <th>Mode</th>
                                                    <th>Date</th>
                                                    <th>Receipt No.</th>
                                                    <th>PDF</th>
                                                    <th>Delete</th>
                                                    <th>Mail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($receipt as $item )


                                                <tr>
                                                    <td class="text-bold-500">{{ $item->funder_entity }}</td>
                                                    <td class="text-bold-500">{{ $item->amount }}</td>
                                                    <td class="text-bold-500">{{ $item->towards }}</td>
                                                    <td class="text-bold-500">{{ $item->transfer_mode }}</td>
                                                    <td class="text-bold-500">{{ $item->receipt_date }}</td>
                                                    <td class="text-bold-500">{{ $item->receipt_no }}</td>
                                                    <td class="text-bold-500"><a class="btn btn-warning" href="{{ route('pdf-preview', ['format' => $item->format_no,'receipt_id'=>$item->receipt_table_id]) }}"><i class="fa fa-file-pdf"></i></a></td>
                                                    <td class="text-bold-500"><a class="btn btn-danger" href="receipt-delete/{{ $item->receipt_table_id }}"><span class="fa fa-trash"></span></a></td>
                                                    <td class="text-bold-500"><a class="btn btn-success" href="{{ route('mail-setting') }}/{{ "$item->funder_id/$item->receipt_table_id" }}"><i class="fa fa-envelope"></i></a></td>
                                                </tr>
                                                 @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
@endsection
