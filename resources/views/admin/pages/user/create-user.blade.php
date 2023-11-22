
@php
    $title ="Company | User Form";
    $mainHeading = "Create User";
    $companyProfile = "active";
    foreach ($pages as $page) {
        $p[] = "$page->page_name,$page->page_options";
    }
    $unique_array = array_unique($p);
    $PagesAll = implode(':',$unique_array);
    if (!empty($user)) {
        $json = json_decode($user->pages,true);
        $json_key =array_keys($json);
        $json_val =array_values($json);
    }
// p($user);
@endphp

@extends('admin.layout.master')
@section('content-section')

<div class="row match-height">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add User
                @if (session('status'))
                    <div class="text-center"><h3><span class="text-success">{{ session('status') }}</span></h3></div>
                @endif
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" action="{{ route(!empty($user)?'update-user':'new-user') }}" method="POST">
                    @csrf
                        <div class="row">
                            <x-input type="text" name="uname" label="User Name" required value="{{ !empty($user)?$user->name:old('uname  ') }}" />
                            <x-input type="text" name="email" label="Email ID" required value="{{ !empty($user)?$user->email:old('email') }}" />
                            <x-input type="text" name="password" label="Password" required  />
                            <x-input type="select" name="role" label='Role' option="Admin|User" required value="{{ !empty($user)?$user->role:old('role') }}" />
                                <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <th>Page Name</th>
                                    <th>Can Access</th>
                                </thead>
                                @php $i =0;@endphp
                                @foreach ($pages as $key => $page )

                                <tr>
                                    <td class="text-bold-500">
                                        <input type="checkbox" class="form-check-input form-check-primary pages"
                                            @if (!empty($user))
                                                    @if (in_array($page->page_name,$json_key)) checked @endif
                                             @endif
                                        name="pages[]" value="{{ $page->page_name }}" style="cursor: pointer">
                                        <label class="form-check-label" for="customColorCheck1">{{ $page->page_name }}</label>
                                    </td>
                                    <td class="text-bold-500">
                                        <ul class="list-unstyled mb-0">
                                            @foreach (explode('|',$page->page_options) as $item )
                                                <li class="d-inline-block me-2 mb-1">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="form-check-input form-check-primary options"
                                                            @if (!empty($user))
                                                                @if (in_array($page->page_name,$json_key))
                                                                    @if (array_key_exists($page->page_name,$json) && $json[$page->page_name] === $item)
                                                                        checked
                                                                    @endif
                                                               @endif
                                                            @endif
                                                            style="cursor: pointer" value="{{ $item }}"  name="opts[{{ $key }}][]" >
                                                            <label class="form-check-label" for="customColorCheck2">{{ $item }}</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            </div>
                            <div class="col-12 d-flex justify-content-start my-5">
                                @if (!empty($user))
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Update User</button>
                                 <input type="hidden" name="user_id" value="{{ $user->user_table_id }}">
                                @else
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Add User</button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
