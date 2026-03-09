@extends('layouts.master')
@section('title')
    Enrollment | Edit
@endsection
@section('content')
    <div class="xl:col-span-6 col-span-12">
        <div class="md:flex block items-center justify-between mb-6 mt-[2rem]  page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Enrollment</h5>
                <nav>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                            <li class="text-[12px]"> <a class="flex items-center " href="{{ route('enrollments.index') }}">
                                Enrollment <i
                                    class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                            </a> </li>
                        <li class="text-[12px]"> <a class="flex items-center text-primary hover:text-primary "
                                href="javascript:void(0);">Edit
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
                            Edit Enrollment
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
                    <form action="{{ route('enrollments.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="space-y-6">
                                <div class="grid grid-cols-12 sm:gap-6 items-start">
                                    <div class="xl:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                                        <label for="fullname" class="form-label !font-normal">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{ old('fullname', $user->name) }}" required>
                                    </div>
                                    <div class="xl:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                                        <label for="email" class="form-label !mb-2">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                    <div class="xl:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                                        <label for="password" class="form-label !mb-2">Password</label>
                                        <input type="password" class="form-control placeholder:text-textmuted" id="password" name="password">
                                        <p class="mt-2 text-sm text-muted font-normal">(Leave blank to keep current)</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 sm:gap-6 items-start">
                                    <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                        <label for="birthdate" class="form-label">Birthdate</label>
                                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate ? $user->birthdate->format('Y-m-d') : '') }}">
                                    </div>
                                    <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="1" {{ old('status', $user->status) ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $user->status) ? '' : 'selected' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 sm:gap-6 items-start">
                                    <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                        <label for="photo" class="form-label">Upload Photo</label>
                                        <input type="file" name="photo" id="photo" accept="image/*"
                                            class="block w-full border border-gray-200 focus:shadow-sm dark:focus:shadow-white/10 rounded-sm text-sm focus:z-10 focus:outline-0 focus:border-gray-200 dark:focus:border-white/10 dark:border-white/10
                                                    file:border-0
                                                   file:bg-gray-200 file:me-4
                                                   file:py-3 file:px-4
                                                   dark:file:bg-black/20 dark:file:text-white/50">
                                        <div class="mt-3 rounded-md border border-dashed border-defaultborder dark:border-white/10 p-4 text-center">
                                            <p class="text-sm text-textmuted mb-3">New Upload Preview</p>
                                            <img id="photo-preview" src="#" alt="New upload preview" class="hidden h-40 w-40 rounded-full object-cover mx-auto border border-defaultborder dark:border-white/10">
                                            <div id="photo-preview-placeholder" class="h-40 w-40 rounded-full border border-dashed border-defaultborder dark:border-white/10 flex items-center justify-center text-textmuted text-sm mx-auto px-3">
                                                No image selected
                                            </div>
                                        </div>
                                    </div>
                                    <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                        <label class="form-label">Current Photo</label>
                                        <div class="mt-1 rounded-md border border-dashed border-defaultborder dark:border-white/10 p-4 text-center">
                                            @if ($user->photo)
                                                <img src="{{ asset($user->photo) }}" alt="{{ $user->name }} current photo" class="h-40 w-40 rounded-full object-cover mx-auto border border-defaultborder dark:border-white/10">
                                            @else
                                                <div class="h-40 w-40 rounded-full border border-dashed border-defaultborder dark:border-white/10 flex items-center justify-center text-textmuted text-sm mx-auto px-3">
                                                    No photo uploaded
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer border-t-0">
                            <div class="flex justify-end">
                                <button type="submit" class="ti-btn ti-btn-primary">
                                    Update Enrollment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const photoInput = document.getElementById('photo');
            const photoPreview = document.getElementById('photo-preview');
            const photoPlaceholder = document.getElementById('photo-preview-placeholder');

            if (!photoInput || !photoPreview || !photoPlaceholder) {
                return;
            }

            photoInput.addEventListener('change', function (event) {
                const [file] = event.target.files;

                if (!file) {
                    photoPreview.src = '#';
                    photoPreview.classList.add('hidden');
                    photoPlaceholder.classList.remove('hidden');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function (e) {
                    photoPreview.src = e.target.result;
                    photoPreview.classList.remove('hidden');
                    photoPlaceholder.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@endsection