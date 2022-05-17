@extends('layouts.frontbase')

@section('title', "Contact | ". $dataSettings->title)
@section('description', $dataSettings->description)
@section('keywords', $dataSettings->keywords)
@section('icon', \Illuminate\Support\Facades\Storage::url($dataSettings->icon))


@section('nagivation')
@endsection

@section('content')

    <div id="fh5co-tours" class="fh5co-section-gray">
        <div class="container">
            <div class="content-text">
                {!! $dataSettings->contact !!}
            </div>

            <div class="form-horizontal">
                <div class="form-title medium">Lütfen tüm öneri ve şikayetlerinizi bize bildiriniz.</div>
                <div class="mb-20">
                    <b>Önemli not:</b> Konu başlığına göre işleminizden sorumlu olacak departmanlar
                    farklılık göstermektedir. Bu nedenle lütfen ilgili konu başlığını doğru şekilde
                    seçiniz.
                </div>
                <form id="checkout-form" action="{{route("storemessage")}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="SubjectTitleId" class="col-md-2 control-label">Konu Başlığı</label>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <select class="form-control" id="subject" name="subject" required>
                                <option>(Lütfen bir konu başlığı seçiniz)</option>
                                <option>Yurtiçi Otel veya Paket Tur Rezervasyon Talebi</option>
                                <option>Yurtdışı Otel veya Paket Tur Rezervasyon Talebi</option>
                                <option>Uçak Bileti Rezervasyon Talebi</option>
                                <option>Grup Rezervasyon Talebi</option>
                                <option>Rezervasyon Sonrası Evrak Talebi</option>
                                <option>Rezervasyon Sonrası Değişiklik Talebi</option>
                                <option>Rezervasyon Sonrası Diğer Bilgi Talepleri</option>
                                <option>Öneri</option>
                                <option>Otel/Tur Hizmetinden Şikayet</option>
                                <option>Otel/Tur Hizmetinden Memnuniyet</option>
                                <option>TatilSepeti.Com Hizmetinden Şikayet</option>
                                <option>TatilSepeti.Com Hizmetinden Memnuniyet</option>
                                <option>Kıbrıs Rezervasyon Talebi</option>
                                <option>Uçak Bileti Bilgi / Değişiklik Talebi</option>
                                <option>Yurtiçi Tur Kalkış Bilgilendirme</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NameSurname" class="col-md-2 control-label">Adınız Soyadınız</label>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <input class="form-control" id="name" name="name" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Email" class="col-md-2 control-label">E-posta Adresiniz</label>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <input class="form-control" id="email" name="email" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Mobile1" class="col-md-2 control-label">Cep Telefonunuz</label>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 phone-control">
                            <input class="form-control phone1 ph-num" name="phone" type="tel">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Note" class="col-md-2 control-label">Açıklama</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="form-control" cols="20" id="message" maxlength="500" name="message" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2"></div>
                        <div class="col-sm-12 col-md-10">
                            <button type="submit" class="btn btn-primary btn-lg">Gönder</button>
                            <label style="margin-left: 10px">{{\Illuminate\Support\Facades\Session::get('info')}}</label>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
