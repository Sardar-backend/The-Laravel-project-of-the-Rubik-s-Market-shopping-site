
                                                                            <!-- Show Comments -->
                                                                             @foreach ($comments as $r)

                                                                            <div class="comment p-3 my-2">
                                                                                <div class="sender-details">
                                                                                    <div class="row">
                                                                                        <div class="col-3 col-sm-2 col-md-1 pl-md-0 pl-lg-2 pl-xl-3">
                                                                                            <img src="assets/images/user-no-image.jpg" alt="image" class="rounded">
                                                                                        </div>
                                                                                        <div class="col-9 col-sm-10 col-md-11 pr-0 pr-md-2 pr-xl-0 pt-0 pt-lg-1">
                                                                                            <div class="name">{{$r->user->name}}</div>
                                                                                            <div class="date">ارسال شده در {{jdate($r->failed_at)->ago()}}</div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <p>{{$r->content}}</p>

                                                                                        <form action="">
                                                                                            <input type="hidden" name="p" value="{{$r->id}}">
                                                                                            <button class="reply bb nn" type="submit">ارسال پاسخ<img class="ml-5" src="assets/images/comment-reply.png" id="{{$r->id}}" alt="image"></button>
                                                                                            <!-- <span class="reply bb" id="{{$r->id}}"> ارسال پاسخ</span> -->
                                                                                        </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <!-- Comment Reply -->
                                                                                @include('layouts.comments' , ['comments' => $r->child])
                                                                                <!-- <div class="row justify-content-end">
                                                                                    <div class="col-11 pt-2 pr-0">
                                                                                        <div class="comment p-3">
                                                                                            <div class="sender-details">
                                                                                                <div class="row">
                                                                                                    <div class="col-3 col-sm-2 col-md-1 pl-md-0 pl-lg-2 pl-xl-3">
                                                                                                        <img src="assets/images/user-no-image.jpg" alt="image" class="rounded">
                                                                                                    </div>
                                                                                                    <div class="col-9 col-sm-10 col-md-11 pr-0 pr-md-2 pr-xl-0 pt-0 pt-lg-1">
                                                                                                        <div class="name">امین کیانی</div>
                                                                                                        <div class="date">ارسال شده در 18 تیر 1400</div>
                                                                                                    </div>
                                                                                                    <div class="col-12">
                                                                                                        <p>صفحات و محتوای آزمایشی همیشه بخشی از محتوای پیش‌نمایش قالب و افزونه های وب هستند که شما بتوانید ارتباط درستی با پیش نمایش قالب گرفته و تصمیم مناسبی بگیرید. این صفحات معمولا برای اطلاعات کلی در مورد سایت مثل «درباره ما»، «تماس با ما»، «فهرست» یا «نظرات شما» مفید هستند.</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->
                                                                                <!-- /Comment Reply -->
                                                                            </div>
                                                                            @endforeach
                                                                            <!-- /Show Comments -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
