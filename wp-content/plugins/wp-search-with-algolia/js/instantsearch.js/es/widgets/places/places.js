function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
var _excluded = ["placesReference", "defaultPosition"],
  _excluded2 = ["places"];
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { key = _toPropertyKey(key); if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
function _objectWithoutProperties(source, excluded) { if (source == null) return {}; var target = _objectWithoutPropertiesLoose(source, excluded); var key, i; if (Object.getOwnPropertySymbols) { var sourceSymbolKeys = Object.getOwnPropertySymbols(source); for (i = 0; i < sourceSymbolKeys.length; i++) { key = sourceSymbolKeys[i]; if (excluded.indexOf(key) >= 0) continue; if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue; target[key] = source[key]; } } return target; }
function _objectWithoutPropertiesLoose(source, excluded) { if (source == null) return {}; var target = {}; var sourceKeys = Object.keys(source); var key, i; for (i = 0; i < sourceKeys.length; i++) { key = sourceKeys[i]; if (excluded.indexOf(key) >= 0) continue; target[key] = source[key]; } return target; }
/* Places.js is an optional dependency, no error should be reported if the package is missing */
/** @ts-ignore */

// using the type like this requires only one ts-ignore

/**
 * This widget sets the geolocation value for the search based on the selected
 * result in the Algolia Places autocomplete.
 */
var placesWidget = function placesWidget(widgetParams) {
  var _ref = widgetParams || {},
    placesReference = _ref.placesReference,
    _ref$defaultPosition = _ref.defaultPosition,
    defaultPosition = _ref$defaultPosition === void 0 ? [] : _ref$defaultPosition,
    placesOptions = _objectWithoutProperties(_ref, _excluded);
  if (typeof placesReference !== 'function') {
    throw new Error('The `placesReference` option requires a valid Places.js reference.');
  }
  var placesAutocomplete = placesReference(placesOptions);
  var state = {
    query: '',
    initialLatLngViaIP: undefined,
    isInitialLatLngViaIPSet: false
  };
  return {
    $$type: 'ais.places',
    $$widgetType: 'ais.places',
    init: function init(_ref2) {
      var helper = _ref2.helper;
      placesAutocomplete.on('change', function (eventOptions) {
        var _eventOptions$suggest = eventOptions.suggestion,
          value = _eventOptions$suggest.value,
          _eventOptions$suggest2 = _eventOptions$suggest.latlng,
          lat = _eventOptions$suggest2.lat,
          lng = _eventOptions$suggest2.lng;
        state.query = value;
        helper.setQueryParameter('insideBoundingBox', undefined).setQueryParameter('aroundLatLngViaIP', false).setQueryParameter('aroundLatLng', "".concat(lat, ",").concat(lng)).search();
      });
      placesAutocomplete.on('clear', function () {
        state.query = '';
        helper.setQueryParameter('insideBoundingBox', undefined);
        if (defaultPosition.length > 1) {
          helper.setQueryParameter('aroundLatLngViaIP', false).setQueryParameter('aroundLatLng', defaultPosition.join(','));
        } else {
          helper.setQueryParameter('aroundLatLngViaIP', state.initialLatLngViaIP).setQueryParameter('aroundLatLng', undefined);
        }
        helper.search();
      });
    },
    getWidgetUiState: function getWidgetUiState(uiState, _ref3) {
      var searchParameters = _ref3.searchParameters;
      var position = searchParameters.aroundLatLng || defaultPosition.join(',');
      var hasPositionSet = position !== defaultPosition.join(',');
      if (!hasPositionSet && !state.query) {
        var places = uiState.places,
          uiStateWithoutPlaces = _objectWithoutProperties(uiState, _excluded2);
        return uiStateWithoutPlaces;
      }
      return _objectSpread(_objectSpread({}, uiState), {}, {
        places: {
          query: state.query,
          position: position
        }
      });
    },
    getWidgetSearchParameters: function getWidgetSearchParameters(searchParameters, _ref4) {
      var uiState = _ref4.uiState;
      var _ref5 = uiState.places || {},
        _ref5$query = _ref5.query,
        query = _ref5$query === void 0 ? '' : _ref5$query,
        _ref5$position = _ref5.position,
        position = _ref5$position === void 0 ? defaultPosition.join(',') : _ref5$position;
      state.query = query;
      if (!state.isInitialLatLngViaIPSet) {
        state.isInitialLatLngViaIPSet = true;
        state.initialLatLngViaIP = searchParameters.aroundLatLngViaIP;
      }
      placesAutocomplete.setVal(query);
      placesAutocomplete.close();
      return searchParameters.setQueryParameter('insideBoundingBox', undefined).setQueryParameter('aroundLatLngViaIP', false).setQueryParameter('aroundLatLng', position || undefined);
    },
    getRenderState: function getRenderState(renderState, renderOptions) {
      return _objectSpread(_objectSpread({}, renderState), {}, {
        places: this.getWidgetRenderState(renderOptions)
      });
    },
    getWidgetRenderState: function getWidgetRenderState() {
      return {
        widgetParams: widgetParams
      };
    }
  };
};
export default placesWidget;