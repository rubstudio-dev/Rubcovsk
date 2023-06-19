<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* default/template/common/home.twig */
class __TwigTemplate_0fd8ba47c5804f9c1d5ff9bb0335235c2a6982947b8015c756c1e4b1536b117d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["header"] ?? null);
        echo "

<div class=\"weather\"></div>

<div id=\"common-home\">
  <div class=\"\">";
        // line 6
        echo ($context["column_left"] ?? null);
        echo "
    ";
        // line 7
        if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
            // line 8
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 9
            echo "    ";
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 10
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 11
            echo "    ";
        } else {
            // line 12
            echo "    ";
            $context["class"] = "";
            // line 13
            echo "    ";
        }
        // line 14
        echo "    <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">
    <div id=\"map\"></div>
      

<script>
  mapboxgl.accessToken = 'pk.eyJ1Ijoic3RyaWtlcnVzIiwiYSI6ImNqcHhxYnR5YjBvaWg0NHRkc2g0NnNtanAifQ.3549JQDbk8rr2Vx4qhDYxA';
const map = new mapboxgl.Map({
container: 'map',
// Choose from Mapbox's core styles, or make your own style with Mapbox Studio
style: 'mapbox://styles/strikerus/clit1xdxg00vs01pf2rnsd575',
center: [81.1907, 51.51138],
zoom: 12
});
 
map.on('load', () => {
// Add a new source from our GeoJSON data and
// set the 'cluster' option to true. GL-JS will
// add the point_count property to your source data.
map.addSource('earthquakes', {
type: 'geojson',
// Point to GeoJSON data. This example visualizes all M1.0+ earthquakes
// from 12/22/15 to 1/21/16 as logged by USGS' Earthquake hazards program.
data: 'https://docs.mapbox.com/mapbox-gl-js/assets/earthquakes.geojson',
cluster: true,
clusterMaxZoom: 14, // Max zoom to cluster points on
clusterRadius: 50 // Radius of each cluster when clustering points (defaults to 50)
});
 
map.addLayer({
id: 'clusters',
type: 'circle',
source: 'earthquakes',
filter: ['has', 'point_count'],
paint: {
// Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
// with three steps to implement three types of circles:
//   * Blue, 20px circles when point count is less than 100
//   * Yellow, 30px circles when point count is between 100 and 750
//   * Pink, 40px circles when point count is greater than or equal to 750
'circle-color': [
'step',
['get', 'point_count'],
'#51bbd6',
100,
'#f1f075',
750,
'#f28cb1'
],
'circle-radius': [
'step',
['get', 'point_count'],
20,
100,
30,
750,
40
]
}
});
 
map.addLayer({
id: 'cluster-count',
type: 'symbol',
source: 'earthquakes',
filter: ['has', 'point_count'],
layout: {
'text-field': ['get', 'point_count_abbreviated'],
'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
'text-size': 12
}
});
 
map.addLayer({
id: 'unclustered-point',
type: 'circle',
source: 'earthquakes',
filter: ['!', ['has', 'point_count']],
paint: {
'circle-color': '#11b4da',
'circle-radius': 4,
'circle-stroke-width': 1,
'circle-stroke-color': '#fff'
}
});
 
// inspect a cluster on click
map.on('click', 'clusters', (e) => {
const features = map.queryRenderedFeatures(e.point, {
layers: ['clusters']
});
const clusterId = features[0].properties.cluster_id;
map.getSource('earthquakes').getClusterExpansionZoom(
clusterId,
(err, zoom) => {
if (err) return;
 
map.easeTo({
center: features[0].geometry.coordinates,
zoom: zoom
});
}
);
});
 
// When a click event occurs on a feature in
// the unclustered-point layer, open a popup at
// the location of the feature, with
// description HTML from its properties.
map.on('click', 'unclustered-point', (e) => {
const coordinates = e.features[0].geometry.coordinates.slice();
const mag = e.features[0].properties.mag;
const tsunami =
e.features[0].properties.tsunami === 1 ? 'yes' : 'no';
 
// Ensure that if the map is zoomed out such that
// multiple copies of the feature are visible, the
// popup appears over the copy being pointed to.
while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
}
 
new mapboxgl.Popup()
.setLngLat(coordinates)
.setHTML(
`magnitude: \${mag}<br>Was there a tsunami?: \${tsunami}`
)
.addTo(map);
});
 
map.on('mouseenter', 'clusters', () => {
map.getCanvas().style.cursor = 'pointer';
});
map.on('mouseleave', 'clusters', () => {
map.getCanvas().style.cursor = '';
});
});
</script>

<script>
\$(window).load(function () {

  //Set default input values on page load 
  var requestURL2 = \"https://api.openweathermap.org/data/2.5/weather?lat=51.547425&lon=81.231164&units=imperial&appid=ca6ff81b256ad199b3de759c58de182b\";
    jQuery.get('https://api.openweathermap.org/data/2.5/weather?lat=51.547425&lon=81.231164&units=imperial&appid=ca6ff81b256ad199b3de759c58de182b', function(responseText) {
        var temp = toCelsius(responseText['main']['temp'])+' °C';
        jQuery('.weather').text(temp);
    });

 
  function toCelsius(f){
      return parseInt((5 / 9) * (f - 32));
  }  

});
</script>







    ";
        // line 176
        echo ($context["content_top"] ?? null);
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 177
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 179
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 179,  240 => 177,  235 => 176,  69 => 14,  66 => 13,  63 => 12,  60 => 11,  57 => 10,  54 => 9,  51 => 8,  49 => 7,  45 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/home.twig", "");
    }
}
