@extends('layouts.app')

@section('title', 'books')

@section('content')
    {{-- header for table --}}
    <div class="flex justify-between my-6 items-center">
        <h1 class="font-medium italic text-2xl"> All Books </h1>
        <form action="{{ route('books.search') }}" method="GET">
            @csrf
            <div class="flex">
                <div class="relative w-[400px]">
                    <input type="search" name="search" id="search-dropdown"
                        class="block p-2 w-full font-mono z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none"
                        placeholder="Search for book..." required />
                    <button type="submit"
                        class="absolute top-0 end-0 p-2 h-full text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"><svg
                            class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
        </form>
        <button type="button"
            class="text-green-500 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2 text-center me-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
            <a href="{{ route('books.create') }}">new books</a>
        </button>
    </div>
    {{-- all books --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <th scope="col" class="px-2 py-1">
                        #ISBN
                    </th>
                    <th scope="col" class="px-4 py-1">
                        title
                    </th>
                    <th scope="col" class="px-4 py-1">
                        author
                    </th>
                    <th scope="col" class="px-4 py-1">
                        status
                    </th>
                    <th scope="col" class="px-4 py-1">
                        category
                    </th>
                    <th scope="col" class="px-3 py-1">
                        price
                    </th>
                    <th scope="col" class="px-3 py-1">
                        stock
                    </th>
                    <th scope="col" class="px-4 py-1">
                        date
                    </th>
                    <th scope="col" class="px-8 py-1">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    <tr class="bg-white border-b  ">
                        <th scope="row" class="px-2 py-1 font-mono text-xs  ">
                            {{ $book->ISBN }}
                        </th>
                        <td class="px-4 py-1">
                            {{ $book->title }}
                        </td>
                        <th scope="col" class="px-4 py-1 font-normal text-sm  ">
                            {{ $book->author }}
                            </td>
                        <td class="px-4 py-1">
                            {{ $book->status == '1' ? 'available' : 'not available' }}
                        </td>
                        <td class="px-4 py-1">
                            {{ $book->category }}
                        </td>
                        <td class="px-3 py-1">
                            ${{ $book->price }}
                        </td>
                        <td class="px-6 py-1">
                            {{ $book->stock }}
                        </td>
                        <td class="px-6 py-1">
                            {{ $book->created_at->format('Y-m-d') }}
                        </td>
                        <td class="flex px-8  h-12 items-center justify-between ">
                            {{-- view --}}
                            <a href="{{ route('books.show', $book->id) }}" title="view">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-sky-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 3.75H6A2.25 2.25 0 0 0 3.75 6v1.5M16.5 3.75H18A2.25 2.25 0 0 1 20.25 6v1.5m0 9V18A2.25 2.25 0 0 1 18 20.25h-1.5m-9 0H6A2.25 2.25 0 0 1 3.75 18v-1.5M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </a>
                            {{-- edit --}}
                            <a href="{{ route('books.edit', $book->id) }}" title="edit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.678 48.678 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3-3 3" />
                                </svg>
                            </a>
                            {{-- delete --}}
                            <form method='POST' action='{{ route('books.destroy', $book->id) }}'>
                                @csrf
                                @method('DELETE')
                                <button type='submit' title="delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500 ">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                            <a href="{{ route('demand.create', $book->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                </svg>
                            </a>
                        </td>
                        </th>
                    </tr>
                @empty
                    <div class="font-mono text-center px-2  absolute bottom-0 left-[40%]">Book Not Found!</div>
                @endforelse
        </table>
        </tbody>
        <div class="pagination mx-5 my-4 font-mono bg-white">
            {{ $books->links() }}
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
