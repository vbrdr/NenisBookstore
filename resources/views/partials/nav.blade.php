<nav class="navbar">
    <div class="nav-container">

        <a href="{{ route('books.index') }}" class="brand">
            <div class="brand-icon">N</div>

            <div>
                <h2>Neni's Bookstore</h2>
                <span>Your little corner of stories</span>
            </div>
        </a>

        <div class="nav-links">

            <a href="{{ route('books.index') }}"
            class="{{ request()->routeIs('books.index') ? 'active' : '' }}">
                Book Collection
            </a>

            <a href="{{ route('books.summary') }}"
            class="{{ request()->routeIs('books.summary') ? 'active' : '' }}">
                Store Summary
            </a>

        </div>

    </div>
</nav>

<style>
    .navbar {
        background-color: #103b36;
        padding: 16px 5%;
        box-shadow: 0 3px 10px rgba(16, 59, 54, 0.15);
    }

    .nav-container {
        max-width: 1200px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 30px;
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 12px;
        color: white;
        text-decoration: none;
    }

    .brand-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: #d97d9d;
        color: white;
        font-family: Georgia, serif;
        font-size: 25px;
        font-weight: bold;
    }

    .brand h2 {
        font-family: Georgia, serif;
        font-size: 20px;
        margin-bottom: 2px;
    }

    .brand span {
        color: #d8c2cd;
        font-size: 12px;
    }

    .nav-links {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .nav-links a {
        padding: 10px 16px;
        border-radius: 8px;
        color: #d8c2cd;
        text-decoration: none;
        font-size: 14px;
        transition: 0.2s;
    }

    .nav-links a {
        padding: 10px 12px;
        border-radius: 0;
        color: #d8c2cd;
        text-decoration: none;
        font-size: 14px;
        transition: none;
    }

    .nav-links a:hover {
        background-color: transparent;
        color: #d8c2cd;
    }

    .nav-links .active {
        background-color: transparent;
        color: white;
        border-bottom: 2px solid #d97d9d;
    }

    .collection-link {
        color: #d8c2cd !important;
        background-color: transparent !important;
        border: 1px solid #d8c2cd;
    }

    .collection-link:hover {
        background-color: #087078 !important;
        border-color: #087078;
        color: white !important;
    }

    @media (max-width: 650px) {
        .nav-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .nav-links {
            width: 100%;
        }

        .nav-links a {
            flex: 1;
            text-align: center;
        }
    }
</style>