@extends('layouts.app')

@section('title', 'Books')

@section('content')
    {{-- header of add demand --}}
    <div class="flex max-w-2xl justify-end mx-4 my-8">
        <a href="/" class="inline-flex  items-center font-mono text-blue-600 ">
            Back
            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    {{-- Crad of demand --}}
    <div style="max-width: 600px" class="mx-auto flex flex-col justify-center h-full ">
        <div class="text-3xl font-bold flex uppercase italic justify-center mb-2">
            Bo<img src="{{ asset('storage/images/logo.svg') }}" class="w-8" alt="logo">
            ks</div>
        <h1 class="text-2xl font-mono text-center -mb-4">new demand</h1>
        <form method="POST" action="{{ route('demand.store') }}" class=" shadow-md rounded-lg p-6">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">

            <div class="my-5">
                <label for="title" class="block mb-2 font-mono text-gray-600 ">title of book</label>
                <input type="text" value="{{ $book->title }}" name="title" id="title"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 font-mono rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="harry potter" required />
                @error('title')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="author" class="block mb-2 font-mono text-gray-600 ">Name of author</label>
                <input type="text" value="{{ $book->author }}" name="author" id="author" placeholder="author name"
                    class="bg-gray-50 border font-mono outline-none border-gray-300 text-gray-900  rounded-lg focus:ring-blue-500 focus:border-blue-500  w-full p-2.5"
                    required />
                @error('author')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-5">
                <label for="formateur" class="block mb-2 font-mono text-gray-600 ">formateur</label>
                <input type="text" name="formateur" id="formateur" placeholder="formateur"
                    class="bg-gray-50 border  outline-none border-gray-300 text-gray-800  rounded-lg focus:ring-blue-500 focus:border-blue-500 block font-mono w-full p-2"
                    required />
                @error('farmateur')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4outline-none focus:ring-blue-300 font-mono rounded-lg px-5 py-2 text-center mt-3">Send
                Demand
            </button>
        </form>
    </div>
@endsection
