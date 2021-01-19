<footer id="footer" class="site-footer">
    <div class="footer-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-4">
                    <div class="footer-menu-item">
                        <h3>Our company</h3>
                        <ul>
                            <li><a href="{{ route('whatiscampaign') }}">What is Campaign</a></li>
                            <li><a href="{{ route('howitworks') }}">How it works</a></li>
                            <li><a href="{{ route('pricing') }}">Pricing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-4">
                    <div class="footer-menu-item">
                        <h3>Campaign</h3>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ route('aboutus') }}">About Us</a></li>
                            <li><a href="{{ route('trustsafety') }}">Trust &amp; Safety</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-4 col-4">
                    <div class="footer-menu-item">
                        <h3>Explore</h3>
                        <ul>
                            <li><a href="{{ route('support') }}">Support</a></li>
                            <li><a href="{{ route('termsofuse') }}">Terms of Use</a></li>
                            <li><a href="{{ route('privacypolicy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 col-12">
                    <div class="footer-menu-item newsletter">
                        <h3>We are Social</h3>
                        <div class="follow">
                            <h5>Follow us on our social media pages</h5>
                            <ul>
                                <li class="facebook"><a target="_Blank" href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li class="twitter"><a target="_Blank" href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li class="instagram"><a target="_Blank" href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li class="google"><a target="_Blank" href="https://www.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li class="youtube"><a target="_Blank" href="https://www.youtube.com"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-top">
                <p class="payment-img"><img src="images/assets/payment-methods.png" alt=""></p>
                <div class="footer-top-right">
                    <div class="dropdow field-select">
                        <select name="s">
                            <option value="">₦ Nigerian Naira (NGN)</option>
                        </select>
                    </div>
                    <div class="dropdow field-select">
                        <select name="s">
                            <option value="">English</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .footer-menu -->
    <div class="footer-copyright">
        <div class="container">
            <p class="copyright">2021 by {{ config('app.name') }}. All Rights Reserved.</p>
            <a href="index.html#" class="back-top">Back to top<span class="ion-android-arrow-up"></span></a>
        </div>
    </div>
</footer><!-- site-footer -->