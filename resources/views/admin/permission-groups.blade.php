@extends('layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Permission Groups List</h4>
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="fw-semibold fs-12">Status: </span>
                                    <span class="text-muted">
                                        @if($status === 'active')
                                            Active
                                        @elseif($status === 'inactive')
                                            Inactive
                                        @else
                                            All
                                        @endif
                                        <i class="mdi mdi-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="{{ url()->current() }}?status=all">All</a>
                                    <a class="dropdown-item" href="{{ url()->current() }}?status=active">Active</a>
                                    <a class="dropdown-item" href="{{ url()->current() }}?status=inactive">Inactive</a>
                                </div>
                            </div>
                            <div class="flex-shrink-0">
                                @can('create_permission_group')
                                    <button type="button"
                                        class="btn btn-primary btn-label waves-effect waves-light rounded-pill"
                                        data-bs-toggle="modal" data-bs-target="#permissionGroupModal" id="addPermissionGroupBtn">
                                        <i class="ri-add-circle-fill label-icon align-middle rounded-pill fs-16 me-2"></i> Add
                                        New
                                    </button>
                                @endcan
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="permissionGroupsMasterTable"
                                class="table nowrap dt-responsive align-middle table-hover table-bordered"
                                style="width: 100%;">
                                <thead class="table-light">
                                    <tr>
                                        <th>S No.</th>
                                        <th style="text-align: left;">Group Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @can('list_permission_group')
                                        @foreach ($permissionGroups as $key => $group)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td style="text-align: left;">{{ $group->name }}</td>
                                                <td>{{ $group->category }}</td>
                                                <td>
                                                    @if ($group->status == 1)
                                                        <span class="badge bg-success-subtle text-success badge-border">Active</span>
                                                    @else
                                                        <span class="badge bg-danger-subtle text-danger badge-border">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @can('modify_permission_group')
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#permissionGroupModal"
                                                            class="btn btn-primary btn-sm edit-permission-group"
                                                            data-id="{{ $group->id }}"><i class="ri-edit-2-fill"></i></button>
                                                    @endcan
                                                    @can('remove_permission_group')
                                                        <button type="button" class="btn btn-danger btn-sm delete-permission-group"
                                                            data-id="{{ $group->id }}"><i class="ri-delete-bin-5-fill"></i></button>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <span class="text-danger">You do not have permission to view the permission group
                                                    list.</span>
                                            </td>
                                        </tr>
                                    @endcan
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-modal.permission-groups />
@endsection
@push('scripts')
    <script src="{{ asset('custom/js/pages/permission-groups.js') }}"></script>
@endpush