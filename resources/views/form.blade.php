@extends('layout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card border box-shadow-2">
                    <div class="card-header bg-white pb-1 pt-1 border-bottom">
                        <h3 class="font-medium-3 text-bold-700 m-0">Formulir Data</h3>
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
                                                    placeholder="Masukkan Nama Anda" required
                                                    value="{{ old('nama', '') }}" />
                                                @error('nama')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir <span class="red">*</span></label>
                                                <input class="form-control" type="date" id="tanggal_lahir"
                                                    name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', date('Y-m-d')) }}" />
                                                @error('tanggal_lahir')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis Kelamin <span class="red">*</span></label>
                                                <div class="d-flex">
                                                    <select name="jenis_kelamin" id="jenis_kelamin"
                                                        class="form-control select2 " required>
                                                        <option value="">- Pilih -</option>
                                                        <option value="Laki - Laki"
                                                            @if (old('jenis_kelamin') == 'Laki - Laki') selected @endif>Laki - Laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan
                                                        </option>
                                                    </select>
                                                </div>
                                                @error('jenis_kelamin')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Password <span class="red">*</span></label>
                                                <input name="password" id="password" class="form-control w-100" required
                                                    value="{{ old('password', '') }}"
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
                                                    placeholder="Masukkan Email Anda" value="{{ old('email', '') }}" />
                                                @error('email')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Nilai Double<span class="red">*</span></label>
                                                <input name="nilai_double" id="nilai_double" class="form-control w-100"
                                                    required value="{{ old('nilai_double', '') }}"
                                                    placeholder="Masukkan nilai 2.50 - 99.99" />
                                                @error('nilai_double')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Foto <span class="red">*</span></label>
                                                <input type="file" name="foto" id="foto"
                                                    class="form-control w-100"
                                                    accept="image/png, image/gif, image/jpeg, image/png, image/svg" required
                                                    value="{{ old('foto', '') }}" />
                                                <div class="image-preview_karyawan" id="imagePreview_karyawan">
                                                    <img src="{{ old('foto', '') }}" alt="Image Preview"
                                                        class="image-preview__image_karyawan" style="display: none;">
                                                    <span class="image-preview__default-text_karyawan">Image
                                                        Preview</span>
                                                </div>
                                                @error('foto')
                                                    <p class="red"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions left">
                                    <button type="button" onclick="createLoading()"
                                        class="btn btn-info round px-3 white font-weight-bold box-shadow-1">Save</button>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%'
            });
            setTimeout(function() {
                $('.alert').remove();
            }, 5000);
        });

        const inpFile_karyawan = document.getElementById("foto");
        const previewContainer_karyawan = document.getElementById("imagePreview_karyawan");
        const previewImage_karyawan = previewContainer_karyawan.querySelector(".image-preview__image_karyawan");
        const previewDefaultText_karyawan = previewContainer_karyawan.querySelector(
            ".image-preview__default-text_karyawan");

        inpFile_karyawan.addEventListener("change", function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                previewDefaultText_karyawan.style.display = "none";
                previewImage_karyawan.style.display = "block";

                reader.addEventListener("load", function() {
                    previewImage_karyawan.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            } else {
                previewDefaultText_karyawan.style.display = null;
                previewImage_karyawan.style.display = null;
                previewImage_karyawan.setAttribute("src", "");
            }
        });

        function createLoading() {
            swal({
                title: "Halaman Konfirmasi",
                text: "Apakah anda yakin telah mengisi formulir data dengan benar ?",
                icon: "info",
                showCancelButton: true,
                buttons: {
                    confirm: {
                        text: "Save",
                        value: true,
                        visible: true,
                        className: "bg-info",
                        closeModal: false,
                    },
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "bg-gray",
                        closeModal: true,
                    },
                },
            }).then((isConfirm) => {
                if (isConfirm) {
                    $('#form-loading').submit();
                }
            });
        }
    </script>
@endsection
