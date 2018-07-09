var simpleTalkCreatorMethod = (function($) {

    var BODY = 'st-body';
    var FRONTS = 'st-front';
    var HANDLES = 'st-handles';
    var LEGS = 'st-legs';
    var ACCESSORIES = 'st-accessories';

    var ST_BIURKO_110_ID = 'ST_biurko_110';
    var ST_BIURKO_140_ID = 'ST_biurko_140';
    var ST_BAREK_ID = 'ST_barek';
    var ST_BUFET_ID = 'ST_bufet';
    var ST_KANAPA_ID = 'ST_kanapa';
    var ST_KOMODA_90_LISTWA_ID = 'ST_komoda_90_listwa';
    var ST_KOMODA_90_SOLID_ID = 'ST_komoda_90_solid';
    var ST_KOMODA_DRZWI_ID = 'ST_komoda_drzwi';
    var ST_KOMODA_WASKA_ID = 'ST_komoda_waska';
    var ST_LOZKO_90_ID = 'ST_lozko_90';
    var ST_LOZKO_120_ID = 'ST_lozko_120';
    var ST_LOZKO_140_ID = 'ST_lozko_140';
    var ST_LOZKO_160_ID = 'ST_lozko_160';
    var ST_LOZKO_180_ID = 'ST_lozko_180';
    var ST_POLKA_KOSTKA_ID = 'ST_polka_kostka';
    var ST_POLKA_SCIENNA_ID = 'ST_polka_scienna';
    var ST_POLKA_SCIENNA_HACZYKI_ID = 'ST_polka_scienna_haczyki';
    var ST_REGAL_1X5_ID = 'ST_regal_1x5';
    var ST_REGAL_2X5_ID = 'ST_regal_2x5';
    var ST_REGAL_3X4_ID = 'ST_regal_3x4';
    var ST_REGAL_4X5_ID = 'ST_regal_4x5';
    var ST_RTV_120_ID = 'ST_rtv_120';
    var ST_RTV_180_ID = 'ST_rtv_180';
    var ST_STOL_KAWOWY_NISKI_ID = 'ST_stol_kawowy_niski';
    var ST_STOL_KAWOWY_WYSOKI_ID = 'ST_stol_kawowy_wysoki';
    var ST_STOL_KWADRAT_ID = 'ST_stol_kwadrat';
    var ST_STOL_OKRAGLY_ID = 'ST_stol_okragly';
    var ST_STOL_PROSTOKAT_ID = 'ST_stol_prostokat';
    var ST_STOLIK_NOCNY_DRZWI_ID = 'ST_stolik_nocny_drzwi';
    var ST_STOLIK_NOCNY_SZUFLADY_ID = 'ST_stolik_nocny_szuflady';
    var ST_SZAFA_1D_ID = 'ST_szafa_1D';
    var ST_SZAFA_1D_NADSTAWKA_ID = 'ST_szafa_1D_nadstawka';
    var ST_SZAFA_2D_ID = 'ST_szafa_2D';
    var ST_SZAFA_2D_NADSTAWKA_ID = 'ST_szafa_2D_nadstawka';
    var ST_SZAFA_4D_ID = 'ST_szafa_4D';
    var ST_SZAFA_NAROZNA_ID = 'ST_szafa_narozna';
    var ST_SZAFA_NAROZNA_NADSTAWKA_ID = 'ST_szafa_narozna_nadstawka';
    var ST_TOALETKA_ID = 'ST_toaletka';
    var ST_WITRYNA_ID = 'ST_witryna';

    function SimpleTalkResources_Class() {

        var self = this;
        var _resources = [];

        self.addResource = function(key, value) {

            _resources.push({
                key: key,
                value: value
            });
        }

        self.getResource = function(key) {

            for (var i = 0; i < _resources.length; ++i) {

                var r = _resources[i];
                if (r.key === key) {
                    return r.value;
                }
            }

            return '';
        }

        self.fill = function(resources) {

            for (var key in resources) {
                if (resources.hasOwnProperty(key)) {
                    self.addResource(key, resources[key]);
                }
            }

            console.log(_resources);
        }
    }

    function PriceCalculator_Class(translator) {

        var _map = {

            body_white: 'bialy',
            body_black: 'czarny',
            body_wood: 'dab',
            body_gray: 'szary',
            front_white: 'bialy',
            front_black: 'czarny',
            front_wood: 'dab',
            front_gray: 'szary',

            body_bed_white: 'bialy',
            body_bed_black: 'czarny',
            body_bed_wood: 'dab',
            body_bed_gray: 'szary',
            front_bed_white: 'bialy',
            front_bed_black: 'czarny',
            front_bed_wood: 'dab',
            front_bed_gray: 'szary',

            handles_white: 'bialy',
            handles_black: 'czarny',
            handles_gray: 'szary',
            legs_legs_wheels: 'kolko-do-biurka-kpl-4szt-simple-by-vox-czarny',
            legs_legs_black: 'noga-prosta-kpl-4szt-simple-by-vox-czarny',
            legs_legs_trapeze: 'noga-skosna-kpl-4szt-simple-by-vox-czarny',
            legs_legs_cone: 'noga-owalna-kpl-4szt-simple-by-vox-dab',
            legs_legs_wood: 'noga-prosta-kpl-4szt-simple-by-vox-dab',
            legs_legs_skids: 'ploza',
            legs_legs_none: 'slizgacz-kpl-4szt-simple-by-vox-czarny',

            type_body_bed: 'kolor-oskrzyni',
            type_front_bed: 'kolor-wezglowia',
            type_front: 'kolor-frontu',
            type_body: 'kolor-korpusu',
            type_legs: 'nozki',
            type_handles: 'kolor-uchwytu',
            type_accessories: 'akcesoria-do-listwy-funkcyjnej-pojedyncze-akcesoria',
            type_presets: 'akcesoria-do-listwy-funkcyjnej-gotowe-zestawy',

            accessories_akc_probowka: 'wazonik-simple',
            accessories_akc_ramka: 'ramka-do-zdjec-simple',
            accessories_akc_tablet: 'uchwyt-do-tabletu-simple',
            accessories_akc_telefon: 'uchwyt-do-telefonu-simple',
            accessories_akc_wyp25: 'zaslepka-250-simple',
            accessories_akc_wyp40: 'zaslepka-400-simple',
            accessories_akc_wyp15: 'zaslepka-150-simple',

            presets_biurko_140_zestaw_1: 'zestaw-akcesoriow-do-biurka-simple',
            presets_biurko_140_zestaw_2: 'zestaw-zaslepek-do-biurka-simple',
            presets_komoda_zestaw_1: 'zestaw-akcesoriow-do-komody-simple',
            presets_komoda_zestaw_2: 'zestaw-zaslepek-do-komody-simple',
            presets_rtv_zestaw_1: 'zestaw-zaslepek-do-szafki-rtv-180-simple',
            presets_stolik_nocny_zestaw_1: 'zestaw-akcesoriow-do-stolika-nocnego-simple'
        };

        var self = this;

        var _debug = true;
        var _prices = [];
        var _voxJson = null;
        var _translator = translator;
        var _itemsOutOfStock = [];
        var _accessories = [];

        function setImageOpacity()
        {      
            if(isUnavailableItem()) {
                $('.mainImage').each(function(){
                    $(this).css("opacity","0.6");
                });
                $('.mainImageHover').each(function(){
                    $(this).css("opacity","0.3");
                });
            }
            else {
                $('.mainImage, .mainImageHover').each(function(){
                    $(this).css("opacity","1");
                });
            }
        }

        function setAccessoriesOpacity()
         {    
            for(a in _accessories)
            {
                $(".st-accessories-img[src*='" + a + "']").each(function(){
                        $(this).animate({
                            opacity: 0.6,
                          }, 100);
                });

            }
         }

        self.getUnavailableAccessories = function()
        {
            return _accessories;
        }

        function isUnavailableItem ()
        {
            if(!jQuery.isEmptyObject(_itemsOutOfStock) || _accessories.length) return true;
            else return false;   
        }

        self.isUnavailableItem = isUnavailableItem;

        self.getUnavailableItemName = function(translator)
        {
                function getCorrectColorName(color, translator) {

                    var color = translator.getResource('cart-color-name-' + color);
                    return color ? color : translator.getResource('cart-unknow-color');
                }
                var result = [];
                
                if(_itemsOutOfStock['legs'])
                {
                    result.push(translator.getResource('cart-legs') + " - " + getCorrectColorName(_itemsOutOfStock['legs'], translator));
                }

                if(_itemsOutOfStock['handles'])
                {
                    result.push(translator.getResource('cart-handles') + " - " + getCorrectColorName(_itemsOutOfStock['handles'], translator));
                }

                if(_itemsOutOfStock['body_bed'])
                {
                    result.push(translator.getResource('cart-body-bed') + " - " + getCorrectColorName(_itemsOutOfStock['body_bed'], translator));
                }

                if(_itemsOutOfStock['front_bed'])
                {
                    result.push(translator.getResource('cart-front-bed') + " - " + getCorrectColorName(_itemsOutOfStock['front_bed'], translator));
                }

                if(_itemsOutOfStock['body'])
                {
                    result.push(translator.getResource('cart-body') + " - " + getCorrectColorName(_itemsOutOfStock['body'], translator));
                }

                if(_itemsOutOfStock['front'])
                {
                    result.push(translator.getResource('cart-front') + " - " + getCorrectColorName(_itemsOutOfStock['front'], translator));
                }

                for(var i = 0; i < _accessories.length; i++)
                {
                    if(isPreset(_accessories[i])) 
                        result.push(translator.getResource("components_func_preset_name").toLowerCase());
                    else 
                        result.push(translator.getResource("components_" + _accessories[i] + "_name").toLowerCase());
                }

                return result;
        }

        function resetUnavailableItemst()
        {
            _itemsOutOfStock = [];
            _accessories = [];
        }

        function parseNameToCartId(state, part, map)
        {
            var cartId = getElementId(parseElementNameToId(state, part, map));
            return cartId;
        }

        function getElementAvailability(koszykId, state, type)
        {
            $.ajax({ 
                url: 'https://www.meble.vox.pl/ofertavox/podaj-stan/produkt/' + koszykId,
                type: 'post',
                async:false,
                success: function(data) {

                    console.log(data);

                    for(var key in data)
                    {
                      if (data.hasOwnProperty(key))
                        if(data[key] == 0) {
                          console.log("Brak towaru o id: "+ key);
                          if(type != 'accessories' && type != 'presets')
                          {                            
                              _itemsOutOfStock[type] = state;
                              
                          }
                          else {
                              _accessories.push(state);
                          }
                        }
                    }
                    setImageOpacity();
                    setAccessoriesOpacity();
                },
                error: function(data){

                    console.log('Nie można sprawdzić dostępności elementu.');
                }
  
            });
        }

        function getElementPrice(id) {

            for (var i = 0; i < _prices.length; ++i) {

                var p = _prices[i];
                if (p.id === id) {
                    return p.price;
                }
            }

            if (_debug) {
                console.log('No price data for id: ' + id + '.');
            }

            return 0.0;
        }

        function getElementId(id) {

            for (var i = 0; i < _prices.length; ++i) {

                var p = _prices[i];
                if (p.id === id) {
                    return p.koszyk_id;
                }
            }

            if (_debug) {
                console.log('No cart data for id: ' + id + '.');
            }

            return 0;
        }

        function isPreset(a) {

            if (
                a === 'biurko_140_zestaw_1' ||
                a === 'biurko_140_zestaw_2' ||
                a === 'komoda_zestaw_1' ||
                a === 'komoda_zestaw_2' ||
                a === 'rtv_zestaw_1' ||
                a === 'stolik_nocny_zestaw_1'
            ) {
                return true;
            }

            return false;
        }

        /**
         * Zwraca informacje czy mebel jest łóżkiem - dla tego typu mebli rozrównia się fronty i korpusy.
         * @param element - mebel do sprawdzenia.
         */
        function isBed(element) {

            return element.id.indexOf('ST_lozko') != -1;
        }

        /**
         * Konwertuje nazwy używane w aplikacji na identyfikatory w sklepie VOX.
         * @param element - nazwa wybranego elementu (czarny, biały itp.).
         * @param type - typ elementu (noga, baza, akcesoria);
         * @param map - mapa.
         */
        function parseElementNameToId(element, type, map) {

            var material = map[type + '_' + element.replace('-', '_')];
            var part = getElementType(type, map);

            if (_debug) {
                console.log("Price's key: " + (part + '_' + material));
            }

            return part + '_' + material;
        }

        /**
         * Konwertuje nazwy (TYP) używane w aplikacji na identyfikatory w sklepie VOX.
         * @param type - typ do przekonwertowania.
         * @param map - mapa.
         */
        function getElementType(type, map) {

            var part = map['type_' + type];
            return part;
        }

        /**
         * Zwraca informacje o tym czy konfigurator posiada dane o cenach.
         */
        self.hasPrices = function() {

            return _prices.length;
        }

        /**
         * Sprawdza czy wybrane czesci są dostępne
         *  @param state - obiekt w postaci { body, front, legs, handles, accessories, id }, gdzie accessories jest tablicą.
         */
        checkFurnitureAvailability = function(state) {

            resetUnavailableItemst();

            if (state.legs) {
                getElementAvailability(parseNameToCartId(state.legs, 'legs', _map), state.legs, 'legs');
            }
            if (state.handles) {
                getElementAvailability(parseNameToCartId(state.handles, 'handles', _map), state.handles, 'handles');
            }

            if (isBed(state)) {

                if (state.body) {
                    getElementAvailability(parseNameToCartId(state.body, 'body_bed', _map), state.body, 'body_bed');
                }
                if (state.front) {
                    getElementAvailability(parseNameToCartId(state.front, 'front_bed', _map), state.front, 'front_bed');
                }
            } else {

                if (state.body) {
                    getElementAvailability(parseNameToCartId(state.body, 'body', _map), state.body, 'body');
                }
                if (state.front) {
                    getElementAvailability(parseNameToCartId(state.front, 'front', _map), state.front, 'front');
                }
            }

            if (state.accessories) {

                for (var i = 0; i < state.accessories.length; ++i) {

                    var a = state.accessories[i];
                    var aType = isPreset(a) ? 'presets' : 'accessories';

                    getElementAvailability(parseNameToCartId(a, aType, _map), a, aType);

                }
            };
        }

        /**
         * Zwraca sumę cen wszystkich elementów składających się na skonfigurowany mebel.
         *  @param state - obiekt w postaci { body, front, legs, handles, accessories, id }, gdzie accessories jest tablicą.
         */
        self.getFurniturePrice = function(state) {

            var price = 0.0;
            checkFurnitureAvailability(state);

            if (state.legs) {
                price += getElementPrice(parseElementNameToId(state.legs, 'legs', _map));
            }
            if (state.handles) {
                price += getElementPrice(parseElementNameToId(state.handles, 'handles', _map));
            }

            if (isBed(state)) {

                if (state.body) {
                    price += getElementPrice(parseElementNameToId(state.body, 'body_bed', _map));
                }
                if (state.front) {
                    price += getElementPrice(parseElementNameToId(state.front, 'front_bed', _map));
                }
            } else {

                if (state.body) {
                    price += getElementPrice(parseElementNameToId(state.body, 'body', _map));
                }
                if (state.front) {
                    price += getElementPrice(parseElementNameToId(state.front, 'front', _map));
                }
            }

            if (state.accessories) {

                for (var i = 0; i < state.accessories.length; ++i) {

                    var a = state.accessories[i];
                    var aType = isPreset(a) ? 'presets' : 'accessories';

                    price += getElementPrice(parseElementNameToId(a, aType, _map));

                }
            }

            return self.hasPrices() ? price : 'N/A';
        }

        /**
         * Zwraca obiekt przekazywany później do koszyka. Struktura przetwarzana jest po stronie Vox'a.
         *  @param state - obiekt w postaci { body, front, legs, handles, accessories, id }, gdzie accessories jest tablicą prostych nazw wózka (lub presetu).
         */
        self.getFurnitureCart = function(state) {

            function getStateJson(state, map, prices) {

                function getElementJson(o, n, q, map) {

                    var id = getElementId(parseElementNameToId(o, n, map));
                    var type = getElementType(n, map);

                    var json = '"' + type + '"' + ': { "id": "' + id + '" , "quantity": "' + q + '" }';
                    return json;
                }

                var jsonArray = [];

                if (isBed(state)) {

                    if (state.body) {
                        jsonArray.push(getElementJson(state.body, 'body_bed', 1, map));
                    }
                    if (state.front) {
                        jsonArray.push(getElementJson(state.front, 'front_bed', 1, map));
                    }
                } else {

                    if (state.body) {
                        jsonArray.push(getElementJson(state.body, 'body', 1, map));
                    }
                    if (state.front) {
                        jsonArray.push(getElementJson(state.front, 'front', 1, map));
                    }
                }

                if (state.legs) {
                    jsonArray.push(getElementJson(state.legs, 'legs', 1, map));
                }
                if (state.handles) {
                    jsonArray.push(getElementJson(state.handles, 'handles', 1, map));
                }

                var json = '{ ' + jsonArray.join(',') + '}';
                return json;
            }

            function getProductId(state, prices) {

                for (var i = 0; i < prices.length; ++i) {

                    var p = prices[i];
                    if (p.pw_name === state.id) {
                        return p.pw_id;
                    }
                }

                console.log('No product data for:' + state.id);
                return '';
            }

            /**
             * Zwraca url'e do miniaturek pozycji w koszyku.
             */
            function getImage(state) {

                var prefix = "https://static1.vox.pl/files/assets/img/thumbs/";

                var f = state.front;
                var k = state.body;
                var m = state.id;
                var n = state.legs;
                var u = state.handles;

                if (!(f + n + u)) {
                    return prefix + m + "/" + k + "/";
                } else {

                    if (!(f + u)) {
                        return prefix + m + "/" + n + "/" + k + "/";
                    } else {

                        if (!u) {
                            return prefix + m + "/" + n + "/" + k + "/" + f + "/";
                        } else {
                            return prefix + m + "/" + n + "/" + u + "/" + k + "/" + f + "/";
                        }
                    }
                }
            }



            function getName(state, translator) {

                // Nazwa ma być zlepkiem: bazowej nazwy mebla (state.name) oraz jego składowych kolorów.

                function getCorrectColorName(color, translator) {

                    var color = translator.getResource('cart-color-name-' + color);
                    return color ? color : translator.getResource('cart-unknow-color');
                }
                var colors = [];

                if (state.legs) {
                    colors.push(translator.getResource('cart-legs') + ': ' + getCorrectColorName(state.legs, translator));
                }
                if (state.handles) {
                    colors.push(translator.getResource('cart-handles') + ': ' + getCorrectColorName(state.handles, translator));
                }

                if (isBed(state)) {

                    if (state.body) {
                        colors.push(translator.getResource('cart-body-bed') + ': ' + getCorrectColorName(state.body, translator));
                    }
                    if (state.front) {
                        colors.push(translator.getResource('cart-front-bed') + ': ' + getCorrectColorName(state.front, translator));
                    }
                } else {

                    if (state.body) {
                        colors.push(translator.getResource('cart-body') + ': ' + getCorrectColorName(state.body, translator));
                    }
                    if (state.front) {
                        colors.push(translator.getResource('cart-front') + ': ' + getCorrectColorName(state.front, translator));
                    }
                }

                return state.name + ', ' + colors.join(', ');
            }

            function getAccessoriesName(accesories, translator) {

                function formatAccessoriesName(name) {

                    try {
                        return name.substring(0, 1).toUpperCase() + name.substring(1).toLowerCase();
                    } catch (ex) {

                        console.log(ex);
                        return name;
                    }
                }

                var translate = '';

                if (isPreset(accesories)) {

                    var presetParts = accesories.split('_');

                    if (presetParts[presetParts.length - 1] === '1') {
                        translate = translator.getResource('components_func_preset_name');
                    } else {
                        translate = translator.getResource('components_cover_preset_name');
                    }
                } else {

                    translate = translator.getResource('components_' + accesories + '_name');
                }

                // Ładne formatowanie nazwy wózka (czy tam presetu).

                if (translate) {
                    translate = formatAccessoriesName(translate);
                }

                // Zwrócnie wyniku lub zaślepki (brak danych).

                return translate ? translate : translator.getResource('cart-unknow-accessories');
            }

            function getAccessoriesImage(accesories) {

                // todo: przygotować odpowiednie miniaturki.

                var prefix = "https://static1.vox.pl/files/assets/img/thumbs/accessories/";
                return prefix + accesories + '.jpg';
            }

            var itemsJson = getStateJson(state, _map, _prices);

            var products = [

                {
                    id: getProductId(state, _prices),
                    name: getName(state, _translator),
                    image: getImage(state) + 'thumb.jpg',
                    price: menu.simpleCreator.GetFurniturePriceBasedOnCurrentState(),
                    items: JSON.parse(itemsJson)
                }
            ];

            if (state.accessories) {

                var accessories = [];

                for (var i = 0; i < state.accessories.length; ++i) {

                    var a = state.accessories[i];
                    var aType = isPreset(a) ? 'presets' : 'accessories';

                    var id = getElementId(parseElementNameToId(a, aType, _map));

                    if (accessories.length) {

                        var added = false;

                        for (var j = 0; j < accessories.length; ++j) {

                            var aa = accessories[j];
                            if (aa.id === id) {
                                aa.q += 1;
                                added = true;
                                break;
                            }
                        }

                        if (!added) {
                            accessories.push({
                                id: id,
                                q: 1,
                                name: a
                            });
                        }
                    } else {

                        accessories.push({
                            id: id,
                            q: 1,
                            name: a
                        });
                    }
                }

                for (var k = 0; k < accessories.length; ++k) {

                    var a = accessories[k];

                    var aType = isPreset(a.name) ? 'presets' : 'accessories';
                    var type = getElementType(aType, _map);

                    var json = '{ "' + type + '"' + ': { "id": "' + a.id + '" , "quantity": "' + a.q + '" } }';

                    var accProduct = {

                        id: getProductId(state, _prices),
                        name: getAccessoriesName(a.name, _translator),
                        image: getAccessoriesImage(a.name),
                        items: JSON.parse(json)
                    };

                    products.push(accProduct);
                }
            }

            return products;
        }

        /**
         * Dodaje dane o cenach do słownika.
         *  @param json - dane o cenach w postaci JSONA.
         *  @param id - id produktu (np. ST_biurko_140).
         */
        self.addPricesData = function(json, id) {

            /**
             * Zwraca id w postaci: TYP_NAZWA np. nozki_noga-skosna-kpl-4szt-simple-by-vox-czarny.
             */
            function createId(j) {

                function getSecondIdPart(data) {

                    function haveToUseShortName(data) {

                        if (data.ELEMENT_KOD === 'akcesoria-do-listwy-funkcyjnej-gotowe-zestawy' || data.ELEMENT_KOD === 'akcesoria-do-listwy-funkcyjnej-pojedyncze-akcesoria' || data.ELEMENT_KOD === 'nozki') {
                            return false;
                        }

                        return true;
                    }

                    function getLastPartFromElementOption(element) {

                        var parts = element.split('-');
                        return parts[parts.length - 1];
                    }

                    // Sprawdzamy czy chodzi o płozę, bo mamy inne nazwy dla różnych długości.

                    var confParts = data.ELEMENT_OPCJA_KOD.split('-');
                    if (confParts[0] === 'ploza') {
                        return 'ploza';
                    }

                    var short = haveToUseShortName(data);
                    return short ? getLastPartFromElementOption(data.ELEMENT_OPCJA_KOD) : data.ELEMENT_OPCJA_KOD;
                }

                // Dla typowych elementów zapisywana jest tylko nazwa koloru. Akcesoriów i nóżek (nie wszystkich): cała nazwa.

                var el = j.ELEMENT_KOD;
                var ma = getSecondIdPart(j);

                return el + '_' + ma;
            }

            function getPrice(j) {

                var price = j.ELEMENT_OPCJA_CENA_PROMOCJA ? j.ELEMENT_OPCJA_CENA_PROMOCJA : j.ELEMENT_OPCJA_CENA;
                return price ? Number(price) : 0.0;
            }

            try {

                var jsonData = _voxJson = JSON.parse(json);
                if (jsonData) {

                    for (var i = 0; i < jsonData.length; ++i) {

                        var j = jsonData[i];

                        // Jeśli podano ID produktu to do wyniku wpadają tylko pozycje konkretnie z tym produktem związane.

                        if (!id || id === j.PRODUKT_KOD) {

                            var priceInfo = {

                                id: createId(j),
                                pw_id: j.PRODUKT_ID,
                                koszyk_id: j.ELEMENT_OPCJA_KOSZYK_ID,
                                pw_name: j.PRODUKT_KOD,
                                price: getPrice(j),
                                name: j.ELEMENT_OPCJA_NAZWA
                            };

                            _prices.push(priceInfo);
                        }
                    }
                } else {

                    if (_debug) {
                        console.log('Invalid price json data.');
                    }
                }
            } catch (err) {

                if (_debug) {
                    console.log(err.message);
                }
            }
        }
    }

    function ViewState() {

        var MAIN_VIEW = 1;
        var DETAILS_VIEW = 2;

        var self = this;

        var mode = MAIN_VIEW;
        var viewState = null;

        function setView(s) {
            viewState = s;
        }

        function setMode(m) {
            mode = m;
        }

        self.setMainView = function() {
            setMode(MAIN_VIEW);
        }
        self.setDetailsView = function() {
            setMode(DETAILS_VIEW);
        }
        self.setViewState = function(s) {
            setView(s);
        }

        self.isMainView = function() {
            return mode === MAIN_VIEW;
        }
        self.isDetailsView = function() {
            return mode === DETAILS_VIEW;
        }

        self.getState = function() {
            return viewState;
        }
    }

    function ResizeManager_Class(init, finit, imageContainer) {

        var REST_STATE = 0;
        var RUNING_STATE = 1;
        var CHILL_DELAY = 1500;

        var self = this;

        var _initAction = init;
        var _finalizeAction = finit;

        var _state = REST_STATE;
        var _chill = false;

        var _lastWidth = $(imageContainer).width();
        var _lastHeight = $(imageContainer).height();

        var _sizeChanged = false;

        self.isRunning = function() {
            return _state === RUNING_STATE;
        }

        self.start = function(w, h) {

            // Sprawdzanie czy zmienił się rozmiar.

            if (w != _lastWidth || h != _lastHeight) {

                _sizeChanged = true;

                _lastWidth = w;
                _lastHeight = h;
            } else {
                _sizeChanged = false;
            }

            _chill = true;

            if (!self.isRunning()) {

                if (_initAction && _sizeChanged) {
                    _initAction();
                }
                _state = RUNING_STATE;
            }

            if (_chill) {

                setTimeout(function() {

                    if (_chill && _state === RUNING_STATE && _finalizeAction) {

                        self.stop();
                        _finalizeAction();
                    }

                }, CHILL_DELAY);
            }
        }

        self.stop = function() {

            _state = REST_STATE;
            _chill = false;
            _sizeChanged = false;
        }
    }

    function VoxBoxSaveManager_Class(userId, translator, fromEdit) {

        var self = this;
        var _userId = userId;
        var _translator = translator;
        var _fromEdit = fromEdit;

        var _debug = false;

        self.createHtml = function() {

            var noUserLoggedDesc = _translator.getResource('other_no_logged_into_voxbox');
            var placeInRoom = _fromEdit ? _translator.getResource('other_edit') : _translator.getResource('other_place_in_room');
            var yoursProjectName = _translator.getResource('other_yours_project_name');
            var yoursProjectNameSt = _translator.getResource('other_yours_project_name_st');
            var save = _translator.getResource('voxbox_menu_save_button');
            var yoursProjectNameDesc = _translator.getResource('other_yours_project_name_desc');

            var html = '<div class="st-voxbox-save-modal-container">';

            if (_userId || _debug) {

                html +=
                    '<div class="st-voxbox-save-info">' +
                    '<p>' + yoursProjectName + '</p>' +
                    '<textarea type="text" id="menuTitle" value="' + yoursProjectNameSt + '" data-toggle="tooltip" title="' + yoursProjectNameDesc + '"></textarea>' +
                    '<div class="row">' +
                    '<div class="col-xs-12 save-container">' +
                    '<button id="st-voxbox-save-btn" class="additionalButtons st-btn-red">' + save + '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="alert alert-success st-voxbox-save-result" role="alert">' +
                    '<p></p>' +
                    '</div>' +
                    '<div class="st-voxbox-goto">' +
                    '<button id="goVox" type="button" class="btn btn-default">' + placeInRoom + '</button>' +
                    '</div>';
            } else {

                html +=
                    '<div class="alert alert-info" role="alert">' +
                    '<p class="st-voxbox-save-modal-login">' + noUserLoggedDesc + '</p>' +
                    '</div>' +
                    '<div class="st-voxbox-goto">' +
                    '<button id="goVox" type="button" class="btn btn-default">' + placeInRoom + '</button>' +
                    '</div>';
            }

            html += '</div>';
            return html;
        }

        var _saveProjectClick = null;
        var _changeName = null;

        function onSaveClickAction(e) {

            if (_debug) {
                console.log('zapis');
            }

            e.preventDefault();
            if (_saveProjectClick) {
                _saveProjectClick(e);
            }
        }

        function onChangeNameAction(e) {

            if (_debug) {
                console.log('zmiana nazwy');
            }

            e.preventDefault();
            if (_changeName) {
                _changeName(e, $(this).val());
            }
        }

        function SendDataToVoxBoxAndClear(e) {

            if (_debug) {
                console.log('umieszczenie projektu w pokoju');
            }

            e.preventDefault();

            SendDataToVox();

            // Ustawienie domyślnego stanu konfiguratora.

            setTimeout(function() {

                SetAccordionInDefaultState();
                SetDefaultPreviewState();
                $('#main-image-container-view-change-front').addClass('active');
                $('#main-image-container-view-change-details').removeClass('active');
                ChangeViewToMain();

                $("#fog").show();

            }, 1300);
        }

        self.addEvents = function(saveProjectClick, changeName) {

            _saveProjectClick = saveProjectClick;
            _changeName = changeName;

            $("#st-voxbox-save-btn").off('click', onSaveClickAction).on('click', onSaveClickAction);
            $("#menuTitle").off('keyup', onChangeNameAction).on('keyup', onChangeNameAction);
            $("#goVox").off('click', SendDataToVoxBoxAndClear).on('click', SendDataToVoxBoxAndClear);
        }
    }

    /**
     * Klasa opisująca miejsce wykładania wózków na scenę.
     *  @areaA - rozmiar obrazu bazowego.
     *  @areaB - rozmiar obszaru zajmowanego przez szynę na obrazie bazowym.
     *  @start - punkt (lewy dolny) opisujący początek obszaru zajmowanego przez szynę.
     */
    function AccessoriesArea_Class(areaA, areaB, start) {

        // [UWAGI]: Do obliczania pozycji wózków użyto stałych wartości dla największego widoku (rozmiar wózków jest jeden i wbity na sztywno).

        var self = this;

        var _areaA = areaA;
        var _areaB = areaB;
        var _start = start;

        var _debug = false;

        /**
         * Modyfikuje położenie wózka uwzględniając "perspektywę".
         */
        function takeIntoAccountThePerspective(x, y, scale, idx, realWidth, furnitureId) {

            function getMagicXValueForIdx(idx) {
                return idx * 5;
            }

            function getMagicYValueForIdx(idx) {
                return idx * 6;
            }

            function createOffsetForRealWidth(width, furnitureId) {

                var offX = 752907.2 + (0.03085066 - 752907.2) / (1 + Math.pow(width / 3281548, 1.176677));
                var offY = 752907.2 + (0.03085066 - 752907.2) / (1 + Math.pow(width / 3281548, 1.176677));

                if (furnitureId && furnitureId === 'ST_rtv_180') {
                    offX = 0;
                    offY = 0;
                }
                if (furnitureId && furnitureId === 'ST_stolik_nocny_szuflady') {
                    offX *= 2;
                    offY *= 2;
                }

                return {
                    x: offX,
                    y: offY
                };
            }

            var newX = x;
            var newY = y;

            var magicOffset = createOffsetForRealWidth(realWidth, furnitureId);

            newY -= (magicOffset.y + (idx === 0 ? 0 : 0)) * scale;

            if (_debug) {
                console.log('skala: ' + scale + ' x: ' + x + '->' + newX + ' y: ' + y + '->' + newY);
            }

            return {
                x: newX,
                y: newY
            };
        }

        /**
         * Postkalkulacja miejsce na nowy wózek (nowy, czyli ten, który został przed chwilą dodany - znajduje się już w kolekcji accessories).
         *  @accessories - kolekcje wszystkich wózków.
         *  @screenWidth - aktualna szerokość widoku prezentującego podgląd.
         *  @screenHeight - aktualna wysokość widoku prezentującego podgląd.
         */
        self.getNewAccessoriesPosition = function(accessories, screenWidth, screenHeight, furnitureId) {

            return self.getPositionFor(accessories, screenWidth, screenHeight, accessories.length - 1, furnitureId);
        }

        /**
         * Przeliczenie rozmiaru wózka.
         *  @screenWidth - aktualna szerokość widoku prezentującego podgląd.
         *  @screenHeight - aktualna wysokość widoku prezentującego podgląd.
         *  @size - bazowy rozmiar wózka.
         */
        self.getNewAccessoriesSize = function(screenWidth, screenHeight, size) {

            var baseScreenWidth = 960;
            var baseScreenHeight = 570;

            var w = (size.a * screenWidth) / baseScreenWidth;
            var h = (size.b * screenWidth) / baseScreenWidth;

            return {
                w: w,
                h: h
            };
        }

        /**
         * Udostępnienie na zawnątrz obszaru zajmowanego przez szynę.
         */
        self.getAccessoriesArea = function() {
            return _areaB;
        }

        /**
         * Oblicza miejsce na nowy wózek (wg id).
         *  @accessories - kolekcje wszystkich wózków.
         *  @screenWidth - aktualna szerokość widoku prezentującego podgląd.
         *  @screenHeight - aktualna wysokość widoku prezentującego podgląd.
         *  @idx - indeks, do którego ma być zliczana szerokość wyłożonych wózków.
         */
        self.getPositionFor = function(accessories, screenWidth, screenHeight, idx, furnitureId) {

            function getYposForX(x, p1, p2, scale) {

                var a = (p2.y - p1.y) / (p2.x - p1.x);
                var b = p1.y - (a * p1.x);

                return (a * x) + (b * scale);
            }

            function getMagicXValueForIdx(idx) {
                return idx * 5;
            }

            function getMagicYValueForIdx(idx) {
                return idx * 6;
            }

            var baseScreenWidth = _areaA.a;
            var baseScreenHeight = _areaA.b;

            var accXpos = 0;
            var realWidth = 0;

            for (var i = 0; i < idx; ++i) {

                var w = accessories[i];

                accXpos += w.areaA.a - w.offset;
                realWidth += w.realWidth;
            }

            if (accessories.length > idx) {
                accXpos -= accessories[idx].offset;
            }

            var scale = screenWidth / baseScreenWidth;

            var xPos = (((accXpos - getMagicXValueForIdx(idx)) * (screenWidth / 960)) + (_start.x * scale));
            var yPos = getYposForX(xPos, _start, {
                x: _start.x + _areaB.a,
                y: _start.y + _areaB.b
            }, scale);

            // Im dalej w las tym funkcja powinna lekko przechylać się w stronę osi X - nie może iść równo liniowo ze względu na perspetywę.

            return takeIntoAccountThePerspective(xPos, yPos, scale, idx, realWidth, furnitureId);
        }
    }

    function ConfigPresentation_Class() {

        var self = this;

        var _accessories = [];

        var _body = null;
        var _front = null;
        var _legs = null;
        var _handles = null;

        function createSpecialPopupHtmlContent(html) {

            return html.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
        }

        function createPopover(preset) {

            function createPopoverHeader(preset) {

                var html = preset.popover.name;
                return html;
            }

            function createPopoverContent(preset) {

                var html = '<img class="text-center" src="' + preset.popover.url + '" /><p class="st-preset-popover">' + preset.popover.description + '</p>';
                return html;
            }

            if (preset.popover) {

                var popoverTitle = createSpecialPopupHtmlContent(createPopoverHeader(preset));
                var popoverContent = createSpecialPopupHtmlContent(createPopoverContent(preset));

                var popover = 'data-toggle="popover" data-placement="top" data-trigger="hover" title="' + popoverTitle + '" data-content="' + popoverContent + '"';

                return popover;
            } else {

                return '';
            }
        }

        self.addElement = function(element, type) {

            switch (type) {

                case BODY:
                    _body = element;
                    break;
                case 'st-front':
                    _front = element;
                    break;
                case HANDLES:
                    _legs = element;
                    break;
                case 'st-legs':
                    _handles = element;
                    break;
            }
        }

        self.addAccessories = function(accessories) {

            _accessories.push(accessories);
        }

        self.createBaseElementsHtml = function() {

            function createSingleThumbHtml(a) {

                var url = '../assets/menu/thumbs/' + a.thumb;
                var popover = createPopover(a, "top");

                var html =
                    '<div class="dekor st-miniature-container" data-name="' + a.name + '" ' + popover + '>' +
                    '<div class="dip-pw-color-sample img" style="background-image:' + "url('" + url + "')" + ';"></div>' +
                    '<div class="name">' + a.desc + '</div>' +
                    '</div>';

                return html;
            }

            var html = '';

            if (_body) {
                html += createSingleThumbHtml(_body);
            }
            if (_front) {
                html += createSingleThumbHtml(_front);
            }
            if (_legs) {
                html += createSingleThumbHtml(_legs);
            }
            if (_handles) {
                html += createSingleThumbHtml(_handles);
            }

            return html;
        }

        self.createAccessoriesHtml = function() {

            var html = '';

            for (var i = 0; i < _accessories.length; ++i) {

                var a = _accessories[i];

                var url = '../assets/menu/thumbs/' + a.thumb;
                var popover = createPopover(a, "top");

                html +=
                    '<div class="dekor st-miniature-container" data-name="' + a.name + '" ' + popover + '>' +
                    '<div class="dip-pw-color-sample img" style="background-image:' + "url('" + url + "')" + ';"></div>' +
                    '<div class="name">' + a.desc + '</div>' +
                    '</div>';
            }

            return html;
        }
    }

    function Accessories_Class(furnitureId, translator) {

        var self = this;

        var _elements = createDefaultElements(furnitureId, translator);
        var _presets = createPresets(furnitureId, _elements, translator);

        function createPresets(furnitureId, elements, translator) {

            var presetManager = new Presets_Class(furnitureId, elements, translator);
            return presetManager.getPresets();
        }

        function getElementForAccessoriesName(id, name, furnitureId, size, realWidth, translator, offset, preset) {

            function getThumb(name) {
                return name + '.png';
            }

            function getUrl(name, furnitureId) {
                return '../assets/img/accessories/' + furnitureId + '_' + name + '.png';
            }

            function getDesc(name, translator) {

                switch (name) {

                    case 'akc_memo':
                        return '';
                    case 'akc_probowka':
                        return '';
                    case 'akc_przybornik_duzy':
                        return '';
                    case 'akc_przybornik_sredni':
                        return '';
                    case 'akc_ramka':
                        return '';
                    case 'akc_tablet':
                        return '';
                    case 'akc_tablica':
                        return '';
                    case 'akc_telefon':
                        return '';
                    case 'akc_wyp25':
                        return '';
                    case 'akc_wyp40':
                        return '';
                    case 'akc_wyp15':
                        return '';
                }

                return '';
            }

            function getWidth(name, size) {

                for (var i = 0; i < size.length; ++i) {

                    var s = size[i];
                    if (s.name === name) {
                        return s.c;
                    }
                }

                return 0;
            }

            function getArea(name, size) {

                for (var i = 0; i < size.length; ++i) {

                    var s = size[i];
                    if (s.name === name) {
                        return {
                            a: s.a,
                            b: s.b
                        };
                    }
                }

                return null;
            }

            function createPopover(name, translator) {

                var descriptionManager = new AccessoriesDescription_Class(translator);
                var desc = descriptionManager.getDescription(name);
                if (desc) {

                    return {
                        name: desc.header,
                        description: desc.desc,
                        url: desc.url
                    };
                } else {

                    return null;
                }
            }

            var thumb = getThumb(name);
            var desc = getDesc(name, translator);
            var url = getUrl(name, furnitureId);
            var width = getWidth(name, size);
            var area = getArea(name, size);
            var popover = createPopover(name, translator);

            return getElement(id, name, thumb, desc, url, width, area, realWidth, offset, preset, popover);
        }

        /**
         * Tworzy obiekt reprezentujący wózek w aplikacji.
         *  @param id - identyfikator wózka.
         *  @param name - nazwa wózka.
         *  @param thumb - nazwa pliku miniaturki wyświetlanej w menu.
         *  @param desc - opis miniaturki wyświetlenej w menu.
         *  @param url - url do obrazka przedstawiającego wózek.
         *  @param width - przekątna obrazu.
         *  @param area - obiekt zawierający dwie wartości (a i b) opisujące szerokość i wysokość obrazka wózka.
         *  @param realWidth - szerokość wózka (fizyczna szerokość na listwie).
         *  @param offset - przesunięcie w lewo (o ile obrazek wózka nie zaczyna się przy tej właśnie krawędzi).
         *  @param preset - TRUE jeżeli element występuje tylko w ramach zestawu.
         *  @param popover - obiekt przechowujący info o dodatkowych informacjach wózka.
         */
        function getElement(id, name, thumb, desc, url, width, area, realWidth, offset, preset, popover) {

            var element = {
                id: id,
                name: name,
                thumb: thumb,
                desc: desc,
                url: url,
                width: width,
                areaA: area,
                realWidth: realWidth,
                offset: offset ? offset : 0,
                preset: (preset ? true : false),
                popover: popover
            };

            element.bigUrl = '../assets/menu/thumbs/' + element.thumb.substring(0, element.thumb.lastIndexOf('.')) + '_big.png';

            return element;
        }

        function getSizeForBiurko140() {

            var size = [];

            size.push({
                name: 'akc_wyp15',
                a: 89,
                b: 50,
                c: 102
            });
            size.push({
                name: 'akc_wyp25',
                a: 145,
                b: 80,
                c: 166
            });
            size.push({
                name: 'akc_wyp40',
                a: 228,
                b: 126,
                c: 255
            });
            size.push({
                name: 'akc_probowka',
                a: 24,
                b: 79,
                c: 30
            });
            size.push({
                name: 'akc_ramka',
                a: 96,
                b: 91,
                c: 111
            });
            size.push({
                name: 'akc_telefon',
                a: 61,
                b: 86,
                c: 79
            });
            size.push({
                name: 'akc_tablet',
                a: 174,
                b: 210,
                c: 197
            });
            size.push({
                name: 'akc_memo',
                a: 70,
                b: 102,
                c: 79
            });
            size.push({
                name: 'akc_przybornik_duzy',
                a: 207,
                b: 163,
                c: 238
            });
            size.push({
                name: 'akc_tablica',
                a: 139,
                b: 163,
                c: 214
            });

            return size;
        }

        function getSizeForKomoda90() {

            var size = [];
            var scale = 1.24;

            size.push({
                name: 'akc_wyp15',
                a: 89 * scale,
                b: 50 * scale,
                c: 102 * scale
            });
            size.push({
                name: 'akc_wyp25',
                a: 145 * scale,
                b: 80 * scale,
                c: 166 * scale
            });
            size.push({
                name: 'akc_wyp40',
                a: 228 * scale,
                b: 126 * scale,
                c: 255 * scale
            });
            size.push({
                name: 'akc_probowka',
                a: 24 * scale,
                b: 79 * scale,
                c: 30 * scale
            });
            size.push({
                name: 'akc_ramka',
                a: 96 * scale,
                b: 91 * scale,
                c: 111 * scale
            });
            size.push({
                name: 'akc_telefon',
                a: 61 * scale,
                b: 86 * scale,
                c: 79 * scale
            });
            size.push({
                name: 'akc_tablet',
                a: 174 * scale,
                b: 210 * scale,
                c: 197 * scale
            });
            size.push({
                name: 'akc_memo',
                a: 70 * scale,
                b: 102 * scale,
                c: 79 * scale
            });
            size.push({
                name: 'akc_tablica',
                a: 139 * scale,
                b: 163 * scale,
                c: 214 * scale
            });
            size.push({
                name: 'akc_przybornik_sredni',
                a: 46 * scale,
                b: 62 * scale,
                c: 54 * scale
            });

            return size;
        }

        function getSizeForRTV180() {

            var size = [];
            var scale = 0.78;

            size.push({
                name: 'akc_wyp15',
                a: 89 * scale,
                b: 50 * scale,
                c: 102 * scale
            });
            size.push({
                name: 'akc_wyp25',
                a: 145 * scale,
                b: 80 * scale,
                c: 166 * scale
            });
            size.push({
                name: 'akc_wyp40',
                a: 228 * scale,
                b: 126 * scale,
                c: 255 * scale
            });
            size.push({
                name: 'akc_probowka',
                a: 24 * scale,
                b: 79 * scale,
                c: 30 * scale
            });
            size.push({
                name: 'akc_ramka',
                a: 96 * scale,
                b: 91 * scale,
                c: 111 * scale
            });
            size.push({
                name: 'akc_telefon',
                a: 61 * scale,
                b: 86 * scale,
                c: 79 * scale
            });
            size.push({
                name: 'akc_tablet',
                a: 174 * scale,
                b: 210 * scale,
                c: 197 * scale
            });
            size.push({
                name: 'akc_memo',
                a: 70 * scale,
                b: 102 * scale,
                c: 79 * scale
            });
            size.push({
                name: 'akc_tablica',
                a: 139 * scale,
                b: 163 * scale,
                c: 214 * scale
            });
            size.push({
                name: 'akc_przybornik_sredni',
                a: 46 * scale,
                b: 62 * scale,
                c: 54 * scale
            });
            size.push({
                name: 'akc_przybornik_duzy',
                a: 207 * scale,
                b: 165 * scale,
                c: 238 * scale
            });

            return size;
        }

        function getSizeForStolikNocny() {

            var size = [];
            var scale = 1.66;

            size.push({
                name: 'akc_wyp15',
                a: 89 * scale,
                b: 50 * scale,
                c: 102 * scale
            });
            size.push({
                name: 'akc_wyp25',
                a: 145 * scale,
                b: 80 * scale,
                c: 166 * scale
            });
            size.push({
                name: 'akc_wyp40',
                a: 236 * scale,
                b: 127 * scale,
                c: 256 * scale
            });
            size.push({
                name: 'akc_probowka',
                a: 24 * scale,
                b: 79 * scale,
                c: 30 * scale
            });
            size.push({
                name: 'akc_ramka',
                a: 96 * scale,
                b: 91 * scale,
                c: 111 * scale
            });
            size.push({
                name: 'akc_telefon',
                a: 61 * scale,
                b: 86 * scale,
                c: 79 * scale
            });
            size.push({
                name: 'akc_tablet',
                a: 174 * scale,
                b: 210 * scale,
                c: 197 * scale
            });
            size.push({
                name: 'akc_memo',
                a: 70 * scale,
                b: 102 * scale,
                c: 79 * scale
            });
            size.push({
                name: 'akc_tablica',
                a: 139 * scale,
                b: 163 * scale,
                c: 214 * scale
            });
            size.push({
                name: 'akc_przybornik_sredni',
                a: 46 * scale,
                b: 62 * scale,
                c: 54 * scale
            });
            size.push({
                name: 'akc_przybornik_duzy',
                a: 207 * scale,
                b: 165 * scale,
                c: 238 * scale
            });
            size.push({
                name: 'akc_tablet_v2',
                a: 174 * scale,
                b: 210 * scale,
                c: 197 * scale
            });

            return size;
        }

        /**
         * Akcesoria do indywidualnej konfiguracji to:
         *  - Uchwyt do telefonu
         *  - Ramka do zdjęć
         *  - Uchwyt do tabletu
         *  - Wazonik
         *  - Zaślepka 15 cm
         *  - Zaślepka 25 cm
         *  - Zaślepka 40 cm
         */
        function createDefaultElementsForST(size, furnitureId, translator) {

            var elements = [];

            elements.push(getElementForAccessoriesName(1, 'akc_wyp15', furnitureId, size, 15, translator)); // Zaślepka 15cm
            elements.push(getElementForAccessoriesName(2, 'akc_wyp25', furnitureId, size, 25, translator)); // Zaślepka 25cm
            elements.push(getElementForAccessoriesName(3, 'akc_wyp40', furnitureId, size, 40, translator)); // Zaślepka 40cm
            elements.push(getElementForAccessoriesName(6, 'akc_probowka', furnitureId, size, 3.5, translator)); // Wazonik
            elements.push(getElementForAccessoriesName(9, 'akc_ramka', furnitureId, size, 16.5, translator)); // Ramka do zdjęć
            elements.push(getElementForAccessoriesName(4, 'akc_telefon', furnitureId, size, 11, translator)); // Uchwyt do telefonu

            return elements
        }

        function createDefaultElements(furnitureId, translator) {

            function createDefaultElementsForST_biurko_140(furnitureId, translator) {

                var size = getSizeForBiurko140();
                var elements = createDefaultElementsForST(size, furnitureId, translator);

                elements.push(getElementForAccessoriesName(10, 'akc_tablet', furnitureId, size, 31, translator)); // Uchwyt na tablet

                // TE ELEMENTY NIE WCHODZĄ BEZPOŚREDNIO W SKŁAD BIURKA:

                elements.push(getElementForAccessoriesName(5, 'akc_memo', furnitureId, size, 12, translator, 0, true));
                elements.push(getElementForAccessoriesName(7, 'akc_przybornik_duzy', furnitureId, size, 36, translator, 0, true));
                elements.push(getElementForAccessoriesName(11, 'akc_tablica', furnitureId, size, 24, translator, 0, true));

                return elements
            }

            function createDefaultElementsForST_komoda_90(furnitureId, translator) {

                var size = getSizeForKomoda90();
                var elements = createDefaultElementsForST(size, furnitureId, translator);

                elements.push(getElementForAccessoriesName(10, 'akc_tablet', furnitureId, size, 31, translator)); // Uchwyt na tablet

                // TE ELEMENTY NIE WCHODZĄ BEZPOŚREDNIO W SKŁAD KOMODY:

                elements.push(getElementForAccessoriesName(5, 'akc_memo', furnitureId, size, 12, translator, 0, true));
                elements.push(getElementForAccessoriesName(8, 'akc_przybornik_sredni', furnitureId, size, 7.5, translator, 0, true));

                return elements
            }

            function createDefaultElementsForST_rtv_180(furnitureId, translator) {

                var size = getSizeForRTV180();
                var elements = createDefaultElementsForST(size, furnitureId, translator);

                elements.push(getElementForAccessoriesName(10, 'akc_tablet', furnitureId, size, 31, translator)); // Uchwyt na tablet

                return elements
            }

            function createDefaultElementsForST_stolik_nocny(furnitureId, translator) {

                var size = getSizeForStolikNocny();
                var elements = createDefaultElementsForST(size, furnitureId, translator);

                elements.push(getElementForAccessoriesName(10, 'akc_tablet', furnitureId, size, 31, translator));
                //elements.push(getElementForAccessoriesName(12, 'akc_tablet_v2', furnitureId, size, 31));  // Uchwyt na tablet (wersja alternatywna dla szafki nocnej)

                // TE ELEMENTY NIE WCHODZĄ BEZPOŚREDNIO W SKŁAD STOLIKA NOCNEGO:

                elements.push(getElementForAccessoriesName(8, 'akc_przybornik_sredni', furnitureId, size, 7.5, translator, 0, true));

                return elements
            }

            function formatFurnitureId(furnitureId) {

                var parts = furnitureId.split('_');
                var formatedFurnitureId = 'ST_';

                for (var i = 1; i < parts.length; ++i) {

                    var p = parts[i];
                    formatedFurnitureId += p.toLowerCase() + '_';
                }

                return formatedFurnitureId.substring(0, formatedFurnitureId.length - 1);
            }

            switch (formatFurnitureId(furnitureId)) {

                case 'ST_biurko_140':
                    return createDefaultElementsForST_biurko_140(furnitureId, translator);
                case 'ST_komoda_90_listwa':
                    return createDefaultElementsForST_komoda_90(furnitureId, translator);
                case 'ST_rtv_180':
                    return createDefaultElementsForST_rtv_180(furnitureId, translator);
                case 'ST_stolik_nocny_szuflady':
                    return createDefaultElementsForST_stolik_nocny(furnitureId, translator);
            }

            return [];
        }

        function createSpecialPopupHtmlContent(html) {

            return html.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;");
        }

        function createAccIdArray(elements) {

            var result = [];

            for (var i = 0; i < elements.length; ++i) {

                var e = elements[i];
                if (e != null) {
                    result.push(e.id);
                }
            }

            return JSON.stringify(result);
        }

        function createPopover(preset, placement) {

            function createPopoverHeader(preset) {

                var html = preset.popover.name;
                return html;
            }

            function createPopoverContent(preset) {

                var html = '<img class="text-center st-popup-image" src="' + preset.popover.url + '" /><p class="st-preset-popover">' + preset.popover.description + '</p>';
                return html;
            }

            if (preset.popover) {

                var popoverTitle = createSpecialPopupHtmlContent(createPopoverHeader(preset));
                var popoverContent = createSpecialPopupHtmlContent(createPopoverContent(preset));

                var popover = 'data-toggle="popover" data-placement="' + (placement ? placement : 'bottom') + '" data-trigger="hover" title="' + popoverTitle + '" data-content="' + popoverContent + '"';

                return popover;
            } else {

                return '';
            }
        }

        self.createPresetsHtml = function(createDescriptionPanel) {

            function createDescriptionContainer() {

                var html = '<div class="st-preset-description-container">';

                html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';

                html += '<div class="row">';

                html += '<div class="col-md-12 col-sm-6 col-xs-12">';
                html += '<img src="../assets/img/preset1.jpg" />';
                html += '</div>';

                html += '<div class="col-md-12 col-sm-6 col-xs-12">';

                html +=
                    '<div class="st-preset-description-text">' +
                    '<p class="st-preset-description-text-main"></p>' +
                    '<p class="st-preset-description-text-more"></p>' +
                    '<p>' +
                    '<button id="st-accessories-preset-add" class="st-btn-red">' +
                    'Dodaj <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>' +
                    '</button>' +
                    '</p>' +
                    '</div>';

                html += '</div>';

                html += '</div>';

                return html;
            }

            var html = '';

            for (var i = 0; i < _presets.length; ++i) {

                var p = _presets[i];

                // Dodanie html'a.

                var url = '../assets/menu/thumbs/' + p.thumb;
                var popover = createPopover(p, "top");
                var accId = createAccIdArray(p.elements);
                var preId = p.id;

                html +=
                    '<div class="dekor st-miniature-container" data-as-one="' + p.asOne + '" data-preset-id="' + p.id + '" data-name="' + p.name + '" data-acc-id="' + accId + '" ' + popover + '>' +
                    '<div class="dip-pw-color-sample img" style="background-image:' + "url('" + url + "')" + ';"></div>' +
                    '<div class="name">' + p.desc + '</div>' +
                    '</div>';
            }

            if (createDescriptionPanel) {
                html += createDescriptionContainer();
            }

            return html;
        }

        self.createElementsHtml = function() {

            var html = '';

            for (var i = 0; i < _elements.length; ++i) {

                var e = _elements[i];

                // Jeżeli element występuje tylko w zestawie to nie jest wyświetlany na liście pojedynczych wózków.

                if (!e.preset) {

                    var url = '../assets/menu/thumbs/' + e.thumb;
                    var popover = createPopover(e,"top");

                    html +=
                        '<div class="dekor st-miniature-container" data-name="' + e.name + '" data-acc-id="' + e.id + '" ' + popover + '>' +
                        '<div class="dip-pw-color-sample img" style="background-image:' + "url('" + url + "')" + ';"></div>' +
                        '<div class="name">' + e.desc + '</div>' +
                        '</div>';
                }
            }

            return html;
        }

        self.getAccessoriesInfo = function(id) {

            for (var i = 0; i < _elements.length; ++i) {

                var e = _elements[i];
                if (e.id === id) {
                    return e;
                }
            }

            return null;
        }

        self.getPresetInfo = function(id) {

            for (var i = 0; i < _presets.length; ++i) {

                var e = _presets[i];
                if (e.id === id) {
                    return e;
                }
            }

            return null;
        }

        self.getPresetInfoByName = function(name) {

            for (var i = 0; i < _presets.length; ++i) {

                var e = _presets[i];
                if (e.name === name) {
                    return e;
                }
            }

            return null;
        }

        self.getAccessoriesList = function() {

            return _elements;
        }
    }

    function AccessoriesDescription_Class(translator) {

        var self = this;
        var _translator = translator;

        function getAccessoriesUrl(name) {
            return '../assets/img/popover/' + name + '.png';
        }

        var _desc = [{
                name: 'akc_probowka',
                header: translator.getResource('components_akc_probowka_name'),
                desc: translator.getResource('components_akc_probowka_description'),
                url: getAccessoriesUrl('akc_probowka')
            },
            {
                name: 'akc_przybornik_duzy',
                header: translator.getResource('components_akc_przybornik_duzy_name'),
                desc: translator.getResource('components_akc_przybornik_duzy_description'),
                url: getAccessoriesUrl('akc_przybornik_duzy')
            },
            {
                name: 'akc_przybornik_sredni',
                header: translator.getResource('components_akc_przybornik_sredni_name'),
                desc: translator.getResource('components_akc_przybornik_sredni_description'),
                url: getAccessoriesUrl('akc_przybornik_sredni')
            },
            {
                name: 'akc_ramka',
                header: translator.getResource('components_akc_ramka_name'),
                desc: translator.getResource('components_akc_ramka_description'),
                url: getAccessoriesUrl('akc_ramka')
            },
            {
                name: 'akc_tablet',
                header: translator.getResource('components_akc_tablet_name'),
                desc: translator.getResource('components_akc_tablet_description'),
                url: getAccessoriesUrl('akc_tablet')
            },
            {
                name: 'akc_tablica',
                header: translator.getResource('components_akc_tablica_name'),
                desc: translator.getResource('components_akc_tablica_description'),
                url: getAccessoriesUrl('akc_tablica')
            },
            {
                name: 'akc_telefon',
                header: translator.getResource('components_akc_telefon_name'),
                desc: translator.getResource('components_akc_telefon_description'),
                url: getAccessoriesUrl('akc_telefon')
            },
            {
                name: 'akc_telefon',
                header: translator.getResource('components_akc_telefon_name'),
                desc: translator.getResource('components_akc_telefon_description'),
                url: getAccessoriesUrl('akc_telefon')
            },
            {
                name: 'akc_wyp15',
                header: translator.getResource('components_akc_wyp15_name'),
                desc: translator.getResource('components_akc_wyp15_description'),
                url: getAccessoriesUrl('akc_wyp15')
            },
            {
                name: 'akc_wyp25',
                header: translator.getResource('components_akc_wyp25_name'),
                desc: translator.getResource('components_akc_wyp25_description'),
                url: getAccessoriesUrl('akc_wyp25')
            },
            {
                name: 'akc_wyp40',
                header: translator.getResource('components_akc_wyp40_name'),
                desc: translator.getResource('components_akc_wyp40_description'),
                url: getAccessoriesUrl('akc_wyp40')
            }
        ];

        self.getDescription = function(name) {

            for (var i = 0; i < _desc.length; ++i) {

                var d = _desc[i];
                if (d.name === name) {
                    return d;
                }
            }

            return null;
        }
    }

    function Presets_Class(furnitureId, elements, translator) {

        var self = this;

        var _defaPre = [{
            name: 'zestaw1',
            elements: [2, 4, 1, 4, 3, 4]
        }];

        // Zestaw 1 dla biurka:
        // - UCHWYT DO TELEFONU,
        // - RAMKA DO ZDJĘĆ,
        // - UCHWYT MEMO,
        // - PRZYBORNIK DUŻY,
        // - TABLICA MAGNETYCZNA,
        // - ZAŚLEPKA 25 cm

        // Zestaw 2 dla biurka:
        // - ZAŚLEPKA 15 cm
        // - ZAŚLEPKA 40 cm x3

        var _descPre = [{
                name: 'biurko_140_zestaw_1',
                elements: [7, 11, 9, 5, 4, 2],
                asOne: true
            },
            {
                name: 'biurko_140_zestaw_2',
                elements: [3, 1, 3, 3],
                asOne: true
            }
        ];

        // Zestaw 1 dla komody:
        // - UCHWYT DO TELEFONU,
        // - RAMKA DO ZDJĘĆ,
        // - UCHWYT MEMO,
        // - PRZYBORNIK MAŁY,
        // - WAZONIK x2,
        // - ZAŚLEPKA 25 cm

        // Zestaw 2 dla komody:
        // - ZAŚLEPKA 15 cm x3
        // - ZAŚLEPKA 40 cm

        var _komoPre = [{
                name: 'komoda_zestaw_1',
                elements: [4, 6, 5, 8, 9, 6, 2],
                asOne: true
            },
            {
                name: 'komoda_zestaw_2',
                elements: [1, 1, 3, 1],
                asOne: true
            }
        ];

        // Zestaw 1 dla szafki RTV:
        // - ZAŚLEPKA 40 cm x3

        var _rtvPre = [{
            name: 'rtv_zestaw_1',
            elements: [3, 3, 3, 3],
            asOne: true
        }];

        // Zestaw 1 dla stolika nocnego:
        // - UCHWYT DO TELEFONU,
        // - RAMKA DO ZDJĘĆ,
        // - PRZYBORNIK MAŁY

        var _nocnyPre = [{
            name: 'stolik_nocny_zestaw_1',
            elements: [4, 8, 9],
            asOne: true
        }];

        var _furnitureId = furnitureId;
        var _elements = elements;
        var _descriptions = new PresetsDescriptions_Class(translator);

        function getElement(id) {

            var element = null;

            for (var i = 0; i < _elements.length; ++i) {

                var e = _elements[i];
                if (e.id == id) {
                    element = e;
                    break;
                }
            }

            if (element == null && _elements.length) {
                element = _elements[0];
            }

            return element;
        }

        function createPresetElements(list) {

            var elements = [];

            for (var i = 0; i < list.length; ++i) {

                var l = list[i];
                elements.push(getElement(l));
            }

            return elements;
        }

        function getPreset(id, name, thumb, desc, elements, more, url, longName, asOne) {

            var element = {
                id: id,
                name: name,
                thumb: thumb,
                url: url,
                desc: desc,
                elements: elements,
                more: more,
                popover: {
                    name: longName,
                    description: more,
                    url: url
                },
                asOne: (asOne ? true : false)
            };

            return element;
        }

        function getPresetDescription(name) {

            return _descriptions.getDescription(name);
        }

        function getPresetLongName(name) {

            return _descriptions.getLongName(name);
        }

        function getPresetName(name) {

            return _descriptions.getName(name);
        }

        function getPresetThumb(name) {

            return name + '.jpg';
        }

        /**
         * Zwraca obrazek o szerokości 244x183px (najlepiej dla popover'a).
         *  @param name - identyfikator zestawu.
         */
        function getPresetImage(name) {

            return '../assets/img/' + name + '.jpg';
        }

        function createSinglePreset(pId, pName, pElem, asOne) {

            var more = getPresetDescription(pName);
            var imag = getPresetImage(pName);
            var name = getPresetLongName(pName);
            var desc = getPresetName(pName);
            var thum = getPresetThumb(pName);

            var preset = getPreset(pId, pName, thum, desc, createPresetElements(pElem), more, imag, name, asOne);

            return preset;
        }

        function createCompletePresetList(data) {

            var presets = [];

            for (var i = 0; i < data.length; ++i) {

                var p = data[i];

                var pName = p.name;
                var pElem = p.elements;
                var asOne = p.asOne;

                presets.push(createSinglePreset(i + 1, pName, pElem, asOne));
            }

            return presets;
        }

        function getDefaultPresetList() {

            var presets = createCompletePresetList(_defaPre);
            return presets;
        }

        function getDescPresetList() {

            var presets = createCompletePresetList(_descPre);
            return presets;
        }

        function getRTVPresetList() {

            var presets = createCompletePresetList(_rtvPre);
            return presets;
        }

        function getKomodaPresetList() {

            var presets = createCompletePresetList(_komoPre);
            return presets;
        }

        function getStolikNocnyPresetList() {

            var presets = createCompletePresetList(_nocnyPre);
            return presets;
        }

        /**
         * Zwraca listę predefiniowanych zestawów dla mebla.
         */
        self.getPresets = function() {

            function formatFurnitureId(furnitureId) {

                var parts = furnitureId.split('_');
                var formatedFurnitureId = 'ST_';

                for (var i = 1; i < parts.length; ++i) {

                    var p = parts[i];
                    formatedFurnitureId += p.toLowerCase() + '_';
                }

                return formatedFurnitureId.substring(0, formatedFurnitureId.length - 1);
            }

            switch (formatFurnitureId(_furnitureId)) {

                case 'ST_biurko_140':
                    return getDescPresetList();
                case 'ST_komoda_90_listwa':
                    return getKomodaPresetList();
                case 'ST_rtv_180':
                    return getRTVPresetList();
                case 'ST_stolik_nocny_szuflady':
                    return getStolikNocnyPresetList();
            }

            return getDefaultPresetList();
        }
    }

    function PresetsDescriptions_Class(translator) {

        var self = this;
        var _translator = translator;

        var _descriptions = [{
                id: 'biurko_140_zestaw_1',
                name: '',
                longName: translator.getResource('components_func_preset_name'),
                description: translator.getResource('components_func_preset_description_biurko_140')
            },
            {
                id: 'biurko_140_zestaw_2',
                name: '',
                longName: translator.getResource('components_cover_preset_name'),
                description: translator.getResource('components_cover_preset_description_biurko_140')
            },
            {
                id: 'komoda_zestaw_1',
                name: '',
                longName: translator.getResource('components_func_preset_name'),
                description: translator.getResource('components_func_preset_description_komoda_listwa')
            },
            {
                id: 'komoda_zestaw_2',
                name: '',
                longName: translator.getResource('components_cover_preset_name'),
                description: translator.getResource('components_cover_preset_description_komoda_listwa')
            },
            {
                id: 'rtv_zestaw_1',
                name: '',
                longName: translator.getResource('components_cover_preset_name'),
                description: translator.getResource('components_cover_preset_description_rtv_180')
            },
            {
                id: 'stolik_nocny_zestaw_1',
                name: '',
                longName: translator.getResource('components_func_preset_name'),
                description: translator.getResource('components_cover_preset_description_stolik_nocny')
            }
        ];

        function getDescriptionObject(name) {

            for (var i = 0; i < _descriptions.length; ++i) {

                var d = _descriptions[i];
                if (d.id === name) {
                    return d;
                }
            }

            return null;
        }

        self.getName = function(name) {

            var obj = getDescriptionObject(name);
            if (obj) {
                return obj.name;
            }

            return '';
        }

        self.getLongName = function(name) {

            var obj = getDescriptionObject(name);
            if (obj) {
                return obj.longName;
            }

            return '';
        }

        self.getDescription = function(name) {

            var obj = getDescriptionObject(name);
            if (obj) {
                return obj.description;
            }

            return '';
        }
    }

    function Furniture(id, simpleTalkResources, simpleCreator) {

        this.id = id;
        this.name = "";
        this.front = "";
        this.nozki = "";
        this.korpus = "";
        this.uchwyt = "";
        this.image = "";
        this.akcesoria = false;
        this.wozki = [];
        this.size = "0,0,0";
        this.modelId = 0;
        this.userId = null;

        // Szerokość szyny w cm.
        this.busWidth = 0;

        this.bigAreaCalculator = null;
        this.mediumAreaCalculator = null;
        this.smallAreaCalculator = null;

        this.hasDetails = function() {
            return this.akcesoria;
        }

        // Wysokość nóżki.
        this.legsHeight = 9;

        this.descriptions = [];

        // Jeśli ta flaga jest ustawiona to przy użyciu przycisku usuwania wózka trzeba usunąć wszystkie elementy (zawiera naazwę wybranego presetu).
        this.allAccessoriesAreFromPreset = '';

        this.simpleTalkResources = simpleTalkResources;
        this.simpleCreator = simpleCreator;
    }

    Furniture.prototype.HaveToRemoveAllAccessories = function() {
        return this.allAccessoriesAreFromPreset != '';
    }
    Furniture.prototype.SetPresetFlag = function(value) {
        console.log('preset set: ' + value);
        this.allAccessoriesAreFromPreset = value;
    }
    Furniture.prototype.GetSelectedPresetName = function() {
        return this.allAccessoriesAreFromPreset;
    }

    Furniture.prototype.getImagePath = function(makePath) {
        var path = "/assets/furnitures/" + this.id + "/front/" + this.front + "/nozki/" + this.nozki + "/1.png";
        this.image = path;
        return path;
    };

    Furniture.prototype.ChangeName = function(value, updateName) {

        function ChangeFurnitureName(name) {

            $('#mainMenu .st-main-menu-header-name-bottom').text(name);
            $('.st-mobile-header .st-main-menu-header-name-bottom').text(name);
        }

        this.name = value;
        if (updateName) {
            ChangeFurnitureName(this.name);
        }
    }

    Furniture.prototype.getImagePathForResponsive = function(reponsive) {

        switch (reponsive) {

            case 'XL':
                return '../assets/img/stLargeFake.png';
            case 'L':
                return '../assets/img/stMediumFake.png';
            case 'M':
                return '../assets/img/stMediumFake.png';
            case 'S':
                return '../assets/img/stMediumFake.png';
            case 'XS':
                return '../assets/img/stSmallFake.png';
        }

        var path = "/SimpleTalk/assets/img/stLargeFake.png";
        return path;
    };

    Furniture.prototype.GetCurrentFurnitureSize = function() {

        var sizeParts = this.size.split(',');

        var width = Number(sizeParts[0]);
        var depth = Number(sizeParts[1]);
        var height = Number(sizeParts[2]);

        if (this.nozki != "" && this.nozki != "legs-none") {
            height += this.legsHeight;
        }

        return [width, depth, height];
    }

    //xml przesylany do VoxBoxa
    Furniture.prototype.toXML = function() {

        var projectData = {
            writerID: getUserID(),
            writeDate: getCurrentDateTime(),
            project_id: getUserID() + "_" + getCurrentDateTime(),
            project_name: this.name,
            groupID: 2,
            collectionID: 101,
            collectionName: 'Simple Talk',
            type: this.id,
            id: this.modelId
        };

        var furnitureForm = new FurnitureForm_Class(this, projectData, 'xml');
        return furnitureForm.generateForm();
    }

    /**
     * Zwraca aktualne wymiary mebla uwzględniając wybraną nożkę. Wynik w postaci: "W,G,H".
     */
    Furniture.prototype.getSize = function() {

        var size = this.GetCurrentFurnitureSize();
        return size[0] + "," + size[1] + "," + size[2];
    }

    //xml tworzony z mysla o koszyku
    Furniture.prototype.toOrderXML = function() {
        var xml = '<?xml version="1.0" encoding="UTF-8"?>' + "\n";
        xml += '<order>' + "\n";
        xml += "<model id>" + this.id + "</model id>"
        xml += "<front>" + this.front + "</front id>"
        xml += "<nozki>" + this.nozki + "</nozki id>"
        xml += "<korpus>" + this.korpus + "</korpus id>"
        xml += "<uchwyt>" + this.uchwyt + "</uchwyt id>"
        xml += '</order>';
        return xml;
    }

    //załaduj menu dla mebla na podstawie informacji w jsonie
    Furniture.prototype.Load = function(callback) {

        function handleFurnitureJsonFail(textStatus, error) {

            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);

            // Ustawić zaślepkę z informacją o błędzie.

            var html = '<div id="fog-error"><img class="absolute-center" src="../assets/img/stLogoError.png" alt="VOX - Simple Talk"/></div>';
            $('.simple-talk-container').append(html);

            $('#main-image-container-view-change-fake-with-back').hide();

            // Schować progress bara.

            FinalizeProgressBar(true);
        }

        var _furniture = this;
        var id = _furniture.id;

        $.getJSON("../assets/infoJsons/" + id + ".json", function(data) {

                // Uzupełnienie danych o położeniu szyny (o ile mebel ma szynę).

                var largeDisplayInfo = data.LargeDisplayInfo;
                var mediumDisplayInfo = data.MediumDisplayInfo;
                var smallDisplayInfo = data.SmallDisplayInfo;

                if (largeDisplayInfo && mediumDisplayInfo && smallDisplayInfo) {

                    _furniture.bigAreaCalculator = new AccessoriesArea_Class(largeDisplayInfo.A, largeDisplayInfo.B, largeDisplayInfo.S);
                    _furniture.mediumAreaCalculator = new AccessoriesArea_Class(mediumDisplayInfo.A, mediumDisplayInfo.B, mediumDisplayInfo.S);
                    _furniture.smallAreaCalculator = new AccessoriesArea_Class(smallDisplayInfo.A, smallDisplayInfo.B, smallDisplayInfo.S);
                }

                // Informacje o rozmiarze bryły mebla (VOXBOX).

                _furniture.size = data.size;
                _furniture.modelId = data.id;
                _furniture.busWidth = data.busWidth;
                _furniture.descriptions = data.descriptions;

                // Zmiana nazwy mebla (w pliku JSON zapisany jest klczu do słownika).

                _furniture.ChangeName(_furniture.simpleTalkResources.getResource(data.name), true);

                // Wypełnienie menu

                menu = new Menu(data, _furniture.simpleTalkResources, _furniture, _furniture.simpleCreator);
                _furniture.MakeDefault(callback);
                //FinalizeProgressBar(true);
            })
            .fail(function(jqxhr, textStatus, error) {
                handleFurnitureJsonFail(textStatus, error);
            });
    }

    Furniture.prototype.getSelectedName = function(groupName) {

        switch (groupName) {

            case 'st-front':
                return this.front;
            case 'st-body':
                return this.korpus;
            case 'st-legs':
                return this.nozki;
            case 'st-handles':
                return this.uchwyt;
        }

        return '';
    }

    //stworzenie domyslnego pierwszego mebla
    Furniture.prototype.MakeDefault = function(callback) {

        function setDefaultValue(name, collection, allowCache, furnitureFromCookie) {

            /**
             * Określa domyślną wartość dla składowej mebla.
             */
            function getDefaultValueForElement(name, collection, furnitureFromCookie) {

                function getElementByName(name, collection) {

                    for (var i = 0; i < collection.length; ++i) {

                        var c = collection[i];
                        if (c.name === name) {
                            return name;
                        }
                    }

                    return collection.length ? collection[0].name : '';
                }

                // Na potrzeby prezentacji domyślne wartości to szary front, dębowy korpus, czarna szłapa i czary uchwyt.

                switch (name) {

                    case 'front':
                        return getElementByName('white', collection);
                    case 'nozki':
                        return getElementByName('legs-none', collection);
                    case 'korpus':
                        return getElementByName('white', collection);
                    case 'uchwyt':
                        return getElementByName('white', collection);
                }
            }

            //wczytaj konfiguracje z ciastek, tylko jak jest to ten sam typ mebla

            var defName = collection && collection.length ? getDefaultValueForElement(name, collection, furnitureFromCookie) : '';
            var cached = furnitureFromCookie[name];

            // Na potrzeby prezentacji mebel nie ma być odczytywany z pamięci - zawsze ma wracać do bazowego stanu.

            if (!allowCache) {
                cached = '';
            }

            console.log('Wartosc domyslna dla: ' + name + ' to: ' + (cached ? cached : defName));

            return cached ? cached : defName;
        }

        function haveToShowTableAlert(type, value, furniture) {

            if (furniture.id == 'ST_biurko_140' && value == 'legs-none') {
                return true;
            }
            return false;
        }

        function showTableAlert(hide, duration) {

            $('.st-ghost-alert-container').fadeIn('slow', function() {

                if (hide) {

                    setTimeout(function() {
                        $('.st-ghost-alert-container').fadeOut('slow');
                    }, duration ? duration : 3000);
                }
            });
        }

        // Flaga mówiąca o możliwości pobierania danych z wcześniejszych konfiguracji.

        var allowCache = true;

        var furnitureFromCookie = this.GetFurnitureFromCache(this.id);
        if (furnitureFromCookie.length > 0) {
            furnitureFromCookie = JSON.parse(furnitureFromCookie);
        }

        this.front = setDefaultValue('front', menu.fronty, allowCache, furnitureFromCookie);
        this.nozki = setDefaultValue('nozki', menu.nozki, allowCache, furnitureFromCookie);
        this.korpus = setDefaultValue('korpus', menu.korpus, allowCache, furnitureFromCookie);
        this.uchwyt = setDefaultValue('uchwyt', menu.uchwyt, allowCache, furnitureFromCookie);

        // Pokazanie komunikatu na wejściu.

        if (haveToShowTableAlert('st-legs', this.nozki, this)) {
            showTableAlert();
        }

        if (menu.wózki) {
            this.akcesoria = true;
        }
        var wozki = furnitureFromCookie.wozki;
        if (wozki != null && allowCache) {

            for (var i = 0; i < wozki.length; i++) {
                this.AddAccessories(wozki[i].id);
            }

            this.RedrawAllAccessories();
        }

        this.allAccessoriesAreFromPreset = allowCache ? furnitureFromCookie.ustawionoZestaw : '';

        //UpdateProgressBar();
        callback();
    }

    Furniture.prototype.GetFurnitureFromCache = function(furnitureId) {

        function getCookie(cname) {

            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        var temporaryCookieName = 'ST_KONFIGURACJA_MEBLA';

        var existingCookie = [];

        if (getCookie(temporaryCookieName).trim().length) {

            var cookieManager = new CookieParser_Class();
            var decode = cookieManager.decodeCookie(getCookie(temporaryCookieName));

            existingCookie = $.parseJSON(decode);
        }

        var searchElement;

        // Petla po aktualnym ciasteczku (szukamy elementu)
        for (var i = 0; i < existingCookie.length; i++) {

            var cookieElem = existingCookie[i];
            if (cookieElem.id == furnitureId) {
                searchElement = cookieElem;
                break;
            }
        }

        if (searchElement) {
            return JSON.stringify(searchElement);
        } else {
            return '';
        }
    }

    Furniture.prototype.LoadFromFile = function(obj) {

        this.front = obj.front;
        this.nozki = obj.nozki;
        this.korpus = obj.korpus;
        this.uchwyt = obj.uchwyt;
        this.userId = obj.userId;

        var wozki = obj.wozki;
        if (wozki != null) {
            for (var i = 0; i < wozki.length; i++) {
                this.AddAccessories(wozki[i].id);
            }

            this.RedrawAllAccessories();
        }
    }

    Furniture.prototype.AddAccessories = function(id) {

        function getElement(id, furnitureId, translator) {

            var accessoriesManager = new Accessories_Class(furnitureId, translator);
            var element = accessoriesManager.getAccessoriesInfo(id);

            return element;
        }

        function haveEnoughPlace(element, accessories, accessoriesArea, busWidth) {

            var accessoriesWidth = 0;

            for (var i = 0; i < accessories.length; ++i) {

                var a = accessories[i];
                accessoriesWidth += a.realWidth;
            }

            accessoriesWidth += element.realWidth;

            return accessoriesWidth <= busWidth;
        }

        var elementToAdd = getElement(id, this.id, this.simpleTalkResources);

        if (haveEnoughPlace(elementToAdd, this.wozki, this.bigAreaCalculator.getAccessoriesArea(), this.busWidth)) {

            this.wozki.push(elementToAdd);
            return elementToAdd;
        }

        return null;
    }

    Furniture.prototype.RemoveLastAccessories = function() {

        if (this.wozki.length > 0) {

            var lastElement = this.wozki[this.wozki.length - 1];
            this.wozki.splice(-1, 1);
            return lastElement;
        }

        return null;
    }

    Furniture.prototype.GetAllAccessories = function() {
        return this.wozki;
    }

    Furniture.prototype.getAreaCalculator = function(screenWidth) {

        // Dla pozycji wertykalnej wszystkie widoki używają mediumAreaCalculator.

        var isHorizontal = $('#mainMenu .st-main-menu-header:visible').length > 0;

        switch (screenWidth) {

            case 960:
                return isHorizontal ? this.bigAreaCalculator : this.mediumAreaCalculator;
            case 734:
                return this.mediumAreaCalculator;
            case 600:
                return isHorizontal ? this.smallAreaCalculator : this.mediumAreaCalculator;

            default:
                return this.mediumAreaCalculator;
        }
    }

    Furniture.prototype.GetNewAccessoriesPosition = function(screenWidth, screenHeight) {

        var calculator = this.getAreaCalculator(screenWidth);
        return calculator.getNewAccessoriesPosition(this.wozki, screenWidth, screenHeight, this.id);
    }

    Furniture.prototype.GetExsistingAccessoriesPosition = function(screenWidth, screenHeight, idx) {

        var calculator = this.getAreaCalculator(screenWidth);
        return calculator.getPositionFor(this.wozki, screenWidth, screenHeight, idx, this.id);
    }

    Furniture.prototype.GetNewAccessoriesSize = function(screenWidth, screenHeight, size) {

        var calculator = this.getAreaCalculator(screenWidth);
        return calculator.getNewAccessoriesSize(screenWidth, screenHeight, size);
    }

    /*
    Zwraca kolekcję elementów bazowych wybranych podczas konfiguracji.
      [0] KORPUS
      [1] FRONT
      [2] UCHWYT
      [3] nozki
    */
    Furniture.prototype.GetAllBaseElements = function() {

        var body = menu.GetElement(this.korpus, BODY);
        var front = menu.GetElement(this.front, 'st-front');
        var handles = menu.GetElement(this.uchwyt, HANDLES);
        var legs = menu.GetElement(this.nozki, LEGS);

        var array = [body, front, handles, legs];
        return array;
    }

    Furniture.prototype.RedrawAllAccessories = function() {

        function addElementToStage(element, lp, furniture) {

            var responsiveArray = [{
                    name: "xl1",
                    width: 960,
                    height: 570
                },
                {
                    name: "xl2",
                    width: 734,
                    height: 570
                },
                {
                    name: "xl3",
                    width: 600,
                    height: 570
                },
                {
                    name: "l",
                    width: 734,
                    height: 570
                },
                {
                    name: "m",
                    width: 600,
                    height: 570
                },
                {
                    name: "s",
                    width: 367,
                    height: 285
                },
                {
                    name: "xs",
                    width: 300,
                    height: 233
                }
            ];

            var respons = $('#mainImageContainer img:visible').data('responsive');

            for (var i = 0; i < responsiveArray.length; ++i) {

                var r = responsiveArray[i];
                var name = r.name;

                // Generowanie warstwy w zależności od rozmiarów kontenera.

                var imageContainer = $('#mainImageContainer');

                var width = $(imageContainer).width();
                var height = $(imageContainer).height();

                var newPos = furniture.GetExsistingAccessoriesPosition(width, height, lp - 1);
                var newSize = furniture.GetNewAccessoriesSize(width, height, element.areaA);

                var bottom = newPos.y;
                var left = newPos.x;

                var w = newSize.w;
                var h = newSize.h;

                var style = 'style="position:absolute; bottom: ' + bottom + 'px; left:' + left + 'px; width: ' + w + 'px; height: ' + h + 'px;"';
                var imgHtml =
                    '<img class="st-accessories-img st-responsive-' + name + '"' +
                    ' src="' + element.url + '" ' + style +
                    ' data-accessories-id="' + element.id + '" data-accessories-lp="' + lp + '" data-accessories-repons="' + name.toUpperCase() + '">';

                $('#mainImageContainer').append(imgHtml);

                $('#mainImageContainer').find('.st-accessories-img:last').hide();
            }
        }

        $('#mainImageContainer .st-accessories-img').remove();

        for (var i = 0; i < this.wozki.length; ++i) {

            var w = this.wozki[i];
            addElementToStage(w, i + 1, this);
        }

        var accessories = menu.simpleCreator.getUnavailableAccessories();
        for(var a in accessories)
        {
            $(".st-accessories-img[src*='" + a + "']").each(function(){
                $(this).css("opacity","0.6");
            });
        }
      
    }

    Furniture.prototype.RemoveAllAccesories = function() {

        this.wozki = [];
    }

    Furniture.prototype.GetFurnitureState = function() {

        function getAccessoriesNames(accessories, presetName, id, translator) {

            var result = [];

            for (var i = 0; i < accessories.length; ++i) {

                var a = accessories[i];
                result.push(a.name);
            }

            // Uwzględnienie presetu jako osobnej jednostki rozliczeniowej.

            if (presetName) {

                var accessories = new Accessories_Class(id, translator);
                var presetInfo = accessories.getPresetInfoByName(presetName);

                if (presetInfo) {

                    for (var i = 0; i < presetInfo.elements.length; ++i) {

                        var e = presetInfo.elements[i];

                        for (var j = 0; j < result.length; ++j) {

                            var r = result[j];
                            if (e.name == e.name) {
                                result.splice(j, 1);
                                break;
                            }
                        }
                    }

                    result.push(presetName);
                }
            }

            return result;
        }

        var state = {

            body: this.korpus,
            front: this.front,
            legs: this.nozki,
            handles: this.uchwyt,
            accessories: this.akcesoria ? getAccessoriesNames(this.wozki, this.allAccessoriesAreFromPreset, this.id, this.simpleTalkResources) : [],
            id: this.id,
            name: this.name
        };

        return state;
    }

    function FurnitureXmlForm_Class(furniture, projectData) {

        var self = this;

        var SEPARATOR = '\r\n';
        var TAB = '\t';

        var _furniture = furniture;
        var _projectData = projectData;

        function createXmlWithSeparator(xmlParts, separator, all) {

            var xml = '';

            for (var i = 0; i < xmlParts.length; ++i) {

                var p = xmlParts[i];
                xml += p;

                if (all || i != xmlParts.length - 1) {
                    xml += separator;
                }
            }

            return xml;
        }

        function createTab(level) {

            var tabs = '';
            for (var i = 0; i < level; ++i) {
                tabs += TAB;
            }
            return tabs;
        }

        function openHeader(headerName, projectData) {

            var xml = '<' + headerName;

            for (var p in projectData) {
                xml += SEPARATOR + TAB + p + '="' + projectData[p] + '"';
            }

            xml += '>' + SEPARATOR;
            return xml;
        }

        function closeHeader(headerName) {

            var xml = '</' + headerName + '>';
            return xml;
        }

        function createContent(furniture) {

            var xml = [];

            if (furniture.front) {
                xml.push(TAB + '<front color="' + furniture.front + '" />');
            }
            if (furniture.uchwyt) {
                xml.push(TAB + '<uchwyty color="' + furniture.uchwyt + '" />');
            }
            if (furniture.korpus) {
                xml.push(TAB + '<korpus color="' + furniture.korpus + '" />');
            }
            if (furniture.nozki) {
                xml.push(TAB + '<nozki type="' + furniture.nozki + '" />');
            }

            if (furniture.wozki.length) {

                xml.push(TAB + '<wozki>');

                for (var i = 0; i < furniture.wozki.length; ++i) {

                    var w = furniture.wozki[i];
                    xml.push(createTab(2) + '<wozek id="' + w.id + '" />');
                }

                xml.push(TAB + '</wozki>');
            }

            return createXmlWithSeparator(xml, SEPARATOR, true);
        }

        self.generateForm = function() {

            var xml = '<?xml version="1.0" encoding="UTF-8"?>' + SEPARATOR;

            xml += openHeader('project', _projectData) + SEPARATOR;
            xml += createContent(_furniture) + SEPARATOR;
            xml += closeHeader('project');

            return xml;
        }
    }

    function FurnitureForm_Class(furniture, projectData, type) {

        var self = this;

        var _furniture = furniture;
        var _type = type;
        var _projectData = projectData;

        self.generateForm = function() {

            switch (_type) {

                case 'xml':
                    var xml = new FurnitureXmlForm_Class(_furniture, _projectData);
                    return xml.generateForm();
            }

            return '';
        }
    }

    function RunOutOfPlaceForAccessories_Class(furniture, accessories, menu) {

        var self = this;

        var _furniture = furniture;
        var _accessories = accessories;
        var _menu = menu;

        /**
         * Zwraca miejssce zajęte przez obecnie wybrane wózki w cm.
         *  @param furniture - obiekt reprezentujący mebel (Furniture_class).
         */
        function calculateAlocatePlace(furniture) {

            var place = 0;
            var accessories = furniture.GetAllAccessories();

            for (var i = 0; i < accessories.length; ++i) {

                var a = accessories[i];
                place += a.realWidth;
            }

            return place;
        }

        /**
         * Zwraca odstępną przestezeń na wózki w cm.
         *  @param furniture - obiekt reprezentujący mebel (Furniture_class).
         */
        function availablePlace(furniture) {

            var bus = furniture.busWidth;
            var alocate = calculateAlocatePlace(furniture);

            return bus - alocate;
        }

        /**
         * Bufor do wstawiania akcesoriów (tyle centymetrów luzu ma być między elementami).
         */
        function getAccessoriesBuffor() {

            return 0;
        }

        /**
         * Zwraca listę elementów, które można jeszcze wrzucić na szynę.
         *  @param place = dostępne miejsce na szynie.
         *  @param accessories - lista wszystkich dostępnych wózków.
         */
        function getAvailableAccessoriesList(place, accessories) {

            var result = [];
            var bufor = getAccessoriesBuffor();

            if (accessories && accessories.length) {

                for (var i = 0; i < accessories.length; ++i) {

                    var a = accessories[i];
                    if (a.realWidth + bufor <= place && !a.preset) {
                        result.push(a);
                    }
                }
            }

            return result;
        }

        self.createHtml = function() {

            function openContainer() {

                return '<div class="st-run-out-place-container">';
            }

            function closeContainer() {

                return '</div>';
            }

            function mainText() {

                return '<p class="st-run-out-place-header">Na szynie zabrakło już miejsca na ułożenie wybranego elementu.</p>'
            }

            function additionalText(accessoriesToAdd) {

                function createPositionToAdd(a) {

                    var html =
                        '<div class="col-xs-12 col-sm-6 col-md-6 st-furniture-select-carousel-item text-center st-run-out-place-item-to-add" data-furniture-id="' + a.desc + '" data-acc-id="' + a.id + '">' +
                        '<img src="' + a.bigUrl + '" alt="' + a.desc + '"/>' +
                        '<p class="st-furniture-select-furniture-name">' + a.desc + '</p>' +
                        '</div>';

                    return html;
                }

                if (accessoriesToAdd.length) {

                    var html = '<p>Możesz jeszcze wybrać:</p>';

                    html +=
                        '<div>' +
                        '<div class="row">';

                    for (var i = 0; i < accessoriesToAdd.length; ++i) {

                        var a = accessoriesToAdd[i];
                        html += createPositionToAdd(a);
                    }

                    html +=
                        '</div>' +
                        '</div>';

                    return html;
                } else {

                    return '<p>Niestety żeby zmienić konfiguracje konieczne jest usunięcie aktualnie zamieszczonych akcesoriów.</p>';
                }
            }

            var html = openContainer();

            html += mainText();

            var place = availablePlace(_furniture);
            var accessoriesToAdd = getAvailableAccessoriesList(place, _accessories);

            html += additionalText(accessoriesToAdd);
            html += closeContainer();

            return html;
        }

        _onAccessoriesClick = null;

        function onAccessoriesClickAction(e) {

            var clickedElement = this;

            e.preventDefault();
            if (_onAccessoriesClick) {

                _onAccessoriesClick(e, clickedElement, true, _menu);
                $('#st-configurator-modal').css('display', 'none');
            }
        }

        self.addEvents = function(onAccessoriesClick) {

            _onAccessoriesClick = onAccessoriesClick;
            $('.st-run-out-place-container .st-run-out-place-item-to-add').off('click', onAccessoriesClickAction).on('click', onAccessoriesClickAction);
        }
    }

    function Menu(data, simpleTalkResources, furniture, simpleCreator) {

        var menuInstance = this;

        this.menuTitle = data.name;
        this.fronty = data.components.front;
        this.korpus = data.components.korpus;
        this.nozki = data.components.nozki;
        this.uchwyt = data.components.uchwyt;
        this.wózki = data.components.wozki;

        /**
         * Kolekcja przechowująca pary klcz - wartość, gdzie kluczem jest identyfikator pola tekstowego, a wartością jest klucz ze zbioru słownika.
         */
        this.descriptions = data.descriptions;
        this.simpleTalkResources = simpleTalkResources;
        this.furniture = furniture;
        this.simpleCreator = simpleCreator;

        this.ChangeElement = function(type, value) {
            function haveToShowTableAlert(type, value, furniture) {

                if (furniture.id == 'ST_biurko_140' && value == 'legs-none') {
                    return true;
                }
                return false;
            }

            function showTableAlert(hide, duration) {
                $('.st-ghost-alert-container').fadeIn('slow', function() {

                    if (hide) {

                        setTimeout(function() {
                            $('.st-ghost-alert-container').fadeOut('slow');
                        }, duration ? duration : 3000);
                    }
                });
            }

            function hideTableAlert() {
                $('.st-ghost-alert-container').fadeOut('slow');
            }

            switch (type) {
                case 'st-front':
                    this.furniture.front = value;
                    break;
                case 'st-legs':
                    this.furniture.nozki = value;
                    break;
                case 'st-body':
                    this.furniture.korpus = value;
                    break;
                case 'st-handles':
                    this.furniture.uchwyt = value;
                    break;
            }

            this.simpleCreator.SaveToCache(false, this.furniture);
            this.simpleCreator.UpdateFurniture();

            if (type == 'st-legs') {

                if (haveToShowTableAlert(type, value, this.furniture)) {
                    showTableAlert();
                } else {
                    hideTableAlert();
                }
            }
        }

        this.changeViewContent = function(e) {

            // W tym kontekście wywołania this to powinien być obiekt: <div class="dekor st-miniature-container" data-name="">.

            var type = $(this).parent(".elementGroupMiniatures").data("type");
            var value = $(this).data("name");

            $(this).parent('.elementGroupMiniatures').find('.dekor .img').removeClass('st-position-in-step-selected');
            $(this).find('.img').addClass('st-position-in-step-selected');

            menuInstance.ChangeElement(type, value);
        }

        this.Load();
    }

    Menu.prototype.Load = function() {

        // Pokazanie przycisku do pobrania aktualnej konfiguracji mebla do pliku
    // $('#main-image-container-save-actual-configuration').show();

    // Pokazanie przycisku do aktywowania lupy
    // $('#main-image-container-magnifier').show();

    // Zmienna okreslajaca czy lupa jest aktywna czy nie
    var magnifierOn = false;

    // Data - tablica obrazow znajdujacych sie w danym momencie na scenie
    var data;

    // obraz utworzony dla lupy, ktory ma zostac usuniety
    var imgToDelete;

    $(document).keyup(function(e) {

        if (e.keyCode == 27){

            if(magnifierOn){

                disableMagnifier();
            }
        }

        e.preventDefault();
        e.stopPropagation();
    });

    function disableMagnifier(){

        if(magnifierOn){
            $('#main-image-container-magnifier button').css({'background-color': '#FFF', 'color': '#000'});
            
            $('.magnifier-lens').remove();
            $('.magnifier-large').remove();
            $('.mainImage').removeAttr('id');

            magnifierOn = false;

            $.ajax({ 
                url: '../server/mergeImages.php?deleteImage=true',
                type: 'post',
                data: {'data': imgToDelete},
                datatype: 'json',
                success: function(data) {
                
                    console.log("Obraz usunięty z serwera");
                },
                error: function(data){

                    console.log('Błąd przy usuwaniu obrazu z serwera');
                }
                });
        }
    }

    // Przygotowanie aktualnie wyswietlonej konfugiracji drzwi do polaczenia
    function prepareDataForMerge(){

        data = new Array();

        var mainImageSrc = $('.mainImage:visible').attr('data-src');
        data.push({src: mainImageSrc, leftOffset: 0, topOffset: 0});

        // Pętla po wszystkich widocznych akcesoriach
        $('#mainImageContainer .st-accessories-img:visible').each(function(){

                var src = $(this).attr('src');

                var leftOffset = ($(this).position().left);
                var topOffset = ($(this).position().top);

                // var leftOffset = ($(this).offset().left / $('#mainImageContainer').width());
                // var topOffset = ($(this).offset().top / $('#mainImageContainer').height());

                // var accMargin = furniture.getPositionForMagnifier(3368, leftOffset, topOffset);
                // var leftOffset = accMargin.left / 960;
                // var topOffset = accMargin.top / 960;

                // console.log(src);
                // console.log(leftOffset);
                // console.log(topOffset);

                data.push({src: src ,leftOffset: leftOffset, topOffset: topOffset});
            
        });  

    }

    // klikniecie w przycisk zapisu aktualnej konfiguracji
    $('#main-image-container-save-actual-configuration').click(function() {

        if(!magnifierOn){
            prepareDataForMerge();
        
            $.ajax({ 
                url: '../server/mergeImages.php?saveConfig=true',
                type: 'post',
                data: {'data': data},
                datatype: 'json',
                beforeSend:function()
                {
                    console.log("przygotowywanie obrazu...");
                    $('.col-preview').prepend('<img class="loadingMagnifier" src="../assets/img/loading.gif">');
                    $('#mainImageContainer').css({'background-color':'grey', 'opacity':'0.5'});
                },
                success: function(path) {

                    // Korekta ściezki do duzego obrazka widocznego jak najedziemy kursorem na scene
                    path = path.replace('"', '').replace('"', '').replace(' ', '');

                    var a = document.createElement('a');
                    a.href = path;
                    a.download = "mebel_SimpleTalk.png";
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);

                    setTimeout(
                        function() 
                        {
                            console.log("obraz przygotowany: " + path);
                            $('.col-preview .loadingMagnifier').remove();
                            $('#mainImageContainer').css({'background-color':'transparent', 'opacity':'1'});
                        }, 500);

                },
                error: function(path){
                    Console.log('Błąd przy tworzeniu obrazu do pobrania');
                }
            });
        }
    });

    // klikniecie w przycisk aktywacji/deaktywacji lupy
    $('#main-image-container-magnifier').click(function() {

        if(magnifierOn){

            disableMagnifier();

        }else if(!magnifierOn){

            $('#main-image-container-magnifier button').css({'background-color': '#0086cb', 'color': '#FFF'});

            prepareDataForMerge();
        
            $.ajax({ 
                url: '../server/mergeImages.php',
                type: 'post',
                data: {'data': data},
                datatype: 'json',
                beforeSend:function()
                {
                    console.log("ładuje obraz...");
                    $('#mainImageContainer').prepend('<img class="loadingMagnifier" src="../assets/img/loading.gif">');
                    $('#mainImageContainer').css({'background-color':'grey', 'opacity':'0.5'});
                },
                success: function(path) {

                    var evt = new Event();
                    var magnifier = new Magnifier(evt);

                    // Korekta ściezki do duzego obrazka widocznego jak najedziemy kursorem na scene
                    imgToDelete = path = path.replace('"', '').replace('"', '').replace(' ', '');

                    var thumbForMagnifier = null;

                    if($('.mainImageHover:visible').length)
                        thumbForMagnifier = '.mainImageHover';
                    else
                        thumbForMagnifier = '.mainImage';

                    magnifier.attach({
                        thumb: thumbForMagnifier,
                        large:  path,
                        largeWrapper: 'mainImageContainer',
                        zoom: 3,
                        zoomable: false
                    });

                    setTimeout(
                        function() 
                        {
                            console.log("obraz załadowany");
                            $('.loadingMagnifier').remove();
                            $('#mainImageContainer').css({'background-color':'transparent', 'opacity':'1'});
                        }, 500);
                    
                },
                error: function(path){
                    Console.log('Błąd przy tworzeniu obrazu dla lupy');
                }
                });

            magnifierOn = true;
        }
    
    });

        function hideEmptyGroup(group) {

            var groupId = '#' + group + '-group';
            $(groupId).parent().hide();
        }

        //UpdateProgressBar("Generowanie listy elementów");

        var menuInstance = this;

        if (!this.fronty || this.fronty.length == 0) {
            hideEmptyGroup('st-front');
        } else {

            $('#' + 'st-front' + '-group').parent().show();

            var appendTo = $("#" + 'st-front' + "-group-collapsed .elementGroupMiniatures");
            appendTo.html('');

            $.each(this.fronty, function(key, value) {
                menuInstance.createMiniature('st-front', value);
            });
        }

        if (!this.nozki || this.nozki.length == 0) {
            hideEmptyGroup('st-legs');
        } else {

            $('#' + 'st-legs' + '-group').parent().show();

            var appendTo = $("#" + 'st-legs' + "-group-collapsed .elementGroupMiniatures");
            appendTo.html('');

            $.each(this.nozki, function(key, value) {
                menuInstance.createMiniature('st-legs', value);
            });
        }

        if (!this.korpus || this.korpus.length == 0) {
            hideEmptyGroup('st-body');
        } else {

            $('#' + 'st-body' + '-group').parent().show();

            var appendTo = $("#" + 'st-body' + "-group-collapsed .elementGroupMiniatures");
            appendTo.html('');

            $.each(this.korpus, function(key, value) {
                menuInstance.createMiniature('st-body', value);
            });
        }

        if (!this.uchwyt || this.uchwyt.length == 0) {
            hideEmptyGroup('st-handles');
        } else {

            $('#' + 'st-handles' + '-group').parent().show();

            var appendTo = $("#" + 'st-handles' + "-group-collapsed .elementGroupMiniatures");
            appendTo.html('');

            $.each(this.uchwyt, function(key, value) {
                menuInstance.createMiniature('st-handles', value);
            });
        }

        if (this.wózki == false) {
            hideEmptyGroup('st-accessories');
        } else {

            $('#' + 'st-accessories' + '-group').parent().show();

            var accessories = new Accessories_Class(this.furniture.id, this.simpleTalkResources);

            // Utworzenie listy presetów

            var html = accessories.createPresetsHtml(false);

            var appendTo = $("#" + 'st-accessories' + "-group-collapsed .presetGroupMiniatures");
            appendTo.html(html);

            appendTo.find('.dekor').on('click', function(e) {

                e.preventDefault();

                var accessoriesIdsArray = $(this).data('acc-id');
                var accessoriesName = $(this).data('name');
                var runOutPlace = false;

                // Usunięcie wszystkich dotychczas wstawionych akcesoriów.

                menuInstance.furniture.RemoveAllAccesories();
                $('#mainImageContainer .st-accessories-img').remove();

                // Dodanie gotowego zestawu.

                var isUnavailable = menuInstance.isUnavailableAccesories(accessoriesName);

                for (var i = 0; i < accessoriesIdsArray.length; ++i) {

                    if (menuInstance.simpleCreator.currentViewState.isMainView()) {
                        menuInstance.switchToDetailsViewA();
                    }

                    var accessoriesId = accessoriesIdsArray[i];
                    var addedElement = menuInstance.furniture.AddAccessories(accessoriesId);

                    if (addedElement != null) {
                        if(isUnavailable) addedElement['isUnavailable'] = true;
                        menuInstance.refreshAccessories(addedElement);
                    } else {
                        runOutPlace = true;
                    }
                }

                // Zapamiętanie w obiekcie mebla informacji o ustawionym zestawie.

                var presetAsOne = $(this).data('as-one');
                var presetName = $(this).data('name');

                menuInstance.furniture.SetPresetFlag(presetAsOne ? presetName : '');

                // Aktualizacja ceny.

                var furniturePrice = menuInstance.simpleCreator.GetFurniturePriceBasedOnCurrentState();
                menuInstance.simpleCreator.updatePrice(furniturePrice);

                if (runOutPlace) {
                    menuInstance.showNoPlaceAlert();
                } else {

                    $('.st-preset-description-container').slideUp('slow');
                    menuInstance.hideNoPlaceAlert();
                }

                // Pokazanie odpowiedniej zaślepki.

                var respons = $('#mainImageContainer img:visible').data('responsive');
                var hoverImgs = $('.mainImageHover');
                for (var i = 0; i < hoverImgs.length; ++i) {

                    var h = hoverImgs[i];
                    var resp = $(h).data('responsive');

                    if (resp === respons) {
                        $(h).show();
                    }
                }

                menu.simpleCreator.SaveToCache(false);
            });

            appendTo.find('.dekor').popover({
                html: true
            });

            // Utworzenie listy elementów

            var elementsHtml = accessories.createElementsHtml();

            var elementsAppendTo = $("#" + 'st-accessories' + "-group-collapsed .elementGroupMiniatures");
            elementsAppendTo.html(elementsHtml);

            elementsAppendTo.find('.dekor').on('click', function(e) {
                menuInstance.addAccessoriesToScene(e, this, false, menuInstance);
            });
            elementsAppendTo.find('.dekor').popover({
                html: true
            });
        }

        // Tłumaczenie pozycji menu:

        if (this.descriptions) {

            for (var i = 0; i < this.descriptions.length; ++i) {

                var d = this.descriptions[i];
                $('#' + d.key).text(this.simpleTalkResources.getResource(d.value));
            }
        }
    }

    Menu.prototype.GetElement = function(name, type) {

        function GetElementFormGroup(name, group) {

            for (var i = 0; i < group.length; ++i) {

                var e = group[i];
                if (e.name === name) {
                    return e;
                }
            }

            return null;
        }

        switch (type) {

            case BODY:
                return GetElementFormGroup(name, this.korpus);
            case 'st-front':
                return GetElementFormGroup(name, this.fronty);
            case HANDLES:
                return GetElementFormGroup(name, this.uchwyt);
            case LEGS:
                return GetElementFormGroup(name, this.nozki);
        }

        return null;
    }

    /**
     * Ukrycie komunikatu o braku miejsca na szynie mebla na nowe fascynujące akcesoria.
     */
    Menu.prototype.hideNoPlaceAlert = function() {

        var show = $('#st-accessories-group-collapsed .alert').length === 0;
        if (!show) {
            $('#st-accessories-group-collapsed').find('.alert:last').slideUp('fast', function() {
                $(this).remove();
            });
        }
    }

    /**
     * Ustawia widok na widok szczegółowy (wózkowy) przy równoczesnej zmianie stanu przycisków do przełączania widoków.
     */
    Menu.prototype.switchToDetailsViewA = function() {

        $('#main-image-container-view-change-front').removeClass('active');
        $('#main-image-container-view-change-details').addClass('active');

        ChangeViewToDetails();
    }

    Menu.prototype.addAccessoriesToScene = function(e, item, fromModal, menu) {

        e.preventDefault();

        var accessoriesId = $(item).data('acc-id');
        if (menu.simpleCreator.currentViewState.isMainView()) {
            menu.switchToDetailsViewA();
        }

        var addedElement = menu.furniture.AddAccessories(accessoriesId);
        if (addedElement != null) {
            
            var isUnavailable = menu.isUnavailableAccesories(addedElement.name);
            if(isUnavailable) addedElement['isUnavailable'] = true;
            menu.refreshAccessories(addedElement);
            menu.hideNoPlaceAlert();

            // Pokazanie odpowiedniej zaślepki.

            var respons = $('#mainImageContainer img:visible').data('responsive');
            var hoverImgs = $('.mainImageHover');
            for (var i = 0; i < hoverImgs.length; ++i) {

                var h = hoverImgs[i];
                var resp = $(h).data('responsive');

                if (resp === respons) {
                    $(h).show();
                }
            }

            var furniturePrice = menu.simpleCreator.GetFurniturePriceBasedOnCurrentState();
            menu.simpleCreator.updatePrice(furniturePrice);
            menu.simpleCreator.SaveToCache(false);
        } else {
            menu.showNoPlaceAlert();
        }
    }

    /**
     * Wyświetlenie komunikatu o braku miejsca na szynie mebla na nowe fascynujące akcesoria. Komunikat wyświetlany jest tylko raz (jak to modal).
     */
    Menu.prototype.showNoPlaceAlert = function() {

        var acc = new Accessories_Class(this.furniture.id, this.simpleTalkResources);
        var runOutPlaceManager = new RunOutOfPlaceForAccessories_Class(this.furniture, acc.getAccessoriesList(), this);

        var html = runOutPlaceManager.createHtml();

        $('#st-configurator-modal .st-modal-content-container').html(html);
        $('#st-configurator-modal').css('display', 'block');

        runOutPlaceManager.addEvents(this.addAccessoriesToScene);
    }

    /**
     * Dodaje do odpowiedniej sekcji (identyfikowanej przez group) miniaturę reprezentującą materiał opisany w obiekcie element.
     *   @group - nazwa grupy (krok kreatora).
     *   @element - obiekt zawierający informacje o materiale:
     *       * thumb - nazwa pliku miniatury.
     *       * name - nazwa używana do tworzenia ścieżki.
     *       * desc - nazwa do zaprezentownia na GUI.
     */
    Menu.prototype.createMiniature = function(group, element) {

        // Kontener w widoku zawierający wszystkie materiały w ramach grupy.

        var appendTo = $("#" + group + "-group-collapsed .elementGroupMiniatures");

        // [HACK]: Super mega hack na wyrównanie opisów w sekcji z nóżkami.

        var description = this.simpleTalkResources.getResource(element.desc);
        if (group === 'st-legs' && description.split(' ').length === 1) {
            description += '<br/>&nbsp;';
        }

        var url = '../assets/menu/thumbs/' + element.thumb;
        var html =
            '<div class="dekor st-miniature-container" data-name="' + element.name + '">' +
            '<div class="dip-pw-color-sample img" style="background-image:' + "url('" + url + "')" + ';"></div>' +
            '<div class="name">' + description + '</div>' +
            '</div>';

        appendTo.append(html);

        // Dodanie do nowego obiektu obsługi zdarzeń (kliknięcie).

        var miniatures = appendTo.find('.dekor');
        for (var i = 0; i < miniatures.length; ++i) {

            var m = miniatures[i];
            if ($(m).data('name') == element.name) {

                $(m).on('click', this.changeViewContent);
                break;
            }
        }
    }

    /*
    Sprawdza czy element nie znajduje sie na liscie niedostepnych akcesoriów.
        @element - obiekt opisujący wózek do dodania.
    */
    Menu.prototype.isUnavailableAccesories = function(elementName)
    {
        var accessories = menu.simpleCreator.getUnavailableAccessories();
        for (var a in accessories)
        {
            if(elementName == a) return true;

        }
        return false;
    }

    /*
    Dodaje kod html odpowiedzialny za prezentacje wózków na podglądzie.
        @element - obiekt opisujący wózek do dodania.
    */
    Menu.prototype.refreshAccessories = function(element, zIndex) {

        var details = this.simpleCreator.currentViewState.isDetailsView();

        var accessories = this.furniture.GetAllAccessories();
        if (accessories.length && details) {
            $('#main-image-container-accessories-remove').fadeIn('slow');
        }

        var responsiveArray = [{
                name: "xl1",
                width: 960,
                height: 570
            },
            {
                name: "xl2",
                width: 734,
                height: 570
            },
            {
                name: "xl3",
                width: 600,
                height: 570
            },
            {
                name: "l",
                width: 734,
                height: 570
            },
            {
                name: "m",
                width: 600,
                height: 570
            },
            {
                name: "s",
                width: 367,
                height: 285
            },
            {
                name: "xs",
                width: 300,
                height: 233
            }
        ];

        var respons = $('#mainImageContainer img:visible').data('responsive');

        for (var i = 0; i < responsiveArray.length; ++i) {

            var r = responsiveArray[i];
            var name = r.name;

            // Generowanie warstwy w zależności od rozmiarów kontenera.

            var imageContainer = $('#mainImageContainer');

            var width = $(imageContainer).width();
            var height = $(imageContainer).height();

            var newPos = this.furniture.GetNewAccessoriesPosition(width, height);
            var newSize = this.furniture.GetNewAccessoriesSize(width, height, element.areaA);

            var bottom = newPos.y;
            var left = newPos.x;

            var w = newSize.w;
            var h = newSize.h;

            if (!zIndex) {
                zIndex = 100 - parseInt(accessories.length);
            }

            var style = 'style="position:absolute; bottom: ' + bottom + 'px; left:' + left + 'px; width: ' + w + 'px; height: ' + h + 'px; z-index:' + zIndex + ';"';
            var imgHtml =
                '<img class="st-accessories-img st-responsive-' + name + '"' +
                ' src="' + element.url + '" ' + style +
                ' data-accessories-id="' + element.id + '" data-accessories-lp="' + accessories.length + '" data-accessories-repons="' + name.toUpperCase() + '">';

            $('#mainImageContainer').append(imgHtml);

            if (details && respons === name.toUpperCase()) {
                $('#mainImageContainer').find('.st-accessories-img:last').hide().fadeIn('fast',function(){
                    if(element['isUnavailable']){
                        $(".st-accessories-img[src*='" + element.name + "']").each(function(){
                            $(this).css("opacity","0.6");
                        });
                    }
                });
            } else {
                $('#mainImageContainer').find('.st-accessories-img:last').hide();
            }
        }

     
    }

    function CookieParser_Class() {

        var self = this;

        self.encodeCookie = function(cookie) {

            for (var i = 0; i < _symbols.length; i++) {

                if (cookie.indexOf(_symbols[i][0]) >= 0) {

                    var regexp = new RegExp(_symbols[i][0], 'g');
                    cookie = cookie.replace(regexp, _symbols[i][1]);
                }
            }

            return cookie;
        }

        self.decodeCookie = function(encodedCookie) {

            for (var i = 0; i < _symbols.length; i++) {

                if (encodedCookie.indexOf(_symbols[i][1]) >= 0) {

                    var regexp = new RegExp(_symbols[i][1], 'g');
                    encodedCookie = encodedCookie.replace(regexp, _symbols[i][0]);
                }
            }

            return encodedCookie;
        }

        var _symbols = [

            //id mebla
            ["ST_biurko_110", "STB110"],
            ["ST_biurko_140", "STB140"],
            ["ST_barek", "STBA"],
            ["ST_bufet", "STBU"],
            ["ST_kanapa", "STKA"],
            ["ST_komoda_90_listwa", "STK90L"],
            ["ST_komoda_90_solid", "STK90S"],
            ["ST_komoda_drzwi", "STKD"],
            ["ST_komoda_waska", "STKW"],
            ["ST_lozko_90", "STL90"],
            ["ST_lozko_120", "STL120"],
            ["ST_lozko_140", "STL140"],
            ["ST_lozko_160", "STL160"],
            ["ST_lozko_180", "STL180"],
            ["ST_polka_kostka", "STPK"],
            ["ST_polka_scienna", "STPS"],
            ["ST_polka_scienna_haczyki", "STPSH"],
            ["ST_regal_1x5", "STR15"],
            ["ST_regal_2x5", "STR25"],
            ["ST_regal_3x4", "STR34"],
            ["ST_regal_4x5", "STR45"],
            ["ST_rtv_120", "STRTV120"],
            ["ST_rtv_180", "STRTV180"],
            ["ST_stol_kawowy_niski", "STSKN"],
            ["ST_stol_kawowy_wysoki", "STSKW"],
            ["ST_stol_kwadrat", "STSK"],
            ["ST_stol_okragly", "STSO"],
            ["ST_stol_prostokat", "STSP"],
            ["ST_stolik_nocny_drzwi", "STSND"],
            ["ST_stolik_nocny_szuflady", "STSNS"],
            ["ST_szafa_1D", "STS1D"],
            ["ST_szafa_1D_nadstawka", "STS1DN"],
            ["ST_szafa_2D", "STS2D"],
            ["ST_szafa_2D_nadstawka", "STS2DN"],
            ["ST_szafa_4D", "STS4D"],
            ["ST_szafa_narozna", "STSN"],
            ["ST_szafa_narozna_nadstawka", "STSNN"],
            ["ST_toaletka", "STT"],
            ["ST_witryna", "STW"],

            //parametry mebla
            ["front", "STft"],
            ["nozki", "STni"],
            ["korpus", "STks"],
            ["uchwyt", "STut"],
            ["wozki", "STwi"],
            ["ustawionoZestaw", "STuz"],

            //colory
            ["white", "STwe"],
            ["gray", "STgy"],
            ["black", "STbk"],
            ["wood", "STwd"],

            //nogi
            ["legs-none", "STln"],
            ["legs-black", "STlb"],
            ["legs-wood", "STlw"],
            ["legs-cone", "STlc"],
            ["legs-trapeze", "STlt"],
            ["legs-skids", "STls"],
            ["legs-wheels", "STlws"],

            //biurko140 zestawy
            ['{"id":7,"name":"akc_przybornik_duzy","thumb":"akc_przybornik_duzy.png","desc":"","url":"../assets/img/accessories/STB140_akc_przybornik_duzy.png","width":238,"areaA":{"a":207,"b":163},"realWidth":36,"offset":0,"preset":true,"popover":{"name":"PRZYBORNIK DUŻY","description":"","url":"../assets/img/popover/akc_przybornik_duzy.png"},"bigUrl":"../assets/menu/thumbs/akc_przybornik_duzy_big.png"},{"id":11,"name":"akc_tablica","thumb":"akc_tablica.png","desc":"","url":"../assets/img/accessories/STB140_akc_tablica.png","width":214,"areaA":{"a":139,"b":163},"realWidth":24,"offset":0,"preset":true,"popover":{"name":"TABLICA","description":"","url":"../assets/img/popover/akc_tablica.png"},"bigUrl":"../assets/menu/thumbs/akc_tablica_big.png"},{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STB140_akc_ramka.png","width":111,"areaA":{"a":96,"b":91},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"},{"id":5,"name":"akc_memo","thumb":"akc_memo.png","desc":"","url":"../assets/img/accessories/STB140_akc_memo.png","width":79,"areaA":{"a":70,"b":102},"realWidth":12,"offset":0,"preset":true,"popover":null,"bigUrl":"../assets/menu/thumbs/akc_memo_big.png"},{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STB140_akc_telefon.png","width":79,"areaA":{"a":61,"b":86},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"},{"id":2,"name":"akc_wyp25","thumb":"akc_wyp25.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp25.png","width":166,"areaA":{"a":145,"b":80},"realWidth":25,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 25cm","description":"","url":"../assets/img/popover/akc_wyp25.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp25_big.png"}', 'ST_B140_1'],
            ['{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp40.png","width":255,"areaA":{"a":228,"b":126},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"},{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp15.png","width":102,"areaA":{"a":89,"b":50},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"},{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp40.png","width":255,"areaA":{"a":228,"b":126},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"},{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp40.png","width":255,"areaA":{"a":228,"b":126},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"}', 'ST_B140_2'],

            //komoda zastawy
            ['{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STK90L_akc_telefon.png","width":97.96,"areaA":{"a":75.64,"b":106.64},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"},{"id":6,"name":"akc_probowka","thumb":"akc_probowka.png","desc":"","url":"../assets/img/accessories/STK90L_akc_probowka.png","width":37.2,"areaA":{"a":29.759999999999998,"b":97.96},"realWidth":3.5,"offset":0,"preset":false,"popover":{"name":"WAZON","description":"","url":"../assets/img/popover/akc_probowka.png"},"bigUrl":"../assets/menu/thumbs/akc_probowka_big.png"},{"id":5,"name":"akc_memo","thumb":"akc_memo.png","desc":"","url":"../assets/img/accessories/STK90L_akc_memo.png","width":97.96,"areaA":{"a":86.8,"b":126.48},"realWidth":12,"offset":0,"preset":true,"popover":null,"bigUrl":"../assets/menu/thumbs/akc_memo_big.png"},{"id":8,"name":"akc_przybornik_sredni","thumb":"akc_przybornik_sredni.png","desc":"","url":"../assets/img/accessories/STK90L_akc_przybornik_sredni.png","width":66.96,"areaA":{"a":57.04,"b":76.88},"realWidth":7.5,"offset":0,"preset":true,"popover":{"name":"PRZYBORNIK MAŁY","description":"","url":"../assets/img/popover/akc_przybornik_sredni.png"},"bigUrl":"../assets/menu/thumbs/akc_przybornik_sredni_big.png"},{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STK90L_akc_ramka.png","width":137.64,"areaA":{"a":119.03999999999999,"b":112.84},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"},{"id":6,"name":"akc_probowka","thumb":"akc_probowka.png","desc":"","url":"../assets/img/accessories/STK90L_akc_probowka.png","width":37.2,"areaA":{"a":29.759999999999998,"b":97.96},"realWidth":3.5,"offset":0,"preset":false,"popover":{"name":"WAZON","description":"","url":"../assets/img/popover/akc_probowka.png"},"bigUrl":"../assets/menu/thumbs/akc_probowka_big.png"},{"id":2,"name":"akc_wyp25","thumb":"akc_wyp25.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp25.png","width":205.84,"areaA":{"a":179.8,"b":99.2},"realWidth":25,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 25cm","description":"","url":"../assets/img/popover/akc_wyp25.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp25_big.png"}', 'ST_K_1'],
            ['{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp15.png","width":126.48,"areaA":{"a":110.36,"b":62},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"},{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp15.png","width":126.48,"areaA":{"a":110.36,"b":62},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"},{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp40.png","width":316.2,"areaA":{"a":282.71999999999997,"b":156.24},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"},{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp15.png","width":126.48,"areaA":{"a":110.36,"b":62},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"}', 'ST_K_2'],

            //rtv zestawy
            ['{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp40.png","width":198.9,"areaA":{"a":177.84,"b":98.28},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"},{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp40.png","width":198.9,"areaA":{"a":177.84,"b":98.28},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"},{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp40.png","width":198.9,"areaA":{"a":177.84,"b":98.28},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"},{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp40.png","width":198.9,"areaA":{"a":177.84,"b":98.28},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"}', 'ST_rtv180_1'],

            // stolik nocny zestawy
            ['{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STSNS_akc_telefon.png","width":131.14,"areaA":{"a":101.25999999999999,"b":142.76},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"},{"id":8,"name":"akc_przybornik_sredni","thumb":"akc_przybornik_sredni.png","desc":"","url":"../assets/img/accessories/STSNS_akc_przybornik_sredni.png","width":89.64,"areaA":{"a":76.36,"b":102.92},"realWidth":7.5,"offset":0,"preset":true,"popover":{"name":"PRZYBORNIK MAŁY","description":"","url":"../assets/img/popover/akc_przybornik_sredni.png"},"bigUrl":"../assets/menu/thumbs/akc_przybornik_sredni_big.png"},{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STSNS_akc_ramka.png","width":184.26,"areaA":{"a":159.35999999999999,"b":151.06},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"}', 'ST_SN_1'],

            //biurko140 akcesoria
            ['{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp15.png","width":102,"areaA":{"a":89,"b":50},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"}', 'ST_B140_akcw15'],
            ['{"id":2,"name":"akc_wyp25","thumb":"akc_wyp25.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp25.png","width":166,"areaA":{"a":145,"b":80},"realWidth":25,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 25cm","description":"","url":"../assets/img/popover/akc_wyp25.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp25_big.png"}', 'ST_B140_akcw25'],
            ['{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STB140_akc_wyp40.png","width":255,"areaA":{"a":228,"b":126},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"}', 'ST_B140_akcw40'],
            ['{"id":6,"name":"akc_probowka","thumb":"akc_probowka.png","desc":"","url":"../assets/img/accessories/STB140_akc_probowka.png","width":30,"areaA":{"a":24,"b":79},"realWidth":3.5,"offset":0,"preset":false,"popover":{"name":"WAZON","description":"","url":"../assets/img/popover/akc_probowka.png"},"bigUrl":"../assets/menu/thumbs/akc_probowka_big.png"}', 'ST_B140_prob'],
            ['{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STB140_akc_ramka.png","width":111,"areaA":{"a":96,"b":91},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"}', 'ST_B140_ramka'],
            ['{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STB140_akc_telefon.png","width":79,"areaA":{"a":61,"b":86},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"}', 'ST_B140_tel'],
            ['{"id":10,"name":"akc_tablet","thumb":"akc_tablet.png","desc":"","url":"../assets/img/accessories/STB140_akc_tablet.png","width":197,"areaA":{"a":174,"b":210},"realWidth":31,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TABLET","description":"","url":"../assets/img/popover/akc_tablet.png"},"bigUrl":"../assets/menu/thumbs/akc_tablet_big.png"}', 'ST_B140_tab'],

            //komoda akcesoria
            ['{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp15.png","width":126.48,"areaA":{"a":110.36,"b":62},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"}', 'ST_K_akcw15'],
            ['{"id":2,"name":"akc_wyp25","thumb":"akc_wyp25.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp25.png","width":205.84,"areaA":{"a":179.8,"b":99.2},"realWidth":25,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 25cm","description":"","url":"../assets/img/popover/akc_wyp25.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp25_big.png"}', 'ST_K_akcw25'],
            ['{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STK90L_akc_wyp40.png","width":316.2,"areaA":{"a":282.71999999999997,"b":156.24},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"}', 'ST_K_akcw40'],
            ['{"id":6,"name":"akc_probowka","thumb":"akc_probowka.png","desc":"","url":"../assets/img/accessories/STK90L_akc_probowka.png","width":37.2,"areaA":{"a":29.759999999999998,"b":97.96},"realWidth":3.5,"offset":0,"preset":false,"popover":{"name":"WAZON","description":"","url":"../assets/img/popover/akc_probowka.png"},"bigUrl":"../assets/menu/thumbs/akc_probowka_big.png"}', 'ST_K_prob'],
            ['{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STK90L_akc_ramka.png","width":137.64,"areaA":{"a":119.03999999999999,"b":112.84},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"}', 'ST_K_ramka'],
            ['{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STK90L_akc_telefon.png","width":97.96,"areaA":{"a":75.64,"b":106.64},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"}', 'ST_K_tel'],
            ['{"id":10,"name":"akc_tablet","thumb":"akc_tablet.png","desc":"","url":"../assets/img/accessories/STK90L_akc_tablet.png","width":244.28,"areaA":{"a":215.76,"b":260.4},"realWidth":31,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TABLET","description":"","url":"../assets/img/popover/akc_tablet.png"},"bigUrl":"../assets/menu/thumbs/akc_tablet_big.png"}', 'ST_K_tab'],

            //rtv akcesoria
            ['{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp15.png","width":79.56,"areaA":{"a":69.42,"b":39},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"}', 'ST_rtv_akcw15'],
            ['{"id":2,"name":"akc_wyp25","thumb":"akc_wyp25.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp25.png","width":129.48000000000002,"areaA":{"a":113.10000000000001,"b":62.400000000000006},"realWidth":25,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 25cm","description":"","url":"../assets/img/popover/akc_wyp25.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp25_big.png"}', 'ST_rtv_akcw25'],
            ['{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_wyp40.png","width":198.9,"areaA":{"a":177.84,"b":98.28},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"}', 'ST_rtv_akcw40'],
            ['{"id":6,"name":"akc_probowka","thumb":"akc_probowka.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_probowka.png","width":23.400000000000002,"areaA":{"a":18.72,"b":61.620000000000005},"realWidth":3.5,"offset":0,"preset":false,"popover":{"name":"WAZON","description":"","url":"../assets/img/popover/akc_probowka.png"},"bigUrl":"../assets/menu/thumbs/akc_probowka_big.png"}', 'ST_rtv_prob'],
            ['{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_ramka.png","width":86.58,"areaA":{"a":74.88,"b":70.98},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"}', 'ST_rtv_ramka'],
            ['{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_telefon.png","width":61.620000000000005,"areaA":{"a":47.58,"b":67.08},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"}', 'ST_rtv_tel'],
            ['{"id":10,"name":"akc_tablet","thumb":"akc_tablet.png","desc":"","url":"../assets/img/accessories/STRTV180_akc_tablet.png","width":153.66,"areaA":{"a":135.72,"b":163.8},"realWidth":31,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TABLET","description":"","url":"../assets/img/popover/akc_tablet.png"},"bigUrl":"../assets/menu/thumbs/akc_tablet_big.png"}', 'ST_rtv_tab'],

            //stolik nocny akcesoria
            ['{"id":1,"name":"akc_wyp15","thumb":"akc_wyp15.png","desc":"","url":"../assets/img/accessories/STSNS_akc_wyp15.png","width":169.32,"areaA":{"a":147.73999999999998,"b":83},"realWidth":15,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 15cm","description":"","url":"../assets/img/popover/akc_wyp15.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp15_big.png"}', 'ST_SN_akcw15'],
            ['{"id":2,"name":"akc_wyp25","thumb":"akc_wyp25.png","desc":"","url":"../assets/img/accessories/STSNS_akc_wyp25.png","width":275.56,"areaA":{"a":240.7,"b":132.79999999999998},"realWidth":25,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 25cm","description":"","url":"../assets/img/popover/akc_wyp25.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp25_big.png"}', 'ST_SN_akcw25'],
            ['{"id":3,"name":"akc_wyp40","thumb":"akc_wyp40.png","desc":"","url":"../assets/img/accessories/STSNS_akc_wyp40.png","width":424.96,"areaA":{"a":391.76,"b":210.82},"realWidth":40,"offset":0,"preset":false,"popover":{"name":"ZAŚLEPKA 40cm","description":"","url":"../assets/img/popover/akc_wyp40.png"},"bigUrl":"../assets/menu/thumbs/akc_wyp40_big.png"}', 'ST_SN_akcw40'],
            ['{"id":6,"name":"akc_probowka","thumb":"akc_probowka.png","desc":"","url":"../assets/img/accessories/STSNS_akc_probowka.png","width":49.8,"areaA":{"a":39.839999999999996,"b":131.14},"realWidth":3.5,"offset":0,"preset":false,"popover":{"name":"WAZON","description":"","url":"../assets/img/popover/akc_probowka.png"},"bigUrl":"../assets/menu/thumbs/akc_probowka_big.png"}', 'ST_SN_prob'],
            ['{"id":9,"name":"akc_ramka","thumb":"akc_ramka.png","desc":"","url":"../assets/img/accessories/STSNS_akc_ramka.png","width":184.26,"areaA":{"a":159.35999999999999,"b":151.06},"realWidth":16.5,"offset":0,"preset":false,"popover":{"name":"RAMKA NA ZDJĘCIE","description":"","url":"../assets/img/popover/akc_ramka.png"},"bigUrl":"../assets/menu/thumbs/akc_ramka_big.png"}', 'ST_SN_ramka'],
            ['{"id":4,"name":"akc_telefon","thumb":"akc_telefon.png","desc":"","url":"../assets/img/accessories/STSNS_akc_telefon.png","width":131.14,"areaA":{"a":101.25999999999999,"b":142.76},"realWidth":11,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TELEFON","description":"","url":"../assets/img/popover/akc_telefon.png"},"bigUrl":"../assets/menu/thumbs/akc_telefon_big.png"}', 'ST_SN_tel'],
            ['{"id":10,"name":"akc_tablet","thumb":"akc_tablet.png","desc":"","url":"../assets/img/accessories/STSNS_akc_tablet.png","width":327.02,"areaA":{"a":288.84,"b":348.59999999999997},"realWidth":31,"offset":0,"preset":false,"popover":{"name":"UCHWYT NA TABLET","description":"","url":"../assets/img/popover/akc_tablet.png"},"bigUrl":"../assets/menu/thumbs/akc_tablet_big.png"}', 'ST_SN_tab']
        ];
    }

    /**
     * Klasa tworząca konfigurator produktu w wskazanym elemencie.
     * @param {String} container - selektor wskazujący kontenet, w którym ma zostać wygenerowany konfigurator.
     * @param {String} productId - identyfikator produktu.
     * @param {String} lang - język kreatora.
     */
    function SimpleTalkCreator(simpleConfig) {
        var self = this;
        var _debug = true;

        var _container = simpleConfig.container;
        var _lang = simpleConfig.lang;


      //  var _translator = getTranslator(_lang);

        // todo: zapytaj jakiś serwis o dane słownikowe.

        var simpleTalkResources;

        // todo: zapytaj jakiś serwis o dane o cenach.

        var stPriceCalculator;

    //    function getTranslator(lang) {
            // todo: zwrócić odpowiedni obiekt translatora.
      //      return null;
    //}


        function createSimpleModal() {
            var other_close = simpleTalkResources.getResource("other_select_furniture"); //other_close

            var html =
                '<div id="st-configurator-modal" class="st-modal">' +
                '<div class="st-modal-content">' +
                '<span class="st-close">' +
                '<img src="../assets/img/closedark.png" alt="' + other_close + '">' +
                '</span>' +
                '<div class="st-modal-content-container">' +
                '</div>' +
                '</div>' +
                '</div>';

            return html;
        }

        function createSimpleLink(url) {
            var html =
                '<p class="st-main-menu-header-collection">' +
                '<a href="' + url + '">Simple</a>' +
                '</p>';

            return html;
        }

        function createSimplePreview(config) {
            var html =
                '<div id="mainImageContainer">' +
                '<div id="main-image-container-loading-canvas">' +
                '<img class="mainImageLoading st-responsive-xl1" src="../assets/img/fakes/stLargeFake.png" data-responsive="XL1"/>' +
                '<img class="mainImageLoading st-responsive-xl2" src="../assets/img/fakes/stMediumFake.png" data-responsive="XL2"/>' +
                '<img class="mainImageLoading st-responsive-xl3" src="../assets/img/fakes/stM3Fake.png" data-responsive="XL3"/>' +
                '<img class="mainImageLoading st-responsive-l" src="../assets/img/fakes/stMediumFake.png" data-responsive="L"/>' +
                '<img class="mainImageLoading st-responsive-m" src="../assets/img/fakes/stMediumFake.png" data-responsive="L"/>' +
                '<img class="mainImageLoading st-responsive-s" src="../assets/img/fakes/stSmallFake.png" data-responsive="S"/>' +
                '<img class="mainImageLoading st-responsive-xs" src="../assets/img/fakes/stS2Fake.png" data-responsive="XS"/>' +
                '</div>';

            if (config.showViewSwitch) {
                var other_back = simpleTalkResources.getResource("other_select_furniture"); //other_back;

                html +=
                    '<div id="main-image-container-view-change-fake-with-back" class="btn-group" data-toggle="buttons">' +
                    '<label id="main-image-container-view-change-back" class="btn btn-primary st-configurator-close-container">' +
                    other_back +
                    '</label>' +
                    '</div>';
            }

            var other_table_legs_info = simpleTalkResources.getResource("other_table_legs_info");
            var other_table_legs_info_add = simpleTalkResources.getResource("other_table_legs_info_add");
            var other_delete = simpleTalkResources.getResource("other_delete");
            var show_inspirations = simpleTalkResources.getResource("show_inspirations");

            var magnifier = simpleTalkResources.getResource("magnifier");
            var save_actual_configuration = simpleTalkResources.getResource("save_actual_configuration");

            var inspirationsLink = "";

            if (simpleConfig.linkToGallery && simpleConfig.linkToGallery!="{{ path('app_page_modal_gallery',{'type':'MEBLE_PW','product_id':product.id,'version_id':1}) }}"){
                inspirationsLink= '<a id="st-go-to-inspiration" href="javascript:void(0);" class="st-btn-red openGalleryModal" data-modal-url="'+simpleConfig.linkToGallery+'">'+show_inspirations+'</a>';
            }

            html +=
                '<div class="st-ghost-alert-container">' +
                '<p class="st-ghost-alert-text text-center">' + other_table_legs_info + '</p>' +
                '<p class="st-ghost-alert-text-additional text-center">' + other_table_legs_info_add + '</p>' +
                '</div>' +
               inspirationsLink+
                '<div id="main-image-container-accessories-remove">' +
                '<button type="button" class="btn btn-default">' + other_delete + '</button>' +
                '</div>' +
                '<div id="main-image-container-magnifier">' +
                '<button type="button" style="margin-bottom:40px;" class="btn btn-default">' +
                '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>' +
                '<span class="hiddenButtonText">'+magnifier+'</span>' +
                '</button></div>' +
                '<div id="main-image-container-save-actual-configuration">' +
                '<button type="button" class="btn btn-default">' +
                '<span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span>' +
                '<span class="hiddenButtonText">'+save_actual_configuration+'</span>' +
                '</button></div>' +
                '<img class="mainImage st-responsive-xl1" src="../assets/img/fakes/stLargeFake.png" data-responsive="XL1"/>' +
                '<img class="mainImage st-responsive-xl2" src="../assets/img/fakes/stMediumFake.png" data-responsive="XL2"/>' +
                '<img class="mainImage st-responsive-xl3" src="../assets/img/fakes/stM3Fake.png" data-responsive="XL3"/>' +
                '<img class="mainImage st-responsive-l" src="../assets/img/fakes/stMediumFake.png" data-responsive="L"/>' +
                '<img class="mainImage st-responsive-m" src="../assets/img/fakes/stMediumFake.png" data-responsive="L"/>' +
                '<img class="mainImage st-responsive-s" src="../assets/img/fakes/stSmallFake.png" data-responsive="S"/>' +
                '<img class="mainImage st-responsive-xs" src="../assets/img/fakes/stS2Fake.png" data-responsive="XS"/>' +
                '<img class="mainImageHover st-responsive-xl1" src="../assets/img/fakes/XL1_hover1.png" data-responsive="XL1"/>' +
                '<img class="mainImageHover st-responsive-xl2" src="../assets/img/fakes/XL2_hover.png" data-responsive="XL2"/>' +
                '<img class="mainImageHover st-responsive-xl3" src="../assets/img/fakes/XL3_hover.png" data-responsive="XL3"/>' +
                '<img class="mainImageHover st-responsive-l" src="../assets/img/fakes/XL2_hover.png" data-responsive="L"/>' +
                '<img class="mainImageHover st-responsive-m" src="../assets/img/fakes/XL2_hover.png" data-responsive="L"/>' +
                '<img class="mainImageHover st-responsive-s" src="../assets/img/fakes/S_hover.png" data-responsive="S"/>' +
                '<img class="mainImageHover st-responsive-xs" src="../assets/img/fakes/XS_hover.png" data-responsive="XS"/>' +
                '<div id="st-special-loading-canvas">' +
                '<img class="absolute-center" src="../assets/img/stLogoC2.png" alt="VOX - Simple"/>' +
                '</div>' +
                '</div>';

            return html;
        }

        function createMenuStep(lp, type) {
            function createHeader(type) {
                // todo: Przetłumaczyć nagłówki.

                // case FurnituresPartsType::Body(): return $resourceManager->GetResource('menu_select_body_color');
                // case FurnituresPartsType::Front(): return $resourceManager->GetResource('menu_select_front_color');
                // case FurnituresPartsType::Handles(): return $resourceManager->GetResource('menu_select_handles_color');
                // case FurnituresPartsType::Legs(): return $resourceManager->GetResource('menu_select_legs');
                // case FurnituresPartsType::Accessories(): return $resourceManager->GetResource('menu_select_accessories');

                return 'przetłumaczony nagłówek';
            }

            var stepId = type + '-group';
            var stepIdCollapsed = stepId + '-collapsed';
            var stepHeader = createHeader(type);
            var userMenuStepLp = lp ? lp : 1;
            var userMenuStepTextId = 'st-main-menu-' + userMenuStepLp + '-pos';

            if (type === 'st-accessories') {
                var menu_ready_presets = simpleTalkResources.getResource("menu_ready_presets");
                var menu_single_accessories = simpleTalkResources.getResource("menu_single_accessories");

                var extendedHtml =
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading" role="tab" id="' + stepId + '">' +
                    '<div class="panel-title">' +
                    '<a class="st-step-accordion-header-collapse collapsed" role="button" data-toggle="collapse" data-parent="#st-step-accordion" href="#' + stepIdCollapsed + '" aria-expanded="true" aria-controls="' + stepIdCollapsed + '">' +
                    '<div class="row">' +
                    '<div class="col-xs-12 st-step-accordion-header-label-container">' +
                    '<p id="' + userMenuStepTextId + '" class="st-step-accordion-header-label">' +
                    stepHeader +
                    '</p>' +
                    '<i class="st-step-accordion-header-collapse-icon fa fa-caret-down"></i>' +
                    '</div>' +
                    '</div>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '<div id="' + stepIdCollapsed + '" class="panel-collapse collapse" role="tabpanel" aria-labelledby="' + stepId + '">' +
                    '<div class="panel-body">' +
                    '<p class="st-accessories-select-label">' +
                    '<span>-</span>' +
                    menu_ready_presets +
                    '</p>' +
                    '<div class="color-row select-kolor presetGroupMiniatures" data-type="' + type + '">' +

                    '</div>' +
                    '<p class="st-accessories-select-label noone">' +
                    '<span>-</span>' +
                    menu_single_accessories +
                    '</p>' +
                    '<div class="color-row select-kolor elementGroupMiniatures" data-type="' + type + '">' +

                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                return extendedHtml;
            } else {
                var simpleHtml =
                    '<div class="panel panel-default">' +
                    '<div class="panel-heading' + (userMenuStepLp === 1 ? ' first' : '') + '" role="tab" id="' + stepId + '">' +
                    '<div class="panel-title">' +
                    '<a class="st-step-accordion-header-collapse collapsed" role="button" data-toggle="collapse" data-parent="#st-step-accordion" href="#' + stepIdCollapsed + '" aria-expanded="true" aria-controls="' + stepIdCollapsed + '">' +
                    '<div class="row">' +
                    '<div class="col-xs-12 st-step-accordion-header-label-container">' +
                    '<p id="' + userMenuStepTextId + '" class="st-step-accordion-header-label">' +
                    stepHeader +
                    '</p>' +
                    '<i class="st-step-accordion-header-collapse-icon fa fa-caret-down"></i>' +
                    '</div>' +
                    '</div>' +
                    '</a>' +
                    '</div>' +
                    '</div>' +
                    '<div id="' + stepIdCollapsed + '" class="panel-collapse collapse' + (userMenuStepLp === 1 ? ' in' : '') + '" role="tabpanel" aria-labelledby="' + stepId + '">' +
                    '<div class="panel-body">' +
                    '<div class="color-row select-kolor elementGroupMiniatures" data-type="' + type + '">' +

                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                return simpleHtml;
            }
        }

        function createSimpleMenu(config) {
            var otherClose = simpleTalkResources.getResource("otherClose");

            var html =
                '<div id="mainMenu" class="panel-group menu">' +
                '<div class="st-main-menu-header">';

            if(simpleConfig.allowBackToList){
              html+='<div id="backToList" class="st-configurator-close-container"><img src="../assets/img/closedark.png" alt="zamknij"></div>';
            }

            if (config.fromVoxBox) {
                html +=
                    '<div id="backToVoxBox" class="st-configurator-close-container">' +
                    '<img src="../assets/img/closedark.png" alt="' + otherClose + '">' +
                    '</div>';
            }

            html +=
                '<div class="st-main-menu-header-name">' +
                '<p class="st-main-menu-header-name-bottom"></p>' +
                '</div>';

            if (config.includeLink) {
                html += createSimpleLink(simpleConfig.collectionUrl);
            }

            html +=
                '</div>' +
                '<div id="st-step-accordion" class="panel-group st-main-menu-sections" role="tablist" aria-multiselectable="true">' +

                createMenuStep(1, 'st-body') +
                createMenuStep(2, 'st-front') +
                createMenuStep(3, 'st-legs') +
                createMenuStep(4, 'st-handles') +
                createMenuStep(5, 'st-accessories') +

                '</div>' +

                '<div class="st-main-menu-footer">' +
                '<div id="additionalButtonsContainer" class="panel panel-footer">' +
                '<div class="row">';

            if (config.fromVoxBox) {
                var menu_ok = simpleTalkResources.getResource("menu_ok");

                html +=
                    '<div class="col-xs-12 st-btn-red-cell">' +
                    '<button id="st-open-voxbox-modal-btn" class="additionalButtons st-btn-red">' +
                    menu_ok +
                    '</button>' +
                    '</div>';
            } else {
                var menu_add_to_card = simpleTalkResources.getResource("menu_add_to_card");

                html +=
                    '<div class="col-xs-4 st-btn-red-cell st-left">' +
                    '<div class="st-main-menu-price-value-container text-center">' +
                    '<p class="st-main-menu-price-value"></p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-xs-8 st-btn-red-cell st-right">' +
                    '<button id="zatwierdz" class="additionalButtons st-btn-red">' +
                    menu_add_to_card +
                    '<img src="../assets/img/koszyk_white.svg" alt="koszyk" class="st-koszyk-white">' +
                    '</button>' +
                    '</div>';
            }

            html +=
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';

            return html;
        }

        function createHtml() {
            var html =
                '<div class="container simple-talk-container">' +

                '<div id="fog"' + (simpleConfig.showLoadingOnStart ? ' style="display:inline;"' : '') + '>' +
                '<img class="absolute-center" src="../assets/img/stLogoC.png" alt="VOX - Simple"/>' +
                '</div>';

            if (!simpleConfig.productId) {
                html += furnituresList;
            } else {
                html +=
                    '<div class="st-configurator-work-place">' +

                    createSimpleModal() +

                    '<div class="row st-mobile-header">';

                if (simpleConfig.showCloseButtonInHeader) {
                    html +=
                        '<div class="st-configurator-close-container">' +
                        '<img src="../assets/img/closedark.png" alt="zamknij">' +
                        '</div>';
                }

                html +=
                    '<div class="st-main-menu-header">' +
                    '<div class="st-main-menu-header-name">' +
                    '<p class="st-main-menu-header-name-bottom"></p>' +
                    '</div>' +
                    createSimpleLink(simpleConfig.collectionUrl) +
                    '</div>' +

                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-md-9 col-preview">' +
                    createSimplePreview(simpleConfig) +
                    '</div>' +
                    '<div class="col-md-3 col-user-menu">' +
                    createSimpleMenu(simpleConfig) +
                    '</div>' +
                    '</div>' +
                    '</div>';
            }

            html += '</div>';

            return html;
        }

        function getTranslateDataSuccess(data) {
            simpleTalkResources = new SimpleTalkResources_Class(data);
            var parsed = JSON.parse(data);
            simpleTalkResources.fill(parsed);

            if (_getTranslateDataCallback) {
                _getTranslateDataCallback();
            } else {
                if (_debug) {
                    console.log('Brak obsługi zdarzenia getTranslateDataSuccess.');
                }
            }
        }

        function getTranslateDataError(data) {
            if (_debug) {
                console.log('Błąd podczas pobierania tłumaczeń.');
            }

            if (_getTranslateDataCallback) {
                _getTranslateDataCallback();
            } else {
                if (_debug) {
                    console.log('Brak obsługi zdarzenia getTranslateDataError.');
                }
            }
        }

        var _getTranslateDataCallback;

        function getInitTranslateData(url, callback) {
            _getTranslateDataCallback = callback;

            $.ajax({
                method: "POST",
                url: url,
                data: {
                    lang: _lang
                },
                success: getTranslateDataSuccess,
                error: getTranslateDataError
            });
        }

        var _getInitPriceDataCallback;

        function getInitPriceDataSuccess(data) {
            stPriceCalculator = new PriceCalculator_Class(simpleTalkResources);
            stPriceCalculator.addPricesData(data,simpleConfig.productId);

            if (_getInitPriceDataCallback) {
                _getInitPriceDataCallback();
            } else {
                if (_debug) {
                    console.log('Brak obsługi zdarzenia getInitPriceDataSuccess.');
                }
            }
        }

        function getInitPriceDataError() {
            if (_debug) {
                console.log('Błąd podczas pobierania cen.');
            }

            if (_getInitPriceDataCallback) {
                _getInitPriceDataCallback();
            } else {
                if (_debug) {
                    console.log('Brak obsługi zdarzenia getInitPriceDataError.');
                }
            }
        }

        function getInitPriceDataFromFile(url, callback) {
            _getInitPriceDataCallback = callback;

            $.ajax({
                method: "POST",
                url: url,
                data: {
                    lang: _lang
                },
                success: function(data){
                    console.log("Ceny pobrane z pliku lokalnego");
                    getInitPriceDataSuccess(data);
                },
                error: getInitPriceDataError,
            });
        }

        function getInitPriceData(url, callback) {
            _getInitPriceDataCallback = callback;

            $.ajax({
                method: "POST",
                url: simpleConfig.priceUrl,
                dataType: 'text',
                success: getInitPriceDataSuccess,
                error: function(data){
                    console.log("Nie można pobrać cen z serwera..");
                    getInitPriceDataFromFile(url, callback);
                }
            });
        }

        function addEvents() {
            $('#loadExternalProjectButton').on('click', handleFileSelection);

            //$("#zatwierdz").click(simpleConfig.cartAction);
            $("#zatwierdz").click(SaveFurniture);
            
            $("#anuluj").click(Return);

            $('.st-step-accordion-header-collapse').on('click', function(e) {

                var ICON_SELECTOR = '.st-step-accordion-header-collapse-icon';
                var ICON_UP = 'fa-caret-up';
                var ICON_DOWN = 'fa-caret-down';

                function changeCollapseIcon(icon, add, remove) {

                    if (!$(icon).hasClass(add)) {
                        if ($(icon).hasClass(remove)) {
                            $(icon).removeClass(remove);
                        }
                        $(icon).addClass(add);
                    }
                }

                function changeCollapseIconUp(collapse) {

                    var icon = $(collapse).find(ICON_SELECTOR);
                    changeCollapseIcon(icon, ICON_UP, ICON_DOWN);
                }

                function changeCollapseIconDown(collapse) {

                    var icon = $(collapse).find(ICON_SELECTOR);
                    changeCollapseIcon(icon, ICON_DOWN, ICON_UP);
                }

                function changeAllCollapseIcon() {

                    var links = $('.st-step-accordion-header-collapse');
                    if (links.length) {

                        for (var i = 0; i < links.length; ++i) {

                            var l = links.get(i);
                            changeCollapseIconDown($(l));
                        }
                    }
                }

                // Użycie bug hacka'a.

                var collapsedId = $(this).attr('href');
                $(collapsedId).off('show.bs.collapse', forceChangeTheOthersVisibility).on('show.bs.collapse', forceChangeTheOthersVisibility);

                // Zmiana ikony we wszystkich pozycjach.

                changeAllCollapseIcon();

                // Aktualizacja klikniętej pozycji.

                var collapsed = $(this).hasClass('collapsed');

                if (collapsed) {
                    changeCollapseIconUp($(this));
                } else {
                    changeCollapseIconDown($(this));
                }

                if ($(this).parents('.panel-heading').attr('id') === 'st-accessories-group') {

                    if (collapsed && !currentViewState.isDetailsView()) {

                        $('#main-image-container-view-change-front').removeClass('active');
                        $('#main-image-container-view-change-details').addClass('active');

                        ChangeViewToDetails();
                    }
                } else {

                    if (collapsed && !currentViewState.isMainView()) {

                        $('#main-image-container-view-change-front').addClass('active');
                        $('#main-image-container-view-change-details').removeClass('active');

                        ChangeViewToMain();
                    }
                }
            });

            $('#main-image-container-view-change-front').on('click', function(e) {

                e.preventDefault();
                ChangeViewToMain();
            });

            $('#main-image-container-view-change-details').on('click', function(e) {

                e.preventDefault();
                ChangeViewToDetails();
            });

            $('#st-confirmed-edit-btn').on('click', function(e) {

                e.preventDefault();

                if (furniture.GetAllAccessories().length && currentViewState.isDetailsView()) {
                    $('#main-image-container-accessories-remove').fadeIn();
                }
                $('#main-menu-confirmed').fadeOut('slow', function() {
                    $('#mainMenu').fadeIn('slow');
                    $('.st-voxbox-save-result').hide();

                    var summanyAccordion = $('#st-confirmed-accordion .collapse');
                    for (var i = 0; i < summanyAccordion.length; ++i) {

                        var c = summanyAccordion[i];
                        $(c).collapse('hide');
                    }
                });
            });

            $('.st-main-menu-price .st-spinner-numeric-btn.up').on('click', function(e) {

                e.preventDefault();
                var spinner = $('.st-main-menu-price .st-spinner');
                var count = parseInt($(spinner).val());

                if ($.isNumeric(count)) {
                    $(spinner).val(count + 1);
                }
            });

            $('.st-main-menu-price .st-spinner-numeric-btn.down').on('click', function(e) {

                e.preventDefault();
                var spinner = $('.st-main-menu-price .st-spinner');
                var count = parseInt($(spinner).val());

                if ($.isNumeric(count) && count > 1) {
                    $(spinner).val(count - 1);
                }
            });

            $('#main-image-container-accessories-remove').on('click', function(e) {

                e.preventDefault();

                // I nie wykonuj mi żadnego kliknięcia na elementy leżące pod spodem.

                e.stopPropagation();

                if (furniture.HaveToRemoveAllAccessories()) {

                    furniture.RemoveAllAccesories();
                    $('#mainImageContainer .st-accessories-img').remove();

                    furniture.SetPresetFlag('');
                    $(this).hide();
                } else {

                    var removedElement = furniture.RemoveLastAccessories();
                    if (removedElement == null) {
                        $(this).hide();
                    } else {

                        var accessoriesImg = $('#mainImageContainer .st-accessories-img');
                        for (var i = 0; i < accessoriesImg.length; ++i) {

                            var a = accessoriesImg[i];

                            var id = $(a).data('accessories-id');
                            var lp = $(a).data('accessories-lp');

                            var lpToRemove = furniture.GetAllAccessories().length + 1;

                            if (removedElement.id === parseInt(id) && lpToRemove === parseInt(lp)) {
                                $(a).fadeOut('fast', function() {
                                    $(this).remove();
                                })
                            }
                        }

                        if (!furniture.GetAllAccessories().length) {
                            $(this).hide();
                        }
                    }
                }

                // Usunięcie ewentulnego komunikatu o przeciążeniu mebla akcesoriami.

                var show = $('#st-accessories-group-collapsed .alert').length === 0;
                if (!show) {
                    $('#st-accessories-group-collapsed').find('.alert:last').slideUp('fast', function() {
                        $(this).remove();
                    });
                }

                SaveToCache(false);

                var furniturePrice = GetFurniturePriceBasedOnCurrentState();
                updatePrice(furniturePrice);
            });

            /* Obsługa kliknięcia na przycisk VOXBOX'a. */
            $('#st-confirmed-accordion-voxbox-head').on('click', function(e) {

                e.preventDefault();

                if (getUserID() !== '') {

                    $('.st-voxbox-save-info').show();
                    $('.st-voxbox-login-info').hide();
                } else {

                    $('.st-voxbox-save-info').hide();
                    $('.st-voxbox-login-info').show();
                }

                $('.st-voxbox-save-result').hide();
            });

            /*
            Obsługa zamykania okna modalnego.
            */
            $('#st-configurator-modal span.st-close').on('click', function(e) {

                e.preventDefault();
                $('#st-configurator-modal').css('display', 'none');
            });

            /**
             * Zdarzenie kliknięcia na mebel z listy wszystkich dostępnych mebli do konfiguracji.
             */
            // $('.st-furniture-select-carousel-item').on('click', function(e) {

            //     e.preventDefault();

            //     var furnitureId = $(this).data('furniture-id');
            //     if (furnitureId) {
            //       simpleConfig.productId = furnitureId;
            //       create(hideAllLoadingControls)
            //       //  doInitializeActions(furnitureId, true);
            //     } else {

            //         // todo: nieznany identyfikator.
            //     }
            // });

            /**
             * Zdarzenie kliknięcia na przycisk VOXBOX w głównym menu - ma skutkowac pojawieniem się okna ze szczegółami umieszczanie mebla w projektach użytkownika.
             */
            $('#st-open-voxbox-modal-btn').on('click', function(e) {

                e.preventDefault();

                var voxboxManager = new VoxBoxSaveManager_Class(getUserID(), simpleTalkResources, isConfigFromEdit);
                var html = voxboxManager.createHtml();

                $('#st-configurator-modal .st-modal-content-container').html(html);
                $('#st-configurator-modal').css('display', 'block');

                voxboxManager.addEvents(saveVoxBoxProjectOnServer, changeFurnitureProjectName);
            });

            /**
             * Zdarzenie zamykania konfiguratora. W zależności od trybu w jakim został uruchomiony obsługa wykona różne działania.
             * Działanie A: Zamknie konfigurator i pokaże sekcje z prezentacją produktu.
             * Działanie B: Zamknie konfigurator i pokaże sekcję z listą wszystkich dostępnych mebli do konfiguracji.
             */
            $('.st-configurator-close-container').on('click', function(e) {

              e.preventDefault();

              //cofnij do listy
              if(this.id=="backToList"){
                var furnitureId = "";
                  simpleConfig.productId = furnitureId;
                  create(hideAllLoadingControls)
                  //  doInitializeActions(furnitureId, true);
              }
      else{
                if (!simpleTalkInPresentationMode) {

                    SendDataToVox("close");

                    setTimeout(function() {

                        // Ustawienie domyślnego stanu widoku po zamknięciu konfiguratora.

                        $('.st-furniture-select-container').hide();
                        $('.simple-talk-container .st-configurator-work-place').show();

                        SetAccordionInDefaultState();
                        SetDefaultPreviewState();
                        $('#main-image-container-view-change-front').addClass('active');
                        $('#main-image-container-view-change-details').removeClass('active');
                        ChangeViewToMain();

                        $("#fog").show();

                    }, 1300);
                } else {

                    var id = getFurnitureIdFromUrl();
                    if (id) {

                        // Działanie A

                        $('.vox-product-pw-main').fadeIn('slow');
                        $('.simple-talk-container').hide();
                        SendDataToVox("close");
                    } else {

                        // Działanie B

                        $('.st-furniture-select-container').fadeIn('slow');
                        $('.simple-talk-container .st-configurator-work-place').hide();
                    }

                    SetAccordionInDefaultState();

                    // Wyczyszczenie informacji o załadowanych obrazkach.

                    SetDefaultPreviewState();

                    // Ustawienie domyślnego widoku.

                    $('#main-image-container-view-change-front').addClass('active');
                    $('#main-image-container-view-change-details').removeClass('active');

                    ChangeViewToMain();
                }
            }
          });

            if (window.addEventListener) {
                window.addEventListener("message", SetVoxData, false);
            } else if (window.attachEvent) {
                window.attachEvent("onmessage", SetVoxData, false);
            }

            $(window).resize(function() {

                var w = $('#mainImageContainer').width();
                var h = $('#mainImageContainer').height();

                resizeManager.start(w, h);
            });
        }

        function afterInitTranslateDataLoaded() {
            getInitPriceData(simpleConfig.priceService, afterInitPriceDataLoaded);
        }

        function afterInitPriceDataLoaded() {
            var html = createHtml();
            $(_container).html(html);

            if (simpleConfig.productId) {
                doInitializeActions(simpleConfig.productId, false, function() {
                    _allSimpleComponentLoaded();
                    addEvents(); 
                });
            } else {
                _allSimpleComponentLoaded();
                addEvents(); 
            }
        }

        var _allSimpleComponentLoaded;
        var furnituresList;

        function create(callback) {
            _allSimpleComponentLoaded = callback;
            if(simpleConfig.furnitureSelectUrl)
            {
                $.post(simpleConfig.furnitureSelectUrl)
                .done(function(idk) {
                //  console.log("got furnitureData: " + idk);
                  furnituresList= idk;
                  getInitTranslateData(simpleConfig.translateService, afterInitTranslateDataLoaded);
                })
                .fail(function() {
                  console.log("error getting carousel furniture data");
                });
            } else 
            {
                furnituresList= "";
                getInitTranslateData(simpleConfig.translateService, afterInitTranslateDataLoaded);
            }

        }

        /* Wszystkie funkcje odpowidające za logikę */

        //globals
        var furniture;
        var menu;
        var useServerMethod = true;
        var currentViewState = new ViewState();
        var voxData;

        self.currentViewState = currentViewState;

        self.getUnavailableAccessories = function(){
           return stPriceCalculator.getUnavailableAccessories();
        }

        self.checkAvailability = function() {
            if(stPriceCalculator.isUnavailableItem()) {
                var items = stPriceCalculator.getUnavailableItemName(simpleTalkResources);
                $('#st-configurator-modal .st-modal-content-container').html("<h4>Brak następujących elementów na stanie:</h4><ul></ul>");

                for(i in items)
                {                    
                    $('#st-configurator-modal .st-modal-content-container ul').append("<li>" + items[i] + "</li>");
                }

                $('#st-configurator-modal').css('display', 'block');
                return false;
            } else return true;
        }

        /**
         * Zwraca aktualną cenę mebla.
         */
        function GetFurniturePriceBasedOnCurrentState() {

            return stPriceCalculator.getFurniturePrice(furniture.GetFurnitureState());
        }

        self.GetFurniturePriceBasedOnCurrentState = GetFurniturePriceBasedOnCurrentState;

        /**
         * Zwraca obiekt do przekazania VOXowi.
         */
        self.GetCartFurnitureData = function() {

            var cardInfo = stPriceCalculator.getFurnitureCart(furniture.GetFurnitureState());
            return cardInfo;
        }

        /**
         * Aktualizacja ceny produktu.
         *  @param price - nowa cena produktu.
         */
        function updatePrice(price) {

            var value = price === 'N/A' ? 'N/A' : Number(price).toFixed(0) + ' zł';
            $('.st-main-menu-price-value').text(value);
        }

        self.updatePrice = updatePrice;

        function getFurnitureIdFromUrl() {

            var searchUrl = location.search.substring(1);
            if (searchUrl.indexOf('id') !== -1) {

                var idPart = searchUrl.substring(searchUrl.indexOf('id') + 3);
                if (idPart.indexOf('&') !== -1) {
                    idPart = idPart.substring(0, idPart.indexOf('&'));
                }

                console.log('FurnitureIdReaded: ' + idPart);

                return idPart;
            }
            return '';
        }

        function getFurnitureIdFromProduct(productId) {

            // Z bazy danych Vox'a dostajemy dokładnie te same ID, które używane są w aplikacji.
            return productId;
        }

        var _voxboxLoggedUserId = null;

        //metoda wywoływana z voxboxa do przeładowania kolorów i ustawień mebla
        function SetVoxData(e) {

            if (e.origin == "null" || e.origin == "http://test2.meble.vox.pl" || e.origin == "http://localhost" || e.origin == "http://www.meble.vox.pl") {

                console.log(e + ' ' + e.data);

                var voxData = e.data ? JSON.parse(e.data) : null;

                // Zapamiętanie id zalogowanego użytkownika przy wywołaniu z VoxBox.

                _voxboxLoggedUserId = voxData ? voxData.loggedUserId : null;

                if (voxData && voxData.specialToggleType !== 'select') {

                    console.log('Uruchamiamy widok do konfiguracji.');

                    doInitializeActions(voxData.simpleType, false, function() {

                        $(".container.simple-talk-container").css("display", "inherit");
                        $('.st-furniture-select-container').hide();

                        $("#fog").fadeOut('slow');

                        furniture.LoadFromFile(voxData);
                        UpdateMenuSelection();
                        UpdateFurniture();
                    });
                } else {

                    // Uruchamianie konfiguratora z VoxBox'a bez przekazanego JSON'a z danymi mebla - pokazanie listy wszystkich elementów.

                    console.log('Uruchamiamy widok wszystkich mebli.');

                    setTimeout(function() {

                        $('.simple-talk-container .st-configurator-work-place').hide();
                        $('.st-furniture-select-container').show();

                        $("#fog").fadeOut('slow');

                    }, 2000);
                }
            } else {
                console.log("illegal vox data source: " + e.origin);
            }
        }

        function doInitializeActions(id, fromSlect, callback) {

            InitalizeSimpleTalk(id, callback);

            if (fromSlect) {

                $('.st-furniture-select-container').hide();
                $('.simple-talk-container .st-configurator-work-place').fadeIn('slow');
            }
        }

        function InitalizeSimpleTalk(furniture_id, callback) {

            furniture = new Furniture(furniture_id, simpleTalkResources, self);
            furniture.Load(function() {
                UpdateFurnitureOnLoad(callback);
            });
        }

        function ChangeViewToMain() {

            if (currentViewState.isDetailsView()) {

                $('#st-special-loading-canvas').fadeIn('fast', function() {

                    currentViewState.setMainView();

                    $('#main-image-container-accessories-remove').hide();
                    $('.st-accessories-img').hide();
                    $('.mainImageHover').hide();

                    var state = currentViewState.getState();
                    RefreshViewState(currentViewState, state, false);

                    // Pokazanie komuniakatu z biurek.

                    if (haveToShowTableAlert(LEGS, furniture.nozki, furniture)) {
                        showTableAlert();
                    } else {
                        hideTableAlert();
                    }

                    window.setTimeout(function() {
                        $('#st-special-loading-canvas').fadeOut('slow');
                    }, 500);
                });
            }
        }

        /*
        Wyświetla aktualną warstwę akcesorii.
        */
        function showActualAccessoriesLayer() {

            var respons = $('#mainImageContainer img:visible').data('responsive');

            var accessoriesImgs = $('.st-accessories-img');
            for (var i = 0; i < accessoriesImgs.length; ++i) {

                var a = accessoriesImgs[i];
                var resp = $(a).data('accessories-repons');

                if (resp === respons) {
                    $(a).show();
                }
            }

            // Pokazanie odpowiedniej zaślepki.

            var hoverImgs = $('.mainImageHover');
            for (var i = 0; i < hoverImgs.length; ++i) {

                var h = hoverImgs[i];
                var resp = $(h).data('responsive');

                if (resp === respons) {
                    $(h).show(); /*$(h).unveil();*/
                }
            }
        }

        function ChangeViewToDetails() {

            if (currentViewState.isMainView()) {

                $('#st-special-loading-canvas').fadeIn('fast', function() {

                    currentViewState.setDetailsView();

                    var state = currentViewState.getState();
                    RefreshViewState(currentViewState, state, false);

                    if (furniture.GetAllAccessories().length) {

                        // Przerysowanie akcesoriów.

                        furniture.RedrawAllAccessories();

                        // Przycisk do usuwania akcesorii widoczny jest tylko w trybie edycji.

                        var isInEditMode = $('#mainMenu:visible').length > 0;
                        if (isInEditMode) {
                            $('#main-image-container-accessories-remove').show();
                        }

                        showActualAccessoriesLayer();
                    }

                    hideTableAlert();

                    window.setTimeout(function() {
                        $('#st-special-loading-canvas').fadeOut('slow');
                    }, 1000);
                });
            }
        }

        function HideChangeViewControl() {

            $('#main-image-container-view-change').hide();
        }

        function ShowChangeViewControl() {

            $('#main-image-container-view-change').show();
        }

        function ShowLoadingViewContent() {

            $('#main-image-container-loading-canvas').show();
        }

        function HideLoadingViewContentOnly() {

            $('#main-image-container-loading-canvas').fadeOut('fast');
        }

        function HideLoadingViewContent(view, state) {

            $('#main-image-container-loading-canvas').fadeOut('fast', function() {
                RefreshViewState(view, state, false);
            });
        }

        function UpdateMenuSelection() {

            function selectDataInGroup(groupName, furniture) {

                var selected = furniture.getSelectedName(groupName);

                var dekorList = $('#' + groupName + '-group-collapsed .elementGroupMiniatures .dekor');
                for (var i = 0; i < dekorList.length; ++i) {

                    var d = dekorList[i];
                    var name = $(d).data('name');

                    if (name === selected) {
                        $(d).find('.img').addClass('st-position-in-step-selected');
                    } else {
                        $(d).find('.img').removeClass('st-position-in-step-selected');
                    }
                }
            }

            selectDataInGroup(BODY, furniture);
            selectDataInGroup(FRONTS, furniture);
            selectDataInGroup(HANDLES, furniture);
            selectDataInGroup(LEGS, furniture);
        }

        function SetAccordionInDefaultState() {

            var ICON_SELECTOR = '.st-step-accordion-header-collapse-icon';
            var ICON_UP = 'fa-caret-up';
            var ICON_DOWN = 'fa-caret-down';

            function changeCollapseIcon(icon, add, remove) {

                if (!$(icon).hasClass(add)) {
                    if ($(icon).hasClass(remove)) {
                        $(icon).removeClass(remove);
                    }
                    $(icon).addClass(add);
                }
            }

            function changeCollapseIconUp(collapse) {

                var icon = $(collapse).find(ICON_SELECTOR);
                changeCollapseIcon(icon, ICON_UP, ICON_DOWN);
            }

            function changeCollapseIconDown(collapse) {

                var icon = $(collapse).find(ICON_SELECTOR);
                changeCollapseIcon(icon, ICON_DOWN, ICON_UP);
            }

            function changeAllCollapseIcon() {

                var links = $('.st-step-accordion-header-collapse');
                if (links.length) {

                    for (var i = 0; i < links.length; ++i) {

                        var l = links.get(i);
                        changeCollapseIconDown($(l));
                    }
                }
            }

            // Zmiana ikony we wszystkich pozycjach.

            changeAllCollapseIcon();

            var allCollapse = $('#st-step-accordion .collapse');
            for (var i = 0; i < allCollapse.length; ++i) {

                var c = allCollapse[i];

                if (i === 0) {
                    $(c).collapse('show');
                } else {
                    $(c).collapse('hide');
                }
            }

            changeCollapseIconUp($('#st-step-accordion .st-step-accordion-header-collapse:first'));

            // Usunięcie komunikatu informującego o przeciążeniu miejsca na wózki.

            if ($('#st-accessories-group-collapsed .alert').length) {
                $('#st-accessories-group-collapsed .alert').remove();
            }
        }

        /**
         * Odświeża aktualny widok konfiguratora na podstawie przekazanego stanu.
         *  @param view - obiekt widoku konfiguratora,
         *  @param state - ostatni odczytany z serwera stan,
         *  @param saveState - flaga określająca czy należy nadpisać stan, czy tylko metoda została wywołana jako odświeżenie aktualnego.
         */
        function RefreshViewState(view, state, saveState) {

            /*
            Zwraca odpowiedni obrazek dla podanego progu responsywności.
                @level - próg zapisany jako łańcuch w postaci X, XL, itp.
                @images - kolekcja obiektów reprezentujących obrazki: { width, x, url: y }.
            */
            function getCorrectImageForResponsiveLevel(level, images) {

                function getCorrectImage(width, images) {

                    for (var i = 0; i < images.length; ++i) {

                        var img = images[i];
                        if (parseInt(img.width) === width) {
                            return img.url;
                        }
                    }

                    return null;
                }

                var correctImage = null;

                switch (level) {

                    case 'XL1':
                        correctImage = getCorrectImage(960, images);
                        break;
                    case 'XL2':
                        correctImage = getCorrectImage(734, images);
                        break;
                    case 'XL3':
                        correctImage = getCorrectImage(600, images);
                        break;
                    case 'L':
                        correctImage = getCorrectImage(734, images);
                        break;
                    case 'M':
                        correctImage = getCorrectImage(600, images);
                        break;
                    case 'S':
                        correctImage = getCorrectImage(367, images);
                        break;
                    case 'XS':
                        correctImage = getCorrectImage(300, images);
                        break;
                }

                if (correctImage == null) {
                    correctImage = images[2].url;
                }
                return correctImage;
            }

            function getCorrectFakeImageForResponsiveLevel(level) {

                var correctImage = '';

                switch (level) {

                    case 'XL1':
                        correctImage = '../assets/img/fakes/stLargeFake.png';
                        break;
                    case 'XL2':
                        correctImage = '../assets/img/fakes/stMediumFake.png';
                        break;
                    case 'XL3':
                        correctImage = '../assets/img/fakes/stM3Fake.png';
                        break;
                    case 'L':
                        correctImage = '../assets/img/fakes/stMediumFake.png';
                        break;
                    case 'M':
                        correctImage = '../assets/img/fakes/stM3Fake.png';
                        break;
                    case 'S':
                        correctImage = '../assets/img/fakes/stSmallFake.png';
                        break;
                    case 'XS':
                        correctImage = '../assets/img/fakes/stS2Fake.png';
                        break;

                    default:
                        correctImage = '../assets/img/fakes/stLargeFake.png';
                        break;
                }

                return correctImage;
            }

            function getCorrectHoverFakeImageForResponsiveLevel(level) {

                var correctImage = '';

                switch (level) {

                    case 'XL1':
                        correctImage = '../assets/img/fakes/XL1_hover.png';
                        break;
                    case 'XL2':
                        correctImage = '../assets/img/fakes/XL2_hover.png';
                        break;
                    case 'XL3':
                        correctImage = '../assets/img/fakes/XL3_hover.png';
                        break;
                    case 'L':
                        correctImage = '../assets/img/fakes/XL2_hover.png';
                        break;
                    case 'M':
                        correctImage = '../assets/img/fakes/XL2_hover.png';
                        break;
                    case 'S':
                        correctImage = '../assets/img/fakes/S_hover.png';
                        break;
                    case 'XS':
                        correctImage = '../assets/img/fakes/XS_hover.png';
                        break;

                    default:
                        correctImage = '../assets/img/fakes/XL1_hover.png';
                        break;
                }

                return correctImage;
            }

            /*
            Obsługa odpowiedzi zawierającej błąd.
                @reponse - odpowiedź serwera.
            */
            function handleNegativeServerResponse(response) {

                var message = response && response.message ? response.message : 'Nieznany błąd';
                console.log('Brak poprawnej odpowiedzi z serwera: ' + message);
            }

            function setFurnitureSize(width, depth, height) {

                $('.st-main-menu-size-values .st-main-menu-size-values-width').text(width);
                $('.st-main-menu-size-values .st-main-menu-size-values-depth').text(depth);
                $('.st-main-menu-size-values .st-main-menu-size-values-height').text(height);
            }

            var SIZED_ENABLED = false;

            if (state && state.result === 'true') {

                var currentResponsive = $('.mainImage:visible').data('responsive');

                // Zaktualizowanie wszystkich widoków dla różnych szerokości ekranu.

                var imagePreview = $(".mainImage");
                for (var i = 0; i < imagePreview.length; ++i) {

                    var ip = $(imagePreview).get(i);
                    var responsive = $(ip).data('responsive');

                    var imagesCollection = view.isMainView() ? state.mainUrl : state.accessoriesUrl;

                    var aimAttr = currentResponsive == responsive ? 'src' : 'data-src';
                    $(ip).attr(aimAttr, getCorrectImageForResponsiveLevel(responsive, imagesCollection));

                    if (currentResponsive != responsive) {

                        var fakeSrc = getCorrectFakeImageForResponsiveLevel(responsive);
                        $(ip).attr('src', fakeSrc);

                        $(ip).unveil();
                    } else {

                        // Zaktualizowanie podkładki bez wywoływania metody triggerującej podmianę.

                        $(ip).attr('data-src', getCorrectImageForResponsiveLevel(responsive, imagesCollection));
                    }
                }

                // Odrysowanie zaślepki tylko w przypadku, w którym mebel posiada listwę.

                if (furniture.hasDetails()) {

                    // Pętla po wszytkich hoverach i aktualizacja danych.

                    var hoverImagesCollection = state.hoverUrl;
                    var imageHover = $('.mainImageHover');

                    for (var i = 0; i < imageHover.length; ++i) {

                        var ip = $(imageHover).get(i);
                        var responsive = $(ip).data('responsive');

                        var aimAttr = currentResponsive == responsive ? 'src' : 'data-src';
                        $(ip).attr(aimAttr, getCorrectImageForResponsiveLevel(responsive, hoverImagesCollection));

                        if (currentResponsive != responsive) {

                            var fakeSrc = getCorrectHoverFakeImageForResponsiveLevel(responsive);
                            $(ip).attr('src', fakeSrc);

                            $(ip).unveil();
                        } else {

                            // Zaktualizowanie podkładki bez wywoływania metody triggerującej podmianę.

                            $(ip).attr('data-src', getCorrectImageForResponsiveLevel(responsive, hoverImagesCollection));
                        }
                    }
                }

                // Zaktualizowanie zaślepki.

                if (!saveState) {

                    var imagePreview = $("#main-image-container-loading-canvas .mainImageLoading");
                    for (var i = 0; i < imagePreview.length; ++i) {

                        var ip = $(imagePreview).get(i);
                        var responsive = $(ip).data('responsive');

                        var imagesCollection = view.isMainView() ? state.mainUrl : state.accessoriesUrl;

                        var aimAttr = currentResponsive == responsive ? 'src' : 'data-src';
                        $(ip).attr(aimAttr, getCorrectImageForResponsiveLevel(responsive, imagesCollection));

                        if (currentResponsive != responsive) {
                            $(ip).unveil();
                        }
                    }
                }

                // Aktualizacja wymiarów.

                if (SIZED_ENABLED) {

                    var furnitureSize = furniture.GetCurrentFurnitureSize();
                    setFurnitureSize(furnitureSize[0], furnitureSize[1], furnitureSize[2]);
                }

                // Zapamiętanie aktualnego stanu widoku.

                if (saveState) {

                    view.setViewState(state);

                    // Aktualizacja ceny.

                    var furniturePrice = GetFurniturePriceBasedOnCurrentState();
                    updatePrice(furniturePrice);
                }
            } else {
                handleNegativeServerResponse(state);
            }
        }

        function UpdateFurnitureOnLoad(callback) {

            if (!furniture.hasDetails()) {
                HideChangeViewControl();
            } else {
                ShowChangeViewControl();
            }

            UpdateMenuSelection();
            UpdateFurniture();

            if (callback != null) {
                callback();
            }
        }

        function UpdateFurniture() {

            if (useServerMethod) {

                function handleImageSuccess(data, state) {

                    var response = JSON.parse(data);
                    RefreshViewState(state, response, true);

                    // todo: cover powinien zniknąć teoretycznie dopiero jak wczytany obraz zostanie załadowany na stronę (load)...

                    window.setTimeout(function() {
                        HideLoadingViewContent(state, response);
                    }, 300);
                }

                function handleImageFail(data, state) {

                    /*
                    Zwraca odpowiedni obrazek dla podanego progu responsywności (z domyślnych zasobów).
                        @level - próg zapisany jako łańcuch w postaci X, XL, itp.
                    */
                    function getCorrectImageForResponsiveLevelLocal(level) {

                        return '../assets/img/stXMediumFake.png';
                    }

                    var imagePreview = $(".mainImage");
                    for (var i = 0; i < imagePreview.length; ++i) {

                        var ip = $(imagePreview).get(i);
                        var responsive = $(ip).data('responsive');

                        $(ip).attr("src", getCorrectImageForResponsiveLevelLocal(responsive));
                    }

                    HideLoadingViewContent(state, null);
                }

                ShowLoadingViewContent();

                var json = JSON.stringify(furniture);

                $.post("../server/getActualImage.php", {
                        data: json
                    })
                    .done(function(data) {
                        handleImageSuccess(data, currentViewState);
                    })
                    .fail(function(data) {
                        handleImageFail(data, currentViewState);
                    });
            } else {

                var imagePreview = $(".mainImage");
                for (var i = 0; i < imagePreview.length; ++i) {

                    var ip = $(imagePreview).get(i);
                    var responsive = $(ip).data('responsive');

                    $(ip).attr("src", furniture.getImagePath());
                }
            }
            
        }

        function haveToShowTableAlert(type, value, furniture) {

            if (furniture.id == ST_BIURKO_140_ID && value == 'legs-none') {
                return true;
            }
            return false;
        }

        function showTableAlert(hide, duration) {

            $('.st-ghost-alert-container').fadeIn('slow', function() {

                if (hide) {

                    setTimeout(function() {
                        $('.st-ghost-alert-container').fadeOut('slow');
                    }, duration ? duration : 3000);
                }
            });
        }

        function hideTableAlert() {

            $('.st-ghost-alert-container').fadeOut('slow');
        }

        function SetConfiguratorInDefaultState() {

            furniture.MakeDefault(UpdateFurnitureOnLoad);
            SetAccordionInDefaultState();
        }

        function SetSummaryPreview() {

            var baseElements = furniture.GetAllBaseElements();
            var accessories = furniture.GetAllAccessories();

            var summaryPreviewManager = new ConfigPresentation_Class();

            summaryPreviewManager.addElement(baseElements[0], BODY);
            summaryPreviewManager.addElement(baseElements[1], FRONTS);
            summaryPreviewManager.addElement(baseElements[2], HANDLES);
            summaryPreviewManager.addElement(baseElements[3], LEGS);

            for (var i = 0; i < accessories.length; ++i) {

                var a = accessories[i];
                summaryPreviewManager.addAccessories(a);
            }

            var baseElementsContainer = $('#main-menu-confirmed .st-configuration-summary .elementGroupMiniatures.st-summary-base-elements');
            var baseElementsHtml = summaryPreviewManager.createBaseElementsHtml();
            baseElementsContainer.html(baseElementsHtml);

            if (accessories.length) {

                $('#main-menu-confirmed .st-configuration-summary .st-summary-accessories-menu-elements').show();

                var accessoriesContainer = $('#main-menu-confirmed .st-configuration-summary .elementGroupMiniatures.st-summary-accessories');
                var accessoriesHtml = summaryPreviewManager.createAccessoriesHtml();
                accessoriesContainer.html(accessoriesHtml);
            } else {
                $('#main-menu-confirmed .st-configuration-summary .st-summary-accessories-menu-elements').hide();
            }

            $('#main-menu-confirmed .st-configuration-summary .elementGroupMiniatures').find('.dekor').popover({
                html: true
            });
        }

        var isSaveABuy = true;

        function Return() {

            // Jeżeli nie ma żadnych wartości w maszketach to można zamknąć konfigurator (przejść do prezentacji),
            // W przeciwnym przypadku wstecz zadziała jako powrót do zatwierdzonej konfiguracji.

            var backToConfirmed = GetFurnitureFromCache('id');

            $('#main-image-container-accessories-remove').fadeOut();

            if (backToConfirmed && !isSaveABuy) {
                ChangeVoxProductContent(true);
            } else {
                CloseConfigurator();
            }
        }

        function SendDataToVox(msg) {
            if (msg != "close") {
                msg = JSON.stringify(furniture);
                $('#st-configurator-modal').css('display', 'none');
            }
            window.parent.postMessage({
                'func': 'getMessageFromSimpleTalk',
                'message': msg
            }, "*");
        }

        function SaveFurniture() {

            if (isSaveABuy) {

                if(self.checkAvailability()){
                    var toSend = self.GetCartFurnitureData();
                    console.log(toSend[0]);

                    $.post(simpleConfig.linkToCart, {
                            products: toSend
                        })
                        .done(function() {
                            $('body').trigger('cart:refresh');
                        })
                        .error(function(e) {
                            console.log("error" + e);
                    });
                }

            } else {

                $('#main-image-container-accessories-remove').fadeOut();

                //save in cache
                SaveToCache(false);

                // set selected items (conf. view).
                SetSummaryPreview();

                //change vox content
                ChangeVoxProductContent(false);
            }
        }

        function getCurrentDateTime() {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            var hh = today.getHours()
            var nn = today.getMinutes()
            var ss = today.getSeconds();

            if (dd < 10) {
                dd = '0' + dd
            }

            if (mm < 10) {
                mm = '0' + mm
            }
            if (hh < 10) {
                hh = '0' + hh
            }
            if (nn < 10) {
                nn = '0' + nn
            }
            if (ss < 10) {
                ss = '0' + ss
            }

            today = yyyy + mm + dd + "_" + hh + "_" + nn + "_" + ss;

            return today;
        }

        function getUserID() {

            // _voxboxLoggedUserId jest uzupełniana w momencie wymuszenia otwarcia konfiguratora z VoxBox - jeżeli ma jakąś konkretną wartość to znaczy, że
            // użytkownik jest zalogowany.

            return _voxboxLoggedUserId;
        }

        //wyslij projekt na serwer
        function SaveProject(doneCallback, failCallback) {

            var userId = getUserID();
            var projId = userId + "_" + getCurrentDateTime();
            var projName = furniture.name;
            if (projName == null || projName.length < 1) {
                projName = furniture.id; //  + Math.floor((Math.random() * 100) + 1);
            }
            //img = (...)/M-8.png

            var src = $('.mainImage:visible').attr("src");
            //mainImageContainer class = [responsive]
            var img = src.substring(0, src.lastIndexOf("/")) + "/M-8.png"

            var data = {
                userID: userId,
                projectID: projId,
                projectName: projName,
                modelSizeXYZ: furniture.getSize(),
                imgSrc: img,
                projectXML: furniture.toXML()
            }

            $.post("../server/SimpleTalkProjects/upload/index.php", data)
                .done(function(idk) {
                    console.log("saving project status: " + idk);
                    if (doneCallback) {
                        doneCallback(idk);
                    }
                })
                .fail(function() {
                    console.log("error");
                    if (failCallback) {
                        failCallback();
                    }
                });
        }

        function ChangeVoxProductContent(reset) {

            $('#mainMenu').fadeOut('slow', function() {
                $('#main-menu-confirmed').fadeIn('slow', function() {
                    if (reset) {
                        SetConfiguratorInDefaultState();
                    } else {
                        SetAccordionInDefaultState();
                    }
                });
            });
        }

        /* Zamknij (ukryj) okno konfiguratora. */
        function CloseConfigurator() {

            $('.simple-talk-container').hide();
            $('.vox-product-pw-main').fadeIn('slow');
            SetConfiguratorInDefaultState();
        }

        function SaveToCache(clearCookie) {
            if (clearCookie) {
                var expires = "; expires=Tue, 19 Jan 2000 03:14:07 UTC;"
            } else {
                var expires = "; expires=Tue, 19 Jan 2038 03:14:07 UTC;"
            }
            //nowe ciacho
            var toSave = {
                "id": furniture.id,
                "front": furniture.front,
                "nozki": furniture.nozki,
                "korpus": furniture.korpus,
                "uchwyt": furniture.uchwyt,
                "wozki": furniture.wozki,
                "ustawionoZestaw": furniture.GetSelectedPresetName()
            };

            setCookie('ST_KONFIGURACJA_MEBLA', JSON.stringify(toSave), expires);

            //zapis pojedynczego mebla:
            // setCookie("id", furniture.id, expires);
            // setCookie("front", furniture.front,expires);
            // setCookie("nozki", furniture.nozki,expires);
            // setCookie("korpus", furniture.korpus,expires);
            // setCookie("uchwyt", furniture.uchwyt,expires);
            // var wozkiJson = JSON.stringify(furniture.wozki);
            // setCookie('wozki', wozkiJson,expires);
        }

        self.SaveToCache = SaveToCache;
        self.UpdateFurniture = UpdateFurniture;

        function getCookie(cname) {

            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function setCookie(cname, cvalue, expires) {
            // Aktualne ciacho
            var existingCookie = [];

            // Nowe ciasteczko
            var cookie = [];

            if (getCookie(cname).trim().length) {

                var cookieManager = new CookieParser_Class();
                var decode = cookieManager.decodeCookie(getCookie(cname));

                existingCookie = $.parseJSON(decode);
            }

            // Element ktory dopiszemy/napiszemy w ciastku
            var cookieAddedObject = $.parseJSON(cvalue);

            // Petla po aktualnym ciasteczku (wpisujemy elementu do nowego ciastka)
            for (var i = 0; i < existingCookie.length; i++) {

                var cookieElem = existingCookie[i];

                // Jezeli element ktory chcemy dodac do ciastka juz w nim jest to nie bierzemy jego starej wersji
                if (cookieElem.id != cookieAddedObject.id)
                    cookie.push(cookieElem);

            }

            // Dopisujemy do ciastka
            cookie.push(cookieAddedObject);

            // var cookieSize = JSON.stringify(cookie).length;

            var cookieManager = new CookieParser_Class();
            var encode = cookieManager.encodeCookie(JSON.stringify(cookie));

            // if(cookieSize < 4000)
            document.cookie = cname + "=" + encode + expires;
            // else
            //     console.log('Ciastko jest za duze');
        }

        /*
         @furnitureId - nazwa mebla (id) po ktorej bedziemy przeszukiwac nasze kaloryczne ciasteczko
        */
        function GetFurnitureFromCache(furnitureId) {

            var temporaryCookieName = 'ST_KONFIGURACJA_MEBLA';

            var existingCookie = [];

            if (getCookie(temporaryCookieName).trim().length) {

                var cookieManager = new CookieParser_Class();
                var decode = cookieManager.decodeCookie(getCookie(temporaryCookieName));

                existingCookie = $.parseJSON(decode);
            }

            var searchElement;

            // Petla po aktualnym ciasteczku (szukamy elementu)
            for (var i = 0; i < existingCookie.length; i++) {

                var cookieElem = existingCookie[i];
                if (cookieElem.id == furnitureId) {
                    searchElement = cookieElem;
                    break;
                }
            }

            if (searchElement) {
                return JSON.stringify(searchElement);
            } else {
                return '';
            }
        }

        function loadFromExternalXML() {
            $('#ExternalXMLLoaderModal').modal();
        }

        function parseTextAsXml(text) {
            var xmlDoc = jQuery.parseXML(text);
            $xml = $(xmlDoc);

            var proj = $xml.find("project")[0];
            var projId = proj.getAttribute("type");



            $('.st-furniture-select-container').hide();
            $('#ExternalXMLLoaderModal').modal('hide');
            var obj = {};
            var front = $xml.find("front")[0];
            obj.front = front.getAttribute('color');
            var uchwyt = $xml.find("uchwyt")[0];
            obj.uchwyt = uchwyt.getAttribute('color');
            var korpus = $xml.find("korpus")[0];
            obj.korpus = korpus.getAttribute('color');
            var nozki = $xml.find("nozki")[0];
            obj.nozka = nozki.getAttribute('type');
            var wozki = $xml.find("wozek");
            var wozkiIds = [];
            for (var i = 0; i < wozki.length; i++) {
                wozkiIds[i] = {
                    'id': parseInt(wozki[i].getAttribute("id"))
                };
            }
            obj.wozki = wozkiIds;

            InitalizeSimpleTalk(projId, function() {
                furniture.LoadFromFile(obj);
            });


            $('.st-step-accordion-header-collapse').on('click', function(e) {

                var ICON_SELECTOR = '.st-step-accordion-header-collapse-icon';
                var ICON_UP = 'fa-caret-up';
                var ICON_DOWN = 'fa-caret-down';

                function changeCollapseIcon(icon, add, remove) {

                    if (!$(icon).hasClass(add)) {
                        if ($(icon).hasClass(remove)) {
                            $(icon).removeClass(remove);
                        }
                        $(icon).addClass(add);
                    }
                }

                function changeCollapseIconUp(collapse) {

                    var icon = $(collapse).find(ICON_SELECTOR);
                    changeCollapseIcon(icon, ICON_UP, ICON_DOWN);
                }

                function changeCollapseIconDown(collapse) {

                    var icon = $(collapse).find(ICON_SELECTOR);
                    changeCollapseIcon(icon, ICON_DOWN, ICON_UP);
                }

                function changeAllCollapseIcon() {

                    var links = $('.st-step-accordion-header-collapse');
                    if (links.length) {

                        for (var i = 0; i < links.length; ++i) {

                            var l = links.get(i);
                            changeCollapseIconDown($(l));
                        }
                    }
                }

                // Użycie bug hacka'a.

                var collapsedId = $(this).attr('href');
                $(collapsedId).off('show.bs.collapse', forceChangeTheOthersVisibility).on('show.bs.collapse', forceChangeTheOthersVisibility);

                // Zmiana ikony we wszystkich pozycjach.

                changeAllCollapseIcon();

                // Aktualizacja klikniętej pozycji.

                var collapsed = $(this).hasClass('collapsed');

                if (collapsed) {
                    changeCollapseIconUp($(this));
                } else {
                    changeCollapseIconDown($(this));
                }

                if ($(this).parents('.panel-heading').attr('id') === 'st-accessories-group') {

                    if (collapsed && !currentViewState.isDetailsView()) {

                        $('#main-image-container-view-change-front').removeClass('active');
                        $('#main-image-container-view-change-details').addClass('active');

                        ChangeViewToDetails();
                    }
                } else {

                    if (collapsed && !currentViewState.isMainView()) {

                        $('#main-image-container-view-change-front').addClass('active');
                        $('#main-image-container-view-change-details').removeClass('active');

                        ChangeViewToMain();
                    }
                }
            });
        }

        function waitForTextReadComplete(reader) {
            reader.onloadend = function(event) {
                var text = event.target.result;
                parseTextAsXml(text);
            }
        }

        function handleFileSelection() {
            if ($('#externalProject')[0].files.length > 0 && $('#externalProject')[0].files[0] != null) {
                var file = $('#externalProject')[0].files[0];
                reader = new FileReader();

                waitForTextReadComplete(reader);
                reader.readAsText(file);
            }
        }

        function UpdateProgressBar(info) {
            var value = parseInt($("#progressBar").attr("aria-valuenow"));
            if (value < 100) {
                value += 20;
                $("#progressBar").attr("aria-valuenow", value);
                $("#progressBar").attr("style", "width:" + value + "%");
                $("#progressBar").text(info);
            }
        }

        function FinalizeProgressBar(showWorkPlace) {
            $("#progressBar").attr("aria-valuenow", 100);
            $("#progressBar").attr("style", "width:100%");
            $("#progressBar").text("Załadowano");

            // Wyświetlenie obszaru konfiguratora.

            if (showWorkPlace) {
                $('.simple-talk-container .st-configurator-work-place').show();
            }
            if (!simpleConfig.fromVoxBox) {
                $("#fog").fadeOut('slow');
            }
        }

        /**
         * Zmienia nazwę wyświetlaną jako nagłówek konfiguratora (nazwa mebla).
         *  @param name - nazwa mebla.
         */
        function ChangeFurnitureName(name) {

            $('#mainMenu .st-main-menu-header-name-bottom').text(name);
            $('.st-mobile-header .st-main-menu-header-name-bottom').text(name);
        }

        /**
         * Ustawia domyślny (pusty) stan podglądu - bez żadnych załadowanych obrazków (same fejki).
         */
        function SetDefaultPreviewState() {

            $('.mainImage.st-responsive-xl1').attr('src', '../assets/img/fakes/stLargeFake.png');
            $('.mainImage.st-responsive-xl2').attr('src', '../assets/img/fakes/stMediumFake.png');
            $('.mainImage.st-responsive-xl3').attr('src', '../assets/img/fakes/stM3Fake.png');
            $('.mainImage.st-responsive-l').attr('src', '../assets/img/fakes/stMediumFake.png');
            $('.mainImage.st-responsive-m').attr('src', '../assets/img/fakes/stMediumFake.png');
            $('.mainImage.st-responsive-s').attr('src', '../assets/img/fakes/stSmallFake.png');
            $('.mainImage.st-responsive-xs').attr('src', '../assets/img/fakes/stS2Fake.png');

            $('.mainImageLoading.st-responsive-xl1').attr('src', '../assets/img/fakes/stLargeFake.png');
            $('.mainImageLoading.st-responsive-xl2').attr('src', '../assets/img/fakes/stMediumFake.png');
            $('.mainImageLoading.st-responsive-xl3').attr('src', '../assets/img/fakes/stM3Fake.png');
            $('.mainImageLoading.st-responsive-l').attr('src', '../assets/img/fakes/stMediumFake.png');
            $('.mainImageLoading.st-responsive-m').attr('src', '../assets/img/fakes/stMediumFake.png');
            $('.mainImageLoading.st-responsive-s').attr('src', '../assets/img/fakes/stSmallFake.png');
            $('.mainImageLoading.st-responsive-xs').attr('src', '../assets/img/fakes/stS2Fake.png');
        }

        /*
        [BUG HACK] Mroczna metoda mająca na celu weryfikację poprawności chowania się paneli z miniaturkami - zdarza się, że się nie chowają jak nie zostaną wcześniej kliknięte
        (tj. zawsze się nie chowają jak nie zostaną wcześniej kliknięte).
        */
        function forceChangeTheOthersVisibility() {

            var good = true;

            var allCollapse = $(this).parents('.st-main-menu-sections').find('.collapse');
            for (var i = 0; i < allCollapse.length; ++i) {

                var c = allCollapse[i];
                if ($(c).attr('id') !== $(this).attr('id')) {

                    if ($(c).attr('aria-expanded') === 'true') {
                        $(c).collapse('hide');
                        good = false;
                    }
                }
            }

            if (!good) {
                console.log('collapse force changed');
            }
        }

        function saveVoxBoxProjectOnServer(e) {

            function handleVoxBoxProjectSaved(data) {

                if (data !== 'OK') {
                    handleVoxBoxProjectFail(data);
                } else {

                    var defColor = '#dff0d8';
                    var higColor = '#d6e9c6';

                    var text = simpleTalkResources.getResource('correct_voxbox_save');

                    $('.st-voxbox-save-result p').text(text);

                    if ($('.st-voxbox-save-result:visible').length == 0) {
                        $('.st-voxbox-save-result').removeClass('alert-danger').addClass('alert-success').slideDown('slow');
                    } else {

                        $('.st-voxbox-save-result').stop().animate({
                            backgroundColor: higColor
                        }, 300, function() {
                            $('.st-voxbox-save-result').stop().animate({
                                backgroundColor: defColor
                            }, 300);
                        });
                    }
                }
            }

            function handleVoxBoxProjectFail(data) {

                var defColor = '#f2dede';
                var higColor = '#ebccd1';

                var text = simpleTalkResources.getResource('unknow_voxbox_error');

                $('.st-voxbox-save-result p').text(text);

                if ($('.st-voxbox-save-result:visible').length == 0) {
                    $('.st-voxbox-save-result').removeClass('alert-success').addClass('alert-danger').slideDown('slow');
                } else {

                    $('.st-voxbox-save-result').stop().animate({
                        backgroundColor: higColor
                    }, 300, function() {
                        $('.st-voxbox-save-result').stop().animate({
                            backgroundColor: defColor
                        }, 300);
                    });
                }
            }

            function handleVoxBoxProjectFailInvalidSession() {

                var defColor = '#f2dede';
                var higColor = '#ebccd1';

                var text = simpleTalkResources.getResource('invalid_voxbox_session');

                $('.st-voxbox-save-result p').text(text);

                if ($('.st-voxbox-save-result:visible').length == 0) {
                    $('.st-voxbox-save-result').removeClass('alert-success').addClass('alert-danger').slideDown('slow');
                } else {

                    $('.st-voxbox-save-result').stop().animate({
                        backgroundColor: higColor
                    }, 300, function() {
                        $('.st-voxbox-save-result').stop().animate({
                            backgroundColor: defColor
                        }, 300);
                    });
                }
            }

            e.preventDefault();

            if (getUserID() != null) {
                SaveProject(handleVoxBoxProjectSaved, handleVoxBoxProjectFail);
            } else {
                handleVoxBoxProjectFailInvalidSession();
            }
        }

        var isConfigFromEdit = false;

        // W celach prezentacji umożliwiono przełączanie się między wyborem wszystkich mebli, a konfiguracją.
        var simpleTalkInPresentationMode = false;

        function resizeInitAction() {

            $('#main-image-container-accessories-remove').hide();
            $('.st-accessories-img').hide(); //fadeOut('slow');
            $('.mainImageHover').hide();
        }

        function resizeFinitializeAction() {

            if (currentViewState.isDetailsView()) {

                furniture.RedrawAllAccessories();
                if (furniture.GetAllAccessories().length && currentViewState.isDetailsView()) {
                    $('#main-image-container-accessories-remove').show();
                }

                showActualAccessoriesLayer();
            }
        }

        var resizeManager = new ResizeManager_Class(resizeInitAction, resizeFinitializeAction, $('#mainImageContainer'));

        // FRAGMENT PRZENIESIONY Z GŁÓWNEGO WIDOKU - POCZĄTEK

        // $('#fog').show();

        // $('.mainImageHover').hide();
        // $('#st-special-loading-canvas').hide();

        // UpdateProgressBar(simpleTalkResources.getResource('other_creator_init_label'));

        // // inicjalizacja mebla (występuje tylko dla wersji VOXBOXowej - w VOXie wywoływana jest w innym miejscu.)

        // if (!simpleConfiig.fromVoxBox) {

        //     var id = getFurnitureIdFromUrl();
        //     if (id) {

        //         $('#main-image-container-view-change-fake-with-back').hide();
        //         doInitializeActions(id, false, function() {
        //             $("#fog").fadeOut('slow');
        //         });
        //     } else {

        //         $('.simple-talk-container .st-configurator-work-place').hide();
        //         $('.st-furniture-select-container').show();

        //         setTimeout(FinalizeProgressBar, 2000);
        //     }
        // }

        // FRAGMENT PRZENIESIONY Z GŁÓWNEGO WIDOKU - KONIEC

        //funkcja uzywana do zapisywania wykreowanego mebla jako preset na serwerze
        function SavePreset(name) {
            if (name != null && name.length > 0) {
                furniture.name = name;
            }
            //id projektanta
            furniture.userId = 88299;

            function presetSaveSuccess(e) {
                console.log("Preset saved: " + name + "/n event info: " + e);
                furniture.userId = null;
            }

            function presetSaveFail(e) {
                console.log("Preset save FAILED: " + name + "/n event info: " + e);
                furniture.userId = null;
            }
            SaveProject(presetSaveSuccess, presetSaveFail);
        }

        function changeFurnitureProjectName(e, value) {

            furniture.ChangeName(value);
        }

        function hideAllLoadingControls() {

            $('#st-special-loading-canvas').hide();
            $('.mainImageHover ').hide();

            $('#fog').fadeOut('slow');
            if(!simpleConfig.fromVoxBox){
                    $('.st-configurator-close-container').hide();
            }
            if(simpleConfig.allowBackToList){
                    $('#backToList').show();
            }
            $('.st-furniture-select-container').show();
        }

        /* Koniec wszystkich funkcji odpowidająych za logikę */
        self.create = create;
        self.hideAllLoadingControls = hideAllLoadingControls;
    }

    return SimpleTalkCreator;
}(jQuery));
