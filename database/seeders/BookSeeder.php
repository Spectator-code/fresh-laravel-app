<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'description' => 'A classic novel exploring the American Dream and jazz age excess.',
                'genre' => 'Fiction',
                'published_year' => 1925,
                'isbn' => '978-0-7432-7356-5',
                'pages' => 180,
                'language' => 'English',
                'publisher' => 'Scribner',
                'price' => 12.99,
                'is_available' => true,
                'cover_image' => null,
            ],
            [
                'title' => 'Dune',
                'author' => 'Frank Herbert',
                'description' => 'Epic sci-fi saga of politics, religion, and ecology on desert planet Arrakis.',
                'genre' => 'Sci-Fi',
                'published_year' => 1965,
                'isbn' => '978-0-440-17464-2',
                'pages' => 412,
                'language' => 'English',
                'publisher' => 'Ace Books',
                'price' => 19.99,
                'is_available' => true,
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Dystopian tale of totalitarianism and surveillance.',
                'genre' => 'Fiction',
                'published_year' => 1949,
                'isbn' => '978-0-452-28423-4',
                'pages' => 328,
                'language' => 'English',
                'publisher' => 'Signet Classics',
                'price' => 10.99,
                'is_available' => false,
            ],
            [
                'title' => 'The Hobbit',
                'author' => 'J.R.R. Tolkien',
                'description' => 'Bilbo Baggins adventure to reclaim treasure.',
                'genre' => 'Fantasy',
                'published_year' => 1937,
                'isbn' => '978-0-345-53583-6',
                'pages' => 366,
                'language' => 'English',
                'publisher' => 'Del Rey',
                'price' => 15.99,
                'is_available' => true,
            ],
            [
                'title' => 'Sapiens: A Brief History of Humankind',
                'author' => 'Yuval Noah Harari',
                'description' => 'Sweeping history from stone age to 21st century.',
                'genre' => 'Non-Fiction',
                'published_year' => 2011,
                'isbn' => '978-0-06-231609-7',
                'pages' => 464,
                'language' => 'English',
                'publisher' => 'Harper',
                'price' => 22.99,
                'is_available' => true,
            ],
            [
                'title' => 'The Da Vinci Code',
                'author' => 'Dan Brown',
                'description' => 'Thriller involving religious mysteries and symbols.',
                'genre' => 'Mystery',
                'published_year' => 2003,
                'isbn' => '978-0-385-50420-5',
                'pages' => 454,
                'language' => 'English',
                'publisher' => 'Doubleday',
                'price' => 14.99,
                'is_available' => true,
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'description' => 'Guide to writing maintainable software.',
                'genre' => 'Non-Fiction',
                'published_year' => 2008,
                'isbn' => '978-0-13-235088-4',
                'pages' => 464,
                'language' => 'English',
                'publisher' => 'Prentice Hall',
                'price' => 45.99,
                'is_available' => true,
            ],
            [
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'description' => 'Authorized biography of Apple co-founder.',
                'genre' => 'Biography',
                'published_year' => 2011,
                'isbn' => '978-1-4516-4853-9',
                'pages' => 656,
                'language' => 'English',
                'publisher' => 'Simon & Schuster',
                'price' => 20.00,
                'is_available' => false,
            ],
        ];

        foreach ($books as $data) {
            Book::create($data);
        }
    }
}

