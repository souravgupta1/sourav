@php
    $title ="Company | User";
    $mainHeading = "List User";
@endphp
@extends('admin.layout.master')
@section('content-section')
<script src="https://kit.fontawesome.com/37284525fc.js" crossorigin="anonymous"></script>
    <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List User</h4>


                                </div>
                                <div class="card-content">

                                    <!-- table bordered -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Email Id</th>
                                                    <th>Access</th>
                                                    <th>date</th>
                                                    <th>Registered By</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($users as $item )


                                                <tr>
                                                    <td class="text-bold-500">{{ $item->name }}
@if (session('admin')->id==$item->admin_table_id)
<small><b>(Its You)</b></small>
@endif
                                                    </td>
                                                    <td class="text-bold-500">{{ $item->role }}</td>
                                                    <td class="text-bold-500">{{ $item->email }}</td>
                                                    <td class="text-bold-500">{!! str_replace('|','<br>',$item->pages) !!}</td>
                                                    <td class="text-bold-500">{{ $item->created_at }}</td>
                                                    <td class="text-bold-500">{{ getAdminNameById($item->created_by) }}</td>
                                                    <td class="text-bold-500">@if ($item->admin_id!=$item->created_by)<a class="btn btn-warning" href="{{ route("create-user")."/$item->user_table_id" }}"><i class="fa fa-pencil"></i></a>@else-@endif</td>
                                                    <td class="text-bold-500">@if ($item->admin_id!=$item->created_by)<a class="btn btn-danger" href="#"><span class="fa fa-trash"></span></a>  @else-@endif</td>

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
