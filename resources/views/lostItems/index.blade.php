<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lost & Found</title>
  <style>
  :root {
    --primary: #4361ee;
    --secondary: #3f37c9;
    --success: #4cc9f0;
    --warning: #f8961e;
    --danger: #f72585;
    --light: #f8f9fa;
    --dark: #212529;
    --gray: #6c757d;
    --light-gray: #e9ecef;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  body {
    background-color: #f5f7fb;
    color: var(--dark);
    line-height: 1.6;
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
  }

  header {
    background: linear-gradient(135deg, var(--primary), var(--secondary));
    color: white;
    padding: 2rem 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  header h1 {
    text-align: center;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
  }

  header p {
    text-align: center;
    opacity: 0.9;
    max-width: 600px;
    margin: 0 auto;
  }

  .search-section {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    margin: -30px auto 30px;
    max-width: 1000px;
    position: relative;
    z-index: 10;
  }

  .search-form {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    align-items: flex-end;
  }

  .form-group {
    flex: 1;
    min-width: 200px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: var(--gray);
  }

  input[type="text"],
  select {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid var(--light-gray);
    border-radius: 5px;
    font-size: 1rem;
    transition: border 0.3s;
  }

  input[type="text"]:focus,
  select:focus {
    outline: none;
    border-color: var(--primary);
  }

  .btn {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 500;
    transition: all 0.3s;
  }

  .btn-primary {
    background-color: var(--primary);
    color: white;
  }

  .btn-primary:hover {
    background-color: var(--secondary);
  }

  .btn-success {
    background-color: var(--success);
    color: white;
  }

  .btn-warning {
    background-color: var(--warning);
    color: white;
  }

  .btn-danger {
    background-color: var(--danger);
    color: white;
  }

  .btn-outline {
    background-color: transparent;
    border: 1px solid var(--primary);
    color: var(--primary);
  }

  .btn-outline:hover {
    background-color: var(--primary);
    color: white;
  }

  .actions-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
  }

  .items-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
  }

  .item-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s, box-shadow 0.3s;
  }

  .item-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .item-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .item-content {
    padding: 20px;
  }

  .item-name {
    font-size: 1.3rem;
    margin-bottom: 8px;
    color: var(--dark);
  }

  .item-description {
    color: var(--gray);
    margin-bottom: 15px;
  }

  .item-details {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px;
  }

  .detail {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.9rem;
  }

  .status-badge {
    display: inline-block;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
  }

  .status-lost {
    background-color: rgba(247, 37, 133, 0.1);
    color: var(--danger);
  }

  .status-found {
    background-color: rgba(248, 150, 30, 0.1);
    color: var(--warning);
  }

  .status-claimed {
    background-color: rgba(76, 201, 240, 0.1);
    color: var(--success);
  }

  .item-actions {
    display: flex;
    gap: 10px;
    margin-top: 15px;
  }

  .item-actions .btn {
    flex: 1;
    text-align: center;
    padding: 8px 10px;
    font-size: 0.85rem;
  }

  .no-items {
    grid-column: 1 / -1;
    text-align: center;
    padding: 40px;
    color: var(--gray);
  }

  footer {
    text-align: center;
    padding: 20px 0;
    margin-top: 40px;
    border-top: 1px solid var(--light-gray);
    color: var(--gray);
    font-size: 0.9rem;
  }

  @media (max-width: 768px) {
    .search-form {
      flex-direction: column;
      align-items: stretch;
    }

    .actions-bar {
      flex-direction: column;
      align-items: stretch;
    }

    .items-grid {
      grid-template-columns: 1fr;
    }
  }
  </style>
</head>

<body>
  <header>
    <div class="container">
      <h1>Lost & Found</h1>
      <p>Helping you reunite with your lost belongings</p>
    </div>
  </header>

  <div class="container">
    <section class="search-section">
      <form method="GET" action="{{ route('lostItems.index') }}" class="search-form">
        <div class="form-group">
          <label for="search">Search Items</label>
          <input type="text" id="search" name="search" placeholder="Enter item name or description..."
            value="{{ request('search') }}">
        </div>

        <div class="form-group">
          <label for="status">Status</label>
          <select id="status" name="status">
            <option value="All" {{ request('status')=='All' ? 'selected' : '' }}>All Statuses</option>
            <option value="Lost" {{ request('status')=='Lost' ? 'selected' : '' }}>Lost</option>
            <option value="Found" {{ request('status')=='Found' ? 'selected' : '' }}>Found</option>
            <option value="Claimed" {{ request('status')=='Claimed' ? 'selected' : '' }}>Claimed</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Search</button>
      </form>
    </section>

    <section class="actions-bar">
      <h2>Lost Items ({{ count($items) }})</h2>
      <a href="{{ route('lostItems.create') }}" class="btn btn-outline">Report Lost Item</a>
    </section>

    <section class="items-grid">
      @if(count($items) > 0)
      @foreach ($items as $item)
      <div class="item-card">
        @if ($item->image)
        <img src="{{ asset('images/'.$item->image) }}" alt="{{ $item->item_name }}" class="item-image">
        @else
        <div
          style="height: 200px; background-color: var(--light-gray); display: flex; align-items: center; justify-content: center; color: var(--gray);">
          No Image Available
        </div>
        @endif

        <div class="item-content">
          <h3 class="item-name">{{ $item->item_name }}</h3>
          <p class="item-description">{{ $item->description }}</p>

          <div class="item-details">
            <div class="detail">
              <span>📍</span>
              <span>{{ $item->location_found }}</span>
            </div>
            <div class="detail">
              <span>📅</span>
              <span>{{ $item->date_reported }}</span>
            </div>
            <div class="detail">
              <span>📞</span>
              <span>{{ $item->contact_info }}</span>
            </div>
          </div>

          <div class="status-badge status-{{ strtolower($item->status) }}">
            {{ $item->status }}
          </div>

          <div class="item-actions">
            <a href="{{ route('lostItems.status', ['id' => $item->id, 'status' => 'Found']) }}"
              class="btn btn-warning">Mark Found</a>
            <a href="{{ route('lostItems.status', ['id' => $item->id, 'status' => 'Claimed']) }}"
              class="btn btn-success">Mark Claimed</a>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <div class="no-items">
        <h3>No items found</h3>
        <p>Try adjusting your search criteria or <a href="{{ route('lostItems.create') }}">report a lost item</a>.</p>
      </div>
      @endif
    </section>
  </div>

  <footer>
    <div class="container">
      <p>Lost & Found System &copy; {{ date('Y') }}</p>
    </div>
  </footer>
</body>

</html>