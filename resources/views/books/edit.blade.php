@extends('layouts.app')

@section('title', 'Books')

@section('content')
    {{-- header of edit book --}}
    <div class="flex justify-between mx-4 my-8">
        <h1 class="  font-mono text-2xl"> edit Book </h1>
        <a href="{{ route('books.index') }}" class="inline-flex items-center font-medium text-blue-600 ">
            Back
            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    {{-- form of edit book --}}
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    title
                </label>
                <input type="text" value="{{ $book->title }}" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   outline-none"
                    placeholder="title" required />
                @error('title')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900">author</label>
                <input type="text" value="{{ $book->author }}" id="author" name="author"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none"
                    placeholder="author" required />
                @error('author')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                    choose a category</label>
                <select id="category" name="category"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option @selected($book->category == 'DD') value="DD">D.D</option>
                    <option @selected($book->category == 'DI') value="DI">D.I</option>
                </select>
                @error('category')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">price</label>
                <input id="price" value="{{ $book->price }}" name="price" type="number"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 outline-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="price" required />
                @error('price')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">stock</label>
                <input id="stock" value="{{ $book->stock }}" name="stock" type="number"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 outline-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="stock" required />
                @error('stock')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div>
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">description</label>
            <textarea id="message" rows="4" name="description"
                class="block p-2.5 w-full text-sm text-gray-900 outline-none bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Write description here...">{{ $book->description }}</textarea>
            @error('description')
                <span class="text-red-500 font-mono ">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit"
            class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Edit book
        </button>

    </form>
@endsection
