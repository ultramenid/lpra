
var map = L.map('map', {
    center: [0.7893, 118.5213],
    zoom: 5.4,
    // attributionControl: false,
    zoomControl: true
  });


var planet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png', {
    detectRetina: true,
    attribution: 'Auriga & KPA',
    maxNativeZoom: 17
}).addTo(map);

var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3'],
    attribution: 'Auriga & KPA'
})

var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    detectRetina: true,
    attribution: 'Auriga & KPA',
    maxNativeZoom: 17
});

var forestADM = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: '	simontini:Forest_estate_adm',
        transparent: true,
        format: 'image/png'
})

var hgu = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'kpa:HGU_BPN_2019',
        transparent: true,
        format: 'image/png'
})

var IUPHHK_adm = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
        layers: 'simontini:IUPHHK_adm',
        transparent: true,
        format: 'image/png'
})

var poly = L.tileLayer.wms('https://aws.simontini.id/geoserver/wms', {
    layers: 'kpa:20231201_LPRA_11_45',
    transparent: true,
    format: 'image/png'
}).addTo(map);


var baseLayers = {
    "OpenStreetMap": osm,
    "Esri Satellite": planet,
    "Google Sattelite" : googleSat
};

var overlays = {
    "Kawasan Hutan": forestADM,
    "HGU" : hgu,
    "PBPH ": IUPHHK_adm,
    "POLYGON LPRA": poly,
};

L.control.layers(baseLayers, overlays, {position: 'bottomleft'}).addTo(map);




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

// console.log(slugify('LPRA Buwun Mas_Lombok Barat_NTB', '-'))

const popupContent = function(data){
    return  '<div class="flex flex-col text-black w-full">'+
            ' <h1 class="text-xl font-semibold capitalize">LPRA '+data.desa_kel+'.</h1>'+
                '<div class="mt-4 flex space-x-2"><a style="color:black" class="font-semibold"> Luas LPRA:</a> <a style="color:black"> '+data.luas_ha+' ha</a></div>'+
                '<div class=" flex space-x-2"><a style="color:black" class="font-semibold">Jumlah Keluarga:</a> <a  style="color:black">'+data.subjek_kk+' kk</a></div>'+
                '<div class="flex space-x-2">'+
                '<a style="color:black" class="font-semibold">Penggunaan Tanah:</a> <a style="color:black">'+data.tata_guna+'.</a>'+
                '</div>'+
                    '<div class="flex space-x-2">'+
                    '<a style="color:black" class="font-semibold">Tipologi: </a> <a style="color:black">'+data.tipologi+'</a>' +
                '</div>'+
                '</div>'+
                    '<div class="flex space-x-2">'+
                    '<a style="color:black" class="font-semibold">Berkonflik dengan: </a> <a style="color:black">'+data.perusahaan+'</a>' +
                '</div>'+
                '</div>'+
                    '<div class="flex space-x-2">'+
                    '<a style="color:black" class="font-semibold">Pengusul: </a> <a style="color:black">'+data.organisasi+'</a>' +
                '</div>'+
                '<div class="flex space-x-2">'+
                    '<a style="color:black" class="font-semibold">Lokasi: </a> <a style="color:black">Desa '+data.desa_kel.toProperCase()+', Kec '+data.kab_kota.toProperCase()+', Kab/Kota '+data.kec.toProperCase()+',  '+data.provinsi.toProperCase()+'.</a>'+
                '</div>'+
                '<div class="flex space-x-2">'+
                    '<a style="color:black" class="font-semibold">Profil: </a> <a href="profile/'+data.orig_fid+'/'+data.desa_kel+'" style="color: red">Lebih detail.</a>'+
                '</div>'+
                '</div>'+
            '</div>'
}

pruneCluster.PrepareLeafletMarker = function (marker, data, category) {
    marker.on('click', function(){
        // console.log(marker._latlng)
        map.flyTo(marker._latlng,13);
    });
    marker.setIcon(data.icon)
    if (marker.getPopup()) {
        marker.setPopupContent(data.popup);
    } else {
        marker.bindPopup(data.popup);

        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
          }else{
            marker.bindTooltip(data.popup);
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
    map.addLayer(pruneCluster);
}

    $.ajax('https://aws.simontini.id/geoserver/wfs',{
        type: 'GET',
        data: {
            service: 'WFS',
            version: '1.1.0',
            request: 'GetFeature',
            typename: 'kpa:20231203_LPRA_0107_point',
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
        $.ajax('https://aws.simontini.id/geoserver/wfs',{
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
            $.ajax('https://aws.simontini.id/geoserver/wfs',{
            type: 'GET',
                data: {
                service: 'WFS',
                version: '1.1.1',
                request: 'GetFeature',
                typename: 'kpa:20231203_LPRA_0107_point',
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
        $.ajax('https://aws.simontini.id/geoserver/wfs',{
        type: 'GET',
            data: {
            service: 'WFS',
            version: '1.1.1',
            request: 'GetFeature',
            typename: 'kpa:20231203_LPRA_0107_point',
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

            $.ajax('https://aws.simontini.id/geoserver/wfs',{
            type: 'GET',
                data: {
                service: 'WFS',
                version: '1.1.1',
                request: 'GetFeature',
                typename: 'kpa:20231203_LPRA_0107_point',
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
        map.flyTo([0.7893, 118.5213],5)
        Livewire.emit('test', null, (data == 'all') ? "kosong" : data)
        pruneCluster.RemoveMarkers(markershutan);
        pruneCluster.RemoveMarkers(markersnonhutan);
        $.ajax('https://aws.simontini.id/geoserver/wfs',{
        type: 'GET',
            data: {
            service: 'WFS',
            version: '1.1.1',
            request: 'GetFeature',
            typename: 'kpa:20231203_LPRA_0107_point',
            srsname: 'EPSG:4326',
            CQL_FILTER: (data == 'Kawasan Hutan') ? "status= 'HUTAN'" : (data == 'Kebun / APL Lainnya') ? "status= 'NON-HUTAN'" : "status like '%%'",
            outputFormat: 'text/javascript',
            },
            dataType: 'jsonp',
            jsonpCallback:'callback:handleReset',
            jsonp:'format_options'
        });
}



//    // control that shows state info on hover
//    const info = L.control();

//    info.onAdd = function (map) {
//        this._div = L.DomUtil.create('div', 'info');
//        this.update();
//        return this._div;
//    };

//    info.update = function (props) {
//        const contents = props ? `<b>${props.provinsi}</b><br />${ data[props.provinsi.toUpperCase()]  } Kasus <sup>2</sup>` : 'Arahkan kursor ke salah satu provinsi';
//        this._div.innerHTML = `<h4>LPRA</h4>${contents}`;
//    };

//    info.addTo(map);


//    // get color depending on population density value
//    function getColor(d) {
//        return d > 20  ? '#BD0026' :
//            d > 10  ? '#BD0026' :
//            d > 7  ? '#E31A1C' :
//            d > 5   ? '#FD5E2A' :
//            d > 3   ? '#FEC24C' :
//            d > 1   ? '#FED976' :
//            d == 0 ?  '#FFFFFF' :
//            d == null ?  '#FFFFFF' :
//            '#ffeda0';

//    }

//    function style(feature) {
//        return {
//            weight: 0.8,
//            opacity: 1,
//            color: 'black',
//            dashArray: '1',
//            fillOpacity: 0.8,
//            fillColor: getColor(data[feature.properties.ProvID.toUpperCase()])
//        };
//    }

//    function customTip() {
//        this.unbindTooltip();
//        if(!this.isPopupOpen()) this.bindTooltip('Short description').openTooltip();
//    }

//    function customPop() {
//        this.unbindTooltip();
//    }



//    function highlightFeature(e) {
//        const layer = e.target;
//        // console.log(e.target.feature.properties)
//        layer.setStyle({
//            weight: 1,
//            color: 'white',
//            dashArray: '',
//            fillOpacity: 0.7
//        });

//        layer.bringToFront();
//        this.unbindTooltip();
//        if(data[e.target.feature.properties.ProvID.toUpperCase()]){
//            if(!this.isPopupOpen()) this.bindTooltip(`<b>${e.target.feature.properties.ProvID}</b><br />${ data[e.target.feature.properties.ProvID.toUpperCase()]  } LPRA`).openTooltip();
//        }else{
//            if(!this.isPopupOpen()) this.bindTooltip(`<b>${e.target.feature.properties.ProvID}</b>`).openTooltip();
//        }

//    }

//    /* global statesData */
//    const geojson = L.geoJson(statesData, {
//        style,
//        onEachFeature
//    }).addTo(map);

//    function resetHighlight(e) {
//        geojson.resetStyle(e.target);
//        info.update();
//    }

//    function zoomToFeature(e) {
//        console.log(e.target.feature.properties)
//        map.fitBounds(e.target.getBounds());
//    }

//    function onEachFeature(feature, layer) {
//        layer.on({
//            mouseover: highlightFeature,
//            mouseout: resetHighlight,
//            click: zoomToFeature
//        });
//    }

//    // map.attributionControl.addAttribution('Population data &copy; <a href="http://census.gov/">US Census Bureau</a>');


//    const legend = L.control({position: 'bottomright'});

//    legend.onAdd = function (map) {

//        const div = L.DomUtil.create('div', 'info legend');
//        const grades = [0, 1, 3, 5, 7, 10, 20];
//        const labels = [];
//        let from, to;

//        for (let i = 0; i < grades.length; i++) {
//            from = grades[i];
//            to = grades[i + 1];

//            labels.push(`<i style="background:${getColor(from + 0)}"></i> ${from}${to ? `&ndash;${to}` : '+'}`);
//        }

//        div.innerHTML = labels.join('<br>');
//        return div;
//    };

//    legend.addTo(map);
