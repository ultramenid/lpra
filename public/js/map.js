
var map = L.map('map', {
    center: [0.7893, 112.5213],
    zoom: 5.4,
    // attributionControl: false,
    zoomControl: false
  });

  new L.bmSwitcher([
    {
      layer:  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
        detectRetina: true,
        attribution: 'KPA & Auriga',
        maxNativeZoom: 17}).addTo(map),
      icon: '../assets/esri-satelit.png',
      name: ''
    },
    {
      layer: L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3'],
        attribution: 'KPA & Auriga'
    }),
      icon: '../assets/google-satelit.png',
      name: ''
    },
    {
      layer: L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        detectRetina: true,
        attribution: 'KPA & Auriga',
        maxNativeZoom: 17
    }),
      icon: '../assets/osm.png',
      name: ''
    },
  ], { position: 'bottomleft' }).addTo(map);



var hgu = L.tileLayer.wms('https://geoserver.kpa.or.id/geoserver/wms', {
        layers: 'lpra:hgu_bpn_2019',
        transparent: true,
        format: 'image/png'
})

var IUPHHK_adm = L.tileLayer.wms('https://geoserver.kpa.or.id/geoserver/wms', {
        layers: 'lpra:iuphhk_adm',
        transparent: true,
        format: 'image/png'
})

var poly = L.tileLayer.wms('https://geoserver.kpa.or.id/geoserver/wms', {
    layers: 'lpra:20231201_LPRA_11_45',
    transparent: true,
    format: 'image/png'
}).addTo(map);

var forestADM = L.tileLayer.betterWms('https://geoserver.kpa.or.id/geoserver/wms', {
        layers: 'lpra:forest_estate_adm',
        transparent: true,
        format: 'image/png'
})

$(document).ready(function () {

// checkbox section
    $('#kawasanhutan:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            document.getElementById("legendKawasanhutan").style.display = "block";
            document.getElementById("map").style.cursor = "pointer";
            map.addLayer(forestADM)
        } else {
            document.getElementById("legendKawasanhutan").style.display = "none";
            document.getElementById("map").style.cursor = "auto";

            map.removeLayer(forestADM)
        }
    });
    $('#HGU:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            document.getElementById("legendHGU").style.display = "block";
            map.addLayer(hgu)
        } else {
            document.getElementById("legendHGU").style.display = "none";
            map.removeLayer(hgu)
        }
    });
    $('#PBPH:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            document.getElementById("legendPBPH").style.display = "block";
            map.addLayer(IUPHHK_adm)
        } else {
            document.getElementById("legendPBPH").style.display = "none";
            map.removeLayer(IUPHHK_adm)
        }
    });

    $('#LPRA:checkbox').on('change', function() {
        var checkbox = $(this);
        // toggle the layer
        if ($(checkbox).is(':checked')) {
            document.getElementById("legendLPRA").style.display = "block";
            map.addLayer(poly)
        } else {
            document.getElementById("legendLPRA").style.display = "none";
            map.removeLayer(poly)
        }
    });
});


var pruneCluster = new PruneClusterForLeaflet();
pruneCluster.BuildLeafletClusterIcon = function(cluster) {
  var e = new L.Icon.MarkerCluster();

  e.stats = cluster.stats;
  e.population = cluster.population;
  return e;
};


var colors = ['#16DB65','#960200'],
    pi2 = Math.PI * 2;

pruneCluster.Cluster.Size = 50;
L.Icon.MarkerCluster = L.Icon.extend({
    options: {
        iconSize: new L.Point(44, 44),

    },

    createIcon: function () {
        // based on L.Icon.Canvas from shramov/leaflet-plugins (BSDÂ licence)
        var e = document.createElement('canvas');
        this._setIconStyles(e, 'icon');
        var s = this.options.iconSize;
        e.width = s.x;
        e.height = s.y;
        this.draw(e.getContext('2d'), s.x, s.y);
        return e;
    },

    createShadow: function () {
        return null;
    },

    draw: function(canvas, width, height) {

        var lol = 0;

        var start = 0;
        for (var i = 0, l = colors.length; i < l; ++i) {

            var size = this.stats[i] / this.population;


            if (size > 0) {
                canvas.beginPath();
                canvas.moveTo(22, 22);
                canvas.fillStyle = colors[i];
                var from = start + 0.14,
                    to = start + size * pi2;

                if (to < from) {
                    from = start;
                }
                canvas.arc(22,22,22, from, to);

                start = start + size*pi2;
                canvas.lineTo(22,22);
                canvas.fill();
                canvas.closePath();
            }

        }

        canvas.beginPath();
        canvas.fillStyle = 'white';
        canvas.arc(22, 22, 18, 0, Math.PI*2);
        canvas.fill();
        canvas.closePath();

        canvas.fillStyle = '#555';
        canvas.textAlign = 'center';
        canvas.textBaseline = 'middle';
        canvas.font = 'bold 12px sans-serif';

        canvas.fillText(this.population, 22, 22, 40);
    }
});

    const stylehutan = `
    background-color: #16DB65;
    width: 1.5rem;
    height: 1.5rem;
    display: block;
    position: relative;
    top: 0.9rem;
    border-radius: 3rem 3rem 0;
    transform: rotate(45deg);
    border: 1px solid #FFFFFF`

    const stylenonhutan = `
    background-color: #960200;
    width: 1.5rem;
    height: 1.5rem;
    display: block;
    position: relative;
    top: 0.9rem;
    border-radius: 3rem 3rem 0;
    transform: rotate(45deg);
    border: 1px solid #FFFFFF`

    const iconhutan = L.divIcon({
        className: "iconhutan",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
        html: `<span style="${stylehutan}" />`
    })

    const iconnonhutan = L.divIcon({
        className: "iconnonhutan",
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41],
        html: `<span style="${stylenonhutan}" />`
    })

String.prototype.toProperCase = function () {
    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

String.prototype.toSlug = function (separator = "-") {
    return this
        .toString()
        .normalize('NFD')                   // split an accented letter in the base letter and the acent
        .replace(/[\u0300-\u036f]/g, '')   // remove all previously split accents
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9 ]/g, separator)   // remove all chars not letters, numbers and spaces (to be replaced)
        .replace(/\s+/g, separator);
};


const popupContent = function(data){
    return '<section class="">'+
            '<div class=" z-20">'+
                ' <h1 class="font-semibold capitalize" style="font-size:22px">LPRA '+data.desa_kel+'</h1>'+
                '<div class="w-full flex gap-2" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px">Luas LPRA <a class=" font-bold" style="color: black !important;"> '+data.luas_ha+' ha</a></span>'+
                    '<span class="text-gray-900" style="font-size:14px">Jumlah Keluarga <a class=" font-bold" style="color: black !important;">  '+data.subjek_kk+' kk</a></span>'+
                '</div>'+
                '<div class=" flex flex-col" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px">Penggunaan Tanah</span>'+
                    '<h1 class="lowercase font-bold" style="font-size:14px; color: black !important;margin-top: -3px;">'+data.tata_guna+'</h1>'+
                '</div>'+
                '<div class=" flex flex-col" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px"> Tipologi</span>'+
                    '<h1 class="lowercase font-bold" style="font-size:14px; color: black !important;margin-top: -3px;">'+data.tipologi+'</h1>'+
                '</div>'+
                '<div class=" flex flex-col" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px">Berkonflik dengan</span>'+
                    '<h1 class="lowercase font-bold" style="font-size:14px; color: black !important;margin-top: -3px;">'+data.perusahaan+'</h1>'+
                '</div>'+
                '<div class=" flex flex-col" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px">Pengusul</span>'+
                    '<h1 class="lowercase font-bold" style="font-size:14px; color: black !important;margin-top: -3px;">'+data.organisasi+'</h1>'+
                '</div>'+
                '<div class=" flex flex-col" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px">Lokasi</span>'+
                    '<h1 class=" font-bold" style="font-size:14px; color: black !important; margin-top: -3px;">'+data.desa_kel.toProperCase()+', Kec '+data.kab_kota.toProperCase()+', Kab/Kota '+data.kec.toProperCase()+',  '+data.provinsi.toProperCase()+'</h1>'+
                '</div>'+
                '<div class=" flex flex-col" style="margin-top: 7px;">'+
                    '<span class="text-gray-900" style="font-size:14px">Profil</span>'+
                    '<a target="_blank" href="'+baseurl+'/profile/'+data.orig_fid+'" style="color: red; font-size:14px; cursor: pointer;">Lebih detail.</a>'+
                '</div>'+
            '</div>'+
        '</section>'

}

pruneCluster.PrepareLeafletMarker = function (marker, data, category) {
    marker.on('click', function(){
        console.log(data.tooltip)
        // map.flyTo(marker._latlng,13);

    });
    marker.setIcon(data.icon)
    if (marker.getPopup()) {
        marker.setPopupContent(data.popup);
    } else {
        marker.bindPopup(data.popup);

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
          }else{
            marker.bindTooltip('LPRA '+data.tooltip);
          }

    }
};

var markershutan = [];
var markersnonhutan = [];



function handleJson(data) {
    selectedArea = L.geoJson(data, {
        onEachFeature: function(feature, layer) {
                // console.log(feature.properties)
                if(feature.properties.status == 'HUTAN'){
                    const hutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                                icon: iconhutan,
                                tooltip: feature.properties.desa_kel,
                                popup: popupContent(feature.properties),
                                });
                                hutan.category = 0;
                                markershutan.push(hutan);
                                pruneCluster.RegisterMarker(hutan);
                }else if(feature.properties.status == 'NON-HUTAN'){
                    const nonhutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                        icon: iconnonhutan,
                        tooltip: feature.properties.desa_kel,
                        popup: popupContent(feature.properties),
                        });
                        nonhutan.category = 1;
                        markersnonhutan.push(nonhutan);
                        pruneCluster.RegisterMarker(nonhutan);
                }

        }
    })
    map.addLayer(pruneCluster);
}

    $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
        type: 'GET',
        data: {
            service: 'WFS',
            version: '1.1.0',
            request: 'GetFeature',
            typename: 'lpra:20231203_LPRA_0107_point',
            srsname: 'EPSG:4326',
            CQL_FILTER: (data == 'Kawasan Hutan') ? "status= 'HUTAN'" : (data == 'Kebun / APL Lainnya') ? "status= 'NON-HUTAN'" : "status like '%%'",
            outputFormat: 'text/javascript',
        },
            dataType: 'jsonp',
            jsonpCallback:'callback:handleJson',
            jsonp:'format_options'
    });




      // the ajax callback function


    function handleHutan(data) {
        selectedArea = L.geoJson(data, {
            onEachFeature: function(feature, layer) {
                        const hutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                            icon: iconhutan,
                            tooltip: feature.properties.tahapan,
                            popup: popupContent(feature.properties)
                        });
                            hutan.category = 0;
                            markershutan.push(hutan);
                            pruneCluster.RegisterMarker(hutan);
                    }

        })
        pruneCluster.ProcessView();

    }
    function handleKebun(data) {
        selectedArea = L.geoJson(data, {
            onEachFeature: function(feature, layer) {
                        const nonhutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                            icon: iconnonhutan,
                            tooltip: feature.properties.tahapan,
                            popup: popupContent(feature.properties)
                        });
                            nonhutan.category = 1;
                            markersnonhutan.push(nonhutan);
                            pruneCluster.RegisterMarker(nonhutan);
                    }

        })
        pruneCluster.ProcessView();

    }
    function resetHutan(data) {
        // console.log('hutan')
        selectedArea = L.geoJson(data, {
            onEachFeature: function(feature, layer) {
                        const hutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                            icon: iconhutan,
                            tooltip: feature.properties.tahapan,
                            popup: popupContent(feature.properties)
                        });
                            hutan.category = 0;
                            markershutan.push(hutan);
                            pruneCluster.RegisterMarker(hutan);
                    }

        })
        pruneCluster.ProcessView();

    }
    function resetKebun(data) {
        // console.log('hutan')
        selectedArea = L.geoJson(data, {
            onEachFeature: function(feature, layer) {
                        const nonhutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                            icon: iconnonhutan,
                            tooltip: feature.properties.tahapan,
                            popup: popupContent(feature.properties)
                        });
                            nonhutan.category = 1;
                            markersnonhutan.push(nonhutan);
                            pruneCluster.RegisterMarker(nonhutan);
                    }

        })
        pruneCluster.ProcessView();

    }
    function handleReset(data) {
        selectedArea = L.geoJson(data, {
            onEachFeature: function(feature, layer) {
                // console.log(feature.properties)
                if(feature.properties.status == 'HUTAN'){
                    const hutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                                icon: iconhutan,
                                tooltip: feature.properties.status,
                                popup: popupContent(feature.properties),
                                });
                                hutan.category = 0;
                                markershutan.push(hutan);
                                pruneCluster.RegisterMarker(hutan);
                }else if(feature.properties.status == 'NON-HUTAN'){
                    const nonhutan = new PruneCluster.Marker(feature.properties.lat, feature.properties.long, {
                        icon: iconnonhutan,
                        tooltip: feature.properties.status,
                        popup: popupContent(feature.properties),
                        });
                        nonhutan.category = 1;
                        markersnonhutan.push(nonhutan);
                        pruneCluster.RegisterMarker(nonhutan);
                }
            }
        })
        pruneCluster.ProcessView();

    }

function submitLayer(){
    var status = document.getElementById("status").value;
    var hutan = document.getElementById("hutan").value;
    var kebun = document.getElementById("kebun").value;
    if(status == 'Kawasan Hutan'){
        pruneCluster.RemoveMarkers(markershutan);
        pruneCluster.RemoveMarkers(markersnonhutan);
        pruneCluster.ProcessView();
        Livewire.emit('test', hutan,  status )

        // console.log(hutan.toUpperCase())
        $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
        type: 'GET',
            data: {
            service: 'WFS',
            version: '1.1.1',
            request: 'GetFeature',
            typename: 'kpa:20231203_LPRA_0107_point',
            CQL_FILTER: "tipologi = '"+hutan.toUpperCase()+"' AND status= 'HUTAN'" ,
            srsname: 'EPSG:4326',
            outputFormat: 'text/javascript',
            },
            dataType: 'jsonp',
            jsonpCallback:'callback:handleHutan',
            jsonp:'format_options'
        });

        if(hutan == 'kosong'){
            Livewire.emit('test', hutan,  status)
            $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
            type: 'GET',
                data: {
                service: 'WFS',
                version: '1.1.1',
                request: 'GetFeature',
                typename: 'lpra:20231203_LPRA_0107_point',
                CQL_FILTER: "status= 'HUTAN'" ,
                srsname: 'EPSG:4326',
                outputFormat: 'text/javascript',
                },
                dataType: 'jsonp',
                jsonpCallback:'callback:resetHutan',
                jsonp:'format_options'
            });
        }


    }else if(status == 'Kebun / APL Lainnya'){
        pruneCluster.RemoveMarkers(markershutan);
        pruneCluster.RemoveMarkers(markersnonhutan);
        pruneCluster.ProcessView();
        Livewire.emit('test', kebun, status)

        // console.log(hutan.toUpperCase())
        $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
        type: 'GET',
            data: {
            service: 'WFS',
            version: '1.1.1',
            request: 'GetFeature',
            typename: 'lpra:20231203_LPRA_0107_point',
            CQL_FILTER: "tipologi = '"+kebun.toUpperCase()+"' AND status= 'NON-HUTAN'" ,
            srsname: 'EPSG:4326',
            outputFormat: 'text/javascript',
            },
            dataType: 'jsonp',
            jsonpCallback:'callback:handleKebun',
            jsonp:'format_options'
        });
        if(kebun == 'kosong'){
            Livewire.emit('test', kebun, status)

            $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
            type: 'GET',
                data: {
                service: 'WFS',
                version: '1.1.1',
                request: 'GetFeature',
                typename: 'lpra:20231203_LPRA_0107_point',
                CQL_FILTER: "status= 'NON-HUTAN'" ,
                srsname: 'EPSG:4326',
                outputFormat: 'text/javascript',
                },
                dataType: 'jsonp',
                jsonpCallback:'callback:resetKebun',
                jsonp:'format_options'
            });
        }
    }

}

function resetLayer(){
        console.log(data)
        var status = document.getElementById("status");
        var hutan = document.getElementById("hutan");
        var kebun = document.getElementById("kebun");
        status.value = (data == 'all') ? "kosong" : data;
        hutan.value = "kosong";
        kebun.value = "kosong";
        map.flyTo([0.7893, 112.5213],5)
        Livewire.emit('test', null, (data == 'all') ? "kosong" : data)
        pruneCluster.RemoveMarkers(markershutan);
        pruneCluster.RemoveMarkers(markersnonhutan);
        $.ajax('https://geoserver.kpa.or.id/geoserver/wfs',{
        type: 'GET',
            data: {
            service: 'WFS',
            version: '1.1.1',
            request: 'GetFeature',
            typename: 'lpra:20231203_LPRA_0107_point',
            srsname: 'EPSG:4326',
            CQL_FILTER: (data == 'Kawasan Hutan') ? "status= 'HUTAN'" : (data == 'Kebun / APL Lainnya') ? "status= 'NON-HUTAN'" : "status like '%%'",
            outputFormat: 'text/javascript',
            },
            dataType: 'jsonp',
            jsonpCallback:'callback:handleReset',
            jsonp:'format_options'
        });
}

