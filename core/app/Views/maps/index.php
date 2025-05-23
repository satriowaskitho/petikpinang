<?= $this->extend('layout') ?>

<?= $this->section('head') ?>
<?php
echo '<link href="leaflet/leaflet.js" rel="stylesheet">';
echo '<script src="leaflet/leaflet.js" type="text/javascript"></script>';
?>
<?php
echo '<link href="leaflet/leaflet.css" rel="stylesheet">';
echo '<script src="leaflet/leaflet.css" type="text/css"></script>';
?>
<style>
    #tpi {
        left: 360px;
        object-fit: cover;
        position: absolute;
        top: 20px;
        height: 500px;
        width: 950px;
        margin: 30 40 0 0;
        margin-top: 100px;
    }
</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div id="tpi"></div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    var data = <?= json_encode($data) ?>;
    var nilaiMax = <?= $nilaiMax ?>;

    var map = L.map('tpi').setView({
        lat: 0.9186,
        lon: 104.4665
    }, 12);

    function getColor(d) {
        return d > 1 ? '#2E5984' :
            d > 0.5 ? '#528AAE' :
            d > 0.3 ? '#73A5C6' :
            '#91BAD6';
    }

    function style(feature) {
        return {
            weight: 5,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7,
            fillColor: getColor(parseInt(feature.properties.nilai))
        };
    }

    function onEachFeature(feature, layer) {
        layer.bindPopup("Jumlah Penduduk" + " : " + feature.properties.jumlahpenduduk + " jiwa" +
            "<br>" + feature.properties + " : " + feature.properties.jumlahpenduduk + " jiwa");
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
    }).addTo(map);

    var geojson = L.geoJson(data, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(map);

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        layer.bringToFront();
    }

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
    }

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }
</script>
<?= $this->endSection() ?>