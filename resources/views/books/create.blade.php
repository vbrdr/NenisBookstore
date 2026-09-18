@extends('layouts.app')

@section('title', "Add Book | Neni's Bookstore")

@section('content')

<style>
    .popup-overlay {
        position: fixed;
        inset: 0;
        background: rgba(16, 59, 54, 0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .popup-box {
        width: 90%;
        max-width: 400px;
        background: white;
        padding: 35px;
        border-radius: 18px;
        text-align: center;
        box-shadow: 0 15px 40px rgba(16, 59, 54, 0.2);
    }

    .popup-icon {
        width: 55px;
        height: 55px;
        margin: 0 auto 15px;
        border-radius: 50%;
        background: #f4dce5;
        color: #d97d9d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        font-weight: bold;
    }

    .popup-box h2 {
        font-family: Georgia, serif;
        color: #103b36;
        margin-bottom: 10px;
    }

    .popup-box p {
        color: #985d78;
        line-height: 1.6;
        margin-bottom: 22px;
    }

    .popup-box button {
        border: none;
        background: #d97d9d;
        color: white;
        padding: 11px 28px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }

    .popup-box button:hover {
        background: #985d78;
    }

    .form-page {
        max-width: 850px;
        margin: 0 auto;
    }

    .form-heading {
        text-align: center;
        margin-bottom: 25px;
    }

    .form-heading .small-title {
        color: #d97d9d;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .form-heading h1 {
        font-family: Georgia, serif;
        color: #103b36;
        font-size: 34px;
        margin-bottom: 8px;
    }

    .form-heading p {
        color: #985d78;
        font-size: 14px;
    }

    .form-card {
        background-color: white;
        padding: 35px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(16, 59, 54, 0.08);
        border: 1px solid #f1e6eb;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #103b36;
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #d8c2cd;
        border-radius: 8px;
        background-color: #fdfafb;
        color: #103b36;
        font-size: 14px;
        outline: none;
        transition: 0.2s;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #d97d9d;
        box-shadow: 0 0 0 3px rgba(217, 125, 157, 0.12);
        background-color: white;
    }

    .error {
        display: block;
        color: #b84f70;
        font-size: 12px;
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 12px;
        margin-top: 10px;
    }

    .cancel-btn,
    .save-btn {
        border: none;
        border-radius: 8px;
        padding: 12px 22px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
    }

    .cancel-btn {
        background-color: #d8c2cd;
        color: #103b36;
    }

    .cancel-btn:hover {
        background-color: #c8adb9;
    }

    .save-btn {
        background-color: #d97d9d;
        color: white;
    }

    .save-btn:hover {
        background-color: #985d78;
    }

    @media (max-width: 650px) {
        .form-row {
            grid-template-columns: 1fr;
            gap: 0;
        }

        .form-card {
            padding: 25px 20px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .cancel-btn,
        .save-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

@if ($errors->any())
    <div class="popup-overlay" id="validationPopup">
        <div class="popup-box">
            <div class="popup-icon">!</div>

            <h2>Incomplete Book Details</h2>

            <p>
                Please complete all required fields before
                adding the book to the collection.
            </p>

            <button type="button" onclick="closePopup()">
                Okay
            </button>
        </div>
    </div>
@endif

<div class="form-page">

    <div class="form-heading">
        <p class="small-title">New Story Awaits</p>
        <h1>Add a New Book</h1>
        <p>Fill in the book details to add it to Neni's collection.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Book Title</label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    placeholder="Enter the book title"
                >

                @error('title')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="author">Author</label>

                <input
                    type="text"
                    id="author"
                    name="author"
                    value="{{ old('author') }}"
                    placeholder="Enter the author's name"
                >

                @error('author')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>

                <select id="genre" name="genre">
                    <option value="">Select a genre</option>
                    <option value="Fiction" {{ old('genre') == 'Fiction' ? 'selected' : '' }}>Fiction</option>
                    <option value="Fantasy" {{ old('genre') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                    <option value="Romance" {{ old('genre') == 'Romance' ? 'selected' : '' }}>Romance</option>
                    <option value="Mystery" {{ old('genre') == 'Mystery' ? 'selected' : '' }}>Mystery</option>
                    <option value="Thriller" {{ old('genre') == 'Thriller' ? 'selected' : '' }}>Thriller</option>
                    <option value="Horror" {{ old('genre') == 'Horror' ? 'selected' : '' }}>Horror</option>
                    <option value="Science Fiction" {{ old('genre') == 'Science Fiction' ? 'selected' : '' }}>Science Fiction</option>
                    <option value="Adventure" {{ old('genre') == 'Adventure' ? 'selected' : '' }}>Adventure</option>
                    <option value="Classic" {{ old('genre') == 'Classic' ? 'selected' : '' }}>Classic</option>
                    <option value="Biography" {{ old('genre') == 'Biography' ? 'selected' : '' }}>Biography</option>
                    <option value="History" {{ old('genre') == 'History' ? 'selected' : '' }}>History</option>
                    <option value="Self-Help" {{ old('genre') == 'Self-Help' ? 'selected' : '' }}>Self-Help</option>
                    <option value="Children's" {{ old('genre') == "Children's" ? 'selected' : '' }}>Children's</option>
                    <option value="Educational" {{ old('genre') == 'Educational' ? 'selected' : '' }}>Educational</option>
                </select>

                @error('genre')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="price">Price</label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        step="0.01"
                        min="0"
                        value="{{ old('price') }}"
                        placeholder="0.00"
                    >

                    @error('price')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock_quantity">Stock Quantity</label>

                    <input
                        type="number"
                        id="stock_quantity"
                        name="stock_quantity"
                        min="0"
                        value="{{ old('stock_quantity') }}"
                        placeholder="0"
                    >

                    @error('stock_quantity')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="form-actions">
                <a href="{{ route('books.index') }}" class="cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="save-btn">
                    Add to Collection
                </button>
            </div>

        </form>

    </div>

</div>

<script>
    function closePopup() {
        document.getElementById('validationPopup').style.display = 'none';
    }
</script>

@endsection