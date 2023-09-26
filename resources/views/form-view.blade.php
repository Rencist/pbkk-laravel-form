@extends('layout')

@section('content')
    <div class="content-wrapper">
        @if ($status == 'success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('status') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card border box-shadow-2">
                    <div class="card-header bg-white pb-1 pt-1 border-bottom">
                        <h3 class="font-medium-3 text-bold-700 m-0">Output Formulir Data</h3>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form class="form" method="POST" action="{{ url('/form') }}" id="form-loading"
                                enctype="multipart/form-data" validate>
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama <span class="red">*</span></label>
                                                <input name="nama" id="nama" class="form-control w-100"
                                                    value="{{ $results['nama'] }}" disabled />
                                                @error('nama')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir <span class="red">*</span></label>
                                                <input class="form-control" type="date" id="tanggal_lahir"
                                                    name="tanggal_lahir" value="{{ $results['tanggal_lahir'] }}" disabled />
                                                @error('tanggal_lahir')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis Kelamin <span class="red">*</span></label>
                                                <div class="d-flex">
                                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                                        class="form-control select2 "value="{{ $results['jenis_kelamin'] }}"
                                                        disabled>
                                                        <option value="{{ $results['jenis_kelamin'] }}">
                                                            {{ $results['jenis_kelamin'] }}</option>
                                                    </select>
                                                </div>
                                                @error('jenis_kelamin')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Password <span class="red">*</span></label>
                                                <input name="password" id="password" class="form-control w-100"
                                                    value="{{ $results['password'] }}" disabled
                                                    placeholder="Masukkan Password Anda" />
                                                @error('password')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email <span class="red">*</span></label>
                                                <input name="email" id="email" class="form-control w-100" required
                                                    placeholder="Masukkan Email Anda"value="{{ $results['email'] }}"
                                                    disabled />
                                                @error('email')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Nilai Double<span class="red">*</span></label>
                                                <input name="nilai_double" id="nilai_double" class="form-control w-100"
                                                    value="{{ $results['nilai_double'] }}" disabled
                                                    placeholder="Masukkan nilai 2.50 - 99.99" />
                                                @error('nilai_double')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Foto <span class="red">*</span></label>
                                                <div class="image-preview_karyawan" id="imagePreview_karyawan">
                                                    <img src="{{ asset('storage/fotos/' . $results['foto']) }}"
                                                        alt="Image Preview" class="image-preview__image_karyawan">

                                                    @error('foto')
                                                        <p class="red"> {{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
