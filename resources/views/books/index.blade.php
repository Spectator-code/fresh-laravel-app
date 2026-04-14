@extends('components.layout')

@section('title', 'Books Library')

@push('styles')
<style>
table { width: 100%; border-collapse: collapse; margin: 20px 0; }
th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
th { background-color: #f2f2f2; }
.btn { padding: 6px 12px; margin: 0 4px; text-decoration: none; border-radius: 4px; }
.btn-primary { background: #007bff; color: white; }
.btn-success { background: #28a745; color: white; }
.btn-warning { background: #ffc107; color: black; }
.btn-danger { background: #dc3545; color: white; }
img { max-width: 50px; height: auto; }
</style>
@endpush

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-8">📚 Books Library</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search & Filter -->
    <div class="mb-8 p-6 bg-gray-800 rounded-lg">
        <form method="GET" class="flex flex-wrap gap-4">
            <input type="text" name="search" placeholder="Search by title or author..." value="{{ request('search') }}" class="flex-1 p-2 rounded bg-white/10 text-white">
            <select name="genre" class="p-2 rounded bg-white/10 text-white">
                <option value="">All Genres</option>
                <option value="Fiction" {{ request('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                <option value="Sci-Fi" {{ request('genre') == 'Sci-Fi' ? 'selected' : '' }}>Sci-Fi</option>
                <option value="Fantasy" {{ request('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                <option value="Mystery" {{ request('genre') == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                <option value="Non-Fiction" {{ request('genre') == 'Non-Fiction' ? 'selected' : '' }}>Non-Fiction</option>
                <option value="Biography" {{ request('genre') == 'Biography' ? 'selected' : '' }}>Biography</option>
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('books.index') }}" class="btn bg-gray-600">Clear</a>
        </form>
    </div>

    <div class="flex justify-between mb-6">
        <span>Total: {{ $books->total() }} books</span>
        <a href="{{ route('books.create') }}" class="btn btn-success">Add New Book</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Price</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>
                        @if($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover">
                        @else
                            No image
                        @endif
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre }}</td>
                    <td>${{ number_format($book->price, 2) }}</td>
                    <td>{{ $book->is_available ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-8">No books found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $books->appends(request()->query())->links() }}
</div>

