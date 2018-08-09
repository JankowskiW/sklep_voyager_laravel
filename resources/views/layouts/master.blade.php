@php ob_start();
@endphp
        <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
          id="bootstrap4-css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap3-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Scripts -->
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js'></script>

    <style>
        body {
            padding-top: 54px;
            background-color: #303030;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }

        .links {
            margin: 20px;
            text-transform: uppercase;
            font-weight: bolder;
            font-size: 15px;
        }

        .links:link {
            text-decoration: none;
            color: white;
        }

        .links:hover {
            text-decoration: none;
            color: orangered;
        }

        .links:active {
            text-decoration: none;
            color: white;
        }

        .links:visited {
            text-decoration: none;
            color: white;
        }

        .nav-bg {
            background-color: orange;
        }

        .circle {
            width: 200px;
            height: 200px;
            -moz-border-radius: 100px;
            -webkit-border-radius: 100px;
            border-radius: 100px;
        }

        .btn-no-style {
            background-color: transparent;
            border: none;
            height: auto;
            width: auto;
        }

        .my-no-style {
            background-color: transparent;
            border: none;
            height: auto;
            width: auto;
        }

        .bg-orange {
            background-color: orange;
        }

        .my-dropdown-item {
            text-align: center;
        }

        .no-decoration-links {
            display: inline-block;
            text-transform: uppercase;
            font-weight: bolder;
            font-size: 15px;
            text-align: center;
        }

        .no-decoration-links:link {
            text-decoration: none;
            color: white;
        }

        .no-decoration-links:hover {
            text-decoration: none;
            color: orangered;
        }

        .no-decoration-links:active {
            text-decoration: none;
            color: white;
        }

        .no-decoration-links:visited {
            text-decoration: none;
            color: white;
        }
    </style>


    <title>Voyager!</title>
</head>
<body>
@include ('layouts.head')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>


@include ('layouts.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


<script type="text/javascript">

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

    function setCookie(cname, cvalue, exmins) {
        var d = new Date();
        d.setTime(d.getTime() + (exmins * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function eraseCookie(name) {
        document.cookie = name + '=; Max-Age=-99999999;';
    }

    var Product = function (name, price, quantity = 1) {
        this.name = ko.observable(name);
        this.qty = ko.observable(quantity);
        this.price = ko.observable(price);
        if(this.qty() < 1) this.qty(1);
        console.log(this.qty());

        this.setQt = function (n) {
            this.qty(n);
        };

        this.increaseQty = function () {
            this.qty(this.qty() - (-1));
            console.log(this.qty());
        };

        this.decreaseQty = function () {
            if (this.qty() > 1) {
                this.qty(this.qty() - 1);
            }
            console.log(this.qty());
        };

        this.getCount = ko.computed(function () {
            return parseInt(this.qty());
        }, this);


        this.getFullPrice = ko.computed(function () {
            return this.price() * this.getCount();
        }, this);

    };

    var Cart = function (products) {
        var self = this;
        self.test = ko.observable(5);
        self.products = ko.observableArray(products);
        self.addProduct = function (product) {
            self.products().push(product);
        };

        self.removeFromCart = function () {
            console.log('removing from cart');
            self.products.remove(this);
            self.products.valueHasMutated();
        };

        self.subtotal = ko.computed(function () {
            var i = 0;
            var retval = 0.0;
            if (self.products().length < 1) {
                return retval;
            }
            for (; i < self.products().length; i++) {
                retval += self.products()[i].getFullPrice();
            }
            self.products.valueHasMutated();
            return retval;
        }, self);

        self.getProductCount = ko.computed(function () {
            var sum = 0;

            if (self.products().length < 1) {
                return sum;
            }

            for (var i in self.products()) {
                sum += self.products()[i].getCount();
            }
            self.products.valueHasMutated();
            return sum;

        }, self);


        self.addNewProduct = function () {
            var price = $( "#product-price" ).attr('value');
            var qty = $("#product-qty").attr('value');
            var name = $( "#product-name" ).attr('value');
            console.log(price);
            self.addNewProductToList(name, parseFloat(price), parseInt(qty));
        };

        self.addNewProductToList = function (name, price, qty) {
            self.products().push(new Product(name, price, qty));
            self.products.valueHasMutated();
        };

        self.updateCookies = ko.computed(function () {
            var tmpArray = [];
            for (var i in this.products()) {
                tmpArray.push([this.products()[i].name(), this.products()[i].price(), this.products()[i].qty()]);
            }
            setCookie('cart', JSON.stringify(tmpArray), 8400);
        }, self);

        self.isReadyToAdd = ko.computed(function () {
            // return self.newProductQt() !== null && self.newProductName() !== null && self.newProductPrice() !== null;
        }, self);
    };

    var products = [];
    var productList = getCookie('cart');
    if (productList) {
        var parsedProductList = JSON.parse(productList);
        for (var i in parsedProductList) {
            products.push(new Product(parsedProductList[i][0], parsedProductList[i][1], parsedProductList[i][2]));
        }
    }
    console.log(products);
    var cart = new Cart(products);

    ko.applyBindings(cart);
    // ko.options.useOnlyNativeEvents = true;

    // var Product = function (name, price, quantity = 1) {
    //     this.name = ko.observable(name);
    //     this.qty = ko.observable(quantity);
    //     this.price = ko.observable(price);
    //
    //     // this.increaseQty = function () {
    //     //     this.qty(this.qty() - (-1)); // lub this.qty(parseInt(this.qty() + 1));
    //     //     console.log(this.qty());
    //     // }
    //     //
    //     // this.decreaseQty = function () {
    //     //     if (this.qty() > 1) {
    //     //         this.qty(this.qty() - 1);
    //     //     }
    //     //     console.log(this.qty());
    //     // }
    //
    //     this.getCount = ko.computed(function () {
    //         return this.qty();
    //     }, this);
    //
    //     this.getFullPrice = ko.compute(function () {
    //         return this.price() * this.getCount();
    //     }, this);
    //
    // }
    //
    // var Cart = function (products) {
    //     var self = this;
    //     self.products = ko.observableArray(products);
    //
    //     self.addProduct = function (product) {
    //         self.products().push(product);
    //     };
    //
    //     self.removeFromCart = function () {
    //         self.products.remove(this);
    //         self.products.valueHasMutated();
    //     };
    //
    //     self.subtotal = ko.computed(function () {
    //         var i = 0;
    //         var retval = 0.0;
    //         if (self.products().length < 1) {
    //             return retval;
    //         }
    //         for (; i < self.products().length < 1) {
    //             return retval;
    //         }
    //         for (; i < self.products().length; i++) {
    //             retval += self.products()[i].getFullPrice();
    //         }
    //         self.products.valueHasMutated();
    //         return retval;
    //     }, self);
    //
    //     self.getProductCount = ko.computed(function () {
    //         var sum = 0;
    //
    //         if (self.products().length < 1) {
    //             return sum;
    //         }
    //
    //         for (var i in self.prpoducts()) {
    //             sum += self.products()[i].getCount();
    //         }
    //         self.products.valueHasMutated();
    //         return sum;
    //     }, self);
    //
    //     self.newProductPrice = ko.observable(null);
    //     self.newProductQt = ko.observable(null);
    //     self.newProductName = ko.observable(null);
    //
    //     self.addNewProduct = function () {
    //         self.addNewProductToList(self.newProductName(), parseFloat(self.newProductPrice()), pastseInt(self.newProductQt()));
    //         self.newProductPrice(null);
    //         self.newProductName(null);
    //         self.newProductQt(null);
    //     };
    //
    //     self.addNewProductToList = function (name, price, qty) {
    //         self.products().push(new Product(name, price, qty));
    //         self.products.valueHasMutated();
    //     };
    //
    //     self.updateCookies = ko.computed(function () {
    //         var tmpArray = [];
    //         for (var i in this.products()) {
    //             tmpArray.push([this.products()[i].name(), this.products()[i].price(), this.products()[i].qty()]);
    //
    //         }
    //         setCookie('cart', JSON.stringify(tmpArray));
    //
    //     }, self);
    //
    //     self.isReadyToAdd = ko.computed(function () {
    //         return self.newProductQt() !== null && self.newProductName() != null && self.newProductPrice() !== null;
    //     }, self);
    // };
    //
    // var products = [];
    // var productList = getCookie('cart');
    // if(productList) {
    //     var parsedProductList = JSON.parse(productList);
    //     for (var i in parsedProductList) {
    //         products.push(new Product(parsedProductList[i][0], parsedProductList[i][1], parsedProductList[i][2]));
    //     }
    // }
    // products = ko.observableArray(products);
    // var cart = new Cart(products);
    // ko.applyBindings(cart);
    //
    // //
    // // var products = [];
    // // var productList = JSON.parse(getCookie('cart'))["items"];
    // // if (productList) {
    // //     for (var i in productList) {
    // //         // console.log(productList[i]);
    // //         products.push(new Product(
    // //             productList[i]["item"]["name"],
    // //             productList[i]["price"],
    // //             productList[i]["qty"]
    // //         ))
    // //     }
    // // }
    // // products = ko.observableArray(products);
    // // ko.applyBindings(products());
    // // ko.options.useOnlyNativeEvents = true;
    // // setCookie('cart',)
    //
    // //
    // // var Item = function (lp, name, image, qty, price) {
    // //     this.lp = lp;
    // //     this.name = name;
    // //     this.image = image;
    // //     this.qty = qty;
    // //     this.price = price;
    // // };
    // //
    // // var Items = ko.observableArray([]);
    // // var key;
    // // var idx = 0;
    // // for (key in cart) {
    // //     idx++;
    // //     item = new Item(
    // //         idx,
    // //         cart[key]["item"]["name"],
    // //         cart[key]["item"]["image"],
    // //         cart[key]["qty"],
    // //         cart[key]["price"]
    // //     )
    // //     Items.push(item);
    // // }
    // // ko.applyBindings(new function () {
    // //     this.Items = Items;
    // // }());

</script>


</body>
</html>
@php
    ob_end_flush();
@endphp