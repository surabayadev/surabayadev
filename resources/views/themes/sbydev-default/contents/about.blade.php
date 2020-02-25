@extends('theme::layouts.default')

@section('content')
    <div id="headline" style="background-image: url({{ asset('static/img/team.jpg') }});">
        <div class="container">
            <img src="{{ theme_asset('css/asset/img/sbydev-logo-white.png') }}" alt="" srcset="">
            <a href="#sejarah">
                <img src="{{ theme_asset('css/asset/icon/button-down.svg') }}" alt="" srcset="">
            </a>
        </div>
    </div>

    <div id="aboutus-bg-1">
        <!-- Sejarah Begin -->
        <section id="sejarah" class="container">
            <h3 class="text-primary text-center">Sejarah Kami</h3>
            <div class="row" id="sejarah-1">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <p>SurabayaDev lahir pada tahun 2014 dari gagasan bersama yang di inisiasi oleh Achmad Fatoni,
                        Arryangga
                        Aliev
                        Pratama, Antoni Putra dan atas keinginan teman teman, maka dari itu
                        tepat pada bulan april acara pertama lahirlah Surabaya Developer atau disingkat SurabayaDev.
                    </p>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('static/img/blob-img-1.png') }}" alt="" srcset="">
                </div>
                <div class="col-lg-1"></div>
            </div>

            <div class="row" id="sejarah-2">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <img src="{{ asset('static/img/blob-img-2.png') }}" alt="" srcset="">
                </div>
                <div class="col-lg-5">
                    <p>
                        Kegiatan Surabaya Dev diadakan setiap bulan dengan lokasi acara seperti co working space di
                        Surabaya.
                        Akhir
                        tahun 2017 Surabaya Dev berkembang untuk mencoba hal baru dengan berkolaborasi bersama lembaga
                        atau
                        institusi pendidikan untuk lebih dekat dengan kawan penggiat TI yang berstatus pelajar,
                        mahasiswa,
                        maupun
                        umum.

                        Seiring perkembangan waktu saat ini Surabaya Dev memiliki struktur organisasi, program kegiatan,
                        dan
                        lebih
                        dari 1500 orang anggota grup yang terdapat di forum telegram.
                    </p>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </section>
        <!-- Sejarah End -->

        <!-- Visi Misi Begin -->
        <section class="container" id="visimisi">
            <div class="row">
                <div class="col md-5">
                    <h3 class="text-primary">Visi</h3>
                    <p>Surabaya Dev adalah komunitas IT yang
                        membantu meningkatkan dan memanfaatkan potensi pegiat IT di seluruh
                        Indonesia khususnya di kota Surabaya dalam bidang teknologi, guna mendukung,
                        untuk mewujudkan suatu kondisi yang saling melengkapi dalam rangka peningkatan keahlian, dan
                        semangat
                        kerjasama.</p>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-5">
                    <h3 class="text-primary">Misi</h3>
                    <p>Memberi edukasi di bidang ilmu Teknologi
                        melalui seminar & pelatihan.
                        <br><br>
                        Meningkatkan kualitas pegiat Teknologi.</p>
                </div>
            </div>
        </section>
        <!-- Visi Misi End -->
    </div>

    <div id="aboutus-bg-2">
        <!-- Program Kegiatan Begin-->
        <section class="container" id="programkegiatan">
            <h3 class="text-primary text-center">Program Kegiatan</h3>

            <!-- Seminar -->
            <div class="row mt-5" id="seminar">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <img src="{{ asset('static/img/blob-img-5.png') }}" alt="" srcset="">
                </div>
                <div class="col-lg-5">
                    <h5>Seminar</h5>
                    <p>Diadakan setiap bulan dengan tema berbeda. Kegiatan ini berisi materi yang berkaitan dengan
                        TI. Sebagai komunitas anak muda yang berbasis TI Surabaya Dev membantu para pegiat TI untuk
                        menyalurkan serta membagi ilmu dan saling berdiskusi tentang teknologi terbaru. Acara ini
                        tidak berbayar.
                    </p>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <!-- Pelatihan -->
            <div class="row mt-5" id="pelatihan">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <h5>Pelatihan</h5>
                    <p>Surabaya Dev memiliki program pelatihan TI dengan sasaran pelajar/mahasiswa Diadakan setiap 2
                        bulan sekali Kegiatan ini mencakup materi pelatihan dasar yang sedang dibutuhkan dalam dunia
                        industri TI.
                    </p>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('static/img/blob-img-4.png') }}" alt="" srcset="">
                </div>
                <div class="col-lg-1"></div>
            </div>

            <!-- Gathering -->
            <div class="row mt-5" id="gathering">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <img src="{{ asset('static/img/blob-img-3.png') }}" alt="" srcset="">
                </div>
                <div class="col-lg-5">
                    <h5>Gathering</h5>
                    <p>SurabayaDev berkolaborasi dengan berbagai komunitas untuk saling bersinergi dan berbagi.
                        Gathering ini merupakan bentuk kerjasama Surabaya Dev dengan komunitas / Organisasi / Lembaga
                        secara berkelompok menciptakan suatu kegiatan bersama yang seru dan berkualitas.</p>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </section>
        <!-- Program Kegiatan End -->

        <!-- Tim Kami Begin -->
        {{-- <section class="container" id="timkami">
            <h3 class="text-center text-primary">Tim Kami</h3>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ theme_asset('css/asset/img/dummy-img.png') }}" alt="" srcset="">
                    <h5>John Doe</h5>
                    <p>Initiator</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ theme_asset('css/asset/img/dummy-img.png') }}" alt="" srcset="">
                    <h5>John Doe</h5>
                    <p>Initiator</p>
                </div>
                <div class="col-md-4">
                    <img src="{{ theme_asset('css/asset/img/dummy-img.png') }}" alt="" srcset="">
                    <h5>John Doe</h5>
                    <p>Initiator</p>
                </div>
            </div>

            <button class="btn btn-primary">Lihat Semua Tim</button>
        </section> --}}
        <!-- Tim Kami End -->
    </div>
@stop