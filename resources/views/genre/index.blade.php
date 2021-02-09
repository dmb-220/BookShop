@extends('layouts.app')

@section('content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
    <div class="container-fluid pl-5 px-5">
    
    <div class="row">
        <aside class="col-md-3">        
        <div class="card">
            <header class="card-header">
                <h6 class="title">ADMIN MENIU</h6>
            </header>
            <div class="filter-content collapse show" id="collapse_1" style="">
                <div class="card-body"> 
                    <ul class="list-menu">
                    <li><a href="#">Genre  </a></li>
                    <li><a href="#">Author </a></li>
                    <li><a href="#">Book verify  </a></li>
                    <li><a href="#">Clothes  </a></li>
                    <li><a href="#">Home items </a></li>
                    <li><a href="#">Animals</a></li>
                    <li><a href="#">People </a></li>
                    </ul>
    
                </div> <!-- card-body.// -->
            </div>
        </div> <!-- card.// -->
        </aside> <!-- col.// -->
        <main class="col-md-9">
            <div class="card">
                <header  class="card-header text-right">
                    <a href="{{ route('genre.create') }}" class="btn btn-primary ml-md-4"><i class="fa fa-plus"></i> NEW Genre</a>
                </header >
                <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"></th>
                      <th scope="col">Genre</th>
                      <th scope="col">Last modified</th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($genres as $genre)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $genre->genre }}</td>
                    <td>{{ $genre->created_at }}</td>
                    <td class="text-right">
                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> 
                            <span class="text">Edit</span> 
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> 
                            <span class="text">Delete</span> 
                        </a>
                    </td>
                </tr>                 
            @empty       
            <p>No genres</p> 
            @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

        </main> <!-- col.// -->
    
    </div>
    
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
    @include('layouts.footer')
    @endsection  