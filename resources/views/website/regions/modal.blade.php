<!-- Login Modal -->
<div class="cust-modal">
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button>
                    <h4 class="modal-title text-center"><img src="{{ url('/') }}/public/website-assets/images/logo.jpg"></h4>
                </div>
                <div class="modal-body">
                    <div class="sign-form">
                        <div class="sign-head ">
                            <h4>Sign in your account</h4>
                            <p>Don’t have an account? <a href="javascript:void(0)">Click here</a> to register</p>
                        </div>
                        <div class="sign-body">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Email" type="text">
                                            <div class="form-icons"><i class="fa fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Password" type="password">
                                            <div class="form-icons"><i class="fa fa-lock"></i></div>
                                            <div class="forg-paswd text-right"><a href="javascript:void(0)">Forgot your password?</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sign-terms sign-head"><p>By logging in you agree to our <a href="javascript:void(0)">Terms &amp; Conditions.</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-btn text-center">
                                            <button class="btn btn-orange cust-btn animate text-uppercase" type="button">sign in</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ragister Modal -->
<div class="cust-modal">
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-remove"></i></span></button>
                    <h4 class="modal-title text-center"><img src="{{ url('/') }}/public/website-assets/images/logo.jpg"></h4>
                </div>
                <div class="modal-body">
                    <div class="sign-form">
                        <div class="sign-head ">
                            <h4>Create your account</h4>
                            <p>Already have an account?  <a href="javascript:void(0)">Click here</a> to login</p>
                        </div>
                        <div class="sign-body">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="First Name" type="text">
                                            <div class="form-icons"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Last Name " type="text">
                                            <div class="form-icons"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="User  Name " type="text">
                                            <div class="form-icons"><i class="fa fa-user"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="form-group row">
                                 <div class="col-sm-12">
                                  <div class="sin-inp relative">
                                   <input class="form-control" placeholder="Mobile" type="text">
                                   <div class="form-icons"><i class="fa fa-mobile"></i></div>
                                  </div>
                                 </div>
                                </div>-->
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Email" type="text">
                                            <div class="form-icons"><i class="fa fa-envelope"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Password" type="password">
                                            <div class="form-icons"><i class="fa fa-lock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Confirm Password" type="password">
                                            <div class="form-icons"><i class="fa fa-lock"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-inp relative">
                                            <input class="form-control" placeholder="Date Of Birth" type="password">
                                            <div class="form-icons"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="cust-select icon-sele relative">
                                            <select class="form-control">
                                                <option>Gender</option>
                                                <option>Male</option>
                                                <option>Fe-male</option></select>
                                            <div class="form-icons"><i class="fa fa-male"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sign-terms sign-head"><p>By logging in you agree to our <a href="javascript:void(0)">Terms &amp; Conditions.</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="sin-btn text-center">
                                            <button class="btn btn-orange cust-btn animate text-uppercase" type="button">register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>