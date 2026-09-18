@extends('layouts.app')

@section('title', "Book Collection | Neni's Bookstore")

@section('content')

<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .small-title {
        color: #d97d9d;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .page-header h1 {
        font-family: Georgia, serif;
        font-size: 34px;
        color: #103b36;
        margin-bottom: 6px;
    }

    .page-header p {
        color: #985d78;
        font-size: 14px;
    }

    .add-book-btn {
        display: inline-block;
        padding: 12px 20px;
        background-color: #d97d9d;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 14px;
        transition: 0.2s;
    }

    .add-book-btn:hover {
        background-color: #985d78;
    }

    .success-message {
        background-color: #e8f4f1;
        color: #103b36;
        border-left: 4px solid #087078;
        padding: 14px 18px;
        border-radius: 7px;
        margin-bottom: 20px;
    }

    .book-table-container {
        background-color: white;
        border-radius: 12px;
        overflow-x: auto;
        box-shadow: 0 4px 15px rgba(16, 59, 54, 0.08);
    }

    .book-table {
        width: 100%;
        border-collapse: collapse;
    }

    .book-table th {
        background-color: #087078;
        color: white;
        padding: 15px;
        text-align: left;
        font-size: 14px;
    }

    .book-table td {
        padding: 15px;
        border-bottom: 1px solid #eadde3;
        font-size: 14px;
    }

    .book-table tr:last-child td {
        border-bottom: none;
    }

    .book-table tbody tr:hover {
        background-color: #faf7f8;
    }

    .book-title {
        color: #103b36;
        font-weight: bold;
    }

    .stock {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 20px;
        background-color: #d8c2cd;
        color: #103b36;
        font-size: 12px;
        font-weight: bold;
    }

    .out-of-stock {
        background-color: #f3d7e1;
        color: #985d78;
    }

    /* Delete Button */

    .delete-btn {
        border: none;
        background-color: #f4dce5;
        color: #985d78;
        padding: 7px 14px;
        border-radius: 7px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
    }

    .delete-btn:hover {
        background-color: #d97d9d;
        color: white;
    }

    /* Empty Collection */

    .empty-books {
        padding: 50px 20px;
        text-align: center;
        color: #985d78;
    }

    .empty-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background-color: #f4dce5;
        color: #d97d9d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: Georgia, serif;
        font-size: 28px;
        font-weight: bold;
    }

    .empty-books h3 {
        color: #103b36;
        margin-bottom: 8px;
        font-family: Georgia, serif;
        font-size: 22px;
    }

    .empty-books p {
        margin-bottom: 20px;
    }

    /* Delete Confirmation Popup */

    .delete-overlay {
        position: fixed;
        inset: 0;
        background-color: rgba(16, 59, 54, 0.35);
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .delete-popup {
        width: 90%;
        max-width: 420px;
        background-color: white;
        padding: 35px;
        border-radius: 18px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(16, 59, 54, 0.2);
    }

    .delete-icon {
        width: 55px;
        height: 55px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background-color: #f4dce5;
        color: #d97d9d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: bold;
    }

    .delete-popup h2 {
        font-family: Georgia, serif;
        color: #103b36;
        margin-bottom: 10px;
    }

    .delete-popup p {
        color: #985d78;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .delete-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .delete-actions form {
        margin: 0;
    }

    .keep-btn,
    .confirm-delete-btn {
        border: none;
        padding: 11px 20px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
    }

    .keep-btn {
        background-color: #d8c2cd;
        color: #103b36;
    }

    .keep-btn:hover {
        background-color: #c8adb9;
    }

    .confirm-delete-btn {
        background-color: #d97d9d;
        color: white;
    }

    .confirm-delete-btn:hover {
        background-color: #985d78;
    }

    @media (max-width: 650px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .add-book-btn {
            width: 100%;
            text-align: center;
        }

        .book-table {
            min-width: 750px;
        }
    }
</style>


<div class="page-header">

    <div>
        <p class="small-title">Welcome to</p>

        <h1>Book Collection</h1>

        <p>
            Keep track of all the books available at Neni's Bookstore.
        </p>
    </div>

    <a href="{{ route('books.create') }}" class="add-book-btn">
        + Add New Book
    </a>

</div>


@if(session('success'))

    <div class="success-message">
        {{ session('success') }}
    </div>

@endif


<div class="book-table-container">

    @if($books->count() > 0)

        <table class="book-table">

            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @foreach($books as $book)

                    <tr>

                        <td class="book-title">
                            {{ $book->title }}
                        </td>

                        <td>
                            {{ $book->author }}
                        </td>

                        <td>
                            {{ $book->genre }}
                        </td>

                        <td>
                            ₱{{ number_format($book->price, 2) }}
                        </td>

                        <td>

                            <span class="stock {{ $book->stock_quantity == 0 ? 'out-of-stock' : '' }}">

                                {{ $book->stock_quantity == 0
                                    ? 'Out of Stock'
                                    : $book->stock_quantity }}

                            </span>

                        </td>

                        <td>

                            <button
                                type="button"
                                class="delete-btn"
                                data-id="{{ $book->id }}"
                                data-title="{{ $book->title }}"
                                onclick="openDeletePopup(this)"
                            >
                                Delete
                            </button>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="empty-books">

            <div class="empty-icon">
                N
            </div>

            <h3>No books yet</h3>

            <p>
                Your book collection is currently empty.
                Add your first book to get started!
            </p>

            <a href="{{ route('books.create') }}" class="add-book-btn">
                + Add New Book
            </a>

        </div>

    @endif

</div>


<!-- Delete Confirmation Popup -->

<div class="delete-overlay" id="deletePopup">

    <div class="delete-popup">

        <div class="delete-icon">
            !
        </div>

        <h2>Remove this book?</h2>

        <p>
            Are you sure you want to remove
            <strong id="deleteBookTitle"></strong>
            from the collection?
        </p>

        <div class="delete-actions">

            <button
                type="button"
                class="keep-btn"
                onclick="closeDeletePopup()"
            >
                Cancel
            </button>

            <form id="deleteForm" method="POST">

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="confirm-delete-btn"
                >
                    Delete Book
                </button>

            </form>

        </div>

    </div>

</div>


<script>

    function openDeletePopup(button)
    {
        const bookId = button.dataset.id;
        const bookTitle = button.dataset.title;

        document.getElementById('deleteBookTitle').textContent =
            '"' + bookTitle + '"';

        document.getElementById('deleteForm').action =
            '/books/' + bookId;

        document.getElementById('deletePopup').style.display =
            'flex';
    }


    function closeDeletePopup()
    {
        document.getElementById('deletePopup').style.display =
            'none';
    }

</script>

@endsection