@extends('layouts.master')
@section('content')
    <div class="container px-4 px-lg-5 my-5">

        @forelse ($pokemons as $poke)
            @php
                $a = json_decode($poke->abilities);
                $b = json_decode($poke->types);
                $c = json_decode($poke->evolutions);
                if ($poke->id - 1 <= 0) {
                    $before = 151;
                } else {
                    $before = $poke->id - 1;
                }

                if ($poke->id + 1 > 151) {
                    $next = 0;
                } else {
                    $next = $poke->id;
                }
            @endphp

            <div class="row">
                <div class="col-sm mt-3">
                    <a href="/detail/{{ $before }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block bg-danger text-white">
                            #{{ str_pad($allpokemons[$before - 1]->id, 3, '0', STR_PAD_LEFT) }}
                            {{ $allpokemons[$before - 1]->name }}

                        </button>
                    </a>
                </div>
                <div class="col-sm mt-3">
                    <a href="/detail/{{ $next + 1 }}">
                        <button type="button" class="btn btn-primary btn-lg btn-block bg-danger text-white">
                            #{{ str_pad($allpokemons[$next]->id, 3, '0', STR_PAD_LEFT) }}
                            {{ $allpokemons[$next]->name }}
                        </button>
                    </a>
                </div>
            </div>

            <div class="row gx-4 gx-lg-5 mt-3 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/img/{{ $poke->image }}">
                </div>
                <div class="col-md-6">
                    <div class="small mb-1">#{{ str_pad($poke->id, 3, '0', STR_PAD_LEFT) }}</div>
                    <h1 class="display-5 fw-bolder">{{ $poke->name }}</h1>
                    <h2 class="display-5 fw-bolder">Abilities</h2>
                    @foreach ($a as $abilities)
                        <span class="badge badge-dark">
                            {{ $abilities }}</span>
                    @endforeach
                    <h2 class="display-5 fw-bolder">Profile</h2>
                    <div class="container text-left mt-3 p-4 ">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Height</th>
                                    <td>{{ $poke->height }}</td>
                                    <th>Weight</th>
                                    <td>{{ $poke->weight }}</td>
                                </tr>
                                <tr>
                                    <th>Species</th>
                                    <td>{{ $poke->species }}</td>
                                    <th>Types</th>
                                    <td>
                                        @foreach ($b as $types)
                                            <span class="badge badge-dark">
                                                {{ $types }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="display-5 fw-bolder">Stats</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="font-weight-bold">HP </h5>
                        </div>
                        <div class="col-sm">
                            <div class="progress">
                                <div class="progress-bar text-left" role="progressbar"
                                    style="width: {{ $poke->hp }}px; background-color: red;"
                                    aria-valuenow="{{ $poke->hp }}" aria-valuemin="0" aria-valuemax="200">
                                    <div class="text-left ml-2">{{ $poke->hp }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="font-weight-bold">Attack </h5>
                        </div>
                        <div class="col-sm">
                            <div class="progress">
                                <div class="progress-bar text-left " role="progressbar"
                                    style="width: {{ $poke->attack }}px;background-color: #ff781f;"
                                    aria-valuenow="{{ $poke->attack }}" aria-valuemin="0" aria-valuemax="200">
                                    <div class="text-left ml-2">{{ $poke->attack }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="font-weight-bold">Defense </h5>
                        </div>
                        <div class="col-sm">
                            <div class="progress">
                                <div class="progress-bar text-left" role="progressbar"
                                    style="width: {{ $poke->defense }}px;background-color: #fdc12a;"
                                    aria-valuenow="{{ $poke->defense }}" aria-valuemin="0" aria-valuemax="200">
                                    <div class="text-left ml-2">{{ $poke->defense }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="font-weight-bold">Sp.Attack </h5>
                        </div>
                        <div class="col-sm">
                            <div class="progress">
                                <div class="progress-bar text-left" role="progressbar"
                                    style="width: {{ $poke->sp_attack }}px;background-color: #26abff;"
                                    aria-valuenow="{{ $poke->sp_attack }}" aria-valuemin="0" aria-valuemax="200">
                                    <div class="text-left ml-2">{{ $poke->sp_attack }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="font-weight-bold">Sp.Defence </h5>
                        </div>
                        <div class="col-sm">
                            <div class="progress">
                                <div class="progress-bar text-left" role="progressbar"
                                    style="width: {{ $poke->sp_defense }}px;background-color: #43c465;"
                                    aria-valuenow="{{ $poke->sp_defense }}" aria-valuemin="0" aria-valuemax="200">
                                    <div class="text-left ml-2">{{ $poke->sp_defense }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <h5 class="font-weight-bold">Speed </h5>
                        </div>
                        <div class="col-sm">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $poke->speed }}px;background-color: #e60088;"
                                    aria-valuenow="{{ $poke->speed }}" aria-valuemin="0" aria-valuemax="200">
                                    <div class="text-left ml-2">{{ $poke->speed }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-center">Evolutions</h2>
            <div class="card-deck justify-content-center">
                @if (empty($c))
                    <div class="card col d-flex justify-content-center text-center">
                        <div class="card-body">
                            <p class="card-text">No Evolution for this Pokemons</p>
                        </div>
                    </div>

                @else
                    @foreach ($c as $evo)
                        <div class="card col d-flex justify-content-center text-center">
                            <div class="card-body">
                                <span class="badge badge-pill badge-secondary  position-absolute "
                                    style="top: 0.5rem; right: 0.5rem">
                                    #{{ str_pad($evo, 3, '0', STR_PAD_LEFT) }}</span>
                                <img class="img-fluid flex-auto d-none d-md-block "
                                    src="/img/{{ $allpokemons[$evo - 1]->image }}" alt="Responsive image"
                                    style="width: 250px; height: 200px;">
                                <h3 class="card-title"><a href="/detail/{{ $allpokemons[$evo - 1]->id }}"
                                        style=" color:black;">{{ $allpokemons[$evo - 1]->name }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
    </div>
@empty
    <div class="alert alert-dark d-inline-block">Tidak ada data!</div>
    @endforelse
@endsection
