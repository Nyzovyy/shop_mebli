/**
 * @version 2016.08.17
 */
$(function() {
    if ($('#vox-product').size()) {
        productModule.initMeblePw();
        voxPW = new voxProduct();
        voxPW.init();
        $('.vox-product-pw-gallery').hide().show(0);
    }
});

// NAZWY KLAS I POL DO KTORYCH SA ODWOLANIA
// #vox-product
// vox-product-pw
// vox-product-pw-main
// vox-product-pw-sup
// vox-product-pw-sup-group
// vox-product-dimension-select
// vox-product-dimension-selected
// vox-product-colors
// vox-product-colors-body
// vox-product-colors-front
// vox-product-color
// vox-product-color-body
// vox-product-color-front
// vox-product-versions
// vox-product-version
// vox-product-price
// vox-product-price-current
// vox-product-price-orginal
// vox-product-qty
// vox-product-raty
// vox-product-cart-btns
// vox-product-cart-btn-add
// vox-product-cart-btn-dis
// vox-product-pw-gallery
// vox-product-pw-gallery-item
// vox-product-description

function voxProduct() {

    opts = typeof arguments[0] !== 'undefined' ? arguments[0] : {};

    var _instance = this;

    this.xhr = null;
    this.wrapper = $('#vox-product');
    this.product = this.wrapper.find('.vox-product-pw-main');

    //this.photo = this.wrapper.find('.photo-main');
    //this.photo_nav = this.wrapper.find('.photo-rotator');
    this.versions = this.wrapper.find('.vox-product-versions');
    this.dimensions = this.wrapper.find('.vox-product-dimension-select');
    this.sups = this.wrapper.find('.vox-product-pw-sup,.vox-product-pw-sup-group');
    this.sup = this.wrapper.find('.vox-product-pw-sup');
    this.sup_group = this.wrapper.find('.vox-product-pw-sup');

    this.init = function() {

        //init events
        this.initVersions();
        this.initDimensionSelect();
        this.initColorSelect();
        this.initAddToCart();
        this.initDescriptions();
        this.initSupplementary();

        //LOAD CART,VERSION by query params
        this.setVersion();
        this.setCart();
        
        //onChange
        this.onChange();

        //debug
        this.wrapper.find('.DEBUG').on('click', function(e) {
            e.preventDefault();
            console.log('VER: ' + _instance.getSelectedVersion('id', $(this)) +
                ' DIM: ' + _instance.getSelectedDimension('id', $(this)) +
                ' FRONT: ' + _instance.getSelectedColor('front', 'id', $(this)) +
                ' KORPUS: ' + _instance.getSelectedColor('korpus', 'id', $(this)) +
                ' CART: ' + _instance.getSelectedCart('id', $(this)) +
                ' QUANTITY: ' + _instance.getQuantity($(this)) +
                ' PRICE: ' + _instance.getPrice($(this)));
        });
    };

    /* init data */

    this.initVersions = function() { //ok
        this.versions.on('click', 'a.select,a.select-image', function(e) {
            e.preventDefault();
            var _version = $(this).closest('.vox-product-version');
            _instance.changeVersion(_version);
        });
    };

    this.initDimensionSelect = function() { //ok, but call- setSupDimensions
        this.dimensions.find('select').on('change', function() {
            var _this = $(this);
            var _sel = _this.find("option:selected");
            var _pw = _instance.getMeta(_this, null);
            var _pwtype = _instance.getMeta(_this, null, 'type');

            if (_pwtype == 'PW') {
                if (_sel.size()) {
                    _pw.find('.dim-a').html(_sel.attr('data-a'));
                    _pw.find('.dim-b').html(_sel.attr('data-b'));
                    _pw.find('.dim-c').html(_sel.attr('data-c'));
                }
                //_instance.setSupDimensions();
            }

            _instance.filterColors('body', _this);
            _instance.filterColors('front', _this);
            _instance.onChange(_this);
        });
    };

    this.initColorSelect = function() {
        this.wrapper.find('a.vox-product-color').each(function(i, v) {
            var _this = $(this);
            var _color_list = $(this).closest('.vox-product-colors');
            var _pw = _instance.getMeta(_this, null);
            var _pwtype = _instance.getMeta(_this, null, 'type');

            _this.on('click', function(e) {
                _this.addClass('selected clicked');
                $('a.vox-product-color.selected', _color_list).removeClass('selected');
                $(this).addClass('selected clicked');
                if (_pwtype == 'PW') {
                    _instance.setSupColors();
                }
                _instance.onChange(_this);
            });

            _this.on('mouseenter', function(e) {
                    $('a.vox-product-color.active', _color_list).removeClass('active');
                    $(this).addClass('active');
                    _instance.scrollPhotoByColor($(this));
                })
                .on('mouseleave', function(e) {
                    $('a.vox-product-color.active', _color_list).removeClass('active');
                    $('a.vox-product-color.selected', _color_list).addClass('active');
                })
                .on('click', false);
        });
    };

    this.scrollPhotoByColor = function(color) {
        var wrapper = this.getMeta(color, null);
        var images = wrapper.find('.vox-product-pw-gallery-item');
        if (!images.size()) {
            return;
        }

        var type = color.hasClass('vox-product-color-body')? 'body' : 'front';
        var id = color.attr('data-id');

        images.each(function(index,element) {
            var _this = $(this);
            var _owl = _this.closest('.vox-product-pw-gallery');
            var _colors =  _this.attr('data-'+type);
            if (_this.is('[data-index]')) {
                index = _this.attr('data-index');
            }
            if (_instance.isIn(id,_colors)) {
                _owl.trigger('to.owl.carousel', [index, 500, true]);
            };
        });
    };

    this.initSupplementary = function() {

        var set = sysToInt(this.getMeta(null, null, 'set'));

        this.wrapper.find('.vox-product-pw-sup-group').find('a.select, .productName, img').click(function(event) {
            event.preventDefault();
            if (!_instance.isMainVersionSelected()) {
                return false;
            }

            var _this = $(this);
            var _url = _this.closest('.vox-product-pw').data("modalUrl");
            var _title = _this.closest('.vox-product-pw').data("modalTitle");

            var query = '?';
            var params = {};
            var dimh = _instance.getSelectedDimension('h');
            if (dimh !== null && dimh != '') {
                params.dimh = dimh;
                $.each(params, function(key, value) {
                    if (query == '?') {
                        query = query + key + '=' + value;
                    } else {
                        query = query + '&' + key + '=' + value;
                    }
                });
                _url = _url + query;
            }

            $.pgwModal({
                url: _url,
                maxWidth: 1330,
                title: _title,
                mainClassName: 'pgwModal max-height',
            });
        });

        if (set==1) {
            this.wrapper.find('.vox-product-pw-sup-group').removeClass('phidden');
        } else {
            var _first_version_id = this.getFirstVersion('id');
            if (_first_version_id != null) {
                this.wrapper.find('.vox-product-pw-sup[data-version!="'+_first_version_id+'"]').addClass('phidden');
                this.wrapper.find('.vox-product-pw-sup-group[data-version="'+_first_version_id+'"]').removeClass('phidden');
            }
        }
    };

    this.initDescriptions = function() {
        var _first_version_id = this.getFirstVersion('id');
        if (_first_version_id != null) {
            this.wrapper.find('.vox-product-description[data-version!="'+_first_version_id+'"]').addClass('phidden');
        }
    };

    this.initAddToCart = function() {
        this.wrapper.find('.vox-product-cart-btn-add').on('click', function(e) {
            e.preventDefault();
            _instance.addToCart($(this));
        });
    };

    /* on change */

    this.changeVersion = function(ver) {

        this.versions.find('li').attr('data-on', '0');
        ver.attr('data-on', '1');

        this.versions.find('li').each(function() {
            var _this = $(this);
            if (_this.attr('data-on') == 1) {
                _this.find('.select').hide();
                _this.find('.selected').show();

                //FONT SCALE - off
                // var product_name = _instance.wrapper.find('.product-name > .font-scale');
                // product_name.html(_this.find('h3').html());
                // sysFontScale(product_name, 0, 3);
            } else {
                _this.find('.select').show();
                _this.find('.selected').hide()
            }
        });

        this.filterDimensions();
        this.filterColors('body');
        this.filterColors('front');
        this.filterSup();
        this.filterDescriptions();
        // this.filterPhotos();
        // this.setSupDimensions(); //off
        this.setSupColors();
        this.onChange();
    };

    this.onChange = function(sender) {

        if (typeof sender === 'undefined') {
            var sender = this.product;
        }

        var pw = this.getMeta(sender, null);
        var pwtype = this.getMeta(sender, null, 'type');

        this.onChangeUpdatePrice(sender);

        //change dodaj do koszyka
        var cart = this.getSelectedCart('stock', sender);
        if (pwtype == 'PW') {
            this.onChangeUpdateRaty();

            if (cart !== null) {
                var links = pw.find('.vox-product-cart-btns');
                if (sysToInt(cart) == 1) {
                    links.find('.vox-product-cart-btn-add').removeClass('phidden');
                    links.find('.vox-product-cart-btn-dis').addClass('phidden');
                } else {
                    links.find('.vox-product-cart-btn-add').addClass('phidden');
                    links.find('.vox-product-cart-btn-dis').removeClass('phidden');
                }
            }
        } else {
            if (cart !== null) {
                if (sysToInt(cart) == 1) {
                    pw.find('.vox-product-cart-btn-add').removeClass('phidden');
                    pw.find('.vox-product-cart-btn-dis').addClass('phidden');
                } else {
                    pw.find('.vox-product-cart-btn-add').addClass('phidden');
                    pw.find('.vox-product-cart-btn-dis').removeClass('phidden');
                }
            }
        }

        $('[rel=popover]').popover('hide');
    };

    this.onChangeUpdatePrice = function(sender) {

        var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);

        //price

        var isPrice = false;
        var cart = this.getSelectedCart('object', wrapper);
        var ver_id = this.getSelectedVersion('id', wrapper);

        if (cart !== null) {
            var priceo = sysToFloat(cart.attr('data-priceo'));
            var pricep = sysToFloat(cart.attr('data-pricep'));
            var from = false;
            var isPrice = true;
        } else {
            var price_min_o = 999999;
            var price_max_o = 0;
            var price_min_p = 0;
            var price_max_p = 0;
            var from = false;

            var carts = this.getMeta(wrapper, 'CART');
            var dim_id = this.getSelectedDimension('id', wrapper);
            var korpus_id = this.getSelectedColor('korpus', 'id', wrapper);
            var front_id = this.getSelectedColor('front', 'id', wrapper);

            carts.each(function() {

                var _this = $(this);

                if (ver_id !== null) {
                    if (ver_id != sysToInt(_this.attr('data-version'))) {
                        return;
                    }
                }

                if (dim_id !== null) {
                    if (dim_id != _this.attr('data-dimension')) {
                        return;
                    }
                }

                if (korpus_id !== null) {
                    if (korpus_id != sysToInt(_this.attr('data-korpus'))) {
                        return;
                    }
                }

                if (front_id !== null) {
                    if (front_id != sysToInt(_this.attr('data-front'))) {
                        return;
                    }
                }

                var tmp_o = sysToFloat(_this.attr('data-priceo'));
                var tmp_p = sysToFloat(_this.attr('data-pricep'));

                if (tmp_o < price_min_o) {
                    price_min_o = tmp_o;
                    price_min_p = tmp_p;
                    isPrice = true;
                }

                if (tmp_o > price_max_o) {
                    price_max_o = tmp_o;
                    price_max_p = tmp_p;
                    isPrice = true;
                }

            });

            var priceo = parseFloat(price_min_o);
            var pricep = parseFloat(price_min_p);
            var from = (price_min_o != price_max_o);

        }

        if (this.getMeta(wrapper, null, 'type') != 'PW') {
            var fpriceo = sysFormatPrice(priceo);
            wrapper.find('.vox-product-price-current').html(fpriceo);
            return;
        }

        if (isPrice === false) {
            if (ver_id !== null) {
                var ver = this.getSelectedVersion();
                var priceo = parseFloat(ver.attr('data-price_min_o'));
                var pricep = parseFloat(ver.attr('data-price_min_p'));
                var price_max_o = parseFloat(ver.attr('data-price_max_o'));
            } else {
                var priceo = parseFloat(this.getMeta(null, null, 'price_min_o'));
                var pricep = parseFloat(this.getMeta(null, null, 'price_min_p'));
                var price_max_o = parseFloat(this.getMeta(null, null, 'price_max_o'));
            }

            var from = (priceo != price_max_o);
        }

        var el_price_o = wrapper.find('.vox-product-price-current');
        var el_price_p = wrapper.find('.vox-product-price-orginal');
        var el_price_from = wrapper.find('.vox-product-price-from');

        el_price_p.removeClass('phidden'); //cena old
        el_price_from.removeClass('phidden'); //cena od

        if (priceo == pricep) {
            el_price_p.addClass('phidden');
        }

        if (!from) {
            el_price_from.addClass('phidden');
        }

        var fpricep = sysFormatPrice(pricep);
        var fpriceo = sysFormatPrice(priceo);
        el_price_p.html(fpricep);
        el_price_o.html(fpriceo);

    };

    this.onChangeUpdateRaty = function() {
        var sender = this.product;
        var _araty = sender.find('a.vox-product-raty');
        var _price = this.getPrice(sender);

        _araty.attr('data-amount', _price);
        if (_price < 150) {
            _araty.addClass('phidden');
        } else {
            _araty.removeClass('phidden');
        }
    };

    /* filter data */

    this.filterColors = function(type, sender) {

        var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);
        var colors = wrapper.find('a.vox-product-color-' + type);
        if (!colors.size()) {
            return false;
        }

        var ver = this.getSelectedVersion('id', sender);
        var dim = this.getSelectedDimension('id', sender);
        var color_selected = this.getSelectedColor(type, 'id', sender);

        colors.removeClass('selected active phidden clicked');
        colors.each(function() {

            var _this = $(this);
            if (!_instance.isIn(_this.attr('data-version'), ver)) {
                _this.addClass('phidden');
            }

            if (dim != '' && _this.attr('data-dimension') != '') {
                if (!_instance.isIn(_this.attr('data-dimension'), dim)) {
                    _this.addClass('phidden');
                }
            }

            if (type == 'body') {
                _is_cart = _instance.findCarts(wrapper, ver, dim, _this.attr('data-id'), null);
            } else {
                _is_cart = _instance.findCarts(wrapper, ver, dim, null, _this.attr('data-id'));
            }

            if (_is_cart == 0) {
                _this.addClass('phidden');
            }
        });

        if (color_selected !== null) {
            var active = wrapper.find('a.vox-product-color-' + type + '[data-id="' + color_selected + '"]:not(".phidden")');
            if (active.size()) {
                active.trigger('click').trigger('mouseenter');
            }
        }
    };

    //TODO - w starej wersji strony wylaczone
    this.filterDimensions = function(sender) {
        // var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);
        // var select = wrapper.find('.vox-product-dimension-select');
        // var selected = wrapper.find('.vox-product-dimension-selected');
        // var s_ver = this.getSelectedVersion('id', sender);
        // var s_dim = this.getSelectedDimension('id', sender);
    };

    this.filterSup = function() {
        var ver = this.getSelectedVersion('id');
        if (ver === null) {
            return;
        }
        if (!this.sups.size()) {
            return;
        }
        this.sups.each(function(a, b) {
            $(this).removeClass('phidden');
            if (ver != $(this).attr('data-version')) {
                $(this).addClass('phidden');
            }
        });
    };

    this.filterDescriptions = function() {
        var ver = this.getSelectedVersion('id');
        var descriptions = this.wrapper.find('.vox-product-description');
        if (ver === null) {
            return;
        }
        if (!descriptions.size()) {
            return;
        }
        descriptions.each(function(a, b) {
            $(this).removeClass('phidden');
            if (ver != $(this).attr('data-version')) {
                $(this).addClass('phidden');
            }
        });
    };

    this.filterPhotos = function() {
        // console.log('filterPhotos');
        // var ver = this.getSelectedVersion('id');
        // if (ver === null) {
        //     return;
        // }
        // var id = this.getMeta(null, null, 'id');

        // var _url = '/products/gallery/id/' + id + '/ver/' + ver;
        // $.ajax({
        //     async: false,
        //     type: 'GET',
        //     url: _url,
        //     success: function(resp) {
        //         $('#produkt-gallery-wrapper').html(resp);
        //     }
        // });
    };

    /* set dim,color by main pw color */
    this.setSupDimensions = function() {
        //todo - off
    };

    this.setSupColors = function() {

        var body = this.getSelectedColor('body', 'id');
        var front = this.getSelectedColor('front', 'id');
        if (body == null && front == null) {
            return false;
        }

        var sup = this.getSelectedSup();
        if (!sup) {
            return false;
        }

        sup.find('.vox-product-colors').each(function() {

            var _this = $(this);
            var _change = false;

            if (body!=null) {
                var _colors_body = _this.find('a.vox-product-color-body[data-id="'+body+'"]:not(".phidden")');
                if (_colors_body.size()) {
                    _colors_body.trigger('click').trigger('mouseenter');
                } else {
                     _this.find('a.vox-product-color-body').removeClass('selected clicked active');
                    _change = true;
                }
            }

            if (front!=null) {
                var _colors_front = _this.find('a.vox-product-color-front[data-id="'+body+'"]:not(".phidden")');
                if (_colors_front.size()) {
                    _colors_front.trigger('click').trigger('mouseenter');
                } else {
                    _this.find('a.vox-product-color-front').removeClass('selected clicked active');
                    _change = true;
                }
            }

            if (_change) {
                _instance.onChange(_this);
            }
        });
    };

    /* add to cart */
    this.addToCart = function(sender) {

        var sender = typeof sender === 'undefined' ? this.product : sender;

        if (this.xhr) {
            return false;
        }

        if (!this.isMainVersionSelected()) {
            return false;
        }

        if (!this.validateCart(sender)) {
            return false;
        }

        var carts = this.getSelectedCarts(sender);
        if (carts === null) {
            alert('Produkt nie występuje w wybranej konfiguracji - zmień wymiar lub kolor.');
            return false;
        }

        var pwtype = this.getMeta(sender, null, 'type');
        var path_cart = this.getMeta(null, null, 'pathCart');

        this.wrapper.animate({
            'opacity': 0.2
        }, 100, function() {
            this.xhr = $.ajax({
                type: 'POST',
                url: path_cart,
                data: {
                    'items': carts
                },
                success: function(resp) {
                    try {
                        if (resp.status == 1) {
                            var is_complete = false;
                            $('html,body').animate({
                                scrollTop: 0
                            }, 1000, function() {
                                if (is_complete == false) {
                                    $('body').trigger('cart:refresh');
                                    is_complete = true;
                                }
                            });
                        } else {
                            throw "Request failed";
                        }
                    } catch (e) {
                        alert('Wystąpił błąd przy dodawaniu produktu do koszyka.');
                    }
                    _instance.wrapper.animate({
                        'opacity': 1
                    }, 100);
                    _instance.xhr = null;
                }
            });
        });

    };

    this.validateCart = function(sender) {

        var sender = typeof sender === 'undefined' ? this.product : sender;
        var product = this.getProduct(sender);

        var carts = this.getMeta(sender, 'CART');
        if (!carts.size()) {
            alert('Błąd przy dodawaniu produktu(1).');
            return false;
        }

        if (carts.size() == 1) {
            return true;
        }

        var ver = this.getSelectedVersion('object', sender);
        var korpus = this.getSelectedColor('body', 'id', sender);
        var front = this.getSelectedColor('front', 'id', sender);

        if (ver === null) {
            $('.popoverWybierzWersje').sysJumpToShowPopover();
            return false;
        }

        var ckorpus = sysToInt(ver.attr('data-ckorpus'));
        var cfront = sysToInt(ver.attr('data-cfront'));

        if (ckorpus > 0 && korpus === null) {
            product.find('.popoverWybierzKolor').sysJumpToShowPopover();
            return false;
        }
        
        if (cfront > 0 && front === null) {
            product.find('.popoverWybierzKolor').sysJumpToShowPopover();
            return false;
        }

        // if (this.getQuantity(sender) == 0) {
        //     product.find('.popoverNiepoprawnaIlosc').sysJumpToShowPopover();
        //     return false;
        // }

        return true;
    };

    //GET VALUES

    this.getSelectedSup = function() {
        return this.wrapper.find('.vox-product-pw-sup:not(.phidden)');
    };

    this.getQuantity = function(sender) {
        var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);
        var q = wrapper.find('input[name="vox_product_qty"]');
        if (!q.size()) {
            return 0;
        }
        return sysToInt(q.val());
    };

    this.getPrice = function(sender) {
        var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);
        var q = wrapper.find('.vox-product-price-current');
        if (!q.size()) {
            return 0;
        }
        return sysToFloat(q.html());
    };

    /**
     * zwraca tablice z id koszyka oraz iloscia
     */
    this.getSelectedCarts = function(sender) {
        var sender = typeof sender === 'undefined' ? this.product : sender;
        var carts = new Array();

        i = 0;

        //get current cart pw
        var cart = this.getSelectedCart('id', sender);
        if (cart !== null) {
            carts[i] = new Array();
            carts[i][0] = cart;
            carts[i][1] = this.getQuantity(sender);
        }

        if (carts.length == 0) {
            return null;
        }

        return carts;
    };

    this.getSelectedCart = function(attr, sender) {

        var attr = typeof attr === 'undefined' ? 'object' : attr;
        var sender = typeof sender === 'undefined' ? this.product : sender;
        var carts = this.getMeta(sender, 'CART');
        var cart = null;

        if (carts == null) {
            return null;
        }

        if (carts.size() == 1) {
            cart = carts.first();
        } else {
            var ver = this.getSelectedVersion('object', sender);
            var dim = this.getSelectedDimension('id', sender);

            if (ver !== null && dim !== null) {
                var ver_id = sysToInt(ver.attr('data-id'));
                var cfront = sysToInt(ver.attr('data-cfront'));
                var ckorpus = sysToInt(ver.attr('data-ckorpus'));

                if (ckorpus > 0) {
                    var korpus = this.getSelectedColor('body', 'id', sender);
                    if (korpus !== null) {
                        korpus = sysToInt(korpus);
                    }
                } else {
                    korpus = 0;
                }

                if (cfront > 0) {
                    var front = this.getSelectedColor('front', 'id', sender);
                    if (front !== null) {
                        front = sysToInt(front);
                    }
                } else {
                    front = 0;
                }

                if (korpus !== null && front !== null) {
                    carts.each(function() {
                        var _this = $(this);
                        if (ver_id != sysToInt(_this.attr('data-version'))) {
                            return;
                        }

                        if (dim != _this.attr('data-dimension')) {
                            return;
                        }

                        if (korpus > 0) {
                            if (korpus != sysToInt(_this.attr('data-korpus'))) {
                                return;
                            }
                        }

                        if (front > 0) {
                            if (front != sysToInt(_this.attr('data-front'))) {
                                return;
                            }
                        }

                        cart = _this;
                    });
                }
            }

        }

        if (cart === null) {
            return null;
        }

        if (attr != 'object') {
            return cart.attr('data-' + attr);
        }

        return cart;
    };

    this.getSelectedVersion = function(attr, sender) {

        var attr = typeof attr === 'undefined' ? 'object' : attr;
        var sender = typeof sender === 'undefined' ? this.product : sender;

        if (this.getMeta(sender, null, 'type') == 'PW') {
            var version = this.versions.find('li[data-on="1"]');
        } else {
            var version = this.getMeta(sender, 'VERSION');
        }

        if (null == version) {
            return null;
        }

        if (!version.size()) {
            return null;
        }

        if (attr != 'object') {
            return version.attr('data-' + attr);
        }

        return version;
    };

    this.getFirstVersion = function(attr) {
        var attr = typeof attr === 'undefined' ? 'object' : attr;
        var _first_version = this.wrapper.find('.vox-product-version').first();
        if (!_first_version.size()) {
            return null;
        }
        if (attr != 'object') {
            return _first_version.attr('data-' + attr);
        }
        return _first_version;
    };

    this.getSelectedColor = function(type, attr, sender) {
        var attr = typeof attr === 'undefined' ? 'object' : attr;
        var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);
        var colors = wrapper.find('.vox-product-colors-' + type);
        if (!colors.size()) {
            return null;
        }
        var color = colors.find('a.vox-product-color.selected:not(".phidden")');
        if (!color.size()) {
            var color = colors.find('a.vox-product-color:not(".phidden")');
            if (color.size() != 1) {
                return null;
            }
        }

        if (attr != 'object') {
            return color.attr('data-' + attr);
        }

        return color;
    };

    this.getSelectedDimension = function(attr, sender) {
        var attr = typeof attr === 'undefined' ? 'object' : attr;
        var wrapper = typeof sender === 'undefined' ? this.product : this.getMeta(sender, null);
        var dimension = wrapper.find('.vox-product-dimension-select').find('select > option:selected');

        if (!dimension.size()) {
            return null;
        }

        if (attr != 'object') {
            return dimension.attr('data-' + attr);
        }

        return dimension;
    };

    this.findCarts = function(sender, ver, dim, body, front) {

        carts = this.getMeta(sender, 'CART');
        carts_count = 0;

        if (ver == '' || ver == 0) {
            ver = null;
        }

        if (dim == '' || dim == 0) {
            dim = null;
        }

        if (body == '' || body == 0) {
            body = null;
        }

        if (front == '' || front == 0) {
            front = null;
        }

        carts.each(function() {

            var _this = $(this);

            cart_valid = true;

            if (ver != null) {
                if (ver != sysToInt(_this.attr('data-version'))) {
                    cart_valid = false;
                }
            }

            if (dim != null) {
                if (dim != _this.attr('data-dimension')) {
                    cart_valid = false;
                }
            }

            if (body != null) {
                if (body != sysToInt(_this.attr('data-korpus'))) {
                    cart_valid = false;
                }
            }

            if (front != null) {
                if (front != sysToInt(_this.attr('data-front'))) {
                    cart_valid = false;
                }
            }

            if (cart_valid == true) {
                carts_count++;
            }

        });

        return carts_count;
    };

    this.getMeta = function(element, key, attr) {
        if (element === null) {
            var element = this.product;
        }

        if (key === null) {
            var meta = element.closest('.vox-product-pw');
        } else {
            var meta = element.closest('.vox-product-pw').find('.meta').find('.' + key);
        }

        if (!meta.size()) {
            return null;
        }

        if (typeof attr === 'undefined') {
            return meta;
        }

        if (meta.attr('data-' + attr) === 'undefined') {
            return null;
        }

        return meta.attr('data-' + attr);
    };

    this.getProduct = function(element) {
        if (element.hasClass('vox-product-pw')) {
            return element;
        }

        return element.closest('.vox-product-pw');
    }

    this.isIn = function(elements, id) {
        if (elements == '') {
            return false;
        }
        if (id === null) {
            return true;
        }
        if (jQuery.inArray(id, elements.split(',')) > -1) {
            return true;
        }
        return false;
    };

    /* setting data by query params */

    this.setCart = function() {
        setTimeout(function() {
            var scart = _instance.wrapper.attr('data-scart');
            if (scart == '') {
                return;
            }
            //setting scart
        }, 502);
    };

    this.setVersion = function() {
        setTimeout(function() {
            var sversion = _instance.wrapper.attr('data-sversion');
            if (sversion == '') {
                return;
            }
            _instance.versions.find('li.vox-product-version[data-id="' + sversion + '"]').find('a.select').trigger('click');
        }, 502);
    };

    //HELPERS

    this.isMainVersionSelected = function() {
        var set = sysToInt(this.getMeta(null, null, 'set'));
        if (set == 1) {
            return true;
        }

        var ver = this.getSelectedVersion('id');
        if (ver === null) {
            $('.popoverWybierzWersje').sysJumpToShowPopover();
            return false;
        }
        return true;
    };

    this.hideShowElementById = function(wrapper, element, id) {
        console.log('hideShowElementById');
        // wrapper.find(element + '[data-version]').each(function() {
        //     var _this = $(this);
        //     var _id = $(this).attr('data-version');
        //     if (_id == id) {
        //         _this.removeClass('phidden');
        //     } else {
        //         _this.addClass('phidden');
        //     }
        // });
    };

}