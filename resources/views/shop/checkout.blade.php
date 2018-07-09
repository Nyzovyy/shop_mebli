@extends('layouts.admin')

@section('catalog')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Каталог
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Каталог</li>
            </ol>
        </section>

        <!-- Mcatalogtent -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <h2>
                Завершення покупки
            </h2>
            <br>

                <div class="row">
                    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                        <h4>Your Total: $ {{ $total }}</h4>
                        <form action="{{ url('checkout') }}" method="post" id="checkout-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-name">Card Holder Name</label>
                                    <input type="text" id="card-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-name">Credit Card Number</label>
                                    <input type="text" id="card-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="card-expiry-month">Expiration Month</label>
                                            <input type="text" id="card-expiry-month" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="card-expiry-year">Expiration Year</label>
                                            <input type="text" id="card-expiry-year" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" id="card-cvc" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-success">By now</button>
                        </form>

                        {{--<script--}}
                                {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
                                {{--data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"--}}
                                {{--data-amount="999"--}}
                                {{--data-name="Stripe.com"--}}
                                {{--data-description="Widget"--}}
                                {{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
                                {{--data-locale="auto"--}}
                                {{--data-zip-code="true">--}}
                        {{--</script>--}}
                    </div>
                </div>


        </section>
    </div>


@endsection

@section('script')
    <script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
    <script type="text/javascript" src="{{ url('/js/checkout.js') }}"></script>

@stop