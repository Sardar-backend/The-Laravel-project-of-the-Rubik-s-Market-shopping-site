<div class="col-12 col-lg-3">
                            <!-- Side Panel -->
                            <div class="accordion" id="side-panel">
                                <div class="accordion-item menu-container">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            <span class="row">
                                                <span class="col-3 col-sm-2 col-lg-3">
                                                    @if (request()->user()->image)

                                                    <img src="/storage/{{request()->user()->image}}" class="rounded-circle">
                                                    @else

                                                    <img src="../assets/images/user-no-image.jpg" class="rounded-circle">
                                                    @endif
                                                </span>
                                                <span class="col-7 col-sm-8 col-lg-7 pt-0 pt-sm-2 pt-md-3 pt-lg-0 align-self-center">
                                                    <div id="full-name">{{request()->user()->name}}</div>
                                                    <div class="mt-2" id="email-mobile">{{request()->user()->phonenumber}}</div>
                                                </span>
                                            </span>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <ul>
                                                <li>
                                                    <a href="{{route('personal')}}"
                                                    @if (Request::path()=='personal')
                                                    class="active"
                                                    @endif
                                                    >
                                                        <div>
                                                            <div class="icon d-inline-block"><img src="../assets/images/icons/profile-menu/profile.webp" class="pl-2"></div> اطلاعات حساب
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('factors')}}"

                                                    @if (Request::path()=='factors')
                                                    class="active"
                                                    @endif

                                                    >
                                                        <div>
                                                            <div class="icon d-inline-block"><img src="../assets/images/icons/profile-menu/orders.webp" class="pl-2"></div> سفارش های من
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('favorites')}}"

                                                    @if (Request::path()=='favorites')
                                                    class="active"
                                                    @endif

                                                    >
                                                        <div>
                                                            <div class="icon d-inline-block"><img src="../assets/images/icons/profile-menu/favorites.webp" class="pl-2"></div> علاقه مندی ها
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('adresses')}}"


                                                    @if (Request::path()=='Addresses')
                                                    class="active"
                                                    @endif


                                                    >
                                                        <div>
                                                            <div class="icon d-inline-block"><img src="../assets/images/icons/profile-menu/addresses.webp" class="pl-2"></div> آدرس های من
                                                        </div>
                                                    </a>
                                                </li>
                                                <li><hr></li>
                                                <li>
                                                    <a href="{{route('logout')}}">
                                                        <div>
                                                            <div class="icon d-inline-block"><img src="../assets/images/icons/profile-menu/exit.webp" class="pl-2"></div> خروج از حساب
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Side Panel -->
                        </div>
