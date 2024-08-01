@extends('front.app')
@section('main')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Layihəniz var?</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Ana Səhifə</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Layihəniz var?</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="position-relative d-inline text-primary ps-4">Layihəniz var?</h6>
                        <h2 class="mt-2">Yeni bir layihəyə addım atın</h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.3s">
                        <form action="{{ route('application.post') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                @if (Session::has('success'))
                                    <div class="col-md-12 mb-2">
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    </div>
                                @endif
                                @if (Session::has('warning'))
                                    <div class="col-md-12 mb-2">
                                        <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="{{ old('name', '') }}"
                                            name="name" id="name" placeholder="Adınız">
                                        <label for="name">Adınız</label>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="{{ old('surname', '') }}"
                                            name="surname" id="surname" placeholder="Soyadınız">
                                        <label for="surname">Soyadınız</label>
                                    </div>
                                    @error('surname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" value="{{ old('email', '') }}"
                                            name="email" id="email" placeholder="E-poçtunuz">
                                        <label for="email">E-poçtunuz</label>
                                    </div>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="{{ old('phone_number', '') }}"
                                            name="phone_number" id="phone_number" placeholder="Əlaqə nömrəsi">
                                        <label for="phone_number">Əlaqə nömrəsi</label>
                                    </div>
                                    @error('phone_number')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="type_id" class="form-select" id="type_id">
                                            <option value="">Sayt növünü seçin</option>
                                            @foreach ($types as $type)
                                                <option {{ old('type_id', '') == $type->id ? 'selected' : '' }}
                                                    value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="phone_number">Sayt növü</label>
                                    </div>
                                    @error('type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="{{ old('company_name', '') }}"
                                            name="company_name" id="company_name" placeholder="Şirkət adı">
                                        <label for="company_name">Şirkət adı</label>
                                    </div>
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Sayt haqqında qısa məlumat qeyd edin" name="message" id="message"
                                            style="height: 150px">{{ old('message', '') }}</textarea>
                                        <label for="message">Sayt haqqında qısa məlumat</label>
                                    </div>
                                    @error('message')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Göndər</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center contact-item">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="/front/img/whatsapp-icon.webp"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <small>Əlaqə Nömrəmiz</small>
                                <h6 class="mb-1">{{ $setting->phone_number }}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center contact-item">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="/front/img/mail-icon-2.png"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <small>E-poçt ünvan</small>
                                <h6 class="mb-1">{{ $setting->email }}</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center contact-item">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src="/front/img/address-icon.png"
                                style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <small>Ünvan</small>
                                <h6 class="mb-1">{{ $setting->address }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
