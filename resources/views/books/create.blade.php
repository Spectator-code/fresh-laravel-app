@extends('components.layout')

@section('title', 'Add New Book')

<div class="container mx-auto p-6 max-w-2xl">
    <h1 class="text-3xl font-bold mb-8">📖 Add New Book</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title') }}" required class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Author *</label>
                <input type="text" name="author" value="{{ old('author') }}" required class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Description *</label>
                <textarea name="description" rows="4" required class="w-full p-3 rounded border bg-white/10 text-white">{{ old('description') }}</textarea>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Genre *</label>
                <select name="genre" required class="w-full p-3 rounded border bg-white/10 text-white">
                    <option value="">Select Genre</option>
                    <option value="Fiction" {{ old('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                    <option value="Sci-Fi" {{ old('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                    <option value="Fantasy" {{ old('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                    <option value="Mystery" {{ old('genre') == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                    <option value="Non-Fiction" {{ old('genre') == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                    <option value="Biography" {{ old('genre') == 'Biography' ? 'selected' : '' }}>Biography</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Published Year *</label>
                <input type="number" name="published_year" value="{{ old('published_year') }}" required class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">ISBN *</label>
                <input type="text" name="isbn" value="{{ old('isbn') }}" required class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Pages *</label>
                <input type="number" name="pages" value="{{ old('pages') }}" required min="1" class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Language *</label>
                <input type="text" name="language" value="{{ old('language') }}" required class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Publisher *</label>
                <input type="text" name="publisher" value="{{ old('publisher') }}" required class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div>
                <label class="block text-sm font-medium mb-2">Price * ($)</label>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}" required min="1" class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
            <div class="md:col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" name="is_available" value="1" {{ old('is_available', true) ? 'checked' : '' }} class="mr-2">
                    Available
                </label>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium mb-2">Cover Image</label>
                <input type="file" name="cover_image" accept="image/*" class="w-full p-3 rounded border bg-white/10 text-white">
            </div>
        </div>
        <div class="mt-8 flex gap-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 px-6 py-3 rounded font-semibold">Create Book</button>
            <a href="{{ route('books.index') }}" class="bg-gray-600 hover:bg-gray-700 px-6 py-3 rounded font-semibold">Cancel</a>
        </div>
    </form>
</div>

