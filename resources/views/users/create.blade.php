
@extends('layouts.master')
@section('title')
    User Management | Create
@endsection
@section('content')
    <div class="xl:col-span-6 col-span-12">
        <div class="md:flex block items-center justify-between mb-6 mt-[2rem]  page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Users</h5>
                <nav>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[12px]"> <a class="flex items-center " href="{{ route('users.index') }}">
                                Users <i
                                    class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                            </a> </li>
                        <li class="text-[12px]"> <a class="flex items-center text-primary hover:text-primary "
                                href="{{ route('users.create') }}">Create
                            </a> </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 text-defaultsize">
            <div class="xl:col-span-12 col-span-12">
                <div class="box">
                    <div class="box-header flex justify-between">
                        <div class="box-title">
                            Create User
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="grid grid-cols-12 sm:gap-6">
                                <div class="xl:col-span-4 lf:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="fullname" class="form-label !font-normal">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname') }}" required>
                                </div>
                                <div class="xl:col-span-4 lf:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="email" class="form-label !mb-2">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                <div class="xl:col-span-4 lf:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control placeholder:text-textmuted" id="password" name="password" required>
                                </div>
                                <div class="xl:col-span-4 lf:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="birthdate" class="form-label">Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') }}">
                                </div>
                                <div class="xl:col-span-4 lf:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="photo" class="form-label">Upload Photo</label>
                                    <input type="file" name="photo" id="photo" accept="image/*"
                                        class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10
                                                file:border-0
                                               file:bg-gray-200 file:me-4
                                               file:py-3 file:px-4
                                               dark:file:bg-black/20 dark:file:text-white/50">
                                    <small class="text-muted">Accepted: jpg, jpeg, png, gif (max 2MB).</small>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer border-t-0">
                            <div class="flex justify-end">
                                <button type="submit" class="ti-btn ti-btn-primary">
                                    Add User
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
