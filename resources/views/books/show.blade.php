@extends('components.layout')

@section('title', $book->title)

<div class="container mx-auto p-6 max-w-4xl">
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-4xl font-bold mb-2">{{ $book->title }}</h1>
            <p class="text-xl text-gray-300 mb-4">by {{ $book->author }}</p>
            <span class="inline-block bg-blue-600 px-4 py-2 rounded-full text-sm font-semibold">{{ $book->genre }}</span>
        </div>
        <div class="text-right">
            <span class="text-3xl font-bold text-green-400">${{ number_format($book->price, 2) }}</span>
            <p class="text-lg {{ $book->is_available ? 'text-green-400' : 'text-red-400' }}">
                {{ $book->is_available ? '✅ Available' : '❌ Unavailable' }}
            </p>
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-12">
        <div>
            @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="w-full max-w-md rounded-lg shadow-xl mx-auto">
            @else
                <div class="w-full max-w-md h-96 bg-gray-800 rounded-lg flex items-center justify-center mx-auto text-gray-500">
                    No cover image
                </div>
            @endif
        </div>
        <div>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-semibold mb-1">Publisher</label>
                    <p>{{ $book->publisher }}</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Published</label>
                    <p>{{ $book->published_year }} • {{ $book->pages }} pages</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">Language</label>
                    <p>{{ $book->language }}</p>
                </div>
                <div>
                    <label class="block text-sm font-semibold mb-1">ISBN</label>
                    <p>{{ $book->isbn }}</p>
                </div>
                <div class="pt-8 border-t">
                    <h3 class="text-xl font-bold mb-4">Description</h3>
                    <p class="text-lg leading-relaxed">{{ $book->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12 flex gap-4">
        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('books.index') }}" class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded font-semibold">Back to Library</a>
    </div>
</div>

@push('styles')
<style>
.btn { padding: 10px 20px; border-radius: 6px; font-weight: 600; text-decoration: none; }
.btn-warning { background: #ffc107; color: black; }
</style>
@endpush

