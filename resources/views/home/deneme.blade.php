@extends('layouts.frontbase')

@section('title', 'Travel Agency')

@section('nagivation')
@endsection

@section('content')

    @foreach($data as $rs)


        <article>
            <div class="panel panel-sponsor">
                <div class="panel-heading">
                    <h2>
                        <a href="/noax-hotel?RT=5" title="Noax Hotel" target="_blank" id="Noax_Hotel" data-decid="Noax_Hotel">Noax Hotel</a>
                    </h2>


                </div>
                <div class="panel-body">
                    <div class="row pr-15">

                        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 img-mask">
                            <a href="/noax-hotel?RT=5" target="_blank">
                                <img width="257" height="171" data-src="https://tatilsepeti.cubecdn.net/Files/Images/Tesis/07752/450X300/tsr07752637226539021799252.jpg" title="Noax Hotel" alt="Noax Hotel" class="img-responsive no-src lazyloaded" src="https://tatilsepeti.cubecdn.net/Files/Images/Tesis/07752/450X300/tsr07752637226539021799252.jpg">
                            </a>
                            <div class="fav-btn-list favorite-icon add-favorite" data-hotelid="7752" data-hotelname="Noax Hotel" data-toggle="tooltip" data-placement="top" title="" data-original-title="Favorilerime Ekle">
                                    <span>
                                        <i class="fa fa-heart-o"></i>
                                    </span>
                            </div>

                            <div class="badge-list badge-list--top-right badge-list--bottom-right-mobile">
                                <div class="badge-list__item badge-list__item--sponsor">
                                    <span>Sponsorlu</span>
                                </div>
                            </div>

                            <div class="badge-list badge-list--bottom-left" data-magic="False">
                                <div class="badge-list__item badge-list__item--magic hidden" data-toggle="tooltip" data-placement="top" title="" data-original-title="Bu Fiyat Sana Özel">
                                    <i class="fa fa-magic" aria-hidden="true"></i>
                                    <span>Sihirli Fırsat</span>
                                </div>



                                <div class="badge-list__item badge-list__item--covid" data-toggle="tooltip" data-placement="top" title="" data-original-title="Sağlıklı Turizm Sertifikalı">
                                    <span>Sağlık Sertifikalı</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-5 col-xs-6 otel-list__content">
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> Mersin - Mersin Merkez
                            </p>
                            <p class="erk-promo">Son Dakika Fırsatı %5 İndirim + 9 Taksit </p>

                            <div class="axess-campaign-row">
                                <div class="axess-campaign needsclick" data-toggle="tooltip" data-placement="top" title="" data-original-title="Axess'e özel kampanya süresince tüm indirimlere ek Tatilsepeti.com'dan yapacağınız ilk 5.000 TL ve üzeri tek ödeme veya taksitli harcamanıza 400 TL chip-para kazanma fırsatı sunulmaktadır.">
                                    Axess Mobil ile 400 TL Chip para Fırsatı !
                                </div>
                            </div>


                            <div class="hotelFeatures">
                                <ul class="hotelFeaturesList">
                                    <li class="hotelFeaturesList__hotelFeaturesTooltip wifi" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ücretli Wifi">
                                        <i class="hotelFeaturesTooltip-icon"></i>
                                        Ücretli Wifi
                                    </li>
                                    <li class="hotelFeaturesList__hotelFeaturesTooltip acikhavuz" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tesiste  açık Havuz bulunmaktadır.">
                                        <i class="hotelFeaturesTooltip-icon"></i>
                                        Açık Havuz
                                    </li>
                                    <li class="hotelFeaturesList__hotelFeaturesTooltip spavesaglik" data-toggle="tooltip" data-placement="top" title="" data-original-title="Spa ve Sağlık Merkezi">
                                        <i class="hotelFeaturesTooltip-icon"></i>
                                        Spa ve Sağlık
                                    </li>
                                    <li class="hotelFeaturesList__hotelFeaturesTooltip otopark" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ücretsiz Otopark">
                                        <i class="hotelFeaturesTooltip-icon"></i>
                                        Ücretsiz Otopark
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 otel-list__price-box">
                            <div class="otel-list__price-box__content">

                                <p class="hostel-type">Sadece Oda</p>
                                <p class="currency">1.600,<small class="price-currency">00 TL</small></p>

                                <a href="/noax-hotel?RT=5" target="_blank" class="btn btn-block btn-primary">Detayları İncele</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach

@endsection
