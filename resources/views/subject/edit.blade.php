@extends('layouts.master')

@section('title')
    Subject | Edit
@endsection

@section('content')
    <div class="xl:col-span-6 col-span-12">
        <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Edit Subject</h5>
                <nav>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-[12px]">
                            <a class="flex items-center" href="{{ route('subject.index') }}">
                                Subject Management
                                <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible text-textmuted rtl:rotate-180"></i>
                            </a>
                        </li>
                        <li class="text-[12px]">
                            <span class="flex items-center text-primary hover:text-primary">Edit</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 text-defaultsize">
            <div class="xl:col-span-12 col-span-12">
                <div class="box">
                    <div class="box-header flex justify-between">
                        <div class="box-title">Update Subject</div>
                    </div>

                    @if ($errors->any())
                        <div class="mx-4 mt-4 p-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('subject.update', $subject) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="grid grid-cols-12 gap-6">
                                <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="curriculum_name" class="form-label">Curriculum Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="curriculum_name" name="curriculum_name" value="{{ old('curriculum_name', $subject->curriculum_name) }}" required>
                                </div>
                                <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="subject_name" class="form-label">Subject Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subject_name" name="subject_name" value="{{ old('subject_name', $subject->subject_name) }}" required>
                                </div>
                                <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="subject_code" class="form-label">Subject Code<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subject_code" name="subject_code" value="{{ old('subject_code', $subject->subject_code) }}" required>
                                </div>
                                <div class="xl:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="1" {{ old('status', $subject->status) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $subject->status) ? '' : 'selected' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="xl:col-span-12 col-span-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="6" placeholder="Optional detailed description of the subject">{{ old('description', $subject->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer border-t-0">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('subject.index') }}" class="ti-btn ti-btn-light">Cancel</a>
                                <button type="submit" class="ti-btn ti-btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection