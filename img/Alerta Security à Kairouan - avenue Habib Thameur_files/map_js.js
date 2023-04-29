/**
* Returns an XMLHttp instance to use for asynchronous
* downloading. This method will never throw an exception, but will
* return NULL if the browser does not support XmlHttp for any reason.
* @return {XMLHttpRequest|Null}
*/
function createXmlHttpRequest() {
 try {
   if (typeof ActiveXObject != 'undefined') {
     return new ActiveXObject('Microsoft.XMLHTTP');
   } else if (window["XMLHttpRequest"]) {
     return new XMLHttpRequest();
   }
 } catch (e) {
   changeStatus(e);
 }
 return null;
};

/**
* This functions wraps XMLHttpRequest open/send function.
* It lets you specify a URL and will call the callback if
* it gets a status code of 200.
* @param {String} url The URL to retrieve
* @param {Function} callback The function to call once retrieved.
*/
function downloadUrl(url, callback) {
 var status = -1;
 var request = createXmlHttpRequest();
 if (!request) {
   return false;
 }

 request.onreadystatechange = function() {
   if (request.readyState == 4) {
     try {
       status = request.status;
     } catch (e) {
       // Usually indicates request timed out in FF.
     }
     if ((status == 200) || (status == 0)) {
       callback(request.responseText, request.status);
       request.onreadystatechange = function() {};
     }
   }
 }
 request.open('GET', url, true);
 try {
   request.send(null);
 } catch (e) {
   changeStatus(e);
 }
};

/**
 * Parses the given XML string and returns the parsed document in a
 * DOM data structure. This function will return an empty DOM node if
 * XML parsing is not supported in this browser.
 * @param {string} str XML string.
 * @return {Element|Document} DOM.
 */
function xmlParse(str) {
  if (typeof ActiveXObject != 'undefined' && typeof GetObject != 'undefined') {
    var doc = new ActiveXObject('Microsoft.XMLDOM');
    doc.loadXML(str);
    return doc;
  }

  if (typeof DOMParser != 'undefined') {
    return (new DOMParser()).parseFromString(str, 'text/xml');
  }

  return createElement('div', null);
}

/**
 * Appends a JavaScript file to the page.
 * @param {string} url
 */
function downloadScript(url) {
  var script = document.createElement('script');
  script.src = url;
  document.body.appendChild(script);
}


/* An SmartInfoWindow is like an info window, but it displays
 * under the marker, opens quicker, and has flexible styling.
 * @param {Object} opts Passes configuration options.
 */
function SmartInfoWindow(opts) {

  google.maps.OverlayView.call(this);
  this.latlng_ = opts.position;
  this.content_ = opts.content;
  this.map_ = opts.map;
  this.height_ = 351;
  this.width_ = 280;
  this.size_ = new google.maps.Size(this.height_, this.width_);
  this.offsetVertical_ = -this.height_;
  this.offsetHorizontal_ = -this.width_;
  this.panned_ = true;
  this.setMap(this.map_);
  this.elem = opts.elem;

  // We need to listen to bounds_changed event so that we can redraw
  // absolute position every time the map moves.
  // This is only needed because we append to body instead of map panes.
  var me = this;
  google.maps.event.addListener(this.map_, this.elem.get(0), function() {
    me.draw();
  });
}

/**
 * SmartInfoWindow extends GOverlay class from the Google Maps API
 */
SmartInfoWindow.prototype = new google.maps.OverlayView();

/**
 * Creates the DIV representing this SmartInfoWindow
 */
SmartInfoWindow.prototype.onRemove = function() {
  if (this.div_) {
    this.div_.parentNode.removeChild(this.div_);
    this.div_ = null;
  }
};

/**
 * Called when the overlay is first added to the map.
 */
SmartInfoWindow.prototype.onAdd = function() {
  // Creates the element if it doesn't exist already.
  this.createElement();
};

/**
 * Redraw based on the current projection and zoom level.
 */
SmartInfoWindow.prototype.draw = function() {
  // Since we use bounds changed listener, projection is sometimes null
  if (!this.getProjection()) {
    return;
  }

  function getPosition(element)
{
	var left = 0;
	var top = 0;
	/*On récupère l'élément*/
	//var e = document.getElementById(element);
       var e = element;
	/*Tant que l'on a un élément parent*/
	//while (e.offsetParent != undefined && e.offsetParent != null)
        if( $(e).parents(".fixed").length > 0 ){
	if (e.offsetParent != undefined && e.offsetParent != null)
	{
          //console.debug("e.offsetTop " + e.offsetTop + " e.clientTop  " + e.clientTop) ;
		/*On ajoute la position de l'élément parent*/
		left += e.offsetLeft + (e.clientLeft != null ? e.clientLeft : 0);
		top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
		e = e.offsetParent;

	}
       }else{

	while (e.offsetParent != undefined && e.offsetParent != null)
	{
          //console.debug("e.offsetTop " + e.offsetTop + " e.clientTop  " + e.clientTop) ;
		/*On ajoute la position de l'élément parent*/
		left += e.offsetLeft + (e.clientLeft != null ? e.clientLeft : 0);
		top += e.offsetTop + (e.clientTop != null ? e.clientTop : 0);
		e = e.offsetParent;

	}



      }
          //console.debug("e.offsetTop " + e.offsetTop + " e.clientTop  " + e.clientTop  + "====> " + top) ;
        var ua = $.browser;
  if ( ua.mozilla  ) {
     top += 10; 
  }

	//alert(Array(left,top));
	return new Array(left,top);
}

var pos = getPosition(this.elem.get(0));


  // This gives us the position in the tiles div.
  var pixPosition = this.getProjection().fromLatLngToDivPixel(this.latlng_);
  var centerPosition = this.getProjection().fromLatLngToDivPixel(this.map_.getCenter());
  var centerPositionReal = new google.maps.Point(this.map_.getDiv().offsetWidth/2, this.map_.getDiv().offsetHeight/2);
  //alert(centerPosition);
  // Figure out difference between map div and tiles div, so that we can
  // calculate position in map div
  
  var centerOffsetX = pos[0]+centerPositionReal.x-centerPosition.x;
   //console.debug("pos[0] " + pos[0] + " centerPositionReal.x  "  + centerPositionReal.x + " -centerPosition.x -" + centerPosition.x  + " centerOffsetX :   " + centerOffsetX);
  //alert(centerPositionReal.y);
  var centerOffsetY = pos[1]+centerPositionReal.y-centerPosition.y;
  if ($(".fixed")[0]){
	  var vscroll = (document.all ? document.documentElement.scrollTop : window.pageYOffset);
	  var hscroll = (document.all ? document.scrollLeft : window.pageXOffset);
	  //alert(hscroll);


	  if (hscroll==undefined || hscroll==0)
{

var hscroll = screen.width-(screen.width/2.4);
var centerOffsetX = hscroll+pos[0]+centerPositionReal.x-centerPosition.x;
   //console.debug("hscroll: " + hscroll + " pos[0]: " + pos[0] + " centerPositionReal.x : "  + centerPositionReal.x + "- centerPosition.x" + centerPosition.x +  " c enterOffsetX :   " + centerOffsetX);
}


var centerOffsetY = vscroll+centerPositionReal.y-centerPosition.y+pos[1];

}
  //alert(centerOffsetY);
//alert(centerOffsetX);
  if (!pixPosition) return;
  var alignment = this.getBestAlignment();
  var paddingTop = 0;
  var paddingLeft = 0;
  var widthLess = 0;

  switch (alignment) {
    case SmartInfoWindow.Align.ABOVE:
      this.width_ = 387;
      this.height_ = 185;
      image = '';
      this.offsetX_ = -(this.width_ / 2 - 17);
      this.offsetY_ = -(this.height_ + 12);
      break;
    case SmartInfoWindow.Align.BELOW:
	 
      this.width_ = 387;
      this.height_ = 185;
      image = '';
      this.offsetX_ = -(this.width_ / 2 - 17);
      this.offsetY_ = -15;
      paddingTop = 20;
      break;
    case SmartInfoWindow.Align.LEFT:
      this.width_ = 387;
      this.height_ = 185;
      image = '';
      this.offsetX_ = -(this.width_) + 10;
      this.offsetY_ = -(this.height_ / 2 + 33);
      widthLess = 20;
      break;
    case SmartInfoWindow.Align.RIGHT:
      image = '';
      this.width_ = 420;
      this.height_ = 185;
      this.offsetX_ = 16;
      this.offsetY_ = -(this.height_ / 2 + 33);
      paddingLeft = 20;
      widthLess = 20;
      break;
   }
  // Now position our DIV based on the DIV coordinates of our bounds
  this.div_.style.width = this.width_ + 'px';
  this.div_.style.left = (pixPosition.x + this.offsetX_) + centerOffsetX + 'px';
  //console.debug("pixPosition.x : " + pixPosition.x  + "   this.offsetX_: "  + this.offsetX_ + "    centerOffsetX: " +  centerOffsetX); 
  //console.debug(this.div_.style.left );
  this.div_.style.height = this.height_ + 'px';
  this.div_.style.top = (pixPosition.y + this.offsetY_) + centerOffsetY +15+ 'px';
  //this.div_.style.paddingTop = paddingTop + 'px';
  //this.div_.style.paddingLeft = paddingLeft + 'px';
  this.div_.style.background = 'url("images/' + image + '")';
  this.div_.style.display = 'block';
  
  this.wrapperDiv_.style.width = (this.width_- widthLess) + 'px';
  this.wrapperDiv_.style.height = this.height_ + 'px';
  this.wrapperDiv_.style.marginTop = '0px';
  this.wrapperDiv_.style.marginLeft = paddingLeft + 'px';
  this.wrapperDiv_.style.overflow = 'hidden';
  if (!this.panned_) {
    this.panned_ = true;
    this.maybePanMap();
  }
};
   
/**
 * Creates the DIV representing this SmartInfoWindow in the floatPane.  If the panes
 * object, retrieved by calling getPanes, is null, remove the element from the
 * DOM.  If the div exists, but its parent is not the floatPane, move the div
 * to the new pane.
 * Called from within draw.  Alternatively, this can be called specifically on
 * a panes_changed event.
 */
SmartInfoWindow.prototype.createElement = function() {
  var panes = this.getPanes();
  var div = this.div_;
  if (!div) {
    // This does not handle changing panes.  You can set the map to be null and
    // then reset the map to move the div.
    div = this.div_ = document.createElement('div');
    div.style.border = '0px none';
    div.style.position = 'absolute';
    div.style.overflow = 'hidden';
    var wrapperDiv = this.wrapperDiv_ = document.createElement('div');
    var contentDiv = document.createElement('div');
    if (typeof this.content_ == 'string') {
      contentDiv.innerHTML = this.content_;
    } else {
      contentDiv.appendChild(this.content_);
    }

    var topDiv = document.createElement('div');
    topDiv.style.textAlign = 'right';
    var closeImg = document.createElement('img');
    closeImg.src = '';
    closeImg.style.width = '0px';
    closeImg.style.height = '0px';
    closeImg.style.cursor = 'pointer';
    topDiv.appendChild(closeImg);

    function removeSmartInfoWindow(ib) {
      return function() {
        ib.setMap(null);
      };
    }

    google.maps.event.addDomListener(closeImg, 'click', removeSmartInfoWindow(this));

    wrapperDiv.appendChild(topDiv);
    wrapperDiv.appendChild(contentDiv);
    div.appendChild(wrapperDiv);
    div.style.display = 'none';
    // Append to body, to avoid bug with Webkit browsers
    // attempting CSS transforms on IFRAME or SWF objects
    // and rendering badly.
    document.body.appendChild(div);
  } else if (div.parentNode != panes.floatPane) {
    // The panes have changed.  Move the div.
    div.parentNode.removeChild(div);
    panes.floatPane.appendChild(div);
  } else {
    // The panes have not changed, so no need to create or move the div.
  }
};

SmartInfoWindow.mouseFilter = function(e) {
  e.returnValue = 'true';
  e['handled'] = true;
}

/**
 * Closes infowindow
 */
SmartInfoWindow.prototype.close = function() {
  this.setMap(null);
};

/**
 * Pan the map to fit the SmartInfoWindow,
 * if its top or bottom corners aren't visible.
 */
SmartInfoWindow.prototype.maybePanMap = function() {
  // if we go beyond map, pan map
  var map = this.map_;
  var projection = this.getProjection();

  var bounds = map.getBounds();
  if (!bounds) return;

  // The dimension of the infowindow
  var iwWidth = this.width_;
  var iwHeight = this.height_;

  // The offset position of the infowindow
  var iwOffsetX = this.offsetX_;
  var iwOffsetY = this.offsetY_;

  var anchorPixel = projection.fromLatLngToDivPixel(this.latlng_);
  var bl = new google.maps.Point(anchorPixel.x + iwOffsetX + 20,
      anchorPixel.y + iwOffsetY + iwHeight);
  var tr = new google.maps.Point(anchorPixel.x + iwOffsetX + iwWidth,
      anchorPixel.y + iwOffsetY);
  var sw = projection.fromDivPixelToLatLng(bl);
  var ne = projection.fromDivPixelToLatLng(tr);

  // The bounds of the infowindow
  if (!map.getBounds().contains(ne) || !map.getBounds().contains(sw)) {
    map.panToBounds(new google.maps.LatLngBounds(sw, ne));
  }
};

/**
 * @enum {number}
 */
SmartInfoWindow.Align = {
  ABOVE: 0,
  LEFT: 1,
  RIGHT: 2,
  BELOW: 3
};

/**
 * Finds best alignment for infowindow.
 * @return {number} Alignment.
 */
SmartInfoWindow.prototype.getBestAlignment = function() {
  var bestAlignment = SmartInfoWindow.Align.LEFT;
  var minPan = 0;

  for (var alignment in SmartInfoWindow.Align) {
    var alignment = SmartInfoWindow.Align[alignment];
    var panValue = this.getPanValue(alignment);
    if (panValue > minPan) {
      minPan = panValue;
      bestAlignment = 3;
    }
  }
//alert(bestAlignment);
  return bestAlignment;
};

/**
 * Calculates distance of corner for each alignment.
 * @param {number} alignment An alignment constant.
 * @return {number} Distance for that alignment.
 */
SmartInfoWindow.prototype.getPanValue = function(alignment) {
  var mapSize = new google.maps.Size(this.map_.getDiv().offsetWidth,
      this.map_.getDiv().offsetHeight);
  var bounds = this.map_.getBounds();
  var sideLatLng;
  switch (alignment) {
    case SmartInfoWindow.Align.ABOVE:
      sideLatLng = new google.maps.LatLng(bounds.getNorthEast().lat(),
          this.latlng_.lng());
      break;
    case SmartInfoWindow.Align.BELOW:
      sideLatLng = new google.maps.LatLng(bounds.getSouthWest().lat(),
          this.latlng_.lng());
      break;
    case SmartInfoWindow.Align.RIGHT:
      sideLatLng = new google.maps.LatLng(this.latlng_.lat(),
          bounds.getNorthEast().lng());
      break;
    case SmartInfoWindow.Align.LEFT:
      sideLatLng = new google.maps.LatLng(this.latlng_.lat(),
          bounds.getSouthWest().lng());
      break;
  }
  var dist = SmartInfoWindow.distHaversine(this.latlng_.lat(), this.latlng_.lng(),
      sideLatLng.lat(), sideLatLng.lng());
  return dist;
};


/**
 * Converts degrees to radians.
 * @param {number} num Angle in degrees.
 * @return {number} Angle in radians.
 */
SmartInfoWindow.toRad = function(num) {
    return num * Math.PI / 180;
}

/**
 * Calculates distance between two coordinates.
 * @param {number} lat1 Latitude of first coord.
 * @param {number} lon1 Longitude of second coord.
 * @param {number} lat2 Latitude of second coord.
 * @param {number} lon2 Longitude of second coord.
 * @return {number} The distance.
 */
SmartInfoWindow.distHaversine = function(lat1, lon1, lat2, lon2) {
  var R = 6371; // earth's mean radius in km
  var dLat = SmartInfoWindow.toRad(lat2 - lat1);
  var dLon = SmartInfoWindow.toRad(lon2 - lon1);
  lat1 = SmartInfoWindow.toRad(lat1), lat2 = SmartInfoWindow.toRad(lat2);

  var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
          Math.cos(lat1) * Math.cos(lat2) *
          Math.sin(dLon / 2) * Math.sin(dLon / 2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
  var d = R * c;
  return d;
}


/**
 * @name InfoBox
 * @version 1.1.11 [January 9, 2012]
 * @author Gary Little (inspired by proof-of-concept code from Pamela Fox of Google)
 * @copyright Copyright 2010 Gary Little [gary at luxcentral.com]
 * @fileoverview InfoBox extends the Google Maps JavaScript API V3 <tt>OverlayView</tt> class.
 *  <p>
 *  An InfoBox behaves like a <tt>google.maps.InfoWindow</tt>, but it supports several
 *  additional properties for advanced styling. An InfoBox can also be used as a map label.
 *  <p>
 *  An InfoBox also fires the same events as a <tt>google.maps.InfoWindow</tt>.
 */

/*!
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *       http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*jslint browser:true */
/*global google */

/**
 * @name InfoBoxOptions
 * @class This class represents the optional parameter passed to the {@link InfoBox} constructor.
 * @property {string|Node} content The content of the InfoBox (plain text or an HTML DOM node).
 * @property {boolean} disableAutoPan Disable auto-pan on <tt>open</tt> (default is <tt>false</tt>).
 * @property {number} maxWidth The maximum width (in pixels) of the InfoBox. Set to 0 if no maximum.
 * @property {Size} pixelOffset The offset (in pixels) from the top left corner of the InfoBox
 *  (or the bottom left corner if the <code>alignBottom</code> property is <code>true</code>)
 *  to the map pixel corresponding to <tt>position</tt>.
 * @property {LatLng} position The geographic location at which to display the InfoBox.
 * @property {number} zIndex The CSS z-index style value for the InfoBox.
 *  Note: This value overrides a zIndex setting specified in the <tt>boxStyle</tt> property.
 * @property {string} boxClass The name of the CSS class defining the styles for the InfoBox container.
 *  The default name is <code>infoBox</code>.
 * @property {Object} [boxStyle] An object literal whose properties define specific CSS
 *  style values to be applied to the InfoBox. Style values defined here override those that may
 *  be defined in the <code>boxClass</code> style sheet. If this property is changed after the
 *  InfoBox has been created, all previously set styles (except those defined in the style sheet)
 *  are removed from the InfoBox before the new style values are applied.
 * @property {string} closeBoxMargin The CSS margin style value for the close box.
 *  The default is "2px" (a 2-pixel margin on all sides).
 * @property {string} closeBoxURL The URL of the image representing the close box.
 *  Note: The default is the URL for Google's standard close box.
 *  Set this property to "" if no close box is required.
 * @property {Size} infoBoxClearance Minimum offset (in pixels) from the InfoBox to the
 *  map edge after an auto-pan.
 * @property {boolean} isHidden Hide the InfoBox on <tt>open</tt> (default is <tt>false</tt>).
 * @property {boolean} alignBottom Align the bottom left corner of the InfoBox to the <code>position</code>
 *  location (default is <tt>false</tt> which means that the top left corner of the InfoBox is aligned).
 * @property {string} pane The pane where the InfoBox is to appear (default is "floatPane").
 *  Set the pane to "mapPane" if the InfoBox is being used as a map label.
 *  Valid pane names are the property names for the <tt>google.maps.MapPanes</tt> object.
 * @property {boolean} enableEventPropagation Propagate mousedown, mousemove, mouseover, mouseout,
 *  mouseup, click, dblclick, touchstart, touchend, touchmove, and contextmenu events in the InfoBox
 *  (default is <tt>false</tt> to mimic the behavior of a <tt>google.maps.InfoWindow</tt>). Set
 *  this property to <tt>true</tt> if the InfoBox is being used as a map label.
 */

/**
 * Creates an InfoBox with the options specified in {@link InfoBoxOptions}.
 *  Call <tt>InfoBox.open</tt> to add the box to the map.
 * @constructor
 * @param {InfoBoxOptions} [opt_opts]
 */
function InfoBox(opt_opts) {

  opt_opts = opt_opts || {};

  google.maps.OverlayView.apply(this, arguments);

  // Standard options (in common with google.maps.InfoWindow):
  //
  this.content_ = opt_opts.content || "";
  this.disableAutoPan_ = opt_opts.disableAutoPan || false;
  this.maxWidth_ = opt_opts.maxWidth || 0;
  this.pixelOffset_ = opt_opts.pixelOffset || new google.maps.Size(0, 0);
  this.position_ = opt_opts.position || new google.maps.LatLng(0, 0);
  this.zIndex_ = opt_opts.zIndex || null;

  // Additional options (unique to InfoBox):
  //
  this.boxClass_ = opt_opts.boxClass || "infoBox";
  this.boxStyle_ = opt_opts.boxStyle || {};
  this.closeBoxMargin_ = opt_opts.closeBoxMargin || "2px";
  this.closeBoxURL_ = opt_opts.closeBoxURL || "";
  if (opt_opts.closeBoxURL === "") {
    this.closeBoxURL_ = "";
  }
  this.infoBoxClearance_ = opt_opts.infoBoxClearance || new google.maps.Size(1, 1);
  this.isHidden_ = opt_opts.isHidden || false;
  this.alignBottom_ = opt_opts.alignBottom || false;
  this.pane_ = opt_opts.pane || "floatPane";
  this.enableEventPropagation_ = opt_opts.enableEventPropagation || false;

  this.div_ = null;
  this.closeListener_ = null;
  this.moveListener_ = null;
  this.contextListener_ = null;
  this.eventListeners_ = null;
  this.fixedWidthSet_ = null;
}

/* InfoBox extends OverlayView in the Google Maps API v3.
 */
InfoBox.prototype = new google.maps.OverlayView();

/**
 * Creates the DIV representing the InfoBox.
 * @private
 */
InfoBox.prototype.createInfoBoxDiv_ = function () {

  var i;
  var events;
  var bw;
  var me = this;

  // This handler prevents an event in the InfoBox from being passed on to the map.
  //
  var cancelHandler = function (e) {
    e.cancelBubble = true;
    if (e.stopPropagation) {
      e.stopPropagation();
    }
  };

  // This handler ignores the current event in the InfoBox and conditionally prevents
  // the event from being passed on to the map. It is used for the contextmenu event.
  //
  var ignoreHandler = function (e) {

    e.returnValue = false;

    if (e.preventDefault) {

      e.preventDefault();
    }

    if (!me.enableEventPropagation_) {

      cancelHandler(e);
    }
  };

  if (!this.div_) {

    this.div_ = document.createElement("div");

    this.setBoxStyle_();

    if (typeof this.content_.nodeType === "undefined") {
      this.div_.innerHTML = this.getCloseBoxImg_() + this.content_;
    } else {
      this.div_.innerHTML = this.getCloseBoxImg_();
      this.div_.appendChild(this.content_);
    }

    // Add the InfoBox DIV to the DOM
    this.getPanes()[this.pane_].appendChild(this.div_);

    this.addClickHandler_();

    if (this.div_.style.width) {

      this.fixedWidthSet_ = true;

    } else {

      if (this.maxWidth_ !== 0 && this.div_.offsetWidth > this.maxWidth_) {

        this.div_.style.width = this.maxWidth_;
        this.div_.style.overflow = "auto";
        this.fixedWidthSet_ = true;

      } else { // The following code is needed to overcome problems with MSIE

        bw = this.getBoxWidths_();

        this.div_.style.width = (this.div_.offsetWidth - bw.left - bw.right) + "px";
        this.fixedWidthSet_ = false;
      }
    }

    this.panBox_(this.disableAutoPan_);

    if (!this.enableEventPropagation_) {

      this.eventListeners_ = [];

      // Cancel event propagation.
      //
      // Note: mousemove not included (to resolve Issue 152)
      events = ["mousedown", "mouseover", "mouseout", "mouseup",
      "click", "dblclick", "touchstart", "touchend", "touchmove"];

      for (i = 0; i < events.length; i++) {

        this.eventListeners_.push(google.maps.event.addDomListener(this.div_, events[i], cancelHandler));
      }
      
      // Workaround for Google bug that causes the cursor to change to a pointer
      // when the mouse moves over a marker underneath InfoBox.
      this.eventListeners_.push(google.maps.event.addDomListener(this.div_, "mouseover", function (e) {
        this.style.cursor = "default";
      }));
    }

    this.contextListener_ = google.maps.event.addDomListener(this.div_, "contextmenu", ignoreHandler);

    /**
     * This event is fired when the DIV containing the InfoBox's content is attached to the DOM.
     * @name InfoBox#domready
     * @event
     */
    google.maps.event.trigger(this, "domready");
  }
};

/**
 * Returns the HTML <IMG> tag for the close box.
 * @private
 */
InfoBox.prototype.getCloseBoxImg_ = function () {

  var img = "";

  if (this.closeBoxURL_ !== "") {

    img  = "<img";
    img += " src='" + this.closeBoxURL_ + "'";
    img += " align=right"; // Do this because Opera chokes on style='float: right;'
    img += " style='";
    img += " position: relative;"; // Required by MSIE
    img += " cursor: pointer;";
    img += " margin: " + this.closeBoxMargin_ + ";";
    img += "'>";
  }

  return img;
};

/**
 * Adds the click handler to the InfoBox close box.
 * @private
 */
InfoBox.prototype.addClickHandler_ = function () {

  var closeBox;

  if (this.closeBoxURL_ !== "") {

    closeBox = this.div_.firstChild;
    this.closeListener_ = google.maps.event.addDomListener(closeBox, 'click', this.getCloseClickHandler_());

  } else {

    this.closeListener_ = null;
  }
};

/**
 * Returns the function to call when the user clicks the close box of an InfoBox.
 * @private
 */
InfoBox.prototype.getCloseClickHandler_ = function () {

  var me = this;

  return function (e) {

    // 1.0.3 fix: Always prevent propagation of a close box click to the map:
    e.cancelBubble = true;

    if (e.stopPropagation) {

      e.stopPropagation();
    }

    /**
     * This event is fired when the InfoBox's close box is clicked.
     * @name InfoBox#closeclick
     * @event
     */
    google.maps.event.trigger(me, "closeclick");

    me.close();
  };
};

/**
 * Pans the map so that the InfoBox appears entirely within the map's visible area.
 * @private
 */
InfoBox.prototype.panBox_ = function (disablePan) {

  var map;
  var bounds;
  var xOffset = 0, yOffset = 0;

  if (!disablePan) {

    map = this.getMap();

    if (map instanceof google.maps.Map) { // Only pan if attached to map, not panorama

      if (!map.getBounds().contains(this.position_)) {
      // Marker not in visible area of map, so set center
      // of map to the marker position first.
        map.setCenter(this.position_);
      }

      bounds = map.getBounds();

      var mapDiv = map.getDiv();
      var mapWidth = mapDiv.offsetWidth;
      var mapHeight = mapDiv.offsetHeight;
      var iwOffsetX = this.pixelOffset_.width;
      var iwOffsetY = this.pixelOffset_.height;
      var iwWidth = this.div_.offsetWidth;
      var iwHeight = this.div_.offsetHeight;
      var padX = this.infoBoxClearance_.width;
      var padY = this.infoBoxClearance_.height;
      var pixPosition = this.getProjection().fromLatLngToContainerPixel(this.position_);

      if (pixPosition.x < (-iwOffsetX + padX)) {
        xOffset = pixPosition.x + iwOffsetX - padX;
      } else if ((pixPosition.x + iwWidth + iwOffsetX + padX) > mapWidth) {
        xOffset = pixPosition.x + iwWidth + iwOffsetX + padX - mapWidth;
      }
      if (this.alignBottom_) {
        if (pixPosition.y < (-iwOffsetY + padY + iwHeight)) {
          yOffset = pixPosition.y + iwOffsetY - padY - iwHeight;
        } else if ((pixPosition.y + iwOffsetY + padY) > mapHeight) {
          yOffset = pixPosition.y + iwOffsetY + padY - mapHeight;
        }
      } else {
        if (pixPosition.y < (-iwOffsetY + padY)) {
          yOffset = pixPosition.y + iwOffsetY - padY;
        } else if ((pixPosition.y + iwHeight + iwOffsetY + padY) > mapHeight) {
          yOffset = pixPosition.y + iwHeight + iwOffsetY + padY - mapHeight;
        }
      }

      if (!(xOffset === 0 && yOffset === 0)) {

        // Move the map to the shifted center.
        //
        var c = map.getCenter();
        map.panBy(xOffset, yOffset);
      }
    }
  }
};

/**
 * Sets the style of the InfoBox by setting the style sheet and applying
 * other specific styles requested.
 * @private
 */
InfoBox.prototype.setBoxStyle_ = function () {

  var i, boxStyle;

  if (this.div_) {

    // Apply style values from the style sheet defined in the boxClass parameter:
    this.div_.className = this.boxClass_;

    // Clear existing inline style values:
    this.div_.style.cssText = "";

    // Apply style values defined in the boxStyle parameter:
    boxStyle = this.boxStyle_;
    for (i in boxStyle) {

      if (boxStyle.hasOwnProperty(i)) {

        this.div_.style[i] = boxStyle[i];
      }
    }

    // Fix up opacity style for benefit of MSIE:
    //
    if (typeof this.div_.style.opacity !== "undefined" && this.div_.style.opacity !== "") {

      this.div_.style.filter = "alpha(opacity=" + (this.div_.style.opacity * 100) + ")";
    }

    // Apply required styles:
    //
    this.div_.style.position = "absolute";
    this.div_.style.visibility = 'hidden';
    if (this.zIndex_ !== null) {

      this.div_.style.zIndex = this.zIndex_;
    }
  }
};

/**
 * Get the widths of the borders of the InfoBox.
 * @private
 * @return {Object} widths object (top, bottom left, right)
 */
InfoBox.prototype.getBoxWidths_ = function () {

  var computedStyle;
  var bw = {top: 0, bottom: 0, left: 0, right: 0};
  var box = this.div_;

  if (document.defaultView && document.defaultView.getComputedStyle) {

    computedStyle = box.ownerDocument.defaultView.getComputedStyle(box, "");

    if (computedStyle) {

      // The computed styles are always in pixel units (good!)
      bw.top = parseInt(computedStyle.borderTopWidth, 10) || 0;
      bw.bottom = parseInt(computedStyle.borderBottomWidth, 10) || 0;
      bw.left = parseInt(computedStyle.borderLeftWidth, 10) || 0;
      bw.right = parseInt(computedStyle.borderRightWidth, 10) || 0;
    }

  } else if (document.documentElement.currentStyle) { // MSIE

    if (box.currentStyle) {

      // The current styles may not be in pixel units, but assume they are (bad!)
      bw.top = parseInt(box.currentStyle.borderTopWidth, 10) || 0;
      bw.bottom = parseInt(box.currentStyle.borderBottomWidth, 10) || 0;
      bw.left = parseInt(box.currentStyle.borderLeftWidth, 10) || 0;
      bw.right = parseInt(box.currentStyle.borderRightWidth, 10) || 0;
    }
  }

  return bw;
};

/**
 * Invoked when <tt>close</tt> is called. Do not call it directly.
 */
InfoBox.prototype.onRemove = function () {

  if (this.div_) {

    this.div_.parentNode.removeChild(this.div_);
    this.div_ = null;
  }
};

/**
 * Draws the InfoBox based on the current map projection and zoom level.
 */
InfoBox.prototype.draw = function () {

  this.createInfoBoxDiv_();

  var pixPosition = this.getProjection().fromLatLngToDivPixel(this.position_);

  this.div_.style.left = (pixPosition.x + this.pixelOffset_.width) + "px";
  
  if (this.alignBottom_) {
    this.div_.style.bottom = -(pixPosition.y + this.pixelOffset_.height) + "px";
  } else {
    this.div_.style.top = (pixPosition.y + this.pixelOffset_.height) + "px";
  }

  if (this.isHidden_) {

    this.div_.style.visibility = 'hidden';

  } else {

    this.div_.style.visibility = "visible";
  }
};

/**
 * Sets the options for the InfoBox. Note that changes to the <tt>maxWidth</tt>,
 *  <tt>closeBoxMargin</tt>, <tt>closeBoxURL</tt>, and <tt>enableEventPropagation</tt>
 *  properties have no affect until the current InfoBox is <tt>close</tt>d and a new one
 *  is <tt>open</tt>ed.
 * @param {InfoBoxOptions} opt_opts
 */
InfoBox.prototype.setOptions = function (opt_opts) {
  if (typeof opt_opts.boxClass !== "undefined") { // Must be first

    this.boxClass_ = opt_opts.boxClass;
    this.setBoxStyle_();
  }
  if (typeof opt_opts.boxStyle !== "undefined") { // Must be second

    this.boxStyle_ = opt_opts.boxStyle;
    this.setBoxStyle_();
  }
  if (typeof opt_opts.content !== "undefined") {

    this.setContent(opt_opts.content);
  }
  if (typeof opt_opts.disableAutoPan !== "undefined") {

    this.disableAutoPan_ = opt_opts.disableAutoPan;
  }
  if (typeof opt_opts.maxWidth !== "undefined") {

    this.maxWidth_ = opt_opts.maxWidth;
  }
  if (typeof opt_opts.pixelOffset !== "undefined") {

    this.pixelOffset_ = opt_opts.pixelOffset;
  }
  if (typeof opt_opts.alignBottom !== "undefined") {

    this.alignBottom_ = opt_opts.alignBottom;
  }
  if (typeof opt_opts.position !== "undefined") {

    this.setPosition(opt_opts.position);
  }
  if (typeof opt_opts.zIndex !== "undefined") {

    this.setZIndex(opt_opts.zIndex);
  }
  if (typeof opt_opts.closeBoxMargin !== "undefined") {

    this.closeBoxMargin_ = opt_opts.closeBoxMargin;
  }
  if (typeof opt_opts.closeBoxURL !== "undefined") {

    this.closeBoxURL_ = opt_opts.closeBoxURL;
  }
  if (typeof opt_opts.infoBoxClearance !== "undefined") {

    this.infoBoxClearance_ = opt_opts.infoBoxClearance;
  }
  if (typeof opt_opts.isHidden !== "undefined") {

    this.isHidden_ = opt_opts.isHidden;
  }
  if (typeof opt_opts.enableEventPropagation !== "undefined") {

    this.enableEventPropagation_ = opt_opts.enableEventPropagation;
  }

  if (this.div_) {

    this.draw();
  }
};

/**
 * Sets the content of the InfoBox.
 *  The content can be plain text or an HTML DOM node.
 * @param {string|Node} content
 */
InfoBox.prototype.setContent = function (content) {
  this.content_ = content;

  if (this.div_) {

    if (this.closeListener_) {

      google.maps.event.removeListener(this.closeListener_);
      this.closeListener_ = null;
    }

    // Odd code required to make things work with MSIE.
    //
    if (!this.fixedWidthSet_) {

      this.div_.style.width = "";
    }

    if (typeof content.nodeType === "undefined") {
      this.div_.innerHTML = this.getCloseBoxImg_() + content;
    } else {
      this.div_.innerHTML = this.getCloseBoxImg_();
      this.div_.appendChild(content);
    }

    // Perverse code required to make things work with MSIE.
    // (Ensures the close box does, in fact, float to the right.)
    //
    if (!this.fixedWidthSet_) {
      this.div_.style.width = this.div_.offsetWidth + "px";
      if (typeof content.nodeType === "undefined") {
        this.div_.innerHTML = this.getCloseBoxImg_() + content;
      } else {
        this.div_.innerHTML = this.getCloseBoxImg_();
        this.div_.appendChild(content);
      }
    }

    this.addClickHandler_();
  }

  /**
   * This event is fired when the content of the InfoBox changes.
   * @name InfoBox#content_changed
   * @event
   */
  google.maps.event.trigger(this, "content_changed");
};

/**
 * Sets the geographic location of the InfoBox.
 * @param {LatLng} latlng
 */
InfoBox.prototype.setPosition = function (latlng) {

  this.position_ = latlng;

  if (this.div_) {

    this.draw();
  }

  /**
   * This event is fired when the position of the InfoBox changes.
   * @name InfoBox#position_changed
   * @event
   */
  google.maps.event.trigger(this, "position_changed");
};

/**
 * Sets the zIndex style for the InfoBox.
 * @param {number} index
 */
InfoBox.prototype.setZIndex = function (index) {

  this.zIndex_ = index;

  if (this.div_) {

    this.div_.style.zIndex = index;
  }

  /**
   * This event is fired when the zIndex of the InfoBox changes.
   * @name InfoBox#zindex_changed
   * @event
   */
  google.maps.event.trigger(this, "zindex_changed");
};

/**
 * Returns the content of the InfoBox.
 * @returns {string}
 */
InfoBox.prototype.getContent = function () {

  return this.content_;
};

/**
 * Returns the geographic location of the InfoBox.
 * @returns {LatLng}
 */
InfoBox.prototype.getPosition = function () {

  return this.position_;
};

/**
 * Returns the zIndex for the InfoBox.
 * @returns {number}
 */
InfoBox.prototype.getZIndex = function () {

  return this.zIndex_;
};

/**
 * Shows the InfoBox.
 */
InfoBox.prototype.show = function () {

  this.isHidden_ = false;
  if (this.div_) {
    this.div_.style.visibility = "visible";
  }
};

/**
 * Hides the InfoBox.
 */
InfoBox.prototype.hide = function () {

  this.isHidden_ = true;
  if (this.div_) {
    this.div_.style.visibility = "hidden";
  }
};

/**
 * Adds the InfoBox to the specified map or Street View panorama. If <tt>anchor</tt>
 *  (usually a <tt>google.maps.Marker</tt>) is specified, the position
 *  of the InfoBox is set to the position of the <tt>anchor</tt>. If the
 *  anchor is dragged to a new location, the InfoBox moves as well.
 * @param {Map|StreetViewPanorama} map
 * @param {MVCObject} [anchor]
 */
InfoBox.prototype.open = function (map, anchor) {

  var me = this;

  if (anchor) {

    this.position_ = anchor.getPosition();
    this.moveListener_ = google.maps.event.addListener(anchor, "position_changed", function () {
      me.setPosition(this.getPosition());
    });
  }

  this.setMap(map);

  if (this.div_) {

    this.panBox_();
  }
};

/**
 * Removes the InfoBox from the map.
 */
InfoBox.prototype.close = function () {

  var i;

  if (this.closeListener_) {

    google.maps.event.removeListener(this.closeListener_);
    this.closeListener_ = null;
  }

  if (this.eventListeners_) {
    
    for (i = 0; i < this.eventListeners_.length; i++) {

      google.maps.event.removeListener(this.eventListeners_[i]);
    }
    this.eventListeners_ = null;
  }

  if (this.moveListener_) {

    google.maps.event.removeListener(this.moveListener_);
    this.moveListener_ = null;
  }

  if (this.contextListener_) {

    google.maps.event.removeListener(this.contextListener_);
    this.contextListener_ = null;
  }

  this.setMap(null);
};



// isSimple means one marker in a map, with no pans.
var Bmap, TextualZoomControl, 
__hasProp = {}.hasOwnProperty,
__extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor(); child.__super__ = parent.prototype; return child; };

Bmap = (function() {

  function Bmap(lat, lng, ele, isSimple) {
    this.lat = lat;
    this.lng = lng;
    this.overId = null;
    this.initedMarkModalIds = {};
    this.tipTimers = {};
    this.yellowIcons = {};
    this.blueIcons = {};

    this.elem = $(ele);
    this.isTesting = true;

    if(blanee.utils.isBlank(isSimple) || isSimple == false ){
      this.isSimple = false;
    }else{
      this.isSimple = true;
    } 

    this.side_bar_html = ""; 

    // global "map" variable
    // arrays to hold copies of the markers and html used by the side_bar 
    // because the function closure trick doesnt work there 
    this.gmarkers = []; 
    this.cmarkers = []
    this.gicons = [];

    //this.iconImage = new google.maps.MarkerImage('/images/mapIcons/marker_red.png', new google.maps.Size(20, 34), new google.maps.Point(0,0), new google.maps.Point(9, 34));
    this.iconShadow = new google.maps.MarkerImage('/images/mapIcons/shadow50.png', new google.maps.Size(37, 34), new google.maps.Point(0,0),  new google.maps.Point(0, 10));
    this.iconShape = {
      coord: [9,0,6,1,4,2,2,4,0,8,0,12,1,14,2,16,5,19,7,23,8,26,9,30,9,34,11,34,11,30,12,26,13,24,14,21,16,18,18,16,20,12,20,8,18,4,16,2,15,1,13,0],
      type: 'poly'
    };
    //this.gicons["red"] = new google.maps.MarkerImage("/images/mapIcons/marker_red.png", new google.maps.Size(20, 34),new google.maps.Point(0,0), new google.maps.Point(9, 34));
    //this.gicons["green"] = this.getMarkerImage("green");


    this.iconImage = this.getMarkerImage("red");


    this.map = null;
    this.newInfo = {}, 
    this.newBox = {};
    this.newMarkers = {};
  }


  Bmap.prototype.getMarkerImage = function(iconColor, ad) {
    if ((typeof(iconColor)=="undefined") || (iconColor==null)) { 
      iconColor = "red"; 
    }
    if (ad){
      if((/yellow/).test(iconColor)){
        this.gicons[iconColor] = new google.maps.MarkerImage("/images/icons/active_gry.png", new google.maps.Size(20, 34), new google.maps.Point(0,0), new google.maps.Point(9, 34));
      }else{
        this.gicons[iconColor] = new google.maps.MarkerImage("/images/icons/active.png", new google.maps.Size(20, 34), new google.maps.Point(0,0), new google.maps.Point(9, 34));
      }
    }else if(!this.gicons[iconColor]) {
      this.gicons[iconColor] = new google.maps.MarkerImage("/images/mapIcons/marker_"+ iconColor +".png", new google.maps.Size(20, 34), new google.maps.Point(0,0), new google.maps.Point(9, 34));
    } 
    return this.gicons[iconColor];
  }

  Bmap.prototype.move = function(meters) {
    return alert(this.name + (" moved " + meters + "m."));
  };



  Bmap.prototype.createMarker  = function(latlng,name,html,color, index, ad) {
    var contentString = html;
    var opts = {
      position: latlng,
      //shadow: iconShadow,
      map: this.map,
      //title: name,
      zIndex: 10 //Math.round(latlng.lat()*-100000)<<5
    };
    if(!this.isSimple){
      opts["icon"] =  this.getMarkerImage(color, ad);
    }else{
      opts["icon"] =  new google.maps.MarkerImage("/images/map/active.png", new google.maps.Size(20, 34), new google.maps.Point(0,0), new google.maps.Point(9, 34));
    }
    var marker = new google.maps.Marker(opts);

    var self = this; 
    self.gmarkers.push(marker);
    return marker;
  }


  Bmap.prototype.myclick = function(i) {
    google.maps.event.trigger(this.gmarkers[i], "mouseover");
  }


  Bmap.prototype.addTimer = function(i, callback){
    var self = this;
    self.clearTimer(i);
    if(self.tipTimers[i] == undefined || self.tipTimers[i]  == null){
      self.tipTimers[i] = []; 
    } 
    if( (typeof self.tipTimers[i] == "object") ){
      self.tipTimers[i].push(callback); 
    }
  };

  Bmap.prototype.clearTimer = function(i){
    var self = this;
    if(self.tipTimers[i] != undefined && self.tipTimers[i]  != null && (typeof self.tipTimers[i] == "object") ){
      $.each(self.tipTimers[i], function(k, t){
        window.clearTimeout(t);
      });
    }else{
      self.tipTimers[i] = null; 
    }
  };

  Bmap.prototype.renderMarker = function(lat, lng, label, html, i, url, ad){

    var point = new google.maps.LatLng(lat,lng);		  

    var self = this;
    self.getMarkerImage("yellow_"+i, ad);
    self.getMarkerImage("blue_"+i, ad);

    self.blueIcons[i] = new Image();

    if(ad ){
      self.blueIcons[i].src = "/images/icons/active.png";
    }else{
      self.blueIcons[i].src = "/images/mapIcons/marker_blue_"+ i +".png";
    }

    self.yellowIcons[i] = new Image();
    if(ad ){
      self.blueIcons[i].src = "/images/icons/active_gry.png";
    }else{
      self.yellowIcons[i].src = "/images/mapIcons/marker_yellow_"+ i +".png";
    }

    var marker = this.createMarker(point,label,false,"blue_"+i, i, ad);
    //define the text and style for all infoboxes
    var boxText = document.createElement("div");
    boxText.style.cssText = "border: 1px solid #ccc;background:#fff;position: relative;min-height: 133px;_height: 133px;width:365px;z-index: 2147483647; color:#333; font-family:Arial; font-size:12px; padding: 9px 5px 0 14px;border-radius:6px; -webkit-border-radius:6px; -moz-border-radius:6px;";
    boxText.innerHTML = html; 
    this.newBox[i]=boxText;

    if(!self.isSimple){
      //Define the infobox
      google.maps.event.addListener(marker, 'mouseover', (function(marker, i){
        return  function() {
          if(self.isTesting) return;


          //if(self.overId != i){
          self.overId = i;
          //console.debug("mouse over " + i);
          self.addTimer(i, window.setTimeout(function(){
            //console.debug("mouse over delayed " + i);
            marker.setIcon(self.getMarkerImage("yellow_"+i, ad));

            if(!self.initedMarkModalIds[i]){
              self.newInfo[i] = new SmartInfoWindow({position: self.newMarkers[i].getPosition(), elem: self.elem, map: self.map, content: self.newBox[i]});
              self.initedMarkModalIds[i] = true;
            } 
          }, 100));
          //}

        }; })(marker, i));

        google.maps.event.addListener(marker, 'mouseout',  function() {
          if(self.isTesting) return;
          //console.debug("mouse out " + i);

          self.addTimer(i, window.setTimeout(function(){
            //console.debug("mouse delayed out " + i);
            if(self.overId == i){
              self.overId = null;
            }

            marker.setIcon(self.getMarkerImage("blue_"+i, ad));
            if(self.initedMarkModalIds[i]){
              self.newInfo[i].close();
              self.initedMarkModalIds[i] = false;
            }

          }, 100));
          //$.each(self.tipTimers, function(i, t){
          // window.clearTimeout(t);
          //});
          //self.tipTimers = [];


        });

        $("#business_" + i ).mouseover(function(){
          if(self.map.getBounds().contains(self.newMarkers[i].getPosition())){
            google.maps.event.trigger(self.newMarkers[i], "mouseover");
          }
        }).mouseout(function(){
          if(self.map.getBounds().contains(self.newMarkers[i].getPosition())){
            google.maps.event.trigger(self.newMarkers[i], "mouseout");
          }
        });
    }

    if(url!= null && url != undefined){
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          document.location.href = url;
        }
      })(marker, i));
    }

    return marker;
  }


  Bmap.prototype.downloadMarkers = function(url){
    // Read the data from example.xml
    this.downloadUrl(url+".xml", function(doc) {
      // downloadUrl("/example.xml", function(doc) {
      var xmlDoc = xmlParse(doc);
      var markers = xmlDoc.documentElement.getElementsByTagName("marker");
      // var newMarkers = [], 
      // 		marker;
      this.cmarkers = [];
      for (var i = 0; i < markers.length; i++) {
        // obtain the attribues of each marker
        var lat = parseFloat(markers[i].getElementsByTagName('lat')[0].childNodes[0].nodeValue);
        var lng = parseFloat(markers[i].getElementsByTagName('lng')[0].childNodes[0].nodeValue);
        var html = markers[i].getElementsByTagName('html')[0].childNodes[0].nodeValue;
        var label = markers[i].getElementsByTagName('label')[0].childNodes[0].nodeValue;
        var index = markers[i].getElementsByTagName('index')[0].childNodes[0].nodeValue;
        this.cmarkers.push(new google.maps.LatLng(lat, lng));
        html  = '<![CDATA[" and ends with<br> and ends with"]]>';
        // create the marker
        this.newMarkers.push(this.renderMarker(lat, lng, label, html, i));
      }
      this.fitBounds();
      // put the assembled side_bar_html contents into the side_bar div
      // document.getElementById("side_bar").innerHTML = side_bar_html;
    });
  }


  //[{lat:33, lng: -6, html: 'sss', label: 'label'}]
  Bmap.prototype.initMarkers = function(markers){
    this.cmarkers = [];
    for (var i = 0; i < markers.length; i++) {
      this.cmarkers.push(new google.maps.LatLng(markers[i]["lat"], markers[i]["lng"]));
      this.newMarkers[markers[i]["index"]] = this.renderMarker(markers[i]["lat"], markers[i]["lng"], "" + (markers[i]["index"] + 1),  markers[i]["html"] , markers[i]["index"], markers[i]["url"],  markers[i]["ad"]);
    }
    this.fitBounds();
  }

  Bmap.prototype.fitBounds = function (){
    if(this.cmarkers.length > 0){
      var bounds = new google.maps.LatLngBounds
      for(var i = 0; i < this.cmarkers.length; i++){
        bounds.extend(this.cmarkers[i]);	
      }

      var map_center = bounds.getCenter();
      this.map.setCenter(map_center);
      this.map.panToBounds(bounds);
      if(this.isSimple || this.cmarkers.length == 1){
        this.map.setCenter(map_center);
        this.map.setZoom(14);
      }else{
        this.map.fitBounds(bounds);
      }

    }else{
      return null;
    }
  }


  Bmap.prototype.init = function( markersArr, ele) {
    var lat = 33.5875, lng = -7.61445;
    if(this.lat != null){
      lat = this.lat;
    }

    if(this.lng != null){
      lng = this.lng;
    }

    // create the map
    // atlng = new google.maps.LatLng(33.5875, -7.61445);
    // atlng = new google.maps.LatLng(lat, lng);
    var myOptions = {
      zoom: 12,
      center: new google.maps.LatLng(lat, lng),
      mapTypeControl: false,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        position: google.maps.ControlPosition.BOTTOM_CENTER
      },
      panControl: false,
      navigationControl: false,
      zoomControl: false,
      scaleControl: false,
      streetViewControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }


    this.map = new google.maps.Map($(this.elem).get(0), myOptions);
    var self = this;
    //google.maps.event.addListener(this.map, 'mouseout', function() { });


    if(markersArr != undefined && markersArr != null){
      if(blanee.utils.isString(markersArr)){
        self.downloadMarkers(markersArr);	

      }else{
          self.initMarkers(markersArr);		
      }

    }

    //if(blanee.utils.isBlank(self.zoom_control ) ){
    self.zoom_control = new TextualZoomControl(self);
    self.zoom_control.index = 1;
    // }
    self.check();
  };

  Bmap.prototype.fixMap = function(){

    if($('#business_map').length > 0){
      var msie6 = $.browser == 'msie' && $.browser.version < 7;
      if (!msie6) {
        var min_top = $('#businesses_list').offset().top - parseFloat($('#businesses_list').css('margin-top').replace(/auto/, 0));
        var height = $("#business_map").height();
        var max_top = min_top + $("#businesses_list").height()  - height  - 24; // 24 is the add business footer's height. or the bigger map will cover it.;
        $(window).unbind("scroll").scroll(function (event) {
          // what the y position of the scroll is
          var y = $(this).scrollTop();
          // whether that's below the form
          if (y > min_top && (y ) < max_top) {
            // if so, ad the fixed class
            $('#business_map').addClass('fixed').css("top", "0px");
          } else {
            // otherwise remove it
            if(y <= min_top){
              $('#business_map').removeClass('fixed').css("top",  "0px");
            }else if(y  >= max_top ){
              $('#business_map').removeClass('fixed').css("top", "" + (max_top  - min_top) + "px");
            }
          }
        });
      }
    }
  };







  // This function picks up the click and opens the corresponding info window
  TextualZoomControl = (function(){
    function TextualZoomControl(bmap) {
      this.g = google.maps;
      this.bmap = bmap;
      this.elem = $(bmap.elem);
      this.map =  bmap.map;



      var zoom = $("<div class='zoomCtl'></div>");
      var ctl1 =  $("<div class='zoomIn '><div class='map_btn'><img src='/images/icons/zoom_in.png'></div></div>");
      zoom.append(ctl1); 

      var ctl6 =  $("<div class='zoomOut '><div class='map_btn'><img src='/images/icons/zoom_out.png'></div></div>");
      zoom.append(ctl6); 
      this.elem.append(zoom); 

      this.g.event.addDomListener(ctl1.get(0), "click", function() {
        bmap.map.setZoom(bmap.map.getZoom()+1);
      });
      this.g.event.addDomListener(ctl6.get(0), "click", function() {
        bmap.map.setZoom(bmap.map.getZoom()-1);
      });

      if(!bmap.isSimple){

        var ctl2 =  $("<div class='panUp '><div class='map_btn'><img src='/images/icons/map_arrow_up.png'></div></div>");
        this.elem.append(ctl2); 
        this.g.event.addDomListener(ctl2.get(0), "click", function() {
          bmap.map.panBy(0,-100);
        });

        var ctl3 =  $("<div class='panDown '><div class='map_btn'><img src='/images/icons/map_arrow_down.png'></div></div>");
        this.elem.append(ctl3); 
        this.g.event.addDomListener(ctl3.get(0), "click", function() {
          bmap.map.panBy(0,100); 
        });



        var ctl4 =  $("<div class='panLeft '><div class='map_btn'><img src='/images/icons/map_arrow_left.png'></div></div>");
        this.elem.append(ctl4); 
        this.g.event.addDomListener(ctl4.get(0), "click", function() {
          bmap.map.panBy(-100,0); 
        });

        var ctl5 =  $("<div class='panRight '><div class='map_btn'><img src='/images/icons/map_arrow_right.png'></div></div>");
        this.elem.append(ctl5); 
        this.g.event.addDomListener(ctl5.get(0), "click", function() {
          bmap.map.panBy(100,0); 
        });

      }

    };

    return TextualZoomControl;
  })();






  Bmap.prototype.render = function(markersArr) {
    this.init(markersArr);
    this.fixMap();
  };



  Bmap.prototype.initBusinessList = function(markersArr){
    // Less Map Â» + Â« Mo' Map
    if($("#enlarge_map").length > 0){

      var self = this;
      $( "#enlarge_map" ).click(function(){
        $( ".bloc_map" ).animate( { width: "500px" }, { queue: false, duration: 0 });
        $( "#block_1_search" ).animate( { width: "443px" }, { duration: 0 });
        $( self.elem).animate( { width: "478px", height: "380px" }, { duration: 0 },function(){ }); 
        $(this).hide();
        $( "#reduce_map" ).show();
        $('#morph_map_up').show();
        $('#business_map_wrapper').css({left: '410px'});
        $('#local').css({width: '255px'});
        $('#folder').css({width: '255px'});
        self.init(markersArr);
        Bmap.checkBsMap();
        self.fixMap();
      });

      $( "#reduce_map" ).click(function(){
        $( ".bloc_map" ).animate( { width: "300px" }, { duration: 0 });
        $( "#block_1_search" ).animate( { width: "613px" }, { duration: 0 });
        $(self.elem).animate( { width: "278px", height: "300px" }, { duration: 0 },function(){}); 
        $('#business_map_wrapper').css({left: '610px'});
        $('#local').css({width: '455px'});
        $('#folder').css({width: '455px'});
        $(this).hide();
        $( "#enlarge_map" ).show();
        self.init(markersArr);
        Bmap.checkBsMap();
        self.fixMap();
        //this.map.panBy(150,0); 
      });

      Bmap.checkBsMap();
    }


    this.init(markersArr);
    $( "#reduce_map" ).hide();
    this.fixMap();
  };

  Bmap.prototype.initSingleMap =  function( label){
    this.isSimple = true;
    var markers = [{lat:this.lat, lng: this.lng, html: null, label: label}];
    this.init(markers);
    this.fixMap();
  };

  Bmap.prototype.check = function(){
    this.isTesting = true;
    for(var i = 0; i < this.newMarkers.length; i++){
      google.maps.event.trigger(this.newMarkers[i], "mouseover");
      google.maps.event.trigger(this.newMarkers[i], "mouseout");
      google.maps.event.trigger(this.newMarkers[i], "mouseover");
      google.maps.event.trigger(this.newMarkers[i], "mouseout");

      google.maps.event.trigger(this.newMarkers[i], "mouseover");
      google.maps.event.trigger(this.newMarkers[i], "mouseout");
      google.maps.event.trigger(this.newMarkers[i], "mouseover");
      google.maps.event.trigger(this.newMarkers[i], "mouseout");
    }
    this.isTesting = false;
  };

  Bmap.checkBsMap = function(){
    if($( "#enlarge_map" ).length > 0 && $( "#reduce_map" ).length > 0){
      if($("#business_map").width() > 450){
        $( "#enlarge_map" ).hide();
        $( "#reduce_map" ).show();
        if($(".prev_page").length > 0){
          $(".prev_page").html((I18n.t("Previous").substring(0, 4)+"."));
        }

        if($(".next_page").length > 0){
          $(".next_page").html((I18n.t("Next").substring(0, 4)+"."));
        }
      }else{
        $( "#enlarge_map" ).show();
        $( "#reduce_map" ).hide();

        if($(".prev_page").length > 0){
          $(".prev_page").html((I18n.t("Previous")));
        }

        if($(".next_page").length > 0){
          $(".next_page").html((I18n.t("Next")));
        }
      }
    }
  };

  return Bmap;
})();

blanee.maps = Bmap;
