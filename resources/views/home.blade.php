@extends('layouts.app')

@section('title', 'Books')

@section('content')
    {{-- header --}}
    <nav style="max-width: 700px" class="bg-white border-gray-200 mx-auto">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('storage/images/logo.svg') }}" class="h-8" alt="books Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap italic">BOOKS</span>
            </a>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-mono flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                    <a href="{{ route('demand.index') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">DEMAND</a>
                </ul>
            </div>
        </div>
    </nav>
    {{-- body --}}
    <div style="max-width: 700px" class="flex mx-auto items-center justify-center my-24">
        <div class="flex-1 flex flex-col items-center justify-center">
            <h2
                class="text-5xl text-center  font-mono uppercase  bg-gradient-to-t bg-clip-text text-transparent from-indigo-100 to-indigo-500">
                Your best online book destination!
            </h2>
            <p class="mt-4 font-mono leading-5 text-zinc-400 text-justify">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed
                aliquam necessitatibus laboriosam iusto, sapiente, exercitationem
            </p>
            <a href="{{ route('books.index') }}"
                class="inline-flex mt-4 items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                Books
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
        <div>
            <img src="{{ asset('images/books-educ.svg') }}" class="h-72 object-cover" alt="logo2">
        </div>
    </div>
    {{-- footer --}}
    <footer style="max-width: 650px" class="p-4 mx-auto bg-white rounded-lg ">
        <div class="w-full mx-auto p-4 text-center">
            <hr class="my-6 border-gray-200 " />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="/"
                    class="hover:underline">BOOKS™</a>. All Rights Reserved.</span>
        </div>
    </footer>
@endsection
