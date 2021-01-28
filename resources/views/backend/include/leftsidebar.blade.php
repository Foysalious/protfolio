<!-- body content start -->
<div class="body-content">


    <!-- left sidebar pc start -->
    <section class="left-sidebar">
        <div class="container-fluid">

            <!-- top part start -->
            <div class="row top-part">

                <!-- middle part start -->
                <div class="col-md-9 col-9">
                    <h3></h3>

                    <p>Welcome {{ Auth::user()->name }}</p>

                </div>
                <!-- middle part end -->

            </div>
            <!-- top part end -->

            <!-- navbar item start -->
            <div class="row nav-item">
                <div class="col-md-12">
                    <ul>

                        <!-- nav single view start -->
                        <li>
                            <a href="">
                                <div class="left">
                                    dashboard
                                </div>
                                <div class="right">
                                    <i class="fas fa-home"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                        
                        
                        <!-- nav single view end -->

                        <!-- nav single view start -->
                        <li>
                            <a href="{{route('expericeShow')}}">
                                <div class="left">
                                    Experience
                                </div>
                                <div class="right">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->
                        <!-- nav single view start -->
                        <li>
                            <a href="{{route('testimonialShow')}}">
                                <div class="left">
                                    Testimonial
                                </div>
                                <div class="right">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->
                          <!-- nav single view start -->
                          <li>
                            <a href="{{route('protfolioShow')}}">
                                <div class="left">
                                    Protfolio
                                </div>
                                <div class="right">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                         <!-- nav single view start -->
                         <li>
                            <a href="{{route('personalShow')}}">
                                <div class="left">
                                    Personal
                                </div>
                                <div class="right">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                          <!-- nav single view start -->
                          <li>
                            <a href="{{route('contactShow')}}">
                                <div class="left">
                                    Contact
                                </div>
                                <div class="right">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->

                          <!-- nav single view start -->
                          <li>
                            <a href="{{route('messageShow')}}">
                                <div class="left">
                                    Message
                                </div>
                                <div class="right">
                                    <i class="fas fa-bars"></i>
                                </div>
                            </a>
                        </li>
                        <!-- nav single view end -->



                    </ul>
                </div>
            </div>
            <!-- navbar item end -->

        </div>
    </section>
    <!-- left sidebar pc end -->