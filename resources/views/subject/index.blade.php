@extends('layouts.master')

@section('title')
    Subjects | Index
@endsection

@section('content')
    <div class="xl:col-span-6 col-span-12">
        <div class="md:flex block items-center justify-between mb-6 mt-[2rem] page-header-breadcrumb">
            <div class="my-auto">
                <h5 class="page-title text-[1.3125rem] font-medium text-defaulttextcolor mb-0">Subjects</h5>
                <nav>
                    <ol class="flex items-center whitespace-nowrap min-w-0">
                        <li class="text-[12px]">
                            <a class="flex items-center text-primary hover:text-primary" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="text-[12px]">
                            <span class="flex items-center text-textmuted">
                                <i class="ti ti-chevrons-right flex-shrink-0 mx-3 overflow-visible rtl:rotate-180"></i>
                                Subjects
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box custom-box">
            <div class="box-header flex justify-between items-center">
                <div class="box-title">All Subjects</div>
                <div>
                    <a href="{{ route('subject.create') }}" class="ti-btn !py-1 !px-2 ti-btn-primary !font-medium !text-[0.75rem]">
                        New Subject
                        <i class="ri-add-line ms-2 inline-block align-middle"></i>
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="mx-4 mt-4 p-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">Success!</span> {{ session('success') }}
                </div>
            @endif

            <div class="box-body">
                @if ($subjects->count())
                    <div class="table-responsive">
                        <table class="table whitespace-nowrap table-bordered min-w-full">
                            <thead>
                                <tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">Curriculum</th>
                                    <th scope="col" class="text-start">Name</th>
                                    <th scope="col" class="text-start">Code</th>
                                    <th scope="col" class="text-start">Status</th>
                                    <th scope="col" class="text-start">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subjects as $subject)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{ $subject->curriculum_name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $subject->subject_name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $subject->subject_code }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            @if ($subject->status)
                                                <span class="badge badge-success/10 text-success">Active</span>
                                            @else
                                                <span class="badge badge-danger/10 text-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="hstack gap-2 flex-wrap">
                                                <a href="{{ route('subject.edit', $subject) }}" class="text-info text-[.875rem] leading-none border-0 bg-transparent">
                                                    <i class="ri-edit-line"></i>
                                                </a>
                                                <form action="{{ route('subject.destroy', $subject) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this subject?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger text-[.875rem] leading-none border-0 bg-transparent" aria-label="Delete subject">
                                                        <i class="ri-delete-bin-5-line"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="rounded-md border border-dashed border-defaultborder p-8 text-center text-textmuted">
                        No subject records found.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection