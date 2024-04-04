@extends('layouts.app')

@section('title', 'Books')

@section('content')
    {{-- header of add book --}}
    <div class="flex justify-between mx-4 my-8">
        <h1 class="  font-mono text-2xl"> add Books </h1>
        <a href="{{ route('books.index') }}" class="inline-flex items-center font-medium text-blue-600 ">
            Back
            <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">
                    title
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5   outline-none"
                    placeholder="title" required />
                @error('title')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900">author</label>
                <input type="text" id="author" name="author" value="{{ old('author') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none"
                    placeholder="author" required />
                @error('author')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="ISBN" class="block mb-2 text-sm font-medium text-gray-900">ISBN</label>
                <input type="text" id="ISBN" name="ISBN" value="{{ old('ISBN') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 outline-none"
                    placeholder="ISBN" required />
                @error('ISBN')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900">
                    choose a category</label>
                <select id="category" name="category"
                    class="bg-gray-50 border outline-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option selected>Choose a category</option>
                    <option @if (old('category') == 'DD') selected @endif value="DD">D.D</option>
                    <option @if (old('category') == 'DI') selected @endif value="DI">D.I</option>
                </select>
                @error('category')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">price</label>
                <input id="price" name="price" type="number" value="{{ old('price') }}"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 outline-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="price" required />
                @error('price')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">stock</label>
                <input id="stock" name="stock" value="{{ old('stock') }}" type="number"
                    aria-describedby="helper-text-explanation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 outline-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="stock" required />
                @error('stock')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>
            {{-- description --}}
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">description</label>
                <textarea id="message" rows="5" name="description"
                    class="block p-2 w-full text-sm text-gray-900 outline-none bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Write description here...">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500 font-mono ">{{ $message }}</span>
                @enderror
            </div>

            {{-- upload image --}}
            <div class=" w-full">
               <span class="block mb-2 text-sm font-medium text-gray-900">choose an image</span>
                <label for="dropzone-file"
                    class="flex mt-2 flex-col items-center justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-4 h-4 mb-2 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-1 text-sm text-gray-500 ">
                            <span class="font-semibold">Click to
                                upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" value="{{ old('image') }}" type="file" name="image" class="hidden" />
                    @error('image')
                        <span class="text-red-500 font-mono bottom-0 ">{{ $message }}</span>
                    @enderror
                </label>
            </div>
        </div>
        <button type="submit"
            class="text-white mt-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Add Book
        </button>
    </form>
@endsection
