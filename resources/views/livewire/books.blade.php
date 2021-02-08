<div>
    @forelse ($books_list as $book)
        <li>{{ $book->title }}</li>
    @empty
        <p>Knygų nėra</p>
    @endforelse
</div>
