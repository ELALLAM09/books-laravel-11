@extends('layouts.app')

@section('title', 'Books')

@section('content')
    {{-- header of one book --}}
    <div class="flex justify-between mx-4 my-8">
        <h1 class="  font-mono text-2xl"> show Book </h1>
        <a href="{{ route('books.index') }}" class="inline-flex items-center font-medium text-blue-600 ">
            Back
            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    {{-- Crad of book --}}
    <div class="block rounded-lg bg-white shadow-secondary-1">
        <div class="relative overflow-hidden bg-cover bg-no-repeat">
            <img class="rounded-t-lg h-96 object-cover w-full" src="{{ asset('storage/' . $book->image) }}"
                alt="{{ $book->title }}" />
        </div>
        <div class="p-6">
            <h5 class="mb-2 text-xl font-medium leading-tight">
                {{ $book->title }}
            </h5>
            <p class="mb-4 text-base">
                {{ $book->description }}
            </p>
            <p class="text-base text-surface/75  mt-2">
                <small>status : <span
                        class="text-green-500">{{ $book->status ? 'available' : 'unavailable' }}</span></small>
            <div class="flex items-center">
                <span class="w-10 h-10 block bg-slate-200 rounded-full mr-4"></span>
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">{{ $book->author }}</p>
                    <p class="text-gray-600">{{ $book->created_at->format('Y-m-d') }}</p>
                    <p>ISBN :{{ $book->ISBN }}</p>
                </div>
            </div>
            </p>
        </div>
    </div>
    {{-- alert success --}}
    @if (Session::has('success'))
        <div class="alert alert-success absolute top-4 right-4">
            <div id="toast-success"
                class="flex gap-4 items-center w-full max-w-xs p-2 mb-4 text-gray-500 bg-white rounded-lg shadow "
                role="alert">
                <div
                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                {{ Session::get('success') }}
            </div>
    @endif
@endsection
