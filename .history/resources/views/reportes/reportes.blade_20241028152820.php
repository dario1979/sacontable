@extends('app')

@section('content')
    <main style="margin-top: 58px">
        <div class="container pt-4">
            <!--Section: Minimal statistics cards-->
            <section>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <a href="{{ route('libros.libro_diario') }}">
                                            <i class="fas fa-scroll text-info fa-3x"></i>
                                        </a>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0">Libro Diario</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div class="align-self-center">
                                        <a href="{{ route('permisos') }}">
                                            <i class="fas fa-scroll text-info fa-3x"></i>
                                        </a>
                                    </div>
                                    <div class="text-end">
                                        <p class="mb-0">Libro Mayor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
