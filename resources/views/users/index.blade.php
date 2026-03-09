@extends('layouts.master')
@section('title')
    User Management | Index
@endsection
@section('content')
    <div class="xl:col-span-6 col-span-12">
        <div class="md:flex block items-center justify-between mb-6 mt-[2rem]  page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Users</h5>
                <nav>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-[12px]"> <a class="flex items-center  text-primary hover:text-primary" href="{{ route('users.index') }}">
                                Users</a> </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="box custom-box">
            <div class="box-header flex justify-between">
                <div class="box-title">
                    Bordered Tables
                </div>
                <div class="prism-toggle">
                    <a href="{{ route('users.create') }}" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">Add Users
                        <i class="ri-user-add-line ms-2 inline-block align-middle"></i>
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            @endif

            @if ($users->count())
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">Name</th>
                                    <th scope="col" class="text-start">Email</th>
                                    <th scope="col" class="text-start">Status</th>
                                    <th scope="col" class="text-start">Date Registered</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">
                                            <span class="avatar avatar-xs me-2 online avatar-rounded">
                                                <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('backend/assets/images/faces/13.jpg') }}" alt="img" class="object-cover h-full w-full">
                                            </span> {{ $user->name }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if($user->status == 1)
                                                <span class="badge badge-success/10 text-success">Active</span>
                                            @else
                                                <span class="badge badge-danger/10 text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->created_at -> format('d M Y h:i A') }}</td>
                                        <td>
                                            <div class="hstack gap-2 flex-wrap">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="text-info text-[.875rem] leading-none border-0 bg-transparent"><i
                                                        class="ri-edit-line"></i></a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block form-delete-user">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" aria-label="anchor" class="text-danger text-[.875rem] leading-none border-0 bg-transparent btn-delete-user"><i
                                                            class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <p class="text-gray-500">No users found.</p>
            @endif
            <div class="box-footer hidden border-t-0">
            </div>
        </div>
    </div>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.btn-delete-user');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    })
                });
            });
        });
    </script>
@endsection
