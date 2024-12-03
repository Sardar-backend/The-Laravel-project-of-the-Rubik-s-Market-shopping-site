<div class="container">
<div class="row">
    <div class="col-12">
        <div id="pagination-bg">
            <ul class="pagination justify-content-center pagination-sm">
                <li class="page-item" id="previous-page"><a class="page-link" href="javascript:void(0)"><svg class="svg-inline--fa fa-angle-double-right fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-double-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"></path></svg><!-- <i class="fas fa-angle-double-right"></i> Font Awesome fontawesome.com --></a></li>
                @for ($i = 1; $i < $products->count(); $i++)

                <li class="page-item current-page active"><a class="page-link" href="javascript:void(0)">1</a></li>
                @endfor
                <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">2</a></li>
                <li class="page-item current-page"><a class="page-link" href="javascript:void(0)">3</a></li><li class="page-item current-page"><a class="page-link" href="javascript:void(0)">4</a></li><li class="page-item" id="next-page"><a class="page-link" href="javascript:void(0)"><svg class="svg-inline--fa fa-angle-double-left fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-double-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M223.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L319.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L393.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34zm-192 34l136 136c9.4 9.4 24.6 9.4 33.9 0l22.6-22.6c9.4-9.4 9.4-24.6 0-33.9L127.9 256l96.4-96.4c9.4-9.4 9.4-24.6 0-33.9L201.7 103c-9.4-9.4-24.6-9.4-33.9 0l-136 136c-9.5 9.4-9.5 24.6-.1 34z"></path></svg><!-- <i class="fas fa-angle-double-left"></i> Font Awesome fontawesome.com --></a></li></ul>
        </div>
    </div>
</div>
</div>
