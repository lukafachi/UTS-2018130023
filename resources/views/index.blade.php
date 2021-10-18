@extends('layouts.master')
@section('content')

    <div class="container ">
        <div class="row-sm">
            <form action="/home/search" method="GET" role="search">
                <div class="input-group ">
                    <input type="text" class="form-control rounded w-75 mt-3" id="poke" name="search">
                    <button type="submit" class="btn btn-danger w-25 mt-3">Search Pokemons</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-sm mt-3">
                <a href="/home/o-random"><button type="button"
                        class="btn btn-primary btn-lg btn-block bg-warning text-dark">Suprise me</button></a>
            </div>
            <div class="col-sm mt-3">
                <button class="btn btn-primary dropdown-toggle btn-lg btn-block" type="button" id="dropdownMenu2"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Order By
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="/home/o-1-151"><button class="dropdown-item btn-lg" type="button">Lowest Number</button></a>
                    <a href="/home/o-151-1"><button class="dropdown-item btn-lg" type="button">Highest Number</button></a>
                    <a href="/home/o-a-z"><button class="dropdown-item btn-lg" type="button">A-Z</button></a>
                    <a href="/home/o-z-a"><button class="dropdown-item btn-lg" type="button">Z-A</button></a>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse ($pokemons as $poke)
                @php
                    $a = json_decode($poke->types);
                @endphp
                <div class="col-lg-3 mt-4 d-flex align-items-stretch justify-content-center">
                    <div class="card text-center">
                        <div class="card-body">
                            <span class="badge badge-pill badge-secondary  position-absolute "
                                style="top: 0.5rem; right: 0.5rem">
                                #{{ str_pad($poke->id, 3, '0', STR_PAD_LEFT) }}</span>
                            <img class="img-fluid  flex-auto d-none d-md-block" src="/img/{{ $poke->image }}"
                                alt="Responsive image" style="width: 250px; height: 200px;">
                            <h3 class="card-title "><a href="/detail/{{ $poke->id }}"
                                    style=" color:black;">{{ $poke->name }}
                                </a>
                            </h3>
                            @foreach ($a as $types)
                                <span class="badge badge-pill badge-secondary ">
                                    {{ $types }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-dark d-inline-block">Tidak ada data!</div>
            @endforelse
        </div>
    </div>
@endsection
