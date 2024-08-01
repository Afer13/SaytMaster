@extends('admin.layout.app')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Settings</h1>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
                                    <label for="inputLogo" class="form-label">Logo</label>
                                    <div>
                                        @if ($setting)
                                            <img class="col-2 m-1" src="/storage/{{ $setting->logo_url }}" alt="Logo">
                                        @else
                                            No Logo
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" name="logo" id="inputLogo">
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputLogo2" class="form-label">Logo 2</label>
                                    <div>
                                        @if ($setting)
                                            <img class="col-2 m-1" src="/storage/{{ $setting->logo_2_url }}" alt="Logo 2">
                                        @else
                                            No Logo
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" name="logo_2" id="inputLogo2">
                                    @error('logo_2')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputFavicon" class="form-label">Favicon</label>
                                    <div>
                                        @if ($setting)
                                            <img  class="col-2 m-1" src="/storage/{{ $setting->favicon_url }}" alt="Favicon">
                                        @else
                                            No Logo
                                        @endif
                                    </div>
                                    <input type="file" class="form-control" name="favicon" id="inputFavicon">
                                    @error('favicon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" value="{{ optional($setting)->email ?? '' }}" class="form-control" name="email" id="inputEmail">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputPhone" class="form-label">Phone Number</label>
                                    <input type="text" value="{{ optional($setting)->phone_number ?? '' }}" class="form-control" name="phone_number" id="inputPhone">
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <input type="text" value="{{ optional($setting)->address ?? '' }}" class="form-control" name="address" id="inputAddress">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputFacebook" class="form-label">Facebook</label>
                                    <input type="text" value="{{ optional($setting)->facebook ?? '' }}" class="form-control" name="facebook" id="inputFacebook">
                                    @error('facebook')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputInstagram" class="form-label">Instagram</label>
                                    <input type="text" value="{{ optional($setting)->instagram ?? '' }}" class="form-control" name="instagram" id="inputInstagram">
                                    @error('instagram')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputTwitter" class="form-label">Twitter</label>
                                    <input type="text" value="{{ optional($setting)->twitter ?? '' }}" class="form-control" name="twitter" id="inputTwitter">
                                    @error('twitter')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputYoutube" class="form-label">Youtube</label>
                                    <input type="text" value="{{ optional($setting)->youtube ?? '' }}" class="form-control" name="youtube" id="inputYoutube">
                                    @error('youtube')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputWhatsapp" class="form-label">whatsapp</label>
                                    <input type="text" value="{{ optional($setting)->whatsapp ?? '' }}" class="form-control" name="whatsapp" id="inputWhatsapp">
                                    @error('whatsapp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@section('script')
@endsection
