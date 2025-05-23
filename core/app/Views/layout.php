<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Leaflet_Kec/css/leaflet.css">
    <link rel="stylesheet" href="Leaflet_Kec/css/qgis2web.css">
    <link rel="stylesheet" href="Leaflet_Kec/css/fontawesome-all.min.css">
    <style>
        .color-white {
            color: white;
        }

        .Header1 {
            background-color: #072438;
            height: 12%;
            left: 0;
            top: 0px;
            position: absolute;
            width: 100%;
        }

        .Logo1 {
            height: 150%;
            object-fit: cover;
            position: absolute;
            left: 2%;
            top: -40%;
            width: 20%;
        }

        .Logo2 {
            height: 50px;
            left: 72%;
            object-fit: cover;
            position: absolute;
            top: 13px;
            width: 360px;
        }


        .Tentang {
            width: 700px;
            height: 50%;


        }

        .popup {
            backdrop-filter: blur(15px);
            position: absolute;
            top: 30%;
            left: 28%;
            margin-top: -50px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 2);
            transform: translate(-50%, -50%) scale(0.1);
            visibility: hidden;
            transition: transform 0.4s, top 0.4s;

        }

        .open-popup {
            visibility: visible;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            position: absolute;
            z-index: 2000;

        }

        .popup_close:link,
        .popup_close:visited {

            position: absolute;
            top: 10px;
            right: 20px;
            text-decoration: none;
            color: #000;
            font-size: 30px;
            display: inline-block;
            line-height: 1;
            transition: all .3s;
        }

        .popup_close:hover,
        .popup_close:active {
            color: #555;
        }

        .Menu {
            align-items: center;
            background-color: #072438;
            border: 8px solid;
            border-color: #fff7f7;
            border-radius: 30px;
            display: flex;
            flex-direction: column;
            margin-top: 8%;
            padding: 37px 0;
            height: 450px;
            width: 290px;

        }

        #map {
            left: 25%;
            position: absolute;
            top: 3%;
            height: 75%;
            width: 73%;
            margin: 30 40 0 0;
            margin-top: 100px;

        }

        #map1 {
            left: 25%;
            position: absolute;
            top: 3%;
            height: 75%;
            width: 73%;
            margin: 30 40 0 0;
            margin-top: 100px;
        }
    </style>
    <title></title>
</head>

<body>

    <div class="popup" id="popup">
        <?php
        $image_url = 'materialdashboard/Metadata.jpg';
        $image_class = 'Tentang';
        ?>
        <img class="<?php echo $image_class; ?>" src="<?php echo $image_url; ?>">
        <a href="#" class="popup_close" onclick="closePopup()">&times;</a>

    </div>
    <div id="map"></div>


    <div class="Header1">
        <?php
        $image_url1 = 'materialdashboard/Petik1.png';
        $image_class1 = 'Logo1';
        $image_url2 = 'materialdashboard/Logo BPS Kota Tanjungpinang.png';
        $image_class2 = 'Logo2';
        ?>
        <img class="<?php echo $image_class1; ?>" src="<?php echo $image_url1; ?>">
        <img class="<?php echo $image_class2; ?>" src="<?php echo $image_url2; ?>">
    </div>

    <div class="Menu">
        <section id="dashboard-tematik">
            <div class="dashboard-tematik-container">
                <div class="dashboard-tematik-sidebar" style="padding: 0px;">

                    <div class="container">
                        <div class="map-controls" style="padding: -20px 0;margin-bottom:15px">
                            <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                                <label class="btn btn-outline-light active">
                                    <div class='tablink' onclick="openPage('Kecamatan', this)" id='defaultOpen'>
                                        <input type="radio" name="options" id="btn-map-kecamatan" autocomplete="off" checked> Kecamatan
                                    </div>
                                </label>
                                <label class="btn btn-outline-light">
                                    <div class='tablink' onclick="openPage('Kelurahan', this)" id='clickOpen'>
                                        <input type="radio" name="options" id="btn-map-kelurahan" autocomplete="off"> Kelurahan
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div id="Kecamatan" class="tabcontent">
                        <div id="map"></div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div style="width:250px">
                                        <label for="tahun-select2" class="color-white">Tahun</label>
                                        <select class="form-control" id="tahun">
                                            <option disabled="" selected="">Pilih</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                       
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div style="width:250px">
                                        <label for="kategori" class="color-white">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option disabled="" selected="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div style="width:250px">
                                        <label for="komponen" class="color-white">Komponen</label>
                                        <select id="komponen" class="form-control" name="komponen">
                                            <option disabled="" selected="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div id="Kelurahan" class="tabcontent">
                        <div id="map1">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div style="width:250px">
                                        <label for="tahun1-select2" class="color-white">Tahun</label>
                                        <select class="form-control" id="tahun1">
                                            <option disabled="" selected="">Pilih</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div style="width:250px">
                                        <label for="kategori1" class="color-white">Kategori</label>
                                        <select class="form-control" id="kategori1" name="kategori1">
                                            <option disabled="" selected="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div style="width:250px">
                                        <label for="komponen1" class="color-white">Komponen</label>
                                        <select class="form-control" id="komponen1" name="komponen1">
                                            <option disabled="" selected="">Pilih</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a href="#popup">
                        <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons" style="width: 150px; position:absolute; left:65px; margin-top:15px;">
                            <label class="btn btn-outline-light active">
                                <div onclick="openPopup()">
                                    <input type="radio" name="options" id="btn-map-kecamatan" autocomplete="off" checked> Tentang Petik
                                </div>
                            </label>
                        </div>
                    </a>


                </div>
            </div>
        </section>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="Leaflet_Kec/js/qgis2web_expressions.js"></script>
    <script src="Leaflet_Kec/js/leaflet.js"></script>
    <script src="Leaflet_Kec/js/leaflet.rotatedMarker.js"></script>
    <script src="Leaflet_Kec/js/leaflet.pattern.js"></script>
    <script src="Leaflet_Kec/js/leaflet-hash.js"></script>
    <script src="Leaflet_Kec/js/Autolinker.min.js"></script>
    <script src="Leaflet_Kec/js/rbush.min.js"></script>
    <script src="Leaflet_Kec/js/labelgun.min.js"></script>
    <script src="Leaflet_Kec/js/labels.js"></script>
    <script src="Leaflet_Kec/data/final_kec_2022121721_1.js"></script>
    <script src="Leaflet_Kel/data/final_desa_2022121721_1.js"></script>
    <script>
        let popup = document.getElementById("popup");

        function openPopup() {

            popup.classList.add("open-popup");
        }

        function closePopup() {
            popup.classList.remove("open-popup");
        }

        function openPage(pageName, elmnt) {
            // Hide all elements with class="tabcontent" by default */
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(pageName).style.display = "block";

        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        var highlightLayer;

        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
                highlightLayer.setStyle({
                    color: '#fbfaf2',
                });
            } else {
                highlightLayer.setStyle({
                    fillColor: '#fbfaf2',
                    fillOpacity: 1
                });
            }
            highlightLayer.openPopup();
        }

        var map = L.map('map', {
            zoomControl: true,
            maxZoom: 28,
            minZoom: 1
        }).fitBounds([
            [0.8368203789839199, 104.3379799344011],
            [0.9967143394315556, 104.64964037973276]
        ]);

        var hash = new L.Hash(map);
        map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
        var autolinker = new Autolinker({
            truncate: {
                length: 30,
                location: 'smart'
            }
        });
        var bounds_group = new L.featureGroup([]);

        function setBounds() {}
        map.createPane('pane_OSMStandard_0');
        map.getPane('pane_OSMStandard_0').style.zIndex = 400;
        var layer_OSMStandard_0 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            pane: 'pane_OSMStandard_0',
            opacity: 1.0,
            attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 19
        });
        layer_OSMStandard_0;
        map.addLayer(layer_OSMStandard_0);

        function pop_final_kec_2022121721_1(feature, layer) {
            layer.on({
                mouseout: function(e) {
                    for (i in e.target._eventParents) {
                        e.target._eventParents[i].resetStyle(e.target);
                    }
                    if (typeof layer.closePopup == 'function') {
                        layer.closePopup();
                    } else {
                        layer.eachLayer(function(feature) {
                            feature.closePopup()
                        });
                    }
                },
                mouseover: highlightFeature,
            });


            var popupContent = '<table>\
                    <tr>\
                        <td colspan="2">' + (feature.properties['nmkec'] !== null ? autolinker.link(feature.properties['nmkec'].toLocaleString()) : '') + '</td>\
                    </tr>\
                </table>';
            layer.bindPopup(popupContent, {
                maxHeight: 400
            });

        }

        function style_final_kec_2022121721_1_0() {
            return {
                pane: 'pane_final_kec_2022121721_1',
                opacity: 1,
                color: 'rgba(205,170,129,1.0)',
                dashArray: '',
                lineCap: 'butt',
                lineJoin: 'miter',
                weight: 6.0,
                fill: true,
                fillOpacity: 1,
                fillColor: 'rgba(51,84,136,1.0)',
                interactive: true,
            }
        }
        map.createPane('pane_final_kec_2022121721_1');
        map.getPane('pane_final_kec_2022121721_1').style.zIndex = 401;
        map.getPane('pane_final_kec_2022121721_1').style['mix-blend-mode'] = 'normal';

        var layer_final_kec_2022121721_1 = new L.geoJson(json_final_kec_2022121721_1, {
            attribution: '',
            interactive: true,
            dataVar: 'json_final_kec_2022121721_1',
            layerName: 'layer_final_kec_2022121721_1',
            pane: 'pane_final_kec_2022121721_1',
            onEachFeature: pop_final_kec_2022121721_1,
            style: style_final_kec_2022121721_1_0,
        });
        bounds_group.addLayer(layer_final_kec_2022121721_1);
        map.addLayer(layer_final_kec_2022121721_1);
        setBounds();

        $('#tahun').change(e => {
            tahun = $().val()
            if (tahun == '') {
                option = ``
            } else {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="1">Geografi</option>
        <option value="2">Pemerintahan</option>
        <option value="3">Penduduk dan Ketenagakerjaan</option>
        <option value="4">Sosial dan Kesejahteraan Rakyat</option>
        <option value="5">Pertanian, Peternakan, dan Perikanan</option>
        <option value="6">Industri dan Energi</option>
        <option value="7">Pariwisata</option>
        <option value="8">Transportasi dan Komunikasi</option>
        <option value="9">Keuangan dan Koperasi</option>
        <option value="10">Perdagangan</option>
        `
            }
            $('#kategori').html(option)
        })

        $('#kategori').change((e) => {
            kategori = $(e.target).val()
            if (kategori == 1) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="1">Luas Daerah (km2)</option>
        <option value="2">Jumlah Pulau</option>
        <option value="3">Tinggi Wilayah (mdpl)</option>
        <option value="4">Jarak ke Ibukota</option>
        `
                $('#komponen').html(option)
            } else if (kategori == 2) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="5">Jumlah Kelurahan</option>
        <option value="6">Jumlah RT</option>
        <option value="7">Jumlah RW</option>
        <option value="8">Jumlah PNS</option>
        `
                $('#komponen').html(option)

            } else if (kategori == 3) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="9">Jumlah Penduduk</option>
        <option value="10">Persentase Penduduk</option>
        <option value="11">Kepadatan Penduduk per km2</option>
        <option value="12">Rasio Jenis Kelamin</option>
        `
                $('#komponen').html(option)

            } else if (kategori == 4) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="13">Jumlah TK</option>
        <option value="14">Jumlah Guru TK</option>
        <option value="15">Jumlah Murid TK</option>
        <option value="16">Jumlah RA</option>
        <option value="17">Jumlah Guru RA</option>
        <option value="18">Jumlah Murid RA</option>
        <option value="19">Jumlah SD</option>
        <option value="20">Jumlah Guru SD</option>
        <option value="21">Jumlah Murid SD</option>
        <option value="22">Jumlah MI</option>
        <option value="23">Jumlah Guru MI</option>
        <option value="24">Jumlah Murid MI</option>
        <option value="25">Jumlah SMP</option>
        <option value="26">Jumlah Guru SMP</option>
        <option value="27">Jumlah Murid SMP</option>
        <option value="28">Jumlah MTS</option>
        <option value="29">Jumlah Guru MTS</option>
        <option value="30">Jumlah Murid MTS</option>
        <option value="31">Jumlah SMA</option>
        <option value="32">Jumlah Guru SMA</option>
        <option value="33">Jumlah Murid SMA</option>
        <option value="34">Jumlah MA</option>
        <option value="35">Jumlah Guru MA</option>
        <option value="36">Jumlah Murid MA</option>
        <option value="37">Jumlah SMK</option>
        <option value="38">Jumlah Guru SMK</option>
        <option value="39">Jumlah Murid SMK</option>
        <option value="40">Jumlah Gugus</option>
        <option value="41">Jumlah Rumah Sakit</option>
        <option value="42">Jumlah Poliklinik</option>
        <option value="43">Jumlah Puskesmas</option>
        <option value="44">Jumlah Puskesmas Pembantu</option>
        <option value="45">Jumlah Apotek</option>
        <option value="46">Jumlah Dokter</option>
        <option value="47">Jumlah Dokter Gigi</option>
        <option value="48">Jumlah Perawat</option>
        <option value="49">Jumlah Bidan</option>
        <option value="50">Jumlah Tenaga Kesehatan</option>
        <option value="51">Jumlah Kefarmasian</option>
        <option value="52">Jumlah Tenaga Gizi</option>
        <option value="53">Jumlah Klinik</option>
        <option value="54">Jumlah Posyandu</option>
        <option value="55">Jumlah Polindes</option>
        <option value="56">Jumlah Gizi Buruk</option>
        <option value="57">Jumlah Kasus Demam Berdarah</option>
        <option value="58">Jumlah Kasus Diare</option>
        <option value="59">Jumlah Kasus Tuberculosis</option>
        <option value="60">Jumlah Wanita Usia Subur</option>
        <option value="61">Jumlah Pasangan Usia Subur</option>
        <option value="62">Jumlah Klinik Keluarga Berencana</option>
        <option value="63">Persentase Penduduk Agama Islam</option>
        <option value="64">Persentase Penduduk Agama Kristen Protestan</option>
        <option value="65">Persentase Penduduk Agama Kristen Katolik</option>
        <option value="66">Persentase Penduduk Agama Hindu</option>
        <option value="67">Persentase Penduduk Agama Budha</option>
        <option value="68">Jumlah Masjid</option>
        <option value="69">Jumlah Mushola</option>
        <option value="70">Jumlah Gereja Protestan</option>
        <option value="71">Jumlah Gereja Katholik</option>
        <option value="72">Jumlah Vihara</option>
        <option value="73">Jumlah Klenteng</option>
        <option value="74">Jumlah Kejadian Bencana Alam</option>
        <option value="75">Jumlah Jemaah Haji Yang Berangkat</option>
        <option value="76">Jumlah Pernikahan</option>
        `
                $('#komponen').html(option)
            } else if (kategori == 5) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="77">Luas Panen Bawang Daun (ha)</option>
        <option value="78">Luas Panen Bawang Merah (ha)</option>
        <option value="79">Luas Panen Bayam (ha)</option>
        <option value="80">Luas Panen Cabai Besar (ha)</option>
        <option value="81">Luas Panen Cabai Keriting (ha)</option>
        <option value="82">Luas Panen Cabai Rawit (ha)</option>
        <option value="83">Luas Panen Jamur (ha)</option>
        <option value="84">Luas Panen Kacang Panjang (ha)</option>
        <option value="85">Luas Panen Kangkung (ha)</option>
        <option value="86">Luas Panen Ketimun (ha)</option>
        <option value="87">Luas Panen Petsai (ha)</option>
        <option value="88">Luas Panen Terung (ha)</option>
        <option value="89">Produksi Bawang Daun (kuintal)</option>
        <option value="90">Produksi Bawang Merah (kuintal)</option>
        <option value="91">Produksi Bayam (kuintal)</option>
        <option value="92">Produksi Cabai Besar (kuintal)</option>
        <option value="93">Produksi Cabai Keriting (kuintal)</option>
        <option value="94">Produksi Cabai Rawit (kuintal)</option>
        <option value="95">Produksi Jamur (kuintal)</option>
        <option value="96">Produksi Kacang Panjang (kuintal)</option>
        <option value="97">Produksi Kangkung (kuintal)</option>
        <option value="98">Produksi Ketimun (kuintal)</option>
        <option value="99">Produksi Petsai (kuintal)</option>
        <option value="100">Produksi Terung (kuintal)</option>
        <option value="101">Luas Panen Jahe (m2)</option>
        <option value="102">Luas Panen Kunyit (m2)</option>
        <option value="103">Luas Panen Lengkuas (m2)</option>
        <option value="104">Luas Panen Serai (m2)</option>
        <option value="105">Produksi Jahe (kg)</option>
        <option value="106">Produksi Kunyit (kg)</option>
        <option value="107">Produksi Lengkuas (kg)</option>
        <option value="108">Produksi Serai (kg)</option>
        <option value="109">Luas Panen Melati (m2)</option>
        <option value="110">Luas Panen Palem (pohon)</option>
        <option value="111">Luas Panen Pedang-pedangan (m2)</option>
        <option value="112">Produksi Melati (m2)</option>
        <option value="113">Produksi Palem (pohon)</option>
        <option value="114">Produksi Pedang-pedangan (m2)</option>
        <option value="115">Produksi Alpukat (kuintal)</option>
        <option value="116">Produksi Belimbing (kuintal)</option>
        <option value="117">Produksi Durian (kuintal)</option>
        <option value="118">Produksi Jambu Air (kuintal)</option>
        <option value="119">Produksi Jambu Biji (kuintal)</option>
        <option value="120">Produksi Jengkol (kuintal)</option>
        <option value="121">Produksi Jeruk Siam (kuintal)</option>
        <option value="122">Produksi Mangga (kuintal)</option>
        <option value="123">Produksi Manggis (kuintal)</option>
        <option value="124">Produksi Markisa (kuintal)</option>
        <option value="125">Produksi Melinjo (kuintal)</option>
        <option value="126">Produksi Nangka (kuintal)</option>
        <option value="127">Produksi Nanas (kuintal)</option>
        <option value="128">Produksi Pepaya (kuintal)</option>
        <option value="129">Produksi Petai (kuintal)</option>
        <option value="130">Produksi Pisang (kuintal)</option>
        <option value="131">Produksi Rambutan (kuintal)</option>
        <option value="132">Produksi Sawo (kuintal)</option>
        <option value="133">Produksi Sirsak (kuintal)</option>
        <option value="134">Produksi Sukun (kuintal)</option>
        <option value="135">Produksi Buah Naga (kuintal)</option>
        <option value="136">Luas Areal Kelapa</option>
        <option value="137">Luas Areal Karet</option>
        <option value="138">Luas Areal Lada</option>
        <option value="139">Produksi Kelapa</option>
        <option value="140">Produksi Karet</option>
        <option value="141">Produksi Lada</option>
        <option value="142">Populasi Sapi</option>
        <option value="143">Populasi Kerbau</option>
        <option value="144">Populasi Kambing</option>
        <option value="145">Populasi Babi</option>
        <option value="146">Populasi Ayam Ras Pedaging</option>
        <option value="147">Populasi Ayam Ras Petelur</option>
        <option value="148">Populasi Ayam Kampung</option>
        <option value="149">Populasi Itik</option>
        <option value="150">Produksi Telur (butir)</option>
        `
                $('#komponen').html(option)

            } else if (kategori == 6) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="151">Jumlah Industri Besar</option>
        <option value="152">Jumlah Tenaga Kerja</option>
        <option value="153">Jumlah Industri Kecil</option>
        `
                $('#komponen').html(option)

            } else if (kategori == 7) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="154">Jumlah Restoran</option>
        <option value="155">Jumlah Objek Wisata</option>
        <option value="156">Jumlah Hotel</option>
        <option value="157">Jumlah Kamar Hotel</option>

        `
                $('#komponen').html(option)

            } else if (kategori == 8) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="158">Jumlah Kantor Pos Pemantu</option>
        <option value="159">Jumlah Tower</option>
        <option value="160">Jumlah Warnet</option>
        `
                $('#komponen').html(option)

            } else if (kategori == 9) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="161">Jumlah Koperasi</option>
        <option value="162">Nilai Pajak (Rupiah)</option>
        `
                $('#komponen').html(option)

            } else if (kategori == 10) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="163">Jumlah Pasar Tradisional</option>
        <option value="164">Jumlah Toko Modern</option>
        `
                $('#komponen').html(option)

            }


        })
        $('#komponen').change((e) => {
            tahun = $('#tahun').val()
            kategori = $('#kategori').val()
            komponen = $('#komponen').val()
            kec(tahun, kategori, komponen)
        })

        function kec(tahun, kategori, komponen) {

            $.get('/home/getDataKecamatan', {
                kategori,
                tahun,
                komponen
            }, data => {
                var container = L.DomUtil.get('map');
                if (container != null) {
                    container._leaflet_id = null;
                }
                $('#containermap').html(`<div id='map'></div>`)
                var highlightLayer;

                function highlightFeature(e) {
                    highlightLayer = e.target;

                    if (e.target.feature.geometry.type === 'LineString') {
                        highlightLayer.setStyle({
                            color: '#fbfaf2',
                        });
                    } else {
                        highlightLayer.setStyle({
                            fillColor: '#fbfaf2',
                            fillOpacity: 1
                        });
                    }
                    highlightLayer.openPopup();
                }

                var map = L.map('map', {
                    zoomControl: true,
                    maxZoom: 28,
                    minZoom: 1
                }).fitBounds([
                    [0.8368203789839199, 104.3379799344011],
                    [0.9967143394315556, 104.64964037973276]
                ]);

                var hash = new L.Hash(map);
                map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
                var autolinker = new Autolinker({
                    truncate: {
                        length: 30,
                        location: 'smart'
                    }
                });
                var bounds_group = new L.featureGroup([]);

                function setBounds() {}
                map.createPane('pane_OSMStandard_0');
                map.getPane('pane_OSMStandard_0').style.zIndex = 400;
                var layer_OSMStandard_0 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    pane: 'pane_OSMStandard_0',
                    opacity: 1.0,
                    attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
                    minZoom: 1,
                    maxZoom: 28,
                    minNativeZoom: 0,
                    maxNativeZoom: 19
                });
                layer_OSMStandard_0;
                map.addLayer(layer_OSMStandard_0);

                function pop_final_kec_2022121721_1(feature, layer) {
                    layer.on({
                        mouseout: function(e) {
                            for (i in e.target._eventParents) {
                                e.target._eventParents[i].resetStyle(e.target);
                            }
                            if (typeof layer.closePopup == 'function') {
                                layer.closePopup();
                            } else {
                                layer.eachLayer(function(feature) {
                                    feature.closePopup()
                                });
                            }
                        },
                        mouseover: highlightFeature,
                    });
                    keys = Object.keys(feature.properties)

                    tr = `
                            <tr>
                                <td colspan="2">Kecamatan ` + (feature.properties['nama_kec'] !== null ? autolinker.link(feature.properties['nama_kec'].toLocaleString()) : '') + `</td>
                            </tr>
                    `
                    keys.map(key => {
                        if (!['nama_kec', 'kode_kec', 'tahun'].includes(key)) {
                            tr += `
                                <tr>
                                    <td>` + key + `</td>
                                    <td> : ` + (feature.properties[key] !== null ? autolinker.link(feature.properties[key].toLocaleString()) : '') + `</td>
                                </tr>
                            `
                        }
                    })
                    var popupContent = `<table>
                            ` + tr + `
                        </table>`;
                    layer.bindPopup(popupContent, {
                        maxHeight: 400
                    });
                }

                function style_final_kec_2022121721_1_0() {
                    return {
                        pane: 'pane_final_kec_2022121721_1',
                        opacity: 1,
                        color: 'rgba(205,170,129,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 6.0,
                        fill: true,
                        fillOpacity: 1,
                        fillColor: 'rgba(51,84,136,1.0)',
                        interactive: true,
                    }
                }
                map.createPane('pane_final_kec_2022121721_1');
                map.getPane('pane_final_kec_2022121721_1').style.zIndex = 401;
                map.getPane('pane_final_kec_2022121721_1').style['mix-blend-mode'] = 'normal';
                json_final_kec_2022121721_1.features.map(feature => {
                    feature.properties = data.find(de => feature.properties.kode_kec == de.kode_kec)
                })
                var layer_final_kec_2022121721_1 = new L.geoJson(json_final_kec_2022121721_1, {
                    attribution: '',
                    interactive: true,
                    dataVar: 'json_final_kec_2022121721_1',
                    layerName: 'layer_final_kec_2022121721_1',
                    pane: 'pane_final_kec_2022121721_1',
                    onEachFeature: pop_final_kec_2022121721_1,
                    style: style_final_kec_2022121721_1_0,
                });
                bounds_group.addLayer(layer_final_kec_2022121721_1);
                map.addLayer(layer_final_kec_2022121721_1);
                setBounds();
            })
        }


        $('#tahun1').change(e => {
            tahun1 = $().val()
            if (tahun1 == '') {
                option = ``
            } else {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="1">Geografi</option>
        <option value="2">Pemerintahan</option>
        <option value="3">Penduduk dan Ketenagakerjaan</option>
        <option value="4">Sosial dan Kesejahteraan Rakyat</option>
        <option value="5">Pariwisata</option>
        <option value="6">Keuangan</option>
        `
            }
            $('#kategori1').html(option)
        })

        $('#kategori1').change((e) => {
            kategori1 = $(e.target).val()
            if (kategori1 == 1) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="1">Luas Daerah (km2)</option>
        <option value="2">Jarak ke Kantor Kecamatan (km)</option>
        <option value="3">Jarak ke Pusat Kota Tanjungpinang (km)</option>
        <option value="4">Tinggi Wilayah (mdpl)</option>
        `
                $('#komponen1').html(option)
            } else if (kategori1 == 2) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="5">Jumlah RW</option>
        <option value="6">Jumlah RT</option>
        <option value="7">Jumlah PNS</option>
        `
                $('#komponen1').html(option)
            } else if (kategori1 == 3) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="8">Jumlah Penduduk</option>
        <option value="9">Kepadatan Penduduk per km2</option>
        <option value="10">Rasio Jenis Kelamin</option>
        `
                $('#komponen1').html(option)
            } else if (kategori1 == 4) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="11">Jumlah TK</option>
        <option value="12">Jumlah SD</option>
        <option value="13">Jumlah SMP</option>
        <option value="14">Jumlah SMA</option>
        <option value="15">Jumlah SMK</option>
        <option value="16">Jumlah Universitas</option>
        <option value="17">Jumlah Masjid</option>
        <option value="18">Jumlah Surau</option>
        <option value="19">Jumlah Gereja Katolik</option>
        <option value="20">Jumlah Gereja Protestan</option>
        <option value="21">Jumlah Vihara</option>
        <option value="22">Jumlah Klenteng</option>
        `
                $('#komponen1').html(option)
            } else if (kategori1 == 5) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="23">Jumlah Hotel</option>
        <option value="24">Jumlah Wisma</option>
        <option value="25">Jumlah Kamar Hotel</option>
        `
                $('#komponen1').html(option)
            } else if (kategori1 == 6) {
                option = `
        <option disabled="" selected="">Pilih</option>
        <option value="26">Nilai Pajak (Rupiah)</option>
        `
                $('#komponen1').html(option)
            }

        })
        $('#komponen1').change((e) => {
            tahun1 = $('#tahun1').val()
            kategori1 = $('#kategori1').val()
            komponen1 = $('#komponen1').val()
            kel(tahun1, kategori1, komponen1)
        })

        function kel(tahun1, kategori1, komponen1) {
            $.get('/home/getDataKelurahan', {
                kategori1,
                tahun1,
                komponen1
            }, data => {
                var container = L.DomUtil.get('map1');
                if (container != null) {
                    container._leaflet_id = null;
                }
                $('#containermap').html(`<div id='map1'></div>`)
                var highlightLayer;

                function highlightFeature(e) {
                    highlightLayer = e.target;

                    if (e.target.feature.geometry.type === 'LineString') {
                        highlightLayer.setStyle({
                            color: '#fbfaf2',
                        });
                    } else {
                        highlightLayer.setStyle({
                            fillColor: '#fbfaf2',
                            fillOpacity: 1
                        });
                    }
                    highlightLayer.openPopup();
                }

                var map = L.map('map1', {
                    zoomControl: true,
                    maxZoom: 28,
                    minZoom: 1
                }).fitBounds([
                    [0.8368203789839199, 104.3379799344011],
                    [0.9967143394315556, 104.64964037973276]
                ]);

                var hash = new L.Hash(map);
                map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
                var autolinker = new Autolinker({
                    truncate: {
                        length: 30,
                        location: 'smart'
                    }
                });
                var bounds_group = new L.featureGroup([]);

                function setBounds() {}
                map.createPane('pane_OSMStandard_0');
                map.getPane('pane_OSMStandard_0').style.zIndex = 400;
                var layer_OSMStandard_0 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    pane: 'pane_OSMStandard_0',
                    opacity: 1.0,
                    attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
                    minZoom: 1,
                    maxZoom: 28,
                    minNativeZoom: 0,
                    maxNativeZoom: 19
                });
                layer_OSMStandard_0;
                map.addLayer(layer_OSMStandard_0);

                function pop_final_desa_2022121721_1(feature, layer) {
                    layer.on({
                        mouseout: function(e) {
                            for (i in e.target._eventParents) {
                                e.target._eventParents[i].resetStyle(e.target);
                            }
                            if (typeof layer.closePopup == 'function') {
                                layer.closePopup();
                            } else {
                                layer.eachLayer(function(feature) {
                                    feature.closePopup()
                                });
                            }
                        },
                        mouseover: highlightFeature,
                    });

                    keys = Object.keys(feature.properties)

                    tr = `
                            <tr>
                                <td colspan="2">Kelurahan ` + (feature.properties['nama_kel'] !== null ? autolinker.link(feature.properties['nama_kel'].toLocaleString()) : '') + `</td>
                            </tr>
                    `
                    keys.map(key => {
                        if (!['nama_kel', 'kode_kel', 'tahun'].includes(key)) {
                            tr += `
                                <tr>
                                    <td>` + key + `</td>
                                    <td> : ` + (feature.properties[key] !== null ? autolinker.link(feature.properties[key].toLocaleString()) : '') + `</td>
                                </tr>
                            `
                        }
                    })
                    var popupContent = `<table>
                            ` + tr + `
                        </table>`;
                    layer.bindPopup(popupContent, {
                        maxHeight: 400
                    });
                }

                function style_final_desa_2022121721_1_0() {
                    return {
                        pane: 'pane_final_desa_2022121721_1',
                        opacity: 1,
                        color: 'rgba(205,170,129,1.0)',
                        dashArray: '',
                        lineCap: 'butt',
                        lineJoin: 'miter',
                        weight: 6.0,
                        fill: true,
                        fillOpacity: 1,
                        fillColor: 'rgba(51,84,136,1.0)',
                        interactive: true,
                    }
                }
                map.createPane('pane_final_desa_2022121721_1');
                map.getPane('pane_final_desa_2022121721_1').style.zIndex = 401;
                map.getPane('pane_final_desa_2022121721_1').style['mix-blend-mode'] = 'normal';
                json_final_desa_2022121721_1.features.map(feature => {
                    feature.properties = data.find(de => feature.properties.kode_kel == de.kode_kel)
                })
                var layer_final_desa_2022121721_1 = new L.geoJson(json_final_desa_2022121721_1, {
                    attribution: '',
                    interactive: true,
                    dataVar: 'json_final_desa_2022121721_1',
                    layerName: 'layer_final_desa_2022121721_1',
                    pane: 'pane_final_desa_2022121721_1',
                    onEachFeature: pop_final_desa_2022121721_1,
                    style: style_final_desa_2022121721_1_0,
                });
                bounds_group.addLayer(layer_final_desa_2022121721_1);
                map.addLayer(layer_final_desa_2022121721_1);
                setBounds();
            })
        }
    </script>
</body>

</html>