/**
 * @file
 * getlocations_fields_search_views.js
 * @author Bob Hutchinson http://drupal.org/user/52366
 * @copyright GNU GPL
 *
 * Javascript functions for getlocations_fields module in Views
 * jquery stuff
*/
(function ($) {

  Drupal.behaviors.getlocations_fields_search_views = {
    attach: function(context) {

      // Manage Google Autocomplete
      if ($("#edit-distance-search-field").is('input') && $("#edit-distance-latitude").is('input') && $("#edit-distance-longitude").is('input')) {
        // settings
        var settings = Drupal.settings.getlocations_fields_search_views;
        // attach a geocoder
        var input_adrs = document.getElementById("edit-distance-search-field");
        var fm_adrs = '';
        var opts = {};
        if (settings.restrict_by_country > 0 && settings.country) {
          var c = {'country':settings.country};
          opts = {'componentRestrictions':c};
        }
        var ac_adrs = new google.maps.places.Autocomplete(input_adrs, opts);
        google.maps.event.addListener(ac_adrs, 'place_changed', function () {
          var place_adrs = ac_adrs.getPlace();
          var fm_adrs = place_adrs.formatted_address;
          if (settings.geocoder_enable == 2) {
            // Nominatem
            var geocoder = GeocoderJS.createGeocoder('openstreetmap');
            geocoder.geocode(fm_adrs, function (results) {
              if (results) {
                $("#edit-distance-latitude").val(results[0].latitude);
                $("#edit-distance-longitude").val(results[0].longitude);
                $("#edit-distance-search-field").val(fm_adrs);
              }
              else {
                var prm = {'!a': fm_adrs};
                var msg = Drupal.t('Geocode for (!a) was not successful', prm);
                alert(msg);
              }
            });
          }
          else if (settings.geocoder_enable == 1) {
            // full google
            fm_adrs = {'address': place_adrs.formatted_address};
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode(fm_adrs, function (results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                $("#edit-distance-latitude").val(results[0].geometry.location.lat());
                $("#edit-distance-longitude").val(results[0].geometry.location.lng());
                $("#edit-distance-search-field").val(results[0].formatted_address);
              }
              else {
                var prm = {'!a': fm_adrs, '!b': Drupal.getlocations.getGeoErrCode(status) };
                var msg = Drupal.t('Geocode for (!a) was not successful for the following reason: !b', prm);
                alert(msg);
              }
            });
          }
          else {
            //quick
            $("#edit-distance-latitude").val(place_adrs.geometry.location.lat());
            $("#edit-distance-longitude").val(place_adrs.geometry.location.lng());
            $("#edit-distance-search-field").val(fm_adrs);
          }
        });

        // search type in tooltip
        if (settings.geocoder_enable == 2) {
          msg = Drupal.t('Search by OpenStreetMap');
        }
        else if (settings.geocoder_enable == 1) {
          msg = Drupal.t('Search by Google');
        }
        else {
          msg = Drupal.t('Search by Google Maps Places');
        }
        $("#edit-distance-search-field").attr({title: msg});
      }

      //#edit-options-settings-restrict-by-country
      if ($("#edit-options-settings-restrict-by-country").is('input')) {
        if ($("#edit-options-settings-restrict-by-country").attr('checked')) {
          $("#getlocations_search_country").show();
        }
        else {
          $("#getlocations_search_country").hide();
        }
        $("#edit-options-settings-restrict-by-country").change( function() {
          if ($(this).attr('checked')) {
            $("#getlocations_search_country").show();
          }
          else {
            $("#getlocations_search_country").hide();
          }
        });
      }

      if (typeof(Drupal.settings.getlocations) !== 'undefined') {
        // work over all class 'getlocations_map_canvas'
        var gsettings = Drupal.settings.getlocations;
        $(".getlocations_map_canvas", context).once('getlocations-fields-views-search-marker-map-processed', function(index, element) {
          var elemID = $(element).attr('id');
          var key = elemID.replace(/^getlocations_map_canvas_/, '');
          // is there really a map?
          if ($("#getlocations_map_canvas_" + key).is('div')) {
            var gset = gsettings[key];
            // views_search
            if (gset.views_search_marker_enable) {
              var viewssearchmarkertoggleState = [];
              viewssearchmarkertoggleState[key] = true;
              if (! gset.views_search_marker_toggle_active) {
                viewssearchmarkertoggleState[key] = false;
              }
              $("#getlocations_toggleSearchMarker_" + key).attr('disabled', true);
            }

            if (gset.views_search_radshape_enable) {
              var viewssearchshapetoggleState = [];
              viewssearchshapetoggleState[key] = true;
              if (! gset.views_search_radshape_toggle_active) {
                viewssearchshapetoggleState[key] = false;
              }
              $("#getlocations_toggleSearchArea_" + key).attr('disabled', true);
            }
            // views_search_marker and views_search_radshape_enable
            var slat = false;
            var slon = false;
            var distance_meters = false;
            var done = false;
            if ($("#getlocations_fields_search_views_search_wrapper_" + key).is('div')) {
              slat = $("#getlocations_fields_search_views_search_latitude_" + key).html();
              slon = $("#getlocations_fields_search_views_search_longitude_" + key).html();
              distance_meters = $("#getlocations_fields_search_views_search_distance_meters_" + key).html();
            }
            if (slat && slon && distance_meters) {
              var point = new google.maps.LatLng(parseFloat(slat), parseFloat(slon));
              var lats = Drupal.getlocations.geo.earth_latitude_range(slat, slon, distance_meters);
              var lngs = Drupal.getlocations.geo.earth_longitude_range(slat, slon, distance_meters);
              // views_search_marker
              if (gset.views_search_marker_enable) {
                var gst = gset;
                gst.markdone = Drupal.getlocations.getIcon(gset.views_search_marker);
                gst.markeraction = 0;
                var vs_marker = {};
                vs_marker[key] = Drupal.getlocations.makeMarker(Drupal.getlocations_map[key], gst, slat, slon, 0, '', '', '', '', key);
                // initial setting
                if (gset.views_search_marker_toggle) {
                  if (gset.views_search_marker_toggle_active) {
                    vs_marker[key].setVisible(true);
                    viewssearchmarkertoggleState[key] = true;
                  }
                  else {
                    vs_marker[key].setVisible(false);
                    viewssearchmarkertoggleState[key] = false;
                  }
                  $("#getlocations_toggleSearchMarker_" + key).attr('disabled', false);
                  // click on this
                  $("#getlocations_toggleSearchMarker_" + key).click( function() {
                    var label = '';
                    if (viewssearchmarkertoggleState[key]) {
                      vs_marker[key].setVisible(false);
                      viewssearchmarkertoggleState[key] = false;
                      label = Drupal.t('Search marker On');
                    }
                    else {
                      vs_marker[key].setVisible(true);
                      viewssearchmarkertoggleState[key] = true;
                      label = Drupal.t('Search marker Off');
                    }
                    $(this).val(label);
                  });
                }
                else {
                  viewssearchmarkertoggleState[key] = true;
                  vs_marker[key].setVisible(true);
                }
              }
              // views_search_radshape
              if (gset.views_search_radshape_enable) {
                if ( $("#views_search_operator").is('input')) {
                  if (! gset.views_search_radshape_strokecolor.match(/^#/)) {
                    gset.views_search_radshape_strokecolor = '#' + gset.views_search_radshape_strokecolor;
                  }
                  if (! gset.views_search_radshape_fillcolor.match(/^#/)) {
                    gset.views_search_radshape_fillcolor = '#' + gset.views_search_radshape_fillcolor;
                  }
                  //views_search_operator
                  var rShape = {};
                  var op = $("#views_search_operator").val();
                  if (op == 'dist') {
                    // radius circle
                    rShape[key] = new google.maps.Circle({
                      map: Drupal.getlocations_map[key],
                      strokeColor: gset.views_search_radshape_strokecolor,
                      strokeOpacity: gset.views_search_radshape_strokeopacity,
                      strokeWeight: gset.views_search_radshape_strokeweight,
                      fillColor: gset.views_search_radshape_fillcolor,
                      fillOpacity: gset.views_search_radshape_fillopacity,
                      visible: false,
                      clickable: false
                    });

                    rShape[key].setRadius(parseInt(distance_meters));
                    rShape[key].setCenter(point);
                    if (gset.pansetting == 1) {
                      Drupal.getlocations.doBounds(Drupal.getlocations_map[key], lats[0], lngs[0], lats[1], lngs[1], true);
                    }
                    else if (gset.pansetting == 2) {
                      Drupal.getlocations.doBounds(Drupal.getlocations_map[key], lats[0], lngs[0], lats[1], lngs[1], false);
                    }
                    else if (gset.pansetting == 3) {
                      if (slat && slon) {
                        Drupal.getlocations_map[key].setCenter(point);
                      }
                    }
                    done = true;
                  }
                  else if (op == 'mbr') {
                    // rectangle
                    rShape[key] = new google.maps.Rectangle({
                      map: Drupal.getlocations_map[key],
                      strokeColor: gset.views_search_radshape_strokecolor,
                      strokeOpacity: gset.views_search_radshape_strokeopacity,
                      strokeWeight: gset.views_search_radshape_strokeweight,
                      fillColor: gset.views_search_radshape_fillcolor,
                      fillOpacity: gset.views_search_radshape_fillopacity,
                      visible: false,
                      clickable: false
                    });
                    // rectangle
                    var mcoords = [];
                    mcoords[0] = new google.maps.LatLng(parseFloat(lats[0]), parseFloat(lngs[0]));
                    mcoords[1] = new google.maps.LatLng(parseFloat(lats[1]), parseFloat(lngs[1]));
                    var b = new google.maps.LatLngBounds(mcoords[0], mcoords[1]);
                    rShape[key].setBounds(b);
                    done = true;
                  }
                  if (gset.views_search_radshape_toggle) {
                    if (gset.views_search_radshape_toggle_active) {
                      rShape[key].setVisible(true);
                      viewssearchshapetoggleState[key] = true;
                    }
                    else {
                      rShape[key].setVisible(false);
                      viewssearchshapetoggleState[key] = false;
                    }
                    $("#getlocations_toggleSearchArea_" + key).attr('disabled', false);
                    // click on this
                    $("#getlocations_toggleSearchArea_" + key).click( function() {
                      var label = '';
                      if (viewssearchshapetoggleState[key]) {
                        rShape[key].setVisible(false);
                        viewssearchshapetoggleState[key] = false;
                        label = Drupal.t('Search area On');
                      }
                      else {
                        rShape[key].setVisible(true);
                        viewssearchshapetoggleState[key] = true;
                        label = Drupal.t('Search area Off');
                      }
                      $(this).val(label);
                    });
                  }
                  else {
                    viewssearchshapetoggleState[key] = true;
                  }
                  if (done) {
                    if (viewssearchshapetoggleState[key]) {
                      rShape[key].setVisible(true);
                    }
                    else {
                      rShape[key].setVisible(false);
                    }
                  }
                }
              }
              // views_search_center
              if (gset.views_search_center) {
                Drupal.getlocations.doBounds(Drupal.getlocations_map[key], parseFloat(lats[0]), parseFloat(lngs[0]), parseFloat(lats[1]), parseFloat(lngs[1]), false);
              }
            } // end if slat && slon
          } // end is there really a map

        }); // end once

      }

      // leaflet
      if (typeof(Drupal.settings.getlocations_leaflet) !== 'undefined') {
        var gsettings = Drupal.settings.getlocations_leaflet;
        $(".getlocations_leaflet_canvas", context).once('getlocations-fields-views-search-marker-leaflet-processed', function(index, element) {
          var elemID = $(element).attr('id');
          var key = elemID.replace(/^getlocations_leaflet_canvas_/, '');
          // is there really a map?
          if ( $("#getlocations_leaflet_canvas_" + key).is('div') ) {
            var gset = gsettings[key];
            // views_search
            if (gset.map_settings.views_search_marker_enable) {
              var leafletviewssearchmarkertoggleState = [];
              leafletviewssearchmarkertoggleState[key] = true;
              if (! gset.map_settings.views_search_marker_toggle_active) {
                leafletviewssearchmarkertoggleState[key] = false;
              }
              $("#getlocations_leaflet_toggleSearchMarker_" + key).attr('disabled', true);
            }
            // do some setup
            if (gset.map_settings.views_search_radshape_enable) {
              var leafletviewssearchshapetoggleState = [];
              leafletviewssearchshapetoggleState[key] = true;
              if (! gset.map_settings.views_search_radshape_toggle_active) {
                leafletviewssearchshapetoggleState[key] = false;
              }
              $("#getlocations_leaflet_toggleSearchArea_" + key).attr('disabled', true);
            }
            // views_search_marker and views_search_radshape_enable
            var slat = false;
            var slon = false;
            var distance_meters = false;
            var done = false;
            if ($("#getlocations_fields_search_views_search_wrapper_" + key).is('div')) {
              slat = $("#getlocations_fields_search_views_search_latitude_" + key).html();
              slon = $("#getlocations_fields_search_views_search_longitude_" + key).html();
              distance_meters = $("#getlocations_fields_search_views_search_distance_meters_" + key).html();
            }
            if (slat && slon && distance_meters) {
              var latLng = L.latLng(parseFloat(slat), parseFloat(slon));
              var lats = Drupal.getlocations.geo.earth_latitude_range(slat, slon, distance_meters);
              var lngs = Drupal.getlocations.geo.earth_longitude_range(slat, slon, distance_meters);
              var sw = L.latLng(parseFloat(lats[0]), parseFloat(lngs[0])), ne = L.latLng(parseFloat(lats[1]), parseFloat(lngs[1]));
              var searchLayer = L.layerGroup();
              // views_search_marker
              if (gset.map_settings.views_search_marker_enable) {
                var icon = (gset.map_settings.views_search_marker_info ? gset.map_settings.views_search_marker_info : false);
                var title = Drupal.t('Search Center');
                // make a leaflet marker gset.views_search_marker
                var searchMarker = {};
                searchMarker[key] = Drupal.getlocations_leaflet.makeMarker(gset.map_settings, slat, slon, '', '', 0, title , icon, false, 0, '', key);
                searchLayer.addLayer(searchMarker[key]);
                // initial setting
                if (gset.map_settings.views_search_marker_toggle) {
                  if (gset.map_settings.views_search_marker_toggle_active) {
                    searchLayer.addLayer(searchMarker[key]);
                    leafletviewssearchmarkertoggleState[key] = true;
                  }
                  else {
                    searchLayer.removeLayer(searchMarker[key]);
                    leafletviewssearchmarkertoggleState[key] = false;
                  }
                  $("#getlocations_leaflet_toggleSearchMarker_" + key).attr('disabled', false);
                  // click on this
                  $("#getlocations_leaflet_toggleSearchMarker_" + key).click( function() {
                    var label = '';
                    if (leafletviewssearchmarkertoggleState[key]) {
                      searchLayer.removeLayer(searchMarker[key]);
                      leafletviewssearchmarkertoggleState[key] = false;
                      label = Drupal.t('Search marker On');
                    }
                    else {
                      searchLayer.addLayer(searchMarker[key]);
                      leafletviewssearchmarkertoggleState[key] = true;
                      label = Drupal.t('Search marker Off');
                    }
                    $(this).val(label);
                  });
                }
                else {
                  leafletviewssearchmarkertoggleState[key] = true;
                  searchLayer.addLayer(searchMarker[key]);
                }
              }
              // views_search_radshape
              if (gset.map_settings.views_search_radshape_enable) {
                if ( $("#views_search_operator").is('input')) {
                  if (! gset.map_settings.views_search_radshape_strokecolor.match(/^#/)) {
                    gset.map_settings.views_search_radshape_strokecolor = '#' + gset.map_settings.views_search_radshape_strokecolor;
                  }
                  if (! gset.map_settings.views_search_radshape_fillcolor.match(/^#/)) {
                    gset.map_settings.views_search_radshape_fillcolor = '#' + gset.map_settings.views_search_radshape_fillcolor;
                  }
                  //views_search_operator
                  var rShape = {};
                  var shapeOpts = {
                    color: gset.map_settings.views_search_radshape_strokecolor,
                    opacity: gset.map_settings.views_search_radshape_strokeopacity,
                    weight: gset.map_settings.views_search_radshape_strokeweight,
                    fillColor: gset.map_settings.views_search_radshape_fillcolor,
                    fillOpacity: gset.map_settings.views_search_radshape_fillopacity,
                    clickable: false
                  };
                  var op = $("#views_search_operator").val();
                  if (op == 'dist') {
                    // radius circle
                    var mcoords = new L.LatLng(parseFloat(slat), parseFloat(slon));
                    var radius = parseInt(distance_meters);
                    rShape[key] = new L.Circle(mcoords, radius, shapeOpts);
                    searchLayer.addLayer(rShape[key]);
                    done = true;
                  }
                  else if (op == 'mbr') {
                    // rectangle
                    var bounds = new L.LatLngBounds(sw, ne);
                    rShape[key] = new L.Rectangle(bounds, shapeOpts);
                    searchLayer.addLayer(rShape[key]);
                    done = true;
                  }
                  if (gset.map_settings.views_search_radshape_toggle) {
                    if (gset.map_settings.views_search_radshape_toggle_active) {
                      searchLayer.addLayer(rShape[key]);
                      leafletviewssearchshapetoggleState[key] = true;
                    }
                    else {
                      searchLayer.removeLayer(rShape[key]);
                      leafletviewssearchshapetoggleState[key] = false;
                    }
                    $("#getlocations_leaflet_toggleSearchArea_" + key).attr('disabled', false);
                    // click on this
                    $("#getlocations_leaflet_toggleSearchArea_" + key).click( function() {
                      var label = '';
                      if (leafletviewssearchshapetoggleState[key]) {
                        searchLayer.removeLayer(rShape[key]);
                        leafletviewssearchshapetoggleState[key] = false;
                        label = Drupal.t('Search area On');
                      }
                      else {
                        searchLayer.addLayer(rShape[key]);
                        leafletviewssearchshapetoggleState[key] = true;
                        label = Drupal.t('Search area Off');
                      }
                      $(this).val(label);
                    });
                  }
                  else {
                    leafletviewssearchshapetoggleState[key] = true;
                  }
                  if (done) {
                    if (leafletviewssearchshapetoggleState[key]) {
                      searchLayer.addLayer(rShape[key]);
                    }
                    else {
                      searchLayer.removeLayer(rShape[key]);
                    }
                  }
                }
              }
              // add to the map
              if (gset.map_settings.views_search_marker_enable || gset.map_settings.views_search_radshape_enable) {
                Drupal.getlocations_leaflet_map[key].addLayer(searchLayer);
              }
              // views_search_center
              if (gset.map_settings.views_search_center) {
                var bounds = L.latLngBounds(sw, ne).pad(0.1);
                Drupal.getlocations_leaflet_map[key].fitBounds(bounds, {reset: true});
              }
            } // end if slat && slon
          } // end is there really a map
        }); // end once

      }

      // mapquest
      if (typeof(Drupal.settings.getlocations_mapquest) !== 'undefined') {

        MQA.withModule('shapes', function() {

          var gsettings = Drupal.settings.getlocations_mapquest;
          $(".getlocations_mapquest_canvas", context).once('getlocations-fields-views-search-marker-mapquest-processed', function(index, element) {
            var elemID = $(element).attr('id');
            var key = elemID.replace(/^getlocations_mapquest_canvas_/, '');
            // is there really a map?
            if ( $("#getlocations_mapquest_canvas_" + key).is('div') ) {
              var gset = gsettings[key];
              // views_search
              if (gset.map_settings.views_search_marker_enable) {
                var mapquestviewssearchmarkertoggleState = [];
                mapquestviewssearchmarkertoggleState[key] = true;
                if (! gset.map_settings.views_search_marker_toggle_active) {
                  mapquestviewssearchmarkertoggleState[key] = false;
                }
                $("#getlocations_mapquest_toggleSearchMarker_" + key).attr('disabled', true);
              }
              // do some setup
              if (gset.map_settings.views_search_radshape_enable) {
                var mapquestviewssearchshapetoggleState = [];
                mapquestviewssearchshapetoggleState[key] = true;
                if (! gset.map_settings.views_search_radshape_toggle_active) {
                  mapquestviewssearchshapetoggleState[key] = false;
                }
                $("#getlocations_mapquest_toggleSearchArea_" + key).attr('disabled', true);
              }
              // views_search_marker and views_search_radshape_enable
              var slat = false;
              var slon = false;
              var distance_meters = false;
              var done = false;
              if ($("#getlocations_fields_search_views_search_wrapper_" + key).is('div')) {
                slat = $("#getlocations_fields_search_views_search_latitude_" + key).html();
                slon = $("#getlocations_fields_search_views_search_longitude_" + key).html();
                distance_meters = $("#getlocations_fields_search_views_search_distance_meters_" + key).html();
              }
              if (slat && slon && distance_meters) {
                var latLng = new MQA.LatLng(parseFloat(slat), parseFloat(slon));
                var lats = Drupal.getlocations.geo.earth_latitude_range(slat, slon, distance_meters);
                var lngs = Drupal.getlocations.geo.earth_longitude_range(slat, slon, distance_meters);
                var sw = new MQA.LatLng(parseFloat(lats[0]), parseFloat(lngs[0])), ne = new MQA.LatLng(parseFloat(lats[1]), parseFloat(lngs[1]));
                //var searchLayer = L.layerGroup();

                // views_search_marker
                if (gset.map_settings.views_search_marker_enable) {
                  var searchMarkerLayer = new MQA.ShapeCollection();
                  var icon = (gset.map_settings.views_search_marker_info ? gset.map_settings.views_search_marker_info : false);
                  var title = Drupal.t('Search Center');
                  // make a leaflet marker gset.views_search_marker
                  var searchMarker = {};
                  //searchMarker[key] = Drupal.getlocations_mapquest.makeMarker(gset.map_settings, slat, slon, '', '', 0, title , icon, false, 0, '', key);
                  searchMarker[key] = Drupal.getlocations_mapquest.makeMarker(gset.map_settings, slat, slon, '', '', 0, title , icon, 0, '', key);
                  searchMarkerLayer.add(searchMarker[key]);
                  Drupal.getlocations_mapquest.map[key].addShapeCollection(searchMarkerLayer);
                  // initial setting
                  if (gset.map_settings.views_search_marker_toggle) {
                    if (gset.map_settings.views_search_marker_toggle_active) {
                      searchMarkerLayer.add(searchMarker[key]);
                      mapquestviewssearchmarkertoggleState[key] = true;
                    }
                    else {
                      searchMarkerLayer.remove(searchMarker[key]);
                      mapquestviewssearchmarkertoggleState[key] = false;
                    }
                    $("#getlocations_mapquest_toggleSearchMarker_" + key).attr('disabled', false);
                    // click on this
                    $("#getlocations_mapquest_toggleSearchMarker_" + key).click( function() {
                      var label = '';
                      if (mapquestviewssearchmarkertoggleState[key]) {
                        searchMarkerLayer.remove(searchMarker[key]);
                        mapquestviewssearchmarkertoggleState[key] = false;
                        label = Drupal.t('Search marker On');
                      }
                      else {
                        searchMarkerLayer.add(searchMarker[key]);
                        mapquestviewssearchmarkertoggleState[key] = true;
                        label = Drupal.t('Search marker Off');
                      }
                      $(this).val(label);
                    });
                  }
                  else {
                    mapquestviewssearchmarkertoggleState[key] = true;
                    searchMarkerLayer.add(searchMarker[key]);
                  }
                }

                // views_search_radshape
                // TODO fix this
                if (gset.map_settings.views_search_radshape_enable) {
                  if ( $("#views_search_operator").is('input')) {
                    var searchShapeLayer = new MQA.ShapeCollection();
                    if (! gset.map_settings.views_search_radshape_strokecolor.match(/^#/)) {
                      gset.map_settings.views_search_radshape_strokecolor = '#' + gset.map_settings.views_search_radshape_strokecolor;
                    }
                    if (! gset.map_settings.views_search_radshape_fillcolor.match(/^#/)) {
                      gset.map_settings.views_search_radshape_fillcolor = '#' + gset.map_settings.views_search_radshape_fillcolor;
                    }

                    //views_search_operator
                    var rShape = {};
                    var op = $("#views_search_operator").val();
                    if (op == 'dist') {
                      // radius circle
                      var radius = parseInt(distance_meters/1000);
                      rShape[key] = new MQA.CircleOverlay();
                      rShape[key].shapePoints = [parseFloat(slat), parseFloat(slon)];
                      rShape[key].radiusUnit = 'KM';
                      rShape[key].radius = radius;
                      rShape[key].className = 'mapquest_circle';

                      searchShapeLayer.add(rShape[key]);
                      Drupal.getlocations_mapquest.map[key].addShapeCollection(searchShapeLayer);
                      done = true;
                    }
                    else if (op == 'mbr') {
                      // rectangle
                      //var bounds = new L.LatLngBounds(sw, ne);
                      //rShape[key] = new L.Rectangle(bounds, shapeOpts);
                      //searchLayer.addLayer(rShape[key]);

                      //var rectangle = new MQA.RectangleOverlay();
                      //rectangle.shapePoints = [ 39.847136, -105.362437, 39.641389, -104.682833 ];

                      rShape[key] = new MQA.RectangleOverlay();
                      rShape[key] = [ lats[0], lngs[0], lats[1], lngs[1]];

                      //rShape[key] = new MQA.RectLL(sw, ne);
                      searchShapeLayer.add(rShape[key]);
                      Drupal.getlocations_mapquest.map[key].addShapeCollection(searchShapeLayer);
                      done = true;
                    }

                    if (gset.map_settings.views_search_radshape_toggle) {
                      if (gset.map_settings.views_search_radshape_toggle_active) {
                        searchShapeLayer.add(rShape[key]);
                        mapquestviewssearchshapetoggleState[key] = true;
                      }
                      else {
                        searchShapeLayer.remove(rShape[key]);
                        mapquestviewssearchshapetoggleState[key] = false;
                      }
                      $("#getlocations_mapquest_toggleSearchArea_" + key).attr('disabled', false);
                      // click on this
                      $("#getlocations_mapquest_toggleSearchArea_" + key).click( function() {
                        var label = '';
                        if (mapquestviewssearchshapetoggleState[key]) {
                          searchShapeLayer.remove(rShape[key]);
                          mapquestviewssearchshapetoggleState[key] = false;
                          label = Drupal.t('Search area On');
                        }
                        else {
                          searchShapeLayer.add(rShape[key]);
                          mapquestviewssearchshapetoggleState[key] = true;
                          label = Drupal.t('Search area Off');
                        }
                        $(this).val(label);
                      });
                    }
                    else {
                      mapquestviewssearchshapetoggleState[key] = true;
                    }
                    if (done) {
                      if (mapquestviewssearchshapetoggleState[key]) {
                        searchShapeLayer.add(rShape[key]);
                      }
                      else {
                        searchShapeLayer.remove(rShape[key]);
                      }
                    }
                  }
                }
                // add to the map
                //if (gset.map_settings.views_search_marker_enable || gset.map_settings.views_search_radshape_enable) {
                //  Drupal.getlocations_mapquest.map[key].addShape(searchLayer);
                //}
                // views_search_center
                if (gset.map_settings.views_search_center) {
                  //var bounds = L.latLngBounds(sw, ne).pad(0.1);
                  //Drupal.getlocations_mapquest.map[key].fitBounds(bounds, {reset: true});
                  var rect = new MQA.RectLL(ne, sw);
                  Drupal.getlocations_mapquest.map[key].zoomToRect(rect, false, 1, 20);
                }

                //Drupal.getlocations_mapquest.map[key].addShapeCollection(searchLayer);

              } // end if slat && slon
            } // end is there really a map
          }); // end once

        });

      } // end mapquest

    }
  };

})(jQuery);
