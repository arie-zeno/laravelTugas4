@extends("layouts.main")

@section("container")
    <div class="container mt-5">
        <!-- <img src="/img/2.jpg" alt="struktur"> -->
        <div class="struktur pt-3 d-flex flex-row flex-wrap justify-content-evenly ">
            @foreach ($strukturs as $struktur)
                
            <div class="foto p-3 mb-4 d-flex flex-column align-items-center shadow">
                <div class="item shadow border-secondary">
                    <img src="{{asset("storage/".$struktur->foto)}}" alt="" style="max-height:500px;">
                </div>
                <div class="caption">
                    <div class="nama">
                        <h4 class="mt-3 mb-0 text-center">{{$struktur->nama}}</h4>
                        <p class="mt-0 text-danger fw-bold text-center">{{$struktur->jabatan}}</p>
                    </div>
                    <div class="ket">
                        <h6 class="mb-0 text-center"> <b>NIP</b> : {{$struktur->nip}}</h6>
                        <h6 class="mt-0 text-center"> <b>Email</b> : {{$struktur->email}}</h6>
                        <h6 class="mt-2 text-center"><p style="white-space:pre-line">{{$struktur->ket}}</p></h6>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection