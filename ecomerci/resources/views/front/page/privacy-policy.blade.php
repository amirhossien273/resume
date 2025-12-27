@extends('front.layout.app')

@section('page')

    <!-- Start Privacy Policy Area -->
    <div class="axil-privacy-area axil-section-gap">
        <div class="container">
            <div class="row">
                <div style="margin: auto;" class="col-lg-10 p-25">
                    <div class="axil-privacy-policy">
                        <?php echo html_entity_decode(setting('privacyPolicy')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Privacy Policy Area -->

@endsection
