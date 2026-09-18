@extends('layouts.app')

@section('title', "Store Summary | Neni's Bookstore")

@section('content')

<style>
    .summary-header {
        margin-bottom: 28px;
    }

    .summary-header .small-title {
        color: #d97d9d;
        font-size: 13px;
        font-weight: bold;
        letter-spacing: 2px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .summary-header h1 {
        font-family: Georgia, serif;
        font-size: 34px;
        color: #103b36;
        margin-bottom: 6px;
    }

    .summary-header p {
        color: #985d78;
        font-size: 14px;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .summary-card {
        background-color: white;
        padding: 30px;
        border-radius: 16px;
        border: 1px solid #f1e6eb;
        box-shadow: 0 5px 18px rgba(16, 59, 54, 0.07);
    }

    .summary-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f4dce5;
        color: #985d78;
        font-size: 22px;
        margin-bottom: 20px;
    }

    .summary-card h3 {
        color: #985d78;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 8px;
    }

    .summary-number {
        font-family: Georgia, serif;
        color: #103b36;
        font-size: 36px;
        font-weight: bold;
    }

    .summary-card p {
        color: #985d78;
        font-size: 13px;
        margin-top: 7px;
    }

    @media (max-width: 700px) {
        .summary-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<div class="summary-header">

    <p class="small-title">
        Neni's Bookstore
    </p>

    <h1>Store Summary</h1>

    <p>
        A quick look at the current book collection and stock.
    </p>

</div>


<div class="summary-grid">

    <div class="summary-card">

        <div class="summary-icon">
            📚
        </div>

        <h3>Book Titles</h3>

        <div class="summary-number">
            {{ $totalBooks }}
        </div>

        <p>
            Total titles in the collection
        </p>

    </div>


    <div class="summary-card">

        <div class="summary-icon">
            📦
        </div>

        <h3>Copies in Stock</h3>

        <div class="summary-number">
            {{ $totalStock }}
        </div>

        <p>
            Total available book copies
        </p>

    </div>


    <div class="summary-card">

        <div class="summary-icon">
            !
        </div>

        <h3>Out of Stock</h3>

        <div class="summary-number">
            {{ $outOfStock }}
        </div>

        <p>
            Titles that need restocking
        </p>

    </div>

</div>

@endsection